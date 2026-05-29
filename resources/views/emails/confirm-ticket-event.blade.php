@php
    $event = $ticket->event;
    $type = $ticket->type;
    $eventTitle = $event?->title ?? 'Evento no disponible';
    $ticketType = $type?->type_id ?? 'Entrada general';
    $unitPrice = (float) ($ticket->price ?? $type?->price ?? 0);
    $totalPaid = (float) ($ticket->total ?? ($unitPrice * (int) ($ticket->quantity ?? 0)));
    $paymentDate = $ticket->response_date_approved ?? now()->format('Y-m-d');
    $operationCode = $ticket->response_id ?? '-';
    $eventDate = 'Fecha por confirmar';
    $eventPlace = 'Lugar por confirmar';
    $eventLocal = $event?->locales?->first()?->local;

    if (!empty($event?->date_start) && !empty($event?->date_end) && $event->date_start !== $event->date_end) {
        $eventDate = \Carbon\Carbon::parse($event->date_start)->translatedFormat('d') . ' y ' . \Carbon\Carbon::parse($event->date_end)->translatedFormat('d \\d\\e F, Y');
    } elseif (!empty($event?->date_start)) {
        $eventDate = \Carbon\Carbon::parse($event->date_start)->translatedFormat('d \\d\\e F, Y');
    }

    if (!empty($eventLocal?->names)) {
        $eventPlace = $eventLocal->names;
    } elseif (!empty($ticket->name_city)) {
        $eventPlace = $ticket->name_city;
    }
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmaci&oacute;n de compra</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f2eef8;
            color: #151326;
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
        }

        img {
            border: 0;
            display: block;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        .wrapper {
            width: 100%;
            background-color: #f2eef8;
            padding: 24px 0;
        }

        .container {
            width: 100%;
            max-width: 720px;
            overflow: hidden;
            background-color: #ffffff;
            border-radius: 18px;
            box-shadow: 0 18px 42px rgba(46, 19, 91, 0.16);
        }

        .content {
            padding: 34px 54px 0;
        }

        .heading {
            color: #33205f;
            font-size: 31px;
            font-weight: 800;
            line-height: 1.15;
            margin: 0;
        }

        .muted {
            color: #727182;
        }

        .purple {
            color: #6e2cb4;
        }

        .divider {
            border-top: 1px solid #d8d3df;
            font-size: 1px;
            line-height: 1px;
        }

        .status {
            background: #d9f5df;
            border-radius: 999px;
            color: #13733a;
            display: inline-block;
            font-size: 18px;
            font-weight: 800;
            padding: 11px 22px;
        }

        .summary {
            width: 100%;
            border: 1px solid #ded8e8;
            border-radius: 9px;
            overflow: hidden;
        }

        .summary td {
            border-bottom: 1px solid #ded8e8;
            color: #151326;
            font-size: 16px;
            line-height: 1.35;
            padding: 17px 22px;
            vertical-align: middle;
        }

        .summary tr:last-child td {
            border-bottom: 0;
        }

        .summary .label {
            background-color: #fbf9ff;
            border-right: 1px solid #ded8e8;
            color: #151326;
            font-weight: 800;
            width: 41%;
        }

        .summary .icon {
            color: #6e2cb4;
            display: inline-block;
            font-size: 20px;
            font-weight: 800;
            width: 32px;
        }

        .feature-card {
            background-color: #f7f1ff;
            border-left: 5px solid #6e2cb4;
            border-radius: 8px;
        }

        .button {
            background-color: #6e2cb4;
            border-radius: 8px;
            color: #ffffff !important;
            display: inline-block;
            font-size: 16px;
            font-weight: 800;
            letter-spacing: 0;
            padding: 16px 34px;
            text-decoration: none;
            text-transform: uppercase;
        }

        .footer {
            background: #f3eef9;
            color: #33205f;
            font-size: 16px;
            line-height: 1.5;
            padding: 22px 30px;
            text-align: center;
        }

        @media only screen and (max-width: 620px) {
            .wrapper {
                padding: 0;
            }

            .container {
                border-radius: 0;
            }

            .content {
                padding: 28px 22px 0 !important;
            }

            .heading {
                font-size: 26px !important;
            }

            .summary td {
                display: block;
                padding: 14px 16px !important;
                width: auto !important;
            }

            .summary .label {
                border-right: 0 !important;
                border-bottom: 1px solid #ded8e8;
            }

            .stack {
                display: block !important;
                width: 100% !important;
            }

            .stack-spacer {
                display: block !important;
                height: 16px !important;
                width: 100% !important;
            }
        }
    </style>
</head>

<body>
    <center class="wrapper">
        <table role="presentation" class="container" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <img src="{{ asset('img/ticket.jpeg') }}" width="720" alt="{{ $eventTitle }}" style="width: 100%; max-width: 720px;">
                </td>
            </tr>
            <tr>
                <td class="content">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="74" valign="top">
                                <div style="width: 58px; height: 58px; border-radius: 50%; background-color: #6e2cb4; color: #ffffff; font-size: 34px; font-weight: 800; line-height: 58px; text-align: center;">&#10003;</div>
                            </td>
                            <td valign="top">
                                <h1 class="heading">&iexcl;Gracias por tu compra!</h1>
                                <div class="muted" style="font-size: 18px; line-height: 1.4; padding-top: 6px;">Tu pago ha sido confirmado exitosamente.</div>
                            </td>
                        </tr>
                    </table>

                    <div class="divider" style="margin: 24px 0 24px;">&nbsp;</div>

                    <p style="font-size: 16px; line-height: 1.7; margin: 0 0 12px;">
                        Hola <strong class="purple">{{ trim(($ticket->full_name ?? '') . ' ' . ($ticket->full_surnames ?? '')) ?: 'Usuario' }}</strong>,
                    </p>

                    <p style="font-size: 16px; line-height: 1.7; margin: 0 0 24px;">
                        Hemos confirmado tu pago exitoso para el evento <strong>{{ $eventTitle }}</strong>.
                        Gracias por adquirir tu entrada con nosotros.
                    </p>

                    <div style="padding: 0 0 22px; text-align: center;">
                        <span class="status"><span style="font-size: 18px;">&#10003;</span>&nbsp;&nbsp;Pago aprobado</span>
                    </div>

                    <table role="presentation" class="summary" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="label"><span class="icon">&#9638;</span>Evento</td>
                            <td>{{ $eventTitle }}</td>
                        </tr>
                        <tr>
                            <td class="label"><span class="icon">&#9672;</span>Tipo de ticket</td>
                            <td>{{ $ticketType }}</td>
                        </tr>
                        <tr>
                            <td class="label"><span class="icon">&#9737;</span>Cantidad</td>
                            <td>{{ $ticket->quantity }}</td>
                        </tr>
                        <tr>
                            <td class="label"><span class="icon">&#9671;</span>Precio unitario</td>
                            <td>S/. {{ number_format($unitPrice, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="label"><span class="icon">&#9635;</span>Total pagado</td>
                            <td style="color: #6e2cb4; font-size: 23px; font-weight: 800;">S/. {{ number_format($totalPaid, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="label"><span class="icon">&#9638;</span>Fecha de pago</td>
                            <td>{{ $paymentDate }}</td>
                        </tr>
                        <tr>
                            <td class="label"><span class="icon">#</span>C&oacute;digo de operaci&oacute;n</td>
                            <td>{{ $operationCode }}</td>
                        </tr>
                    </table>

                    {{-- <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-top: 24px;">
                        <tr>
                            <td class="stack" width="48%" valign="top">
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" class="feature-card">
                                    <tr>
                                        <td width="64" style="color: #6e2cb4; font-size: 32px; font-weight: 800; padding: 22px 0 22px 24px;">&#9638;</td>
                                        <td style="padding: 22px 20px 22px 0;">
                                            <div style="color: #252153; font-size: 13px; font-weight: 800; text-transform: uppercase;">Fecha del evento</div>
                                            <div style="color: #151326; font-size: 18px; font-weight: 800; line-height: 1.35; padding-top: 6px;">{{ $eventDate }}</div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="stack-spacer" width="4%"></td>
                            <td class="stack" width="48%" valign="top">
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" class="feature-card">
                                    <tr>
                                        <td width="64" style="color: #6e2cb4; font-size: 36px; font-weight: 800; padding: 22px 0 22px 24px;">&#9679;</td>
                                        <td style="padding: 22px 20px 22px 0;">
                                            <div style="color: #252153; font-size: 13px; font-weight: 800; text-transform: uppercase;">Lugar</div>
                                            <div style="color: #151326; font-size: 18px; font-weight: 800; line-height: 1.35; padding-top: 6px;">{{ $eventPlace }}</div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table> --}}

                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin: 28px 0 18px;">
                        <tr>
                            <td width="72" valign="top" align="center">
                                <div style="width: 54px; height: 54px; border-radius: 50%; background-color: #eee7f7; color: #6e2cb4; font-size: 28px; line-height: 54px;">&#9993;</div>
                            </td>
                            <td style="color: #151326; font-size: 16px; line-height: 1.6;">
                                Conserva este correo como constancia de tu compra.<br>
                                Te esperamos en el evento.
                            </td>
                        </tr>
                    </table>

                    <div style="padding-bottom: 18px; text-align: center;">
                        <a href="{{ route('web_eventos') }}" class="button">&#9672;&nbsp;&nbsp;Ver detalles del evento</a>
                    </div>

                    {{-- <p class="muted" style="font-size: 14px; line-height: 1.5; margin: 0 0 22px; text-align: center;">
                        &#9826;&nbsp; Presenta tu c&oacute;digo QR al ingresar al evento.
                    </p> --}}
                </td>
            </tr>
            <tr>
                <td class="footer">
                    <div style="color: #6e2cb4; font-size: 24px; line-height: 1;">&#9829;</div>
                    Gracias por ser parte de esta experiencia transformadora.<br>
                    <strong>Somos JRRSS</strong>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
