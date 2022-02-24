@extends('layouts.main-layouts')
@section('container')
    <div class="w-full h-max mt-28">
        <div class="container">
            <div class="md:flex md:justify-between mb-5 -mt-3">
                @include('components.partials.breadcumbs')
                <form action="/posts" class="flex mt-4 md:mt-0 py-3">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <input type="text"
                        class=" rounded-lg bg-gray-50 border border-gray-200 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search" autocomplete="off" name="search" value="{{ request('search') }}"
                        aria-label="Search">
                    <button type="submit"
                        class="items-center text-sm ml-2 p-2 rounded-lg bg-gray-200  dark:bg-gray-600 dark:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
                {{-- end breadcumb --}}
            </div>
            {{-- Body --}}
            @if ($posts->count() > 0)
                <div class=" max-w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-700">
                    <div class="overflow-hidden max-h-72 rounded-b-none md:rounded-t-lg">
                        @if ($posts[0]->image)
                            <div class="flex justify-center overflow-hidden">
                                <img src="{{ url('/post-images/' . $posts[0]->image) }}" class="bg-no-repeat bg-center"
                                    alt="{{ $posts[0]->category->name }}">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}"
                                alt="{{ $posts[0]->category->name }}">
                        @endif
                        {{-- <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}"
                            alt="{{ $posts[0]->category->name }}" class="rounded-b-none md:rounded-lg"> --}}
                    </div>
                    <div class="p-5 text-center">
                        <a href="/posts/{{ $posts[0]->slug }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {!! Str::limit($posts[0]->title, 40, ' ...') !!}
                            </h5>
                        </a>
                        <p>
                            <small class="inline-flex justify-center mx-auto">
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                                    <svg class="mr-1 w-3 h-3 align-middle" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <a href="/posts?author={{ $posts[0]->user->name }}">
                                        {{ $posts[0]->user->name }}
                                    </a>
                                </span>
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                                    <svg class="mr-1 w-4 h-3" fill="none" stroke="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                    <a href="/posts?category={{ $posts[0]->category->slug }}">
                                        {{ $posts[0]->category->name }} </a>
                                </span>
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                                    <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $posts[0]->created_at->diffForHumans() }}
                                </span>
                            </small>
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $posts[0]->excerpt }}</p>
                        <a href="/posts/{{ $posts[0]->slug }}"
                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="mt-5 h-auto md:flex mx-auto w-full">
                    @foreach ($posts->skip(1) as $post)
                        {{-- <div class="flex md:mx-2 max-w-md my-2 md:first:ml-0 md:last:mr-0 items-center"> --}}
                        <div
                            class="flex md:mx-2 md:first:ml-0 md:last:mr-0 my-2 rounded-sm md:rounded-xl shadow-md border border-gray-200 overflow-hidden md:w-1/4">
                            {{-- <div
                                class="md:max-w-1/2 sm:max-w-md bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 overflow-hidden"> --}}
                            <div class="flex flex-row md:flex-col">
                                <span
                                    class="absolute bg-gray-600 rounded-tl-lg font-semibold text-sm p-1 text-white dark:bg-gray-800">
                                    <a
                                        href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                                </span>
                                @if ($post->image)
                                    <img class="h-full w-48 md:w-full md:h-48 object-cover"
                                        src="{{ url('/post-images/' . $post->image) }}"
                                        alt="{{ $post->category->name }}">
                                @else
                                    <img class="h-full w-48 md:w-full md:h-48 object-cover"
                                        src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                                        alt="{{ $post->category->name }}" />
                                @endif
                                <div class="p-5">
                                    <a href="/posts/{{ $post->slug }}">
                                        <h5
                                            class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-sm">
                                            {!! Str::limit($post->title, 40, ' ...') !!}
                                        </h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-xs md:text-base">
                                        {!! Str::limit($post->excerpt, 40, ' ...') !!}
                                    </p>
                                    <div class="footer-card mt-auto left-0">
                                        <a href="/posts/{{ $post->slug }}"
                                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                                            Read more
                                            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-black dark:text-white">No Post Found</p>
            @endif
        </div>
        <div class="my-5 container justify-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
