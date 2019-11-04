@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                        <a href="{{ route('posts.create')  }}">
                            <button type="button" class="btn btn-primary">Add Post</button>
                        </a>
                    </div>
                    <div class="card-body">
                        @include('alerts.messages')
                        @include('posts.parts.post-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
