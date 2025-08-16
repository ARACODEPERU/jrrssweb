<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Models\Person;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Illuminate\Validation\Rule;
use Modules\Security\Rules\ValidationPersonUser;

class PersonController extends Controller
{

    protected $P000012;

    public function __construct()
    {
        $this->P000012 = Parameter::where('parameter_code', 'P000012')->value('value_default');
    }

    public function searchByNumberType(Request $request)
    {
        //dd($request->all());
        $document_type = $request->input('document_type');
        $number = $request->input('number');
        $full_name = $request->input('full_name');

        $msg1 = '';
        $msg2 = '';
        $status = true;
        $person = [];
        $alert = 'No existen datos para la busqueda';

        if ($document_type == '') {
            $msg1 = 'Elija Tipo docuemnto';
        }
        if (!$number || $number == '') {
            $msg2 = 'Ingrese numero';
        }


        $person = Person::leftJoin('districts', 'ubigeo', 'districts.id')
            ->leftJoin('provinces', 'districts.province_id', 'provinces.id')
            ->leftJoin('departments', 'provinces.department_id', 'departments.id')
            ->select(
                'people.*',
                'districts.id AS district_id',
                DB::raw('CONCAT(departments.name,"-",provinces.name,"-",districts.name) AS city')
            )
            ->where('people.document_type_id', $document_type)
            ->where(function ($query) use ($number, $full_name) {
                $query->where('people.number', $number);
            })
            ->first();
        //dd($person);
        $ubigeo = [];

        if ($person) {
            $status = true;
            $alert = null;
            $ubigeo = array(
                'district_id' => $person->district_id,
                'city_name' => $person->city
            );
        } else {
            $status = false;
            $alert = 'No existen datos para la busqueda';
            $ubigeo = [];
        }
        //dd($person);
        return response()->json([
            'status'        => $status,
            'person'        => $person,
            'document_type' => $msg1,
            'number'        => $msg2,
            'alert'         => $alert,
            'ubigeo' => $ubigeo
        ]);
    }

    public function saveUpdateOrCreate(Request $request)
    {
        $this->validate($request, [
            'document_type' => 'required',
            'number' => 'required',
            'full_name' => 'required|max:255',
            'address'   => 'required|max:255',
            'ubigeo'   => 'required'
        ]);

        $ubigeo = $request->input('ubigeo');

        $person = Person::updateOrCreate(
            [
                'document_type_id' => $request->input('document_type'),
                'number' => $request->input('number'),
            ], // Buscamos a la persona
            [
                'full_name' => trim($request->input('full_name')),
                'telephone' => $request->input('telephone'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'is_client' => $request->input('is_client') ? true : false,
                'is_provider' => $request->input('is_provider') ? true : false,
                'ubigeo' => is_array($ubigeo) ? $ubigeo['district_id'] : $ubigeo
                // otros campos que quieras actualizar o crear
            ]
        );

        $person->load('district.province.department');
        // Obtener el nombre de la ciudad usando los datos relacionados
        $city = $person->district->province->department->name . "-" . $person->district->province->name . "-" . $person->district->name;
        $person->city = $city;

        return response()->json($person);
    }

    public function searchByNameOrNumber(Request $request)
    {
        $search = $request->input('search');
        $status = true;
        $persons = [];
        $alert = 'No existen datos para la busqueda';

        $persons = Person::where('number', $search)
            ->orWhere('full_name', 'like', '%' . $search . '%')
            ->orWhere('short_name', 'like', '%Clientes Varios%')
            ->orderBy('id')
            ->get();

        if (count($persons) > 0) {
            $status = true;
            $alert = null;
        } else {
            $status = false;
            $alert = 'No existen datos para la busqueda';
        }

        return response()->json([
            'status'        => $status,
            'persons'        => $persons,
            'alert'         => $alert
        ]);
    }

    public function updateInformationPerson(Request $request)
    {
        //dd($request->get('birthdate'));
        $person_id = $request->get('id');
        $student_id = $request->get('student_id');

        $user = User::where('person_id', $person_id)->first();

        $this->validate(

            $request,
            [
                'document_type_id'  => 'required',
                'number'            => 'required|max:12',
                'number'            => 'unique:people,number,' . $person_id . ',id,document_type_id,' . $request->get('document_type_id'),
                'telephone'         => 'required|max:12',
                'email'             => 'required|max:255',
                'email'             => 'unique:people,email,' . $person_id . ',id',
                'email'             => 'unique:users,email,' . $user->id . ',id',
                'address'           => 'required|max:255',
                'ubigeo'            => 'required|max:255',
                'birthdate'         => 'required|',
                'names'             => 'required|max:255',
                'father_lastname'   => 'required|max:255',
                'mother_lastname'   => 'required|max:255',
            ]
        );

        $path = null;
        $destination = 'uploads/students';
        $base64Image = $request->get('image');

        if ($base64Image) {
            $fileData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
            if (PHP_OS == 'WINNT') {
                $tempFile = tempnam(sys_get_temp_dir(), 'img');
            } else {
                $tempFile = tempnam('/var/www/html/img_temp', 'img');
            }
            file_put_contents($tempFile, $fileData);
            $mime = mime_content_type($tempFile);

            $name = uniqid('', true) . '.' . str_replace('image/', '', $mime);
            $file = new UploadedFile(realpath($tempFile), $name, $mime, null, true);


            if ($file) {
                // $original_name = strtolower(trim($file->getClientOriginalName()));
                // $file_name = time() . rand(100, 999) . $original_name;
                $original_name = strtolower(trim($file->getClientOriginalName()));
                $original_name = str_replace(" ", "_", $original_name);
                $extension = $file->getClientOriginalExtension();
                $file_name = trim($request->get('number')) . '.' . $extension;
                $path = Storage::disk('public')->putFileAs($destination, $file, $file_name);
            }
        }

        Person::find($person_id)->update([
            'document_type_id'      => $request->get('document_type_id'),
            'short_name'            => trim($request->get('names')),
            'full_name'             => trim($request->get('father_lastname') . ' ' .  $request->get('mother_lastname') . ' ' . $request->get('names')),
            'description'           => $request->get('description'),
            'number'                => $request->get('number'),
            'telephone'             => $request->get('telephone'),
            'email'                 => $request->get('email'),
            'image'                 => $path,
            'address'               => $request->get('address'),
            'is_provider'           => false,
            'is_client'             => true,
            'ubigeo'                => $request->get('ubigeo'),
            'birthdate'             => $request->get('birthdate'),
            'names'                 => trim($request->get('names')),
            'father_lastname'       => trim($request->get('father_lastname')),
            'mother_lastname'       => trim($request->get('mother_lastname'))
        ]);

        $user->update([
            'name'          => $request->get('names'),
            'email'         => $request->get('email'),
            //'password'      => Hash::make($request->get('number')),
            'information'   => $request->get('description'),
            'avatar'        => $path,
            'updated_information' => true
        ]);

        DB::table('aca_students')->where('id', $student_id)->update([
            'student_code'  => $request->get('number'),
        ]);

        return redirect()->route('aca_mycourses')
            ->with('updateMessageStudent', __('Informacion del estudiante actualizado con éxito'));
    }

    public function createdOrUpdated(Request $request)
    {
        $person_id = $request->get('id');
        $user = Auth::user();

        $this->validate(

            $request,
            [
                'document_type_id'  => 'required',
                'number'            => 'required|max:12',
                'number'            => 'unique:people,number,' . $person_id . ',id,document_type_id,' . $request->get('document_type_id'),
                'telephone'         => 'required|max:12',
                'email'             => 'required|max:255',
                'email'             => 'unique:people,email,' . $person_id . ',id',
                'email'             => 'unique:users,email,' . $user->id . ',id',
                'address'           => 'required|max:255',
                'ubigeo'            => 'required|max:255',
                'birthdate'         => 'required|',
                'names'             => 'required|max:255',
                'father_lastname'   => 'required|max:255',
                'mother_lastname'   => 'required|max:255',
            ]
        );

        if ($person_id) {
            Person::find($person_id)->update([
                'document_type_id' => $request->get('document_type_id'),
                'number' => trim($request->input('number')),
                'short_name' => trim($request->input('names')),
                'full_name' => trim($request->get('father_lastname') . ' ' .  $request->get('mother_lastname') . ' ' . $request->get('names')),
                'description' => trim($request->input('description')),
                'telephone' => $request->input('telephone'),
                'email' => trim($request->input('email')),
                'address' => trim($request->input('address')),
                'ubigeo' => $request->input('ubigeo')['district_id'],
                'birthdate' => $request->input('birthdate'),
                'names' => trim($request->input('names')),
                'father_lastname' => trim($request->input('father_lastname')),
                'mother_lastname' => trim($request->input('mother_lastname')),
                'ocupacion' => $request->input('ocupacion'),
                'presentacion' => $request->input('presentacion'),
                'gender' => $request->input('gender'),
                'is_provider'           => false,
                'is_client'             => true,
                'status' => true,
                'social_networks' => json_encode($request->input('social_networks')),
                'ubigeo_description' => $request->input('ubigeo')['name_city']
            ]);

            User::find(Auth::id())->update([
                'email' => trim($request->input('email')),
                'name' => trim($request->input('names')),
                'updated_information' => true
            ]);
        } else {
            $person = Person::updateOrCreate(
                [
                    'document_type_id' => $request->get('document_type_id'),
                    'number' => $request->input('number')
                ], // Buscamos a la persona
                [
                    'short_name' => $request->input('names'),
                    'full_name' => trim($request->get('father_lastname') . ' ' .  $request->get('mother_lastname') . ' ' . $request->get('names')),
                    'description' => $request->input('description'),
                    'telephone' => $request->input('telephone'),
                    'email' => trim($request->input('email')),
                    'address' => trim($request->input('address')),
                    'ubigeo' => $request->input('ubigeo')['district_id'],
                    'birthdate' => $request->input('birthdate'),
                    'names' => trim($request->input('names')),
                    'father_lastname' => trim($request->input('father_lastname')),
                    'mother_lastname' => trim($request->input('mother_lastname')),
                    'ocupacion' => $request->input('ocupacion'),
                    'presentacion' => $request->input('presentacion'),
                    'gender' => $request->input('gender'),
                    'status' => true,
                    'social_networks' => json_encode($request->input('social_networks')),
                    'ubigeo_description' => $request->input('ubigeo')['name_city']
                ]
            );

            User::find(Auth::id())->update([
                'person_id' => $person->id,
                'updated_information' => true
            ]);
        }
        return redirect()->route('dashboard');
    }


    public function consultApisNet($dni)
    {
        $token = $this->P000012;
        $numero = $dni;
        $client = new Client(['base_uri' => 'https://api.apis.net.pe', 'verify' => false]);
        $parameters = [
            'http_errors' => true,
            'connect_timeout' => 5,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Referer' => 'https://apis.net.pe/api-consulta-dni',
                'User-Agent' => 'laravel/guzzle',
                'Accept' => 'application/json',
            ],
            'query' => ['numero' => $numero]
        ];
        $res = $client->request('GET', '/v2/reniec/dni', $parameters);

        if ($res->getStatusCode() == 200) {
            $response = json_decode($res->getBody()->getContents(), true);
            // Resto del código
        } else {
            // Manejo de error en caso de que la solicitud no sea exitosa
        }

        return view('DniConsulta', ['dni' => $response]);
    }

    public function getBirthdays()
    {
        $startDate = Carbon::now()->subDays(2)->format('m-d'); // Hace 2 días (MM-DD)
        $endDate = Carbon::now()->addWeek()->format('m-d'); // Próxima semana (MM-DD)

        $persons = Person::whereRaw("DATE_FORMAT(birthdate, '%m-%d') BETWEEN ? AND ?", [$startDate, $endDate])
            ->orderByRaw("DATE_FORMAT(birthdate, '%m-%d')")
            ->get()
            ->map(function ($person) {
                $birthdate = Carbon::parse($person->birthdate);
                $currentYear = Carbon::now()->year;
                $today = Carbon::now()->format('m-d');
                $birthdayThisYear = Carbon::createFromDate($currentYear, $birthdate->month, $birthdate->day)->format('m-d');

                // Determinar el estado (status)
                if ($birthdayThisYear < $today) {
                    $status = 'pasado';
                } elseif ($birthdayThisYear > $today) {
                    $status = 'proximo';
                } else {
                    $status = 'hoy';
                }

                $day = Carbon::createFromDate($currentYear, $birthdate->month, $birthdate->day)->format('Y-m-d');

                return [
                    'image' => $person->image,
                    'name' => $person->full_name,
                    'birthdate' => Carbon::parse($day)->translatedFormat('d \d\e F'),
                    'age' => $currentYear - $birthdate->year,
                    'status' => $status,
                    'id' => $person->id,
                    'email' => $person->email,
                    'telephone' => $person->telephone
                ];
            });

        return $persons;
    }

    public function updateInfoPersonByUser(Request $request){

        $person_id = $request->get('id');
        $user = User::find($request->get('user_id'));
        //dd($request->all());
        $this->validate(
            $request,
            [
                'document_type'     => 'required',
                'number'            => 'required|max:12',
                'number'            => 'unique:people,number,' . $person_id . ',id,document_type_id,' . $request->get('document_type'),
                'telephone'         => 'required|max:12',
                'email'             => 'required|max:255',
                'email'             => 'unique:people,email,' . $person_id . ',id',
                'email'             => 'unique:users,email,' . $user->id . ',id',
                'address'           => 'required|max:255',
                'ubigeo'            => 'required|max:255',
                'birthdate'         => 'required',
                'names'             => 'required|max:255',
                'father_lastname'   => 'required|max:255',
                'mother_lastname'   => 'required|max:255',
                'id' => [
                    'nullable', // ¡Ahora es opcional! Si no se envía, la regla no verifica unicidad de usuario.
                    'numeric', // Asegura que si se envía, sea un número válido.
                    new ValidationPersonUser(), // Tu regla personalizada
                ],
            ]
        );

        $person = Person::find($person_id);

        $user->name = $request->get('names');
        $user->email = $request->get('email');

        if($person){
            $person->document_type_id = $request->get('document_type');
            $person->number = $request->get('number');
            $person->telephone = $request->get('telephone');
            $person->email = $request->get('email');
            $person->address = $request->get('address');
            $person->ubigeo = $request->get('ubigeo');
            $person->birthdate = $request->get('birthdate');
            $person->names = $request->get('names');
            $person->father_lastname = $request->get('father_lastname');
            $person->mother_lastname = $request->get('mother_lastname');
            $person->ubigeo_description = $request->get('document_type');
            $person->gender = $request->get('gender');

            $person->save();
        }else{
            $newPerson = Person::create([
                'document_type_id' => $request->get('document_type_id'),
                'number' => $request->get('number'),
                'telephone' => $request->get('telephone'),
                'email' => $request->get('email'),
                'address' => $request->get('address'),
                'ubigeo' => $request->get('ubigeo'),
                'birthdate' => $request->get('birthdate'),
                'names' => $request->get('names'),
                'father_lastname' => $request->get('father_lastname'),
                'mother_lastname' => $request->get('mother_lastname'),
                'ubigeo_description' => $request->get('ubigeo_description'),
                'gender' => $request->get('gender'),
            ]);

            $user->person_id = $newPerson->id;
        }
        $user->save();
    }
}
