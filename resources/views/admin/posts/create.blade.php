@extends('layouts.admin')

@section('title', 'Creating a new post')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            @include('partials.errors')

            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf

                <div class="mb-3 input-group">
                    <label for="title" class="input-group-text">Title:</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
                </div>

                <div class="mb-3 input-group">
                    <label for="author" class="input-group-text">Author:</label>
                    <input class="form-control" type="text" name="author" id="author" value="{{ old('author') }}">
                </div>

                <div class="mb-3 input-group">
                    <label for="date" class="input-group-text">Date:</label>
                    <input class="form-control" type="date" name="date" id="date" value="{{ old('date') }}">
                </div>

                <div class="mb-3 input-group">
                    <label for="post_image" class="input-group-text">Post image url:</label>
                    <input class="form-control" type="text" name="post_image" id="post_image" value="{{ old('post_image') }}">
                </div>

                <div class="mb-3 input-group">
                    <label for="content" class="input-group-text">Post content:</label>
                    <textarea class="form-control"  name="content" id="content" cols="30" rows="10">{{ old('content')  }}</textarea>
                </div>
                <div class="mb-3 input-group">
                    <button type="submit" class="btn btn-xl btn-primary">
                        Create new post
                    </button>
                    <button type="reset" class="btn btn-xl btn-warning">
                        Reset all fields
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection