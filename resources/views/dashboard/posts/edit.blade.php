@extends('dashboard.layouts.dashboard-layouts')
@section('container')
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/posts" class="badge bg-transparent"> <span class="text-dark"
                data-feather="arrow-left"></span></a>
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="mb-5"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            {{-- Title --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title', $post->title) }}" autofocus>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Slug --}}
                <div class="col-md-6 mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                        value="{{ old('slug', $post->slug) }}" aria-describedby="slugHelp" autocomplete="off">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div id="slugHelp" class="form-text">Auto generate title</div>
                </div>
                {{-- Category --}}
                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                        <option selected disabled>Open this select menu</option>
                        @foreach ($categories as $category)
                            @if (old('category_id', $post->category_id) == $category->id)
                                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Image --}}
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Thumbnail</label>
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                        onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <img class="image-preview img-fluid col-md"> --}}
                @if ($post->image)
                    <img src="{{ url('/post-images/' . $post->image) }}"
                        class="image-preview img-fluid mb-5 col-sm-5 d-block">
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        class="image-preview img-fluid mb-5 col-sm-5">
                @endif
            </div>
            {{-- body --}}
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(res => res.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDeafult()
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.image-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
