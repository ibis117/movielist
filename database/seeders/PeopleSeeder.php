<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\People;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = $this->getPeopleIds();

        foreach ($ids as $id) {
            $this->getDetailAndSave($id);
        }

    }

    private function getPeopleIds()
    {
        $response = Http::get('https://api.themoviedb.org/3/person/popular', [
            'api_key' => '0da42c0664f699b77109a7694092a467',
        ])->json();

        $peoples = $response['results'];

        return collect($peoples)->pluck('id')->toArray();
    }

    private function getDetailAndSave($id)
    {
        $url = "https://api.themoviedb.org/3/person/{$id}";
        $response = Http::get($url, [
            'api_key' => '0da42c0664f699b77109a7694092a467',
        ])->json();

        $country = Country::inRandomOrder()->first();

        People::create([
            'name' => $response['name'],
            'bio' => $response['biography'],
            'bio' => $response['biography'],
            'birthday' => $response['birthday'],
            'deathday' => $response['deathday'],
            'place_of_birth' => $response['place_of_birth'],
            'gender' => $response['gender'],
            'country_id' => $country->id,
        ]);
    }

}
