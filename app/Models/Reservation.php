<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\RestaurantsAddress;
use App\Rules\DateBetween;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
            'last_name',
            'email',
            'tel_number',
            'res_date',
            'address',
            'table_id',
            'guest_number',
    ];

    protected $dates = [
        'res_date',
        
    ];

   

    protected $casts = [
        'address' => RestaurantsAddress::class,
        
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
