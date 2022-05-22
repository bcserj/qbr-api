<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Location extends Model
{
    use HasFactory;

    protected $fillable = ["title", "timezone_id"];

    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }

    public function storages()
    {
        return $this->hasMany(FreezerStorage::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function blocks()
    {
        return $this->hasManyThrough(
            FreezerBlock::class,
            FreezerStorage::class
        );
    }
}
