<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Question Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
               <h2>{{$questions->id}}</h2>
               <h2>{{$questions->statement}}</h2>
               <p>A. {{$questions->option_a}}</p>
               <p>B. {{$questions->option_b}}</p>
               <p>C. {{$questions->option_c}}</p>
               <p>D. {{$questions->option_d}}</p>
               
            </div>
        </div>
    </div>
</x-app-layout>