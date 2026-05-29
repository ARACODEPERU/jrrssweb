<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion de compra</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333333;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 680px;
            margin: 0 auto;
            padding: 24px;
            background-color: #ffffff;
        }

        .header {
            padding: 18px 0;
            text-align: center;
            border-bottom: 1px solid #eeeeee;
        }

        .title {
            margin: 0;
            color: #1f2937;
            font-size: 24px;
        }

        .content {
            padding: 24px 0;
            line-height: 1.6;
            font-size: 15px;
        }

        .summary {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        .summary th,
        .summary td {
            padding: 10px 12px;
            border: 1px solid #e5e7eb;
            text-align: left;
        }

        .summary th {
            width: 38%;
            background-color: #f9fafb;
            color: #374151;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            background-color: #dcfce7;
            color: #166534;
            font-weight: 700;
        }

        .footer {
            padding-top: 18px;
            border-top: 1px solid #eeeeee;
            color: #6b7280;
            font-size: 13px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 class="title">Gracias por comprar tu entrada</h1>
        </div>

        <div class="content">
            <p>Hola {{ $ticket->full_name }},</p>

            <p>
                Hemos confirmado tu pago exitoso para el evento
                <strong>{{ $ticket->event?->title ?? 'Evento no disponible' }}</strong>.
                Gracias por adquirir tu entrada con nosotros.
            </p>

            <table class="summary">
                <tr>
                    <th>Estado del pago</th>
                    <td><span class="status">Aprobado</span></td>
                </tr>
                <tr>
                    <th>Evento</th>
                    <td>{{ $ticket->event?->title ?? 'Evento no disponible' }}</td>
                </tr>
                <tr>
                    <th>Tipo de ticket</th>
                    <td>{{ $ticket->type?->type_id ?? 'Sin tipo' }}</td>
                </tr>
                <tr>
                    <th>Cantidad</th>
                    <td>{{ $ticket->quantity }}</td>
                </tr>
                <tr>
                    <th>Precio unitario</th>
                    <td>S/. {{ number_format((float) ($ticket->price ?? $ticket->type?->price ?? 0), 2) }}</td>
                </tr>
                <tr>
                    <th>Total pagado</th>
                    <td>S/. {{ number_format((float) $ticket->total, 2) }}</td>
                </tr>
                <tr>
                    <th>Fecha de pago</th>
                    <td>{{ $ticket->response_date_approved ?? now()->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <th>Codigo de operacion</th>
                    <td>{{ $ticket->response_id ?? '-' }}</td>
                </tr>
            </table>

            <p>
                Conserva este correo como constancia de tu compra.
                Te esperamos en el evento.
            </p>
        </div>

        <div class="footer">
            {{ env('APP_NAME') }}
        </div>
    </div>
</body>

</html>
