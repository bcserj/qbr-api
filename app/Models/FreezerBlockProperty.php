<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreezerBlockProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        "length",
        "width",
        "height",
        "cost_per_day"
    ];


}
