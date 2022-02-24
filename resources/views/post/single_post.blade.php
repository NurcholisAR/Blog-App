@extends('layouts.main-layouts')
@section('container')
    <div class="w-full h-max mt-28 dark:text-gray-50">
        <div class="container">
            <div class="container md:flex md:justify-between mb-5 -mt-3">
                @include('components.partials.breadcumbs')
            </div>
            {{-- end breadcumb --}}
            <div class="container">
                {{-- <h1 class="my-2">{{ $post->title }}</h1> --}}
                <h5 class="my-2 text-2xl font-bold">{{ $title }}</h5>
                @if ($post->image)
                    <div class="flex justify-center overflow-hidden">
                        <img src="{{ url('/post-images/' . $post->image) }}"
                            class="bg-cover my-4 w-max p-1 border border-inherit rounded h-72"
                            alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="my-4"
                        alt="{{ $post->category->name }}">
                @endif
                <h6 class="mb-5">
                    <span
                        class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                        <svg class="mr-1 w-3 h-3 align-middle" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{ $post->user->name }}
                    </span>
                    <span
                        class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                        <svg class="mr-1 w-4 h-3" fill="none" stroke="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                        </svg>
                        <a href="/posts?category={{ $post->category->slug }}">
                            {{ $post->category->name }} </a>
                    </span>
                    <span
                        class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                        <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ $post->created_at->diffForHumans() }}
                    </span>
                </h6>
                {!! $post->body !!}
                <div class="my-10"></div>
            </div>
        </div>
    </div>
@endsection
