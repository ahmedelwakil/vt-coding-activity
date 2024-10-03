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
                                        <x-text-input id="point_x" class="mt-1 w-full mx-2"
                                                      type="number"
                                                      name="point_x"
                                                      step="any"
                                                      required autocomplete="Point X" />
                                        <x-input-error :messages="$errors->get('point_x')" class="mt-2" />
                                    </div>
                                    <div class="block mt-1" style="width: 40%">
                                        <x-input-label for="point_y" :value="__('Point Y')" />
                                        <x-text-input id="point_y" class="mt-1 w-full mx-2"
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

                    <div class="mt-4 w-full">
                        @if(!empty($locations))
                            <table class="w-full">
                                <thead class="py-2 bg-gray-900">
                                    <td class="text-center dark:text-gray-300 font-semibold text-gray-700 text-lg">#</td>
                                    <td class="text-center dark:text-gray-300 font-semibold text-gray-700 text-lg">Name</td>
                                    <td class="text-center dark:text-gray-300 font-semibold text-gray-700 text-lg">Point X</td>
                                    <td class="text-center dark:text-gray-300 font-semibold text-gray-700 text-lg">Point Y</td>
                                    <td class="text-center dark:text-gray-300 font-semibold text-gray-700 text-lg">Actions</td>
                                </thead>
                                <tbody>
                                    @foreach($locations as $location)
                                        <tr class="py-2">
                                            <td class="text-center dark:text-gray-300 font-medium text-gray-700 text-lg">{{ $location->id }}</td>
                                            <td class="text-center dark:text-gray-300 font-medium text-gray-700 text-lg">{{ $location->name }}</td>
                                            <td class="text-center dark:text-gray-300 font-medium text-gray-700 text-lg">{{ $location->point_x }}</td>
                                            <td class="text-center dark:text-gray-300 font-medium text-gray-700 text-lg">{{ $location->point_y }}</td>
                                            <td class="flex py-2">
                                                <div class="gap-4 mx-auto">
                                                    <x-secondary-button>{{ __('Show') }}</x-secondary-button>
                                                </div>

                                                <div class="gap-4 mx-auto">
                                                    <x-danger-button>{{ __('Delete') }}</x-danger-button>
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
</x-app-layout>
