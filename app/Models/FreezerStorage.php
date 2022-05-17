<?php

namespace App\Models;

use Database\Factories\FreezerStorageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FreezerStorage extends Model
{
    use HasFactory;

    protected $fillable = ["temperature", "location_id"];

    protected function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    protected static function newFactory(): FreezerStorageFactory
    {
        return FreezerStorageFactory::new();
    }


}
