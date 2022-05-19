<?php

namespace App\Models;

use Database\Factories\FreezerBlockFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder;

class FreezerBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        "freezer_storage_id",
        "freezer_block_property_id",
        "available"
    ];

    public function scopeAvailable($query)
    {
        return $query->where('available', true);
    }


    public function scopeUnavailable($query)
    {
        return $query->where('available', false);
    }


    /**
     * @return FreezerBlockFactory
     */
    protected static function newFactory(): FreezerBlockFactory
    {
        return FreezerBlockFactory::new();
    }
}
