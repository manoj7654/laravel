<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Question List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                
                <x-nav-link :href="route('questions.create')">
                      Create question
                    </x-nav-link>
                    <form action="{{ route('questions.index') }}" method="GET">
                        <label for="type">Filter by Type:</label>
                        <select name="type" id="type">
                            <option value="sort">sort</option>
                            <option value="mcq">mcq</option>
                            
                        </select>
                        <button type="submit">Filter</button>
                    </form>
                    @foreach ($questions as $question)
                    <p><a href="{{ route('questions.show',['question'=>$question]) }}">{{$question->id}}</a> {{$question->statement}} <a href="{{ route('questions.edit',['question'=>$question]) }}">Edit</a></p>
                  @endforeach
                  {{$questions->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>