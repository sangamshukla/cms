<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome {{auth()->user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Enter your Details</h1>
                    <form action="{{ route('submit-post') }}" method="post">
                        @csrf
                        <div class="m-5">
                            <input type="text" class="rounded-lg" name="title" id="title" placeholder="Enter your Post Title here">
                        </div>
                        <div class="m-5">
                            {{-- <input type="text" class="rounded-lg" name="description" id="description" placeholder="Enter your Post Description here"> --}}
                            <textarea name="description" id="description" cols="80" rows="3" class="rounded-lg" placeholder="Enter your Post Description here"></textarea>
                        </div>
                        <div class="m-5">
                            <input type="file" name="image" id="image" class="" placeholder="">
                        </div>
                        <div class="m-5">
                            <button type="submit" class="bg-blue-600 px-3 py-2 rounded-lg shadow-lg">Post here</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
