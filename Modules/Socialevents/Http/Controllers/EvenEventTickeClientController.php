<?php

namespace Modules\Socialevents\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Socialevents\Entities\EvenEventTicketClient;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Modules\Socialevents\Entities\EvenEventTicketPrice;

class EvenEventTickeClientController extends Controller
{

    public function index()
    {
        $tickets = (new EvenEventTicketClient())->newQuery();
        $tickets = $tickets->join('even_events', 'event_id', 'even_events.id');

        if (request()->has('search')) {
            $tickets->where('full_name', 'Like', '%' . request()->input('search') . '%')
                    ->orWhere('even_events.title', 'Like', '%' . request()->input('search') . '%');
        }
        $tickets = $tickets->with('event');
        $tickets = $tickets->with('type');
        $tickets = $tickets->paginate(10);

        return Inertia::render('Socialevents::Ticket/List', [
            'tickets' => $tickets,
            'filters' => request()->all('search')
        ]);
    }

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
            'full_surnames' => 'required',
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

        $price = EvenEventTicketPrice::where('id', $request->get('tipo'))->value('price');

        $pay = EvenEventTicketClient::create([
            'user_id' => Auth::id(),
            'event_id'  => $request->get('event_id'),
            'ticket_price_id' => $request->get('tipo'),
            'full_name' => $request->get('full_name'),
            'full_surnames' => $request->get('full_surnames'),
            'identification_number' => $request->get('identification_number'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'ubigeo' => null,
            'name_city' => $request->get('lugar'),
            'status' => false,
            'quantity' => $request->get('quantity') ?? 1,
            'price' => $price,
            'total' => (($request->get('quantity') ?? 1) * $price)
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
