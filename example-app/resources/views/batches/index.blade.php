<style>
    .btn-primary{
    border: 1px solid grey;
    border-radius: 5px;
    padding: 5px 10px 5px 10px;
    background-color: grey;
    color: white;
}
.btn{
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Batches List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-nav-link :href="route('batches.create')">
                        Create Batches
                    </x-nav-link>
                    <div class="btn">
                        <a href="{{route('batches.index',['filter'=>'empty'])}}" class="btn btn-primary">Empty</a>
                        <a href="{{route('batches.index',['filter'=>'non-empty'])}}" class="btn btn-primary">Non-Empty</a>
                    </div>
                    @foreach ($batches as $batch)
                    <p><a href="{{ route('batches.show',['batch'=>$batch]) }}">{{$batch->id}}</a> {{$batch->name}}--{{$batch->starting}}--{{$batch->quizzes_count}}-- <a href="{{ route('batches.edit',['batch'=>$batch]) }}">Edit</a></p>
                    @endforeach
                    {{$batches->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>