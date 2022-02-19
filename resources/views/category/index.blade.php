@extends('layouts.main-layouts')
@section('container')
    <div class="h-screen w-full dark:text-white">
        <div class="container mt-28">
            <ul class="list-none">
                @foreach ($categories as $category)
                    <li>
                        {{ $category->name }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
