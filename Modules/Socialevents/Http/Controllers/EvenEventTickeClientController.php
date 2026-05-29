<?php

namespace Modules\Socialevents\Http\Controllers;

use App\Mail\ConfirmTicketEventMailable;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Socialevents\Entities\EvenEvent;
use Modules\Socialevents\Entities\EvenEventTicketClient;
use Modules\Socialevents\Entities\EvenEventTicketPrice;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class EvenEventTickeClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = (new EvenEventTicketClient())->newQuery();

        if (request()->filled('search')) {
            $search = request()->input('search');

            $tickets->where(function ($query) use ($search) {
                $query->where('full_name', 'Like', '%' . $search . '%')
                    ->orWhereHas('event', function ($eventQuery) use ($search) {
                        $eventQuery->where('title', 'Like', '%' . $search . '%');
                    });
            });
        }

        if (request()->boolean('approved_only')) {
            $tickets->where('status', true);
        }

        $tickets->with(['event', 'type']);
        $ticketsExport = (clone $tickets)->get();
        $tickets = $tickets->paginate(10)->withQueryString();

        return Inertia::render('Socialevents::Ticket/List', [
            'tickets' => $tickets,
            'ticketsExport' => $ticketsExport,
            'filters' => request()->only('search', 'approved_only')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('socialevents::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'event_id' => 'required',
            'tipo' => 'required',
            'full_name' => 'required',
            'identification_number' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'lugar' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('web_eventos')
                ->withErrors($validator)
                ->withInput();
        }

        $price= EvenEventTicketPrice::find($request->get('tipo'))->price;
        $quantity = $request->get('quantity');

        $pay = EvenEventTicketClient::create([
            'user_id' => Auth::id(),
            'event_id'  => $request->get('event_id'),
            'ticket_price_id' => $request->get('tipo'),
            'full_name' => $request->get('full_name'),
            'identification_number' => $request->get('identification_number'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'ubigeo' => null,
            'name_city' => $request->get('lugar'),
            'status' => false,
            'quantity' => $request->get('quantity'),
            'price' => $price,
            'total' => $price * $quantity,
        ]);


        $id = $pay->id;
        return to_route('web_eventos_pagar', ['id' => $id]);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('socialevents::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('socialevents::edit');
    }

    public function sendConfirmationEmail($id)
    {
        $ticket = EvenEventTicketClient::with(['event', 'type'])->findOrFail($id);

        if (!$ticket->email) {
            return response()->json([
                'success' => false,
                'message' => 'El ticket no tiene un correo registrado.',
            ], 422);
        }

        Mail::to($ticket->email)->send(new ConfirmTicketEventMailable($ticket));

        return response()->json([
            'success' => true,
            'message' => 'Correo enviado correctamente.',
        ]);
    }

    public function sendTestConfirmationEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $ticket = new EvenEventTicketClient();
        $ticket->forceFill([
            'id' => 0,
            'full_name' => 'Usuario de prueba',
            'identification_number' => '00000000',
            'phone' => '999999999',
            'email' => $request->input('email'),
            'name_city' => 'Lima',
            'quantity' => 2,
            'status' => true,
            'price' => 50,
            'total' => 100,
            'response_status' => 'approved',
            'response_id' => 'TEST-' . now()->format('YmdHis'),
            'response_date_approved' => now()->format('Y-m-d'),
            'response_payment_method_id' => 'visa',
        ]);

        $ticket->setRelation('event', new EvenEvent([
            'title' => 'Evento de prueba',
        ]));
        $ticket->setRelation('type', new EvenEventTicketPrice([
            'type_id' => 'Entrada general',
            'price' => 50,
        ]));

        Mail::to($request->input('email'))->send(new ConfirmTicketEventMailable($ticket));

        return response()->json([
            'success' => true,
            'message' => 'Correo de prueba enviado correctamente.',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
