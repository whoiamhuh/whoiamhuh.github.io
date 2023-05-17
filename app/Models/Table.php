<?php

namespace App\Models;

use App\Enums\TableStatus;
use App\Enums\TableLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guest_number', 'status', 'location', 'address'];

    protected $casts = [
        'status' => TableStatus::class,
        'location' => TableLocation::class,
        
    ];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class, 'restaurant_table');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
