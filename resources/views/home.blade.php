@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="/images/fire-image.png" class="rounded-circle" height="150px" width="150px">
            </div>
            <div class="col-9 p-5">
                <div>
                    <h1>{{$user->username}}</h1>
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>153</strong>posts</div>
                    <div class="pr-5"><strong>23k</strong>follower</div>
                    <div class="pr-5"><strong>212</strong>following</div>
                </div>
                <div class="pt-4 font-weight-bold">freeCodeCamp.org</div>
                <p class="lead">We're a global community of millions of people learning to code together. We're an open source, donor-supported, 501(c)(3) nonprofit.
                </p>
                <div><a href="#"> www.freecodecamp.org</a></div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-4">
                <img src="/images/grid-1.jpg" class="w-100">
            </div>
            <div class="col-4">
                <img src="/images/grid-2.jpg" class="w-100">
            </div>
            <div class="col-4">
                <img src="/images/grid-3.jpg" class="w-100">
            </div> 
        </div>
    </div>
@endsection
