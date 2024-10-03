<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Add New Location') }}
                    </h2>
                    <form method="POST" action="{{ route('locations.store') }}">
                        @csrf
                        <div class="mt-4 flex w-full">
                            <div class="w-full">
                                <div class="mt-4 w-full">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full"
                                                  type="text"
                                                  name="name"
                                                  required autocomplete="Location Name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="mt-4 flex w-full justify-between">
                                    <div class="block mt-1" style="width: 40%">
                                        <x-input-label for="point_x" :value="__('Point X')" />
                                        <x-text-input id="point_x" class="mt-1 w-full"
                                                      type="number"
                                                      name="point_x"
                                                      step="any"
                                                      required autocomplete="Point X" />
                                        <x-input-error :messages="$errors->get('point_x')" class="mt-2" />
                                    </div>
                                    <div class="block mt-1" style="width: 40%">
                                        <x-input-label for="point_y" :value="__('Point Y')" />
                                        <x-text-input id="point_y" class="mt-1 w-full"
                                                      type="number"
                                                      name="point_y"
                                                      step="any"
                                                      required autocomplete="Point Y" />
                                        <x-input-error :messages="$errors->get('point_y')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mt-4 flex gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Your Locations') }}
                    </h2>

                    <div class="flex justify-center mt-4 w-full">
                        <div class="w-full">
                            @if(!empty($locations))
                                <table class="w-full border-transparent rounded-md bg-gray-100 dark:bg-gray-700">
                                    <thead class="py-2 bg-white dark:bg-gray-800">
                                    <td class="text-center dark:text-gray-300 font-semibold text-gray-700 text-lg">#</td>
                                    <td class="text-center dark:text-gray-300 font-semibold text-gray-700 text-lg">{{ __('Name') }}</td>
                                    <td class="text-center dark:text-gray-300 font-semibold text-gray-700 text-lg">{{ __('Point X') }}</td>
                                    <td class="text-center dark:text-gray-300 font-semibold text-gray-700 text-lg">{{ __('Point Y') }}</td>
                                    <td class="text-center dark:text-gray-300 font-semibold text-gray-700 text-lg w-64">{{ __('Actions') }}</td>
                                    </thead>
                                    <tbody>
                                    @foreach($locations as $location)
                                        <tr class="py-2">
                                            <td class="text-center dark:text-gray-300 font-medium text-gray-700 text-lg">{{ $location->id }}</td>
                                            <td class="text-center dark:text-gray-300 font-medium text-gray-700 text-lg">{{ $location->name }}</td>
                                            <td class="text-center dark:text-gray-300 font-medium text-gray-700 text-lg">{{ $location->point_x }}</td>
                                            <td class="text-center dark:text-gray-300 font-medium text-gray-700 text-lg">{{ $location->point_y }}</td>
                                            <td class="flex justify-center py-2">
                                                <div class="mx-auto">
                                                    <form method="GET" action="{{ route('locations.show', $location->id) }}">
                                                        <x-primary-button>{{ __('Show') }}</x-primary-button>
                                                    </form>
                                                </div>
                                                <div class="mx-auto">
                                                    <form method="POST" action="{{ route('locations.destroy', $location->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <x-danger-button>{{ __('Delete') }}</x-danger-button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
