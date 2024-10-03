<?php

namespace App\Http\Controllers;

use App\Exceptions\NWSException;
use App\Models\Location;
use App\Services\LocationService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
     * @return Application|Factory|View|RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'point_x' => 'required|numeric',
            'point_y' => 'required|numeric',
        ]);

        try {
            $location = $this->locationService->addLocation($request->name, $request->point_x, $request->point_y);
        } catch (NWSException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return $this->show($location);
    }

    /**
     * @param Location $location
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(Location $location)
    {
        try {
            $location = $this->locationService->getLocationForecast($location);
            return view('locations.show', ['location' => $location]);
        } catch (NWSException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @param Location $location
     * @return RedirectResponse
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->back();
    }
}
