<?php

namespace Modules\Socialevents\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Socialevents\Database\factories\EvenEventDonationFactory;

class EvenEventDonation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'nombres',
        'monto',
        'tipo_donacion',
        'response_status',
        'response_id',
        'response_date_approved',
        'response_payer',
        'response_payment_method_id',
        'status'
    ];

    protected static function newFactory(): EvenEventDonationFactory
    {
        //return EvenEventDonationFactory::new();
    }
}
