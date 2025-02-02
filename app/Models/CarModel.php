<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

    ];
    public function cars()
    {
        return $this->hasMany(Car::class, 'model_id');
    }
    // Define any relationships or methods here
}
