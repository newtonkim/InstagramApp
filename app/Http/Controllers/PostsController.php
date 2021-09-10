<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
      
    public function create()
    {
       return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'another' => '',
            'caption' => 'required',
            'image'  => ['required', 'image'], 
        ]);
        /* the store method takes in two parameters 
        * Remember to run php artisan storage:link
        */ 
        $imagePath = request('image')->store('uploads', 'public');

        // use the intervention image package to resize and fit images
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image'   => $imagePath,
        ]);
    
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show($id)
    {
        // return view('posts.show', compact('id'));
        dd($id);
    }
}