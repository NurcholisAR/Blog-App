@extends('layouts.main-layouts')
@section('container')
    <div class=" h-screen bg-gray-100 dark:bg-gray-600 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 md:w-11/12 max-w-xl sm:mx-auto">
            {{-- alert --}}
            @if (session()->has('success'))
                @include('components.partials.alert-success')
            @endif
            @if (session()->has('error'))
                @include('components.partials.alert-error')
            @endif
            {{-- end alert --}}
            <div class="relative p-8 bg-white shadow-sm sm:rounded-xl">
                <div class="mb-4">
                    <p class="text-gray-600">Sign In</p>
                    <h2 class="text-xl font-bold">Join our community</h2>
                </div>
                <form class="w-full" action="/signin" method="POST">
                    @csrf
                    <div class="mb-5 relative">
                        <input type="email" id="email" name="email"
                            class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent "
                            placeholder="name@example.com" autocomplete="off" autofocus />
                        <label for="email"
                            class="peer-placeholder-shown:opacity-100   opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Email
                            address
                        </label>
                        @error('email')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-5 relative">
                        <input type="password" id="password" name="password"
                            class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent "
                            placeholder="password" autocomplete="off" />
                        <label for="password"
                            class="peer-placeholder-shown:opacity-100   opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Password
                        </label>
                        @error('password')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 text-white p-3 rounded-md">Submit</button>
                </form>
                <div class="flex items-center justify-between mt-4 text-black">
                    <small class=" block">Not Register? <a class=" text-blue-600" href="/register">Register
                            Now</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
