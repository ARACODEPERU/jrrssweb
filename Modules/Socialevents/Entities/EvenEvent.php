<?php

namespace Modules\Socialevents\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Socialevents\Database\factories\EvenEventFactory;

class EvenEvent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'iframe_transmission',
        'image1',
        'image2',
        'image3',
        'image4',
        'advertising_video',
        'date_start',
        'date_end',
        'number_days',
        'tickets_quantity',
        'status',
        'broadcast'
    ];

    protected static function newFactory(): EvenEventFactory
    {
        //return EvenEventFactory::new();
    }

    public function locales(): HasMany
    {
        return $this->hasMany(EvenEventLocal::class, 'event_id');
    }

    public function exhibitors(): HasMany
    {
        return $this->hasMany(EvenEventExhibitor::class, 'event_id');
    }
}
