<?php

namespace App\Models;

use Database\Factories\FreezerStorageFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FreezerStorage extends Model
{
    use HasFactory;

    protected $fillable = ["temperature", "location_id"];


    /**
     * Scope a query to include storages with temperature $temperature +-2
     *  $temperature value will be replaced to negative.(11  -> -11)
     *
     */
    public function scopeWithTemperature( $query, int $temperature)
    {
        $temperature = abs($temperature);
        return $query->whereBetween('temperature', [$temperature - 2, $temperature + 2]);
    }


    protected function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    protected function blocks(): HasMany
    {
        return $this->hasMany(FreezerBlock::class);
    }

    /**
     * DB column has type unsignedTinyInteger. That`s why we need to mutate value
     * @param $value
     * @return void
     */
    protected function setTemperatureAttribute($value)
    {
            $this->attributes['temperature'] = abs($value);
    }

    /**
     * DB column has type unsignedTinyInteger. That`s why we need to mutate value
     *
     * @param $value
     * @return float|int
     */
    protected function getTemperatureAttribute($value)
    {
        return -1 * abs($value);
    }

    protected static function newFactory(): FreezerStorageFactory
    {
        return FreezerStorageFactory::new();
    }
}
