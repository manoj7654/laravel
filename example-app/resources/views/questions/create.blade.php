<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Question
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('questions.store') }}">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-2">
                                <label for="statement" value="Question">Question</label>
                                <input id="question" class="block mt-1 w-full" type="text" name="statement" :value="old('statement')" required>
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="option_a" value="Option_a">Option A</label>
                                <input id="option_a" class="block mt-1 w-full" type="text" name="option_a" :value="old('option_a')" required>
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="option_b" value="Option_b">Option B</label>
                                <input id="option_b" class="mt-1 w-full" type="text" name="option_b" :value="old('option_b')" required>
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="option_c" value="Option_c">Otption C</label>
                                <input id="option_c" class="block mt-1 w-full" type="text" name="option_c" :value="old('option_c')" required>
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="option_d" value="Option_d">Option D</label>
                                <input id="option_d" class="block mt-1 w-full" type="text" name="option_d" :value="old('option_d')" required>
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="answer" value="Answer">Answer</label>
                                <input id="answer" class="block mt-1 b-full" type="text" name="answer" :value="old('answer')" required>
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="quizzes" >Select Quiz Type : </label><br>
                                    @foreach ($quizzes as $quiz)
                                    <input type="checkbox" value="{{$quiz->id}}" name="quizzes[]" id="{{$quiz->id}}"></input>
                                    <label for="{{$quiz->id}}">{{$quiz->title}}</label><br>
                                    @endforeach
                                
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <select class="block mt-1 w-full" name="type">
                                    <option value="">---Select Type--- </option>
                                    <option value="mcq">mcq</option>
                                    <option value="sort">sort</option>
                                </select>
                            </div>

                            <div class="flex col-span-6 justify-end">
                                <button>
                                    Create Question
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>