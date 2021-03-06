<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'movielist_secondary.people';

    protected $fillable = ['name', 'bio', 'birthday', 'deathday', 'place_of_birth', 'gender', 'country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movielist_secondary.movie_people');
    }
}
