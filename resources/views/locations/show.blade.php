<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $location->name }}
        </h2>

        <div class="flex mt-1">
            <div class="flex mx-2">
                <div class="text-lg font-semibold text-gray-600 dark:text-gray-400">{{ __("Point X") }}:&nbsp;</div>
                <div class="text-lg font-medium text-indigo-700 dark:text-indigo-300">{{ $location->point_x }}</div>
            </div>

            <div class="flex mx-2">
                <div class="text-lg font-semibold text-gray-600 dark:text-gray-400">{{ __("Point Y") }}:&nbsp;</div>
                <div class="text-lg font-medium text-indigo-700 dark:text-indigo-300">{{ $location->point_y }}</div>
            </div>
        </div>

        <div class="flex mt-1">
            <div class="flex mx-2">
                <div class="text-sm font-semibold text-gray-600 dark:text-gray-400">{{ __("Created At") }}:&nbsp;</div>
                <div class="text-sm font-medium text-indigo-700 dark:text-indigo-300">{{ \Carbon\Carbon::make($location->created_at)->format('Y-m-d h:m a') }}</div>
            </div>

            <div class="flex mx-2">
                <div class="text-sm font-semibold text-gray-600 dark:text-gray-400">{{ __("Updated At") }}:&nbsp;</div>
                <div class="text-sm font-medium text-indigo-700 dark:text-indigo-300">{{ \Carbon\Carbon::make($location->updated_at)->format('Y-m-d h:m a') }}</div>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Daily Forecast') }}
                    </h2>

                    <div class="flex mt-1">
                        <div class="flex mx-2">
                            <div class="text-sm font-semibold text-gray-600 dark:text-gray-400">{{ __("Generated At") }}:&nbsp;</div>
                            <div class="text-sm font-medium text-indigo-700 dark:text-indigo-300">{{ \Carbon\Carbon::make($location->daily_forecast_data['generated_at'])->format('Y-m-d h:m a') }}</div>
                        </div>

                        <div class="flex mx-2">
                            <div class="text-sm font-semibold text-gray-600 dark:text-gray-400">{{ __("Last Updated At") }}:&nbsp;</div>
                            <div class="text-sm font-medium text-indigo-700 dark:text-indigo-300">{{ \Carbon\Carbon::make($location->daily_forecast_data['last_updated_at'])->format('Y-m-d h:m a') }}</div>
                        </div>
                    </div>

                    <div class="m-auto p-auto mt-4">
                        <div class="flex overflow-x-scroll pb-4 hide-scroll-bar">
                            <div class="flex">
                                @foreach($location->daily_forecast_data['periods'] as $period)
                                    @include('locations.partials.period', ['period' => $period])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Hourly Forecast') }}
                    </h2>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
