<article class="rounded-md border border-transparent bg-gray-100 dark:bg-gray-700 mx-2" style="width: 25%">
    <div class="flex justify-center mt-8 overflow-hidden">
        <img src="{{ $period['icon'] }}" class="object-cover transition duration-700 ease-out group-hover:scale-105 rounded-md" alt="{{ __('Weather Icon') }}" />
    </div>
    <div class="flex flex-col p-2 text-center">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100" aria-describedby="featureDescription">{{ $period['name'] }}</h3>

        <div class="flex text-sm text-gray-600 dark:text-gray-400 justify-center">
            <div class="text-lg font-medium text-indigo-700 dark:text-indigo-300">{{ $period['shortForecast'] }}</div>
        </div>

        <div class="flex flex-col px-6 py-2" style="width: max-content">
            <div class="flex text-sm text-gray-600 dark:text-gray-400 justify-between">
                <div class="font-semibold">{{ __('Temperature') }}:&emsp;</div>
                <div class="text-indigo-700 dark:text-indigo-300">{{ $period['temperature'] }} &#176{{ $period['temperatureUnit'] }}</div>
            </div>

            <div class="flex text-sm text-gray-600 dark:text-gray-400 justify-between">
                <div class="font-semibold">{{ __('Wind Speed') }}:&emsp;</div>
                <div class="text-indigo-700 dark:text-indigo-300">{{ $period['windSpeed'] }}</div>
            </div>

            <div class="flex text-sm text-gray-600 dark:text-gray-400 justify-between">
                <div class="font-semibold">{{ __('Wind Direction') }}:&emsp;</div>
                <div class="text-indigo-700 dark:text-indigo-300">{{ $period['windDirection'] }}</div>
            </div>

            @if(isset($period['probabilityOfPrecipitation']) && $period['probabilityOfPrecipitation']['value'])
                <div class="flex text-sm text-gray-600 dark:text-gray-400 justify-between">
                    <div class="font-semibold">{{ __('Precipitation') }}:&emsp;</div>
                    <div class="text-indigo-700 dark:text-indigo-300">{{ round($period['probabilityOfPrecipitation']['value'], 2) }}%</div>
                </div>
            @endif

            @if(isset($period['dewpoint']) && $period['dewpoint']['value'])
                <div class="flex text-sm text-gray-600 dark:text-gray-400 justify-between">
                    <div class="font-semibold">{{ __('Dewpoint') }}:&emsp;</div>
                    <div class="text-indigo-700 dark:text-indigo-300">{{ round($period['dewpoint']['value'], 0) }} &#176C</div>
                </div>
            @endif

            @if(isset($period['relativeHumidity']) && $period['relativeHumidity']['value'])
                <div class="flex text-sm text-gray-600 dark:text-gray-400 justify-between">
                    <div class="font-semibold">{{ __('Humidity') }}:&emsp;</div>
                    <div class="text-indigo-700 dark:text-indigo-300">{{ round($period['relativeHumidity']['value'], 2) }}%</div>
                </div>
            @endif
        </div>

        <p id="featureDescription" class="text-sm text-gray-600 dark:text-gray-400">{{ $period['detailedForecast'] }}</p>
    </div>
</article>
