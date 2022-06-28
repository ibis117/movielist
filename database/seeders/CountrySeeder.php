<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://api.themoviedb.org/3/configuration/countries', [
            'api_key' => '0da42c0664f699b77109a7694092a467'
        ]);

        $now = Carbon::now()->toDateTimeString();

        $countries = collect($response->json())->map(function($country) use ($now) {

            $country['code'] = $country['iso_3166_1'];
            $country['created_at'] = $now;
            $country['updated_at'] = $now;
            unset($country['iso_3166_1']);
            return $country;
        })->toArray();



        Country::insert($countries);

    }
}
