<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'title',
        'description',
        'generated_at',
    ];

    // Define relationships if needed
    // For example, if a report has many reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
