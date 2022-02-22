<?php

namespace App\Http\Controllers\All;

use App\Models\User;
use App\Models\All\TmpImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return match(auth()->user()->role->name) {
                'admin' => view('admin.profile.index'),
                'user' => view('user.profile.index'),
            };
    }

    public function update(Request $request , User $user)
    {
        // update only the password if there is a request
        if($request->password && $request->old) 
        {
            $data = $request->validate([
                'password' => 'sometimes|min:6|max:15|confirmed',
                'old' => 'sometimes',
            ]);

            if(!Hash::check($request->old, $user->password))
            {
                return back()->with(['error' => 'The old password you entered is invalid']);
            }

            $user->update(['password' => Hash::make($data['password'])]); // update password [hashed]

            $this->log_activity($user, 'updated', 'Password', 'some password');

            return back()->with(['success' => 'Password Updated Successfully']);
        }

        if($request->avatar)
        {
            $user->avatar ? $user->avatar->delete() : '';
            
            $user->addMedia(storage_path('app/public/tmp/'. request('avatar')))->toMediaCollection('avatar_image');

            TmpImage::where('filename', $request->avatar)->delete(); // get the tmp image from the db

            $this->log_activity($user, 'updated', 'Avatar', $user->name);

            return back()->with(['success' => 'Profile Updated Successfully']);
        }
        
        return back()->with(['error' => 'Image or Password field is required']);
    }
}
