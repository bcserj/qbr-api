<?php

namespace App\Models;

use Database\Factories\FreezerBlockFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    public function properties(){
        return $this->belongsTo(FreezerBlockProperty::class, 'freezer_block_property_id');
    }

    public function storage(){
        return $this->belongsTo(FreezerStorage::class, 'freezer_storage_id');
    }

    /**
     * @return FreezerBlockFactory
     */
    protected static function newFactory(): FreezerBlockFactory
    {
        return FreezerBlockFactory::new();
    }
}
