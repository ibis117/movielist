<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['country_id', 'title', 'overview', 'original_language', 'tagline', 'runtime', 'relase_date'];
}
