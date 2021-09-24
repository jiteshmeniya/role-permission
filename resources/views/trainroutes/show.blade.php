@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Post
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('posts.index') }}">Back</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Title:</strong>
                    {{ $post->title }}
                </div>
                <div class="lead">
                    <strong>Body:</strong>
                    {{ $post->body }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection