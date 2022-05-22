<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

    const STATUS_BOOKED = 1;
    const STATUS_COMPLETED = 2;
    const STATUS_OVERDUE = 3;

    protected $fillable = [
        'user_id',
        'location_id',
        'days',
        'status',
        'temperature',
        'random_code'
    ];

    protected $hidden = ['status', 'random_code', 'start_booking_date'];

    protected $dates = ['start_booking_date', 'created_at', 'updated_at'];

    public function scopeByUserId($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function blocks()
    {
        return $this->hasMany(FreezerBlock::class);
    }

    public function generateRandomCodeAttribute($length = 12): string
    {
        return \Str::random($length);
    }

    public function getStartBookingDateAttribute($value)
    {
        return Carbon::make($value)->format('d.m.Y');
    }
}
