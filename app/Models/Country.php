<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $fillable = ['code', 'english_name', 'native_name'];

    public function people()
    {
        return $this->hasMany(People::class);
    }
}
