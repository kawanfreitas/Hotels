<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;
use App\Service\Hotels;
use Illuminate\Support\Facades\DB;

class HotelsSeed extends Seeder
{
    protected $hotels;

    public function __construct(Hotels $hotels)
    {
        $this->hotels = $hotels;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotels = json_decode($this->hotels->getData());
        if ($hotels->success == true) {
            DB::table('hotels')->truncate();
            foreach ($hotels->message as $value) {
                Hotel::create([
                    'hotels_name' => $value['0'],
                    'latitude' => $value['1'],
                    'longitude' => $value['2'],
                    'value_day' => $value['3']
                ]);
            }

        }

    }
}
