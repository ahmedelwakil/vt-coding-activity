<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class NWSService
{
    const BASE_URL = 'https://api.weather.gov/points/';

    /**
     * @param float $pointX
     * @param float $pointY
     * @return array
     */
    public static function getPointMetaData(float $pointX, float $pointY): array
    {
        $url = self::BASE_URL . "$pointX,$pointY";
        $response = self::sendRequest($url);
        if ($response['success'])
            $response['data'] = self::parsePointMetaData($response['data']);

        return $response;
    }

    /**
     * @param string $url
     * @return array
     */
    public static function getForecast(string $url): array
    {
        $response = self::sendRequest($url);
        if ($response['success'])
            $response['data'] = self::parseForecastMetaData($response['data']);

        return $response;
    }

    /**
     * @param $url
     * @return array
     */
    private static function sendRequest($url): array
    {
        $client = new Client();
        try {
            $response = $client->get($url, ['User-Agent' => env('APP_NAME', 'myweatherapp.com')])->getBody()->getContents();
            return [
                'success' => true,
                'data' => json_decode($response, true),
            ];
        } catch (GuzzleException $exception) {
            $response = $exception->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            return [
                'success' => false,
                'data' => json_decode($responseBodyAsString, true),
            ];
        }
    }

    /**
     * @param array $metaData
     * @return array
     */
    private static function parsePointMetaData(array $metaData): array
    {
        return [
            'daily_forecast_url' => $metaData['properties']['forecast'],
            'hourly_forecast_url' => $metaData['properties']['forecastHourly'],
            'meta_data' => json_encode($metaData),
        ];
    }

    /**
     * @param array $metaData
     * @return array
     */
    private static function parseForecastMetaData(array $metaData): array
    {
        return [
            'generated_at' => $metaData['properties']['generatedAt'],
            'last_updated_at' => $metaData['properties']['updateTime'],
            'periods' => $metaData['properties']['periods'],
        ];
    }

    /**
     * @param array $exceptionData
     * @return string
     */
    public static function parseExceptionMessage(array $exceptionData): string
    {
        return $exceptionData['title'] . '. ' . $exceptionData['detail'];
    }
}
