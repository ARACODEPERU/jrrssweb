<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationDestinity extends Model
{
    protected $table = 'donation_destinity';

    protected $fillable = [
        'description',
        'name',
    ];
}
