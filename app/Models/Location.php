<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ["title", "timezone_id"];

    /**
     * @return BelongsTo
     */
    protected function timezone(): BelongsTo
    {
        return $this->belongsTo(Timezone::class);
    }

    protected function freezerStorages(): HasMany
    {
        return $this->hasMany(FreezerStorage::class);
    }
}
