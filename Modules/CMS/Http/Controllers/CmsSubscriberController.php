<?php

namespace Modules\CMS\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Modules\CMS\Entities\CmsSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionDescarga_brochure;
use Inertia\Inertia;
use Modules\CMS\Entities\CmsSection;

class CmsSubscriberController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('cms::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cms::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function apiStore(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|max:255',
                'full_name' => 'required',
                'phone' => 'required',
            ],
            [
                //'email.unique' => 'El correo electrónico ya existe',
                'email.required' => 'El correo electrónico es obligatorio',
                'email.email' => 'Por favor, ingrese una dirección de correo electrónico válida.',
                'email.max' => 'Limita la longitud máxima del campo de correo electrónico a 255 caracteres',
                'full_name' => 'Agrega tu nombre por favor.',
                'phone' => 'Ponga un numero de teléfono valido por favor.'
            ]
        );

        // Verificar si las validaciones fallaron
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $Subscriber = CmsSubscriber::create([
            'full_name'     => $request->get('full_name') ?? null,
            'email'         => $request->get('email'),
            'phone'         => $request->get('phone') ?? null,
            'client_ip'     => $request->ip(),
            'read'          => 0,
            'subject'       => $request->get('subject') ?? null,
            'message'       => $request->get('message') ?? null,
        ]);

        try {
            //Correo a Ronald
        Mail::to(env("MAIL_ADMIN"))
        ->send(new NotificacionDescarga_brochure($Subscriber));

        } catch (\Throwable $th) {
            //throw $th;
        }

        return response()->json([
            'success' => true,
            'message' => 'Datos registrados con exito'
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|max:255',
                'full_name' => 'required|max:255',
            ],
            [
                'full_name.max' => 'Limita la longitud máxima del campo de nombre a 255 caracteres',
                'email.required' => 'El correo electrónico es obligatorio',
                'email.email' => 'Por favor, ingrese una dirección de correo electrónico válida.',
                'email.max' => 'Limita la longitud máxima del campo de correo electrónico a 255 caracteres',
            ]
        );

        // Verificar si las validaciones fallaron
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        CmsSubscriber::create([
            'full_name'     => $request->get('full_name') ?? null,
            'email'         => $request->get('email'),
            'phone'         => $request->get('phone') ?? null,
            'client_ip'     => $request->ip(),
            'read'          => 0,
            'subject'       => $request->get('subject') ?? null,
            'message'       => $request->get('message') ?? null,
        ]);

        $banner = CmsSection::where('component_id', 'banner_contacto_13')  //siempre cambiar el id del componente
            ->join('cms_section_items', 'section_id', 'cms_sections.id')
            ->join('cms_items', 'cms_section_items.item_id', 'cms_items.id')
            ->select(
                'cms_items.content',
                'cms_section_items.position'
            )
            ->orderBy('cms_section_items.position')
            ->first();

        return view('jrrss.suscrito', [
            'persoNames' => $request->get('full_name'),
            'banner' => $banner
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('cms::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function list_subscribers()
    {
        $subscribers = (new CmsSubscriber())->newQuery();
        $subscribers->orderBy('created_at', 'desc'); // Ordenar por la columna "created_at" de forma descendente

        if (request()->has('search')) {
            $subscribers->where('email', 'like', '%' . request()->input('search') . '%');
        }

        $subscribers = $subscribers->paginate(20)->onEachSide(2)->appends(request()->query());

        return Inertia::render('CMS::Subscribers/List', [
            'subscribers' => $subscribers,
            'filters' => request()->all('search')
        ]);
    }
}
