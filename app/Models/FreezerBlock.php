<?php

namespace App\Models;

use Database\Factories\FreezerBlockFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FreezerBlock extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "freezer_storage_id",
        "freezer_block_property_id",
        "available"
    ];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeAvailable(Builder $query)
    {
        return $query->whereNull('book_id');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeUnavailable(Builder $query)
    {
        return $query->whereNotNull('book_id');
    }


    public function properties()
    {
        return $this->belongsTo(FreezerBlockProperty::class, 'freezer_block_property_id');
    }

    public function storage()
    {
        return $this->belongsTo(FreezerStorage::class, 'freezer_storage_id');
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }

    /**
     * @return FreezerBlockFactory
     */
    protected static function newFactory(): FreezerBlockFactory
    {
        return FreezerBlockFactory::new();
    }
}
