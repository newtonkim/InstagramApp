<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class userProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    { 
        // check authorization using the authorizing policy
        $this->authorize('update', $user->profile);
        
        return view('profiles.edit', compact('user'));
    }
    
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        //always use the auth method to get the logged in user
        
        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');
            
            // use the intervention image package to resize and fit images
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{{$user->id}}");
    }
}
