<?php

namespace App\Models;

use Database\Factories\FreezerStorageFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FreezerStorage extends Model
{
    use HasFactory;

    protected $fillable = ["temperature", "location_id"];


    /**
     * Scope a query to include storages with temperature $temperature +-2
     *  $temperature value will be replaced to negative.(11  -> -11)
     *
     * @param Builder $query
     * @param int $temperature
     * @return Builder
     */
    public function scopeWithTemperature(Builder $query, int $temperature): Builder
    {
        return $query->whereBetween('temperature', [$temperature - 2, $temperature + 2]);
    }


    protected static function newFactory(): FreezerStorageFactory
    {
        return FreezerStorageFactory::new();
    }

    protected function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
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
     * @return void
     */
    protected function getTemperatureAttribute($value)
    {
        $this->attributes['temperature'] = -1 * abs($value);
    }

}
