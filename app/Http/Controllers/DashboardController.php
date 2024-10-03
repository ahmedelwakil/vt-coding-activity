<?php

namespace App\Http\Controllers;

use App\Services\LocationService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * @var LocationService
     */
    private LocationService $locationService;

    /**
     * DashboardController constructor.
     * @param LocationService $locationService
     */
    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    /**
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        $locations = $this->locationService->getLocations();
        return view('dashboard', ['locations' => $locations]);
    }
}
