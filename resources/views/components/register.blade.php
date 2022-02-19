@extends('layouts.main-layouts')
@section('container')
    <div class="bg-gray-100 dark:bg-gray-600 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 md:w-11/12 max-w-xl sm:mx-auto mt-16">
            <div class="relative p-8 bg-white shadow-sm sm:rounded-xl">
                <div class="mb-4">
                    <p class="text-gray-600">Register</p>
                    <h2 class="text-xl font-bold">Join our community</h2>
                </div>
                <form class="w-full" method="POST" action="/register">
                    @csrf

                    <div class="mb-5 relative">
                        <input type="name" id="name" name="name"
                            class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent "
                            placeholder="name" autocomplete="off" autofocus value="{{ old('name') }}" />
                        <label for="name"
                            class="peer-placeholder-shown:opacity-100   opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Name
                        </label>
                        @error('name')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mb-5 relative">
                        <input type="username" id="username" name="username"
                            class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent "
                            placeholder="username" autocomplete="off" value="{{ old('username') }}" />
                        <label for="username"
                            class="peer-placeholder-shown:opacity-100   opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Username
                        </label>
                        @error('username')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mb-5 relative">
                        <input type="email" id="email" name="email"
                            class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent"
                            placeholder="name@example.com" autocomplete="off" value="{{ old('email') }}" />
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
                            class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent"
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
                    <small class=" block">Already Registed? <a href="/signin" class=" text-blue-600">Sign In</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
