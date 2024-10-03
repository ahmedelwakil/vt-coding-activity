<?php

namespace App\Services;

use App\Exceptions\NWSException;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class LocationService
{
    /**
     * @return Builder[]|Collection
     */
    public function getAllLocations()
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
     * @throws NWSException
     */
    public function addLocation(string $name, float $pointX, float $pointY)
    {
        $response = NWSService::getPointMetaData($pointX, $pointY);
        if ($response['success']) {
            $locationData = $response['data'];
            return Location::create(array_merge([
                'name' => $name,
                'user_id' => Auth::user()->getAuthIdentifier(),
                'point_x' => $pointX,
                'point_y' => $pointY,
            ], $locationData));
        } else {
            throw new NWSException(NWSService::parseExceptionMessage($response['data']));
        }
    }

    /**
     * @param Location $location
     * @return Location
     * @throws NWSException
     */
    public function getLocationForecast(Location $location)
    {
        $dailyResponse = NWSService::getForecast($location->daily_forecast_url);
        if (!$dailyResponse['success'])
            throw new NWSException(NWSService::parseExceptionMessage($dailyResponse['data']));

        $hourlyResponse = NWSService::getForecast($location->hourly_forecast_url);
        if (!$hourlyResponse['success'])
            throw new NWSException(NWSService::parseExceptionMessage($hourlyResponse['data']));

        $location->setAttribute('daily_forecast_data', $dailyResponse['data']);
        $location->setAttribute('hourly_forecast_data', $hourlyResponse['data']);
        return $location;
    }
}
