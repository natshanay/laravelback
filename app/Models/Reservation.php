<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{

    use HasFactory;
    protected $fillable = [
        'car_id',
        'amount',
        'customer_id',
        'payment_id',
        'start_date',
        'end_date',
        'status'
    ];


    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }


}




