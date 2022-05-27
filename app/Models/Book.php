<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Book extends Model
{
    use HasFactory, SoftDeletes;

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

    protected $hidden = ['random_code'];

    protected $dates = ['start_booking_date', 'created_at', 'updated_at'];

    // start relations
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function blocks()
    {
        return $this->hasMany(FreezerBlock::class);
    }

    //end relations

    //start scopes
    public function scopeByUserId($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
    //end scopes


    public function getStartBookingDateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y H:m:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y H:m:s');
    }


    public function generateRandomCodeAttribute($length = 12): string
    {
        return \Str::random($length);
    }

}
