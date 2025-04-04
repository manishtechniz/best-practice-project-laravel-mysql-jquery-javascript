<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateUserProfileImage extends Controller
{
    // update user profile image
    public function update()
    {
        request()->setMethod('PUT');

        // validate request
        request()->validate([
            'image_url' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get the authenticated user
        $user = auth()->user();

        // store the image
        $path = request()->file('image_url')->store('profile', 'public');

        // update the user's profile image path
        $user->image_url = $path;

        $user->save();

        return response()->json(['message' => 'Profile image updated successfully']);
    }
}
