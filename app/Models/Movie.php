<?php

namespace App\Models;

use App\Helpers\Traits\FileUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory, FileUpload;

    protected $fillable = ['country_id', 'title', 'overview', 'original_language', 'tagline', 'runtime', 'release_date', 'image'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function setImageAttribute($value)
    {
        $attribute_name = 'image';
        $disk = 'public';
        $path = 'images/movies';
        $this->uploadFileToDisk($value, $attribute_name, $disk, $path);
    }

}
