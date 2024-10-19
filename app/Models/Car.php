<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'model_id',

        'availability',
         'image',

    ];
    public function model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }


    public function images()
    {
        return $this->hasMany(CarImage::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
