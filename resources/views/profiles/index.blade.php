@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
            </div>
            <div class="col-9 p-5">
                <div class="d-flex justify-content-between align-item-baseline">
                    <div class="d-flex align-items-center">
                        <div class="h4 pt-2">{{$user->username}}</div>
                      
                        <follow-button 
                            user-id="{{ $user->id }}" 
                            follows="{{$follows}}">
                        </follow-button>
                    </div>
                  

                    @can('update', $user->profile)
                        <a href="/post/create"><button class="btn btn-primary">Add New Post</button></a>
                    @endcan
                </div>

                @can('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan

                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $postCount }}</strong>posts</div>
                    <div class="pr-5"><strong>{{ $followersCount}}</strong>follower</div>
                    <div class="pr-5"><strong>{{ $followingCount }}</strong>following</div>
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
                   <a href="/post/{{$post->id}}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
                </div>
                
            @endforeach
        </div>
    </div>
@endsection
