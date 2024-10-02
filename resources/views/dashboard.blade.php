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
                                        <x-input-label for="pointX" :value="__('Point X')" />
                                        <x-text-input id="pointX" class="mt-1 w-full mx-2"
                                                      type="number"
                                                      name="pointX"
                                                      step="any"
                                                      required autocomplete="Point X" />
                                        <x-input-error :messages="$errors->get('pointX')" class="mt-2" />
                                    </div>
                                    <div class="block mt-1" style="width: 40%">
                                        <x-input-label for="pointY" :value="__('Point Y')" />
                                        <x-text-input id="pointY" class="mt-1 w-full mx-2"
                                                      type="number"
                                                      name="pointY"
                                                      step="any"
                                                      required autocomplete="Point Y" />
                                        <x-input-error :messages="$errors->get('pointY')" class="mt-2" />
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
