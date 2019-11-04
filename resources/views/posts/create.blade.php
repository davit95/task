@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('alerts.messages')
                @include('posts.forms.post-from')
            </div>
        </div>
    </div>
@endsection
