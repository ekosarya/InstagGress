<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    public function profile(User $user)
    {
        //$user = User::findOrfail($user); manual method, replaced by the bellow line
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.profile', compact('user', 'follows'));//make 'user' equal to the variable $user, 'user will be parsed to 'user' '    
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile); //protect update when the user is authorized

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile); //protect update when the user is authorized

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'nullable|url',
            'image' => ''
        ]);

        if(request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image'=> $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []            
        ));

        return redirect("/profile/{$user->id}");
    }
}
