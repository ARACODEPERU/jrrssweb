<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global CPA - Business School</title>

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1 i {
            margin-right: 10px;
        }

        p{
            line-height: 22px;
            text-align: justify;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            flex: 1 1 calc(33% - 40px); /* Tres tarjetas por fila en pantallas grandes */
            box-sizing: border-box;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h4 {
            margin-top: 0;
            color: #333;
        }
        .card p {
            color: #555;
        }
        .card button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .card button:hover {
            background-color: #0056b3;
        }


        .boton-degradado-campus {
            width: 100%;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(45deg, #3c4a99, #4f46e5);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s, background 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .boton-degradado-campus:hover {
            transform: translateY(-3px);
            background: linear-gradient(45deg, #4f46e5, #3c4a99);
        }


        @media (max-width: 768px) {
            .card {
                flex: 1 1 calc(50% - 40px); /* Dos tarjetas por fila en pantallas medianas */
            }
        }
        @media (max-width: 480px) {
            .card {
                flex: 1 1 100%; /* Una tarjeta por fila en pantallas pequeñas */
            }
        }

        .btn {
            border: none;
            color: white;
            padding: 14px 28px;
            cursor: pointer;
            border-radius: 5px;
        }

        .primary {
            background-color: #ff8607;
        }

        .primary:hover {
            background: #010101;
        }

        footer {
            padding: 2px 15px;
            text-align: center;
            background: #000;
            color: #a5a4a4;
        }

        footer a {
            text-decoration: none;
            color: yellow;
        }

        footer a:hover {
            text-decoration: none;
            color: orange;
        }

    </style>
</head>

<body>

    <br>


    <div class="container">
        <img style="width: 100%;" src="{{ asset('img/banner-email.jpg') }}" alt="Encabezado">
        <br>
        <h1>
            <img style="width: 25px;" data-emoji="🎉" class="an1" alt="🎉" aria-label="🎉" draggable="false"
                src="https://fonts.gstatic.com/s/e/notoemoji/16.0/1f389/32.png" loading="lazy">
                &nbsp; GRACIAS POR COMPRAR TU ENTRADA &nbsp;
            <img style="width: 25px;" data-emoji="🎉" class="an1" alt="🎉" aria-label="🎉" draggable="false"
                src="https://fonts.gstatic.com/s/e/notoemoji/16.0/1f389/32.png" loading="lazy">
        </h1>
        <br>
        <p>
            Estimado(a): <br>
            <b style="font-size: 20px;">{{ $data->full_name }}</b>
        </p>
        <p>
            Le extendemos nuestro agradecimiento por adquirir su entrada(s)
            al <span style="color: orange"><b>Título del evento</b></span> por el valor de
            <span style="color: orange"><b>S/ 150.00</b></span>, el cual sabemos que va
            hacer de gran  bendición para su vida.
        </p>
        <div class="card-container">
            <img style="width: 100%;" src="{{ asset('img/ticket.jpg') }}" alt="">
        </div>
        <br>
        <p>
            Puede cordinar la entrega de su entrada fisica mediante el siguiente número de teléfono: (+51) 977627207
        </p>
        <p>
            <b>Atentamente,</b><br>
            Equipo de JESÚS REY DE REYES Y SEÑOR DE SEÑORES
        </p>
        <br>
        <p style="text-align: center; font-size: 14px;">
            JESÚS REY DE REYES Y SEÑOR DE SEÑORES, Av Saenz Peña 876, Callao, Perú, +51 977627207
        </p>
        <footer>
            <p style="text-align: center; font-size: 15px;">
                &copy; copyright <b style="color: #fff;">{{ env('APP_NAME') }}</b> | Desarrollado por <a href="https://aracodeperu.com/"
                    style="">Aracode Smart Solutions</a>
            </p>
        </footer>
    </div>

    {{-- <section style="padding: 15px;">
        <div class="contenedor">
            @foreach ($data->details as $product)
                <div class="card-list" style="padding: 15px;">
                    <article class="card">
                        <figure class="card-image">
                            <img src="{{ $product->item->image }}" alt="{{ $product->item->name }}" />
                        </figure>
                        <div class="card-header">
                            <h4>{{ $product->item->category_description }} {{ $product->item->name }}</h4>
                            <p style="color: #ff8607; font-size: 20px; font-weight: 700;">
                                S/. {{ $product->item->price }}
                            </p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </section> --}}

    {{-- <section style="padding: 15px;">
        <div class="contenedor">
            <div class="columna" style="text-align: center; padding: 15px; background-color: #F9FAFD;">
                <a href="{{ route('web_inicio') }}" class="btn primary" style="font-size: 18px;">Visitar Sitio Web</a>
            </div>
        </div>
    </section> --}}
</body>

</html>
