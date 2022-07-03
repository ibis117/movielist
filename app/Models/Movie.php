<?php

namespace App\Models;

use App\Helpers\Traits\FileUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    use HasFactory, FileUpload;

    protected $connection = 'mysql';

    protected $table = 'movielist_primary.movies';

    protected $fillable = ['country_id', 'title', 'overview', 'original_language', 'tagline', 'runtime', 'release_date', 'image'];

    public function scopeSearch($query, $country_id, $people_id, $search)
    {
        return $query->when($country_id, function ($q) use ($country_id) {
            return $q->where('country_id', $country_id);
        })
            ->when($people_id, function ($q) use ($people_id) {
                return $q->whereHas('people', function ($q) use ($people_id) {
                    return $q->where('people_id', $people_id);
                });
            })
            ->where('title', 'LIKE', '%' . $search . '%');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function people()
    {
        return $this->belongsToMany(People::class, 'movielist_secondary.movie_people');
    }

    public function getPeopleIdsAttribute()
    {
        return $this->people->pluck('people_id');
    }

    public function setImageAttribute($value)
    {
        $attribute_name = 'image';

        if (app()->runningInConsole()) {
            $this->attributes[$attribute_name] = $value;
        } else {
            $disk = 'public';
            $path = 'images/movies';
            $this->uploadFileToDisk($value, $attribute_name, $disk, $path);
        }
    }

    public static function boot()
    {

        parent::boot();

        static::deleting(function ($model) {
            $model->people()->sync([]);
            Storage::disk('public')->delete($model->image);
        });
    }

}
