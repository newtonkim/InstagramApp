@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="/images/fire-image.png" class="rounded-circle" height="150px" width="150px">
            </div>
            <div class="col-9 p-5">
                <div class="d-flex justify-content-between align-item-baseline">
                    <h1>{{$user->username}}</h1>
                    <a href="/post/create"><button class="btn btn-primary">Add New Post</button></a>
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{$user->posts->count()}}</strong>posts</div>
                    <div class="pr-5"><strong>23k</strong>follower</div>
                    <div class="pr-5"><strong>212</strong>following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                <p class="lead">{{ $user->profile->description }}
                </p>
                <div><a href="#">{{ $user->profile->url }}</a></div>
            </div>
        </div>
        <div class="row pt-5">

            @foreach ($user->posts as $post)
                <div class="col-4 pb-4">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </div>
                
            @endforeach
        </div>
    </div>
@endsection
