<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FreezerBlockProperty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "length",
        "width",
        "height",
        "cost_per_day"
    ];


}
