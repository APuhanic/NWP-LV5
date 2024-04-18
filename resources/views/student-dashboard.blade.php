<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stvori novi projekt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Popis svih projekata') }}</h3>
                    
                    <ul>
                        @foreach($projects as $project)
                            <li>{{ $project->naziv_projekta }}</li>
                            <li>{{ $project->opis_projekta }}</li>
                            
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
