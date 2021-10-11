<?php

namespace App\Repository;

use App\Models\Hotel;
use Illuminate\Support\Facades\DB;

class GetHotelsRepository
{
    public function __construct(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }

    public function getHotels($latitude, $longitude, $orderBy)
    {
        if (isset($latitude) && isset($longitude)) {
            $radius = 1;
            $products = DB::table('hotels')
                ->select('hotels.*', DB::raw("( 6371 * acos( cos( radians($latitude) ) *
                                   cos( radians( latitude ) )
                                   * cos( radians( longitude ) - radians($longitude)
                                   ) + sin( radians($latitude) ) *
                                   sin( radians( latitude ) ) )
                                 ) AS distance"))
                ->having("distance", "<", $radius)
                ->get();


        }
        return $products->sortBy($orderBy);
    }
}
