<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $fillable = [

       'name'
    ];

    use HasFactory;

    public function car()
    {
        return $this->blongsTo(Car::class);
    }

}
