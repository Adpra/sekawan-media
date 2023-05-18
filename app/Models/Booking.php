<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vehicle_id',
        'user_id',
        'approved_by',
        'start_date',
        'end_date',
        'status'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }
}
