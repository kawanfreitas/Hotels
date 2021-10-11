<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Repository\GetHotelsRepository;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Monolog\Handler\IFTTTHandler;

class GetHotelsController extends Controller
{
    public function __construct
    (
        GetHotelsRepository $hotelsRepository
    )
    {
        $this->hohotelsRepository = $hotelsRepository;
    }

    public function index()
    {
        return view('welcome');
    }

    public function search(HotelRequest $request)
    {
        $data = $request->all();

        $hotel = $this->hohotelsRepository->getHotels($data['latitude'], $data['longitude'], $data['ordBy']);

        return view('welcome', compact('hotel' ));
    }

}
