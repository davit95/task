@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Post : {{ $post->name  }}</div>
                    <div class="card-body">
                        <a href="{{ route('posts.index')  }}">
                            <button type="button" class="btn btn-primary">Posts</button>
                        </a>
                    </div>
                    <div class="card-body">
                        @include('alerts.messages')
                        @include('posts.parts.post-show')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
