@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>
                {{ $post->title }} -- <em> (deleted) </em>
            </h2>
        </div>
        <div class="col-12">
            <h2 scope="row">
                {{ $post->id }}
            </h2>

            <img src="{{ $post->post_image }}" alt="">

            <p>
                {{ $post->user_id }}
            </p>
            <p>
                {{ $post->date }}
            </p>
            <div class="p-5">
                <p>
                    <em>
                        {{ $post->content}}
                    </em>
                </p>
            </div>
                {{-- <button class="btn btn-sm btn-warning">
                    Delete
                </button> --}}
            </p>
        </tr>
        </div>
    </div>
</div>
@endsection