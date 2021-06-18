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
                    @foreach ($user as $user)
                        <div class="container">
                            <div class="flex p-1">
                            <ul>
                                @forelse ( $user->posts as $post )

                                <li><a href="{{ route('post-detail', $post->id) }}">{{ $post->title }}</a></li>
                                @empty
                                <div class="my-2">
                                    <li>No Post yet</li>
                                </div>
                                @endforelse
                            </ul>
                        </div>
                        <div class="mt-10">
                            <a href="{{ route('create-post') }}" class="bg-blue-700 text-gray-200 text-lg py-1 px-2 rounded-lg shadow-lg">Create Post</a>
                        </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
