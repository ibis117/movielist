<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Movie;
use App\Models\People;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = $this->getMovieIds();
        // dd($ids);

        foreach ($ids as $id) {

            $url = "https://api.themoviedb.org/3/movie/{$id}";
            $response = Http::get($url, [
                'api_key' => '0da42c0664f699b77109a7694092a467',
            ])->json();

            $country = Country::inRandomOrder()->first();
            $people = People::inRandomOrder()->limit(5)->pluck('id');

            $base_url_for_image = 'https://image.tmdb.org/t/p';
            $size = 'w500';
            $image = $response['poster_path'];
            $image_url = implode(DIRECTORY_SEPARATOR, [$base_url_for_image, $size, $image]);
            $path = "images/movies/{$image}";

            if (Storage::disk('public')->put($path, file_get_contents($image_url))) {
                $movie = Movie::create([
                    'country_id' => $country->id,
                    'title' => $response['title'],
                    'overview' => $response['overview'],
                    'original_language' => $response['original_language'],
                    'tagline' => $response['tagline'],
                    'runtime' => $response['runtime'],
                    'image' => $path,
                    'release_date' => $response['release_date'],
                ]);
                $movie->people()->sync($people);

            }
        }

    }

    public function getMovieIds()
    {
        $response = Http::get('https://api.themoviedb.org/3/movie/top_rated', [
            'api_key' => '0da42c0664f699b77109a7694092a467',
        ])->json();

        return collect($response['results'])->pluck('id')->toArray();

    }
}
