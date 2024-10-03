<?php

namespace App\Http\Controllers;

use App\Services\LocationService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * @var LocationService
     */
    private LocationService $locationService;

    /**
     * LocationController constructor.
     * @param LocationService $locationService
     */
    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    /**
     * @param Request $request
     * @throws GuzzleException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'point_x' => 'required|numeric',
            'point_y' => 'required|numeric',
        ]);

        $location = $this->locationService->addLocation($request->name, $request->point_x, $request->point_y);

        //TODO: redirect
    }
}
