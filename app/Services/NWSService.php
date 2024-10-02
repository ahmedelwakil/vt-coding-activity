<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class NWSService
{
    const BASE_URL = 'https://api.weather.gov/points/';

    /**
     * @param float $lat
     * @param float $lng
     * @return array
     * @throws GuzzleException
     */
    public function getPointMetaData(float $lat, float $lng): array
    {
        $url = self::BASE_URL . "$lat,$lng";
        $data = $this->sendRequest($url);
        return array_merge([
            'lat' => $lat,
            'lng' => $lng,
        ], $this->parsePointMetaData($data));
    }

    /**
     * @param array $metaData
     * @return array
     */
    private function parsePointMetaData(array $metaData): array
    {
        return [
            'daily_forecast_url' => $metaData['properties']['forecast'],
            'hourly_forecast_url' => $metaData['properties']['forecastHourly'],
            'meta_data' => json_encode($metaData),
        ];
    }

    /**
     * @param string $url
     * @return array
     * @throws GuzzleException
     */
    public function getForecast(string $url): array
    {
        $data = $this->sendRequest($url);
        return [
            'generated_at' => $data['properties']['generatedAt'],
            'last_updated_at' => $data['properties']['updateTime'],
            'periods' => $data['properties']['periods'],
        ];
    }

    /**
     * @param $url
     * @return mixed
     * @throws GuzzleException
     */
    private function sendRequest($url)
    {
        $client = new Client();
        $response = $client->get($url, ['User-Agent' => env('APP_NAME', 'myweatherapp.com')])->getBody()->getContents();
        return json_decode($response, true);
    }
}
