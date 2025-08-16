<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\KenthaController;
use App\Http\Controllers\CapperuController;
use App\Http\Controllers\KardexController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LocalSaleController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\ParametersController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\PaypalController;
use App\Mail\StudentRegistrationMailable;
use App\Models\District;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Modules\Blog\Http\Controllers\BlogController;
use Modules\Socialevents\Http\Controllers\EvenEventTickeClientController;

Route::get('/test-image/{content}/{fecha?}', [WebController::class, 'testimage'])->name('test-image');

Route::get('landing', [LandingController::class, 'index'])->name('index_main');
Route::get('/', [WebController::class, 'index'])->name('cms_principal');
Route::get('/quienes-somos', [WebController::class, 'quienessomos'])->name('web_quienes_somos');
Route::get('/predicas', [WebController::class, 'predicas'])->name('web_predicas');

// SEDES
Route::get('/sedes', [WebController::class, 'sedes'])->name('web_sedes');
Route::get('/sedes-peru', [WebController::class, 'sedesperu'])->name('web_sedes_peru');
Route::get('/sedes-estados-unidos', [WebController::class, 'sedesestadosunidos'])->name('web_sedes_estados_unidos');
Route::get('/sedes-españa', [WebController::class, 'sedesespaña'])->name('web_sedes_españa');

// COBERTURAS
Route::get('/coberturas', [WebController::class, 'coberturas'])->name('web_coberturas');
Route::get('/coberturas-peru', [WebController::class, 'coberturasperu'])->name('web_coberturas_peru');

Route::get('/tmc', [WebController::class, 'eventos'])->name('web_eventos');
Route::get('/eventos-pagar/{id}/evento', [WebController::class, 'eventospagar'])->name('web_eventos_pagar');
Route::get('/comprar-entrada/{id}', [WebController::class, 'entrada'])->name('web_comprar_entrada');
Route::put('/comprar-entrada/procesar/{id}', [WebController::class, 'processPayment'])->name('web_process_payment');
Route::get('/benefactora', [WebController::class, 'benefactora'])->name('web_benefactora');
Route::get('/el-cielo-en-la-tierra', [WebController::class, 'ecelt'])->name('web_ecelt');
Route::get('/revolucion-juvenil', [WebController::class, 'revolucionjuvenil'])->name('web_revolucion_juvenil');
Route::get('/kids', [WebController::class, 'kids'])->name('web_kids');


// ISM
Route::get('/ism-proceso-de-miembro', [WebController::class, 'promiembro'])->name('web_proceso_miembro');
Route::get('/ism-proceso-del-discipulo', [WebController::class, 'prodiscipulo'])->name('web_proceso_discipulo');
Route::get('/ism-proceso-de-lideres', [WebController::class, 'prolideres'])->name('web_proceso_lideres');
Route::get('/instituto-sobrenatural-al-mundo', [WebController::class, 'ism'])->name('web_ism');


Route::get('/oracion', [WebController::class, 'oracion'])->name('web_oracion');
Route::get('/empleo', [WebController::class, 'empleo'])->name('web_empleo');

// BENEFACTORAS
Route::get('/5-panes-y-2-peces', [WebController::class, 'panes'])->name('web_panes_y_peces');
Route::get('/el-buen-samaritano', [WebController::class, 'samaritano'])->name('web_el_buen_samaritano');
Route::get('/sembrando-sonrisas', [WebController::class, 'sembrando'])->name('web_sembrando_sonrisas');

Route::get('/testimonios', [WebController::class, 'testimonios'])->name('web_testimonios');
Route::get('/contacto', [WebController::class, 'contacto'])->name('web_contacto');
Route::get('/donar', [WebController::class, 'donar'])->name('web_donar');
Route::get('/gracias-por-comprar-tu-entrada/{id}', [WebController::class, 'graciasporcomprartuentrada'])->name('web_gracias_por_comprar_tu_entrada');
Route::get('/gracias-por-donar/{donador}', [WebController::class, 'gracias_por_donar'])->name('web_gracias_por_donar');
Route::post('/donar/tarjeta', [WebController::class, 'donarTarjeta'])->name('web_donar_tarjeta');
Route::put('/donar-pagar/procesar', [WebController::class, 'processDonacion'])->name('web_process_donacion');

Route::get('/gracias/{id}/pagado', [WebController::class, 'gracias'])->name('web_gracias');

// eventos
Route::post('/eventos/registrar/store', [EvenEventTickeClientController::class, 'store'])->name('web_eventos_registrarse');
Route::get('/emailprueba', [WebController::class, 'email'])->name('web_email');
Route::resource('modulos', ModuloController::class);
    Route::get('modulos/permissions/{id}/add', [ModuloController::class, 'permissions'])->name('modulos_permissions');
    Route::post('modulos/permissions/store', [ModuloController::class, 'storePermissions'])->name('modulos_permissions_store');
/* PayPal */
Route::post('/paypal/donate', [PaypalController::class, 'payment'])->name('paypal_donate');
Route::get('/paypal/success/{donationId}', [PaypalController::class, 'success'])->name('paypal_success');
Route::get('/paypal/cancel/{donationId}', [PaypalController::class, 'cancel'])->name('paypal_cancel');


Route::get('/event/ubigeo', [WebController::class, 'getUbigeo'])->name('web_getubigeo');


Route::get('/blog/home', [BlogController::class, 'index'])->name('blog_principal');
Route::get('/article/{url}', [BlogController::class, 'article'])->name('blog_article_by_url');
Route::get('/category/{id}', [BlogController::class, 'category'])->name('blog_category');
Route::get('/policies', [BlogController::class, 'policies'])->name('blog_policies');
Route::get('/contact-us', [BlogController::class, 'contactUs'])->name('blog_contact_us');

Route::get('/stories/article/{url}', [BlogController::class, 'storiesArticle'])->name('blog_stories_article_by_url');
Route::get('/stories/policies', [BlogController::class, 'storiesPolicies'])->name('blog_stories_policies');
Route::get('/stories/contact-us', [BlogController::class, 'storiesContactUs'])->name('blog_stories_contact_us');


Route::get('/mipais', function () {
    $ip = $_SERVER['REMOTE_ADDR']; // Esto contendrá la ip de la solicitud.

    // Puedes usar un método más sofisticado para recuperar el contenido de una página web con PHP usando una biblioteca o algo así
    // Vamos a recuperar los datos rápidamente con file_get_contents
    $dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));

    //var_dump($dataArray);

    dd($dataArray);
});

Route::get('/email', function () {
    Mail::to('elrodriguez2423@gmail.com')
        ->send(new StudentRegistrationMailable('data'));
    return 'mensaje enviado';
});

Route::get('/aracode', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('clients', ClientController::class);
    Route::resource('users', UserController::class);
    Route::resource('establishments', LocalSaleController::class);

    Route::delete('establishments/destroies/{id}', [LocalSaleController::class, 'destroy'])->name('establishment_destroies');
    Route::post('establishments/updated', [LocalSaleController::class, 'update'])->name('establishment_updated');

    Route::get(
        'inventory/product/establishment',
        [KardexController::class, 'index']
    )->name('kardex_index');

    Route::post(
        'inventory/product/sizes',
        [KardexController::class, 'kardexDeailsSises']
    )->name('kardex_sizes');

    Route::post(
        'search/person/number',
        [PersonController::class, 'searchByNumberType']
    )->name('search_person_number');

    Route::post(
        'save/person/update/create',
        [PersonController::class, 'saveUpdateOrCreate']
    )->name('save_person_update_create');

    Route::post(
        'search/person/full_name/number',
        [PersonController::class, 'searchByNameOrNumber']
    )->name('search_person_fullname_number');

    Route::get(
        'general/stock',
        [KardexController::class, 'generalStock']
    )->name('generalstock');

    Route::get('parameters/list', [ParametersController::class, 'index'])->name('parameters');
    Route::get('parameters/create', [ParametersController::class, 'create'])->name('parameters_create');
    Route::post('parameters/store', [ParametersController::class, 'store'])->name('parameters_store');
    Route::get('parameters/{id}/edit', [ParametersController::class, 'edit'])->name('parameters_edit');
    Route::put('parameters/update/{id}', [ParametersController::class, 'update'])->name('parameters_update');
    Route::get('parameters/{id}/{val}/default', [ParametersController::class, 'updateDefaultValue'])->name('parameters_update_default_value');

    Route::get(
        'company/show',
        [CompanyController::class, 'show']
    )->name('company_show');

    Route::post(
        'company/update_create',
        [CompanyController::class, 'updateCreate']
    )->name('company_update_create');

    Route::get(
        'company/getdata',
        [CompanyController::class, 'getdata']
    )->middleware(['auth', 'verified'])->name('datosempresa');

    Route::get('parameters/list', [ParametersController::class, 'index'])->name('parameters');
    Route::get('parameters/create', [ParametersController::class, 'create'])->name('parameters_create');
    Route::post('parameters/store', [ParametersController::class, 'store'])->name('parameters_store');

    ////////////////actualizar informacion de personas
    Route::get('person/update_information', function () {
        $person = Person::find(Auth::user()->person_id);
        $identityDocumentTypes = DB::table('identity_document_type')->get();

        $ubigeo = District::join('provinces', 'province_id', 'provinces.id')
            ->join('departments', 'provinces.department_id', 'departments.id')
            ->select(
                'districts.id AS district_id',
                'districts.name AS district_name',
                'provinces.name AS province_name',
                'departments.name AS department_name'
            )
            ->get();

        if (Auth::user()->hasRole('Alumno')) {
            return Inertia::render('Person/UpdateInformation', [
                'person' => $person,
                'identityDocumentTypes' => $identityDocumentTypes,
                'ubigeo' => $ubigeo
            ]);
        } else {
            return back();
        }
    })->name('user-update-profile');

    Route::post(
        'person/update_information/store',
        [PersonController::class, 'updateInformationPerson']
    )->name('user-update-profile-store');

    Route::post(
        'person/birthdays',
        [PersonController::class, 'getBirthdays']
    )->name('person-birthdays');

    Route::get('calendar/index', [CalendarController::class, 'index'])->name('calendar');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/system.php';
