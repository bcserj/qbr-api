<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ["title", "timezone_id"];

    /**
     * @return BelongsTo
     */
    public function timezone(): BelongsTo
    {
        return $this->belongsTo(Timezone::class);
    }

    public function storages(): HasMany
    {
        return $this->hasMany(FreezerStorage::class);
    }


    /**
     * @return HasManyThrough
     */
    public function blocks(): HasManyThrough
    {
        return $this->hasManyThrough(
            FreezerBlock::class,
            FreezerStorage::class
        );
    }
}
