<?php

namespace App\Services;

use App\Models\Location;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class LocationService
{
    /**
     * @return Builder[]|Collection
     */
    public function getLocations()
    {
        return $locations = Location::query()
            ->where('user_id', '=', Auth::user()->getAuthIdentifier())
            ->get();
    }

    /**
     * @param string $name
     * @param float $pointX
     * @param float $pointY
     * @return mixed
     * @throws GuzzleException
     */
    public function addLocation(string $name, float $pointX, float $pointY)
    {
        $nwsService = new NWSService();
        $locationData = $nwsService->getPointMetaData($pointX, $pointY);
        return Location::create(array_merge([
            'name' => $name,
            'user_id' => Auth::user()->getAuthIdentifier()
        ], $locationData));
    }
}
