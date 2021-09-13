@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-8 align-items-center">
        <h1 class ="display-4 py-5">Welcome to InstApp</h1>
        <img src="/images/notification.png" class="image-fluid">
      </div>
      <div class="col-4 py-5">
        <span>
          <p>Click the button to Create your Post</p>
        </span>
        <a href="/post/create">
          <button class="btn btn-primary">Create a Post</button>
        </a>
      </div>
    </div>
     @foreach ($posts as $post)
    <div class="row">
      <div class="col-6 offset-3">
        <a href="/profile/{{ $post->user->id }}">
          <img src="/storage/{{ $post->image }}" class="w-100">
        </a>
      </div>
    </div>
     <div class="row pt-3 pb-4">
      <div class="col-6 offset-3">
        <div>
          <p>
            <span class="font-weight-bold pr-2">
              <a href="/profile/{{$post->user->id}}">
                {{$post->user->username}}
              </a>
            </span>{{$post->caption}}
          </p>
        </div>
      </div>  
     @endforeach

     <div class="row d-flex justify-content-center">
       <div class="col-12">
          {{$posts->links()}}
       </div>
     </div>
    </div>
@endsection
