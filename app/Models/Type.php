<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [

       'name'
    ];

    use HasFactory;

    public function car()
    {
        return $this->hasMany(Car::class);
    }

}
