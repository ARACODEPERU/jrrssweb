<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Modules\Onlineshop\Entities\OnliItem;

use Intervention\Image\Facades\Image;
use Intervention\Image\Font;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Modules\Socialevents\Entities\EvenEvent;

class WebController extends Controller
{
    public function index()
    {
        return view('jrrss/index');
    }

    public function quienessomos()
    {
        return view('jrrss/quienes-somos');
    }

    public function sedes()
    {
        return view('jrrss/sedes');
    }

    public function cobertura()
    {
        return view('jrrss/cobertura');
    }

    public function eventos()
    {
        $event = EvenEvent::with('exhibitors.exhibitor')
            ->with('category')
            ->with('prices.type')
            ->where('status', 'PE')
            ->orderBy('date_start', 'DESC')
            ->first();

        $ubigeo = Department::with('provinces.districts')->get();

        return view('jrrss/eventos', [
            'event' => $event,
            'ubigeo' => $ubigeo
        ]);
    }

    public function getUbigeo()
    {
        $departments = Department::get();
        $ubigeo = [];
        foreach ($departments as $k => $department) {
            $provinces = Province::where('department_id', $department->id)->get();
            $pro = [];
            foreach ($provinces as $province) {
                $districts = District::where('province_id', $province->id)->get();
                $dis = [];
                foreach ($districts as $district) {
                    array_push($dis, [
                        'id' => $district->id,
                        'title' => $district->name,
                    ]);
                }
                array_push($pro, [
                    'id' => $department->id,
                    'title' => $department->name,
                    'subs'  => $dis
                ]);
            }
            array_push($ubigeo, [
                'id' => $department->id,
                'title' => $department->name,
                'subs'  => $pro
            ]);
        }
        return response()->json(['ubigeo' => $ubigeo]);
    }

    public function rmnt()
    {
        return view('jrrss/rmnt');
    }

    public function kids()
    {
        return view('jrrss/kids');
    }

    public function testimonios()
    {
        return view('jrrss/testimonios');
    }

    public function contacto()
    {
        return view('jrrss/contacto');
    }

    public function donar()
    {
        return view('jrrss/donar');
    }

    public function testimage($content, $fecha = null)
    {


        if ($fecha == null) {
            echo "Agrega un Slash '/' y agrega la fecha ejemplo 'test-image/Miguel de Cervantes Saavedra/23-01-2021'";
        } else {
            // create Image from file
            $img = Image::make('https://aprendiendoconsira.com/wp-content/uploads/2022/06/5-2000x1000.png');


            // write text
            //$img->text('The quick brown fox jumps over the lazy dog.');

            // write text at position
            //$img->text('The quick brown fox jumps over the lazy dog.', 120, 100);

            $img->text($content, 1070, 496, function ($font) {
                $font->file('fonts/OLDENGL.TTF');
                $font->size(72);
                $font->color('#0d0603');
                $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });

            $img->text("Entregado el: " . $fecha, 120, 15, function ($font) {
                $font->file('fonts/OLDENGL.TTF');
                $font->size(40);
                $font->color('#0d0603');
                $font->align('left');
                $font->valign('top');
                $font->angle(0);
            });

            $img->text("Pragot Especialistas en Especialización y mejora continua.", 1840, 15, function ($font) {
                $font->file('fonts/OLDENGL.TTF');
                $font->size(40);
                $font->color('#0d0603');
                $font->align('right');
                $font->valign('top');
                $font->angle(0);
            });

            $qr = Image::make('https://borealtech.com/wp-content/uploads/2018/10/codigo-qr-1024x1024-1.jpg');
            $qr->fit(200, 200);
            $img->insert($qr, 'bottom-left', 30, 30);


            // Ejemplo de Redimensionar la imagen manteniendo la proporción para avatares y similares
            // Establecer el ancho máximo y la altura máxima deseados
            $maxWidth = 1550;
            $maxHeight = 1550;
            $img->resize($maxWidth, $maxHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });



            // Obtener el contenido binario de la imagen
            $imageContent = $img->encode('png');


            // Generar la respuesta HTTP con la imagen
            $response = Response::make($imageContent);

            // Establecer el tipo de contenido de la respuesta como imagen PNG
            $response->header('Content-Type', 'image/png');

            // Retornar la respuesta
            return $response;
        }
    }
}
