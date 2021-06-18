<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome {{auth()->user()->name}}
        </h2>
    </x-slot>
    <div class="mt-5 mx-20">
        <a href="{{ route('dashboard') }}" class="bg-blue-600 py-2 px-5 rounded-lg">Go Back</a>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="m-3 text-3xl font-bold">
                        {{ $post->title }}
                    </div>
                    <div class="m-3">
                        {{ $post->description }}
                    </div>
                </div>
            </div>
            <div class="p-2 mt-5">
                <div class="m-1 p-1">
                    <p>Posted Comments</p>
                </div>
                <div class="m-1 p-1">
                    @forelse ($post->comment as $comment)
                    <div class="bg-gray-200 w-1/4 rounded-lg my-3">
                        <ul class="p-2">
                            <li>
                                {{ $comment->comment }}
                                <p class="text-sm">By: {{ $comment->user->name }}</p>
                            </li>
                        </ul>
                    </div>
                        @empty
                            <p>No comment for this post</p>
                        @endforelse
                </div>
            </div>
            <div class="p-2 mt-5">
                <div class="m-1 p-1">
                    <p>Write your comment</p>
                </div>
                <form action="{{ route('post-comment') }}" method="POST">
                    @csrf
                    <div class="m-1 p-1">
                        {{-- <input type="text"name="comment" id="" placeholder="Enter your comment here" class="rounded-lg px-2 py-5 shadow"> --}}
                        <textarea name="comment" id="" cols="50" rows="2" placeholder="Enter your comment here" class="rounded-lg p-2 shadow"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                    </div>
                    <div class="m-1 p-1">
                        <button id="commentForm" class="bg-blue-600 px-5 py-2 rounded-lg shadow-lg text-white">Post Your Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
