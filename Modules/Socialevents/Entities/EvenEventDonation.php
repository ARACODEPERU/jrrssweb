<?php

namespace Modules\Socialevents\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EvenEventDonation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'monto',
        'tipo_donacion',
        'status',
        'response_status',
        'response_id',
        'response_date_approved',
        'response_payer',
        'response_payment_method_id',
        'origen_pago',
        'tipo_moneda',
        'comision',
        'comision_fija',
    ];
}
