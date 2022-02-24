@extends('dashboard.layouts.dashboard-layouts')
@section('container')
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-8">
                <h2>{{ $post->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-info "> <span data-feather="arrow-left"></span>
                    Back to all my posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning "> <span
                        data-feather="edit"></span>
                    Edit
                </a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Are you sure ?')">
                        <span data-feather="x-circle"></span> Delete
                    </button>
                </form>
                {{-- {{ $post->body }} --}}
                @if ($post->image)
                    <div style="overflow:hidden; display:flex; justify-content:center">
                        <img src="{{ url('/post-images/' . $post->image) }}"
                            class="card-img-top img-fluid img-thumbnail my-4" style="max-height: 350px"
                            alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top my-4"
                        alt="{{ $post->category->name }}">
                @endif

                {{-- body --}}
                {!! $post->body !!}

            </div>
        </div>
    </div>
@endsection
