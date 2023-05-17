<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Restaurant extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'description', 'image'];

    public function tables()
    {
        return $this->belongsToMany(Table::class, 'restaurant_table');
    }
    
}
