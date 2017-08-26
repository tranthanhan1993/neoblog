<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        
        return view('frontend.user.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();

        return view('frontend.user.edit-profile', compact('user'));
    }

    public function updateProfile(ProfileRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if (isset($request->avatar)) {
            $fileName = $this->uploadAvatar(null);
        } else {
            $fileName = config('settings.avatar_default');
        }

        $user->name = $request->name;
        $user->email = Auth::user()->email;
        $user->avatar = $fileName;
        $user->password = $request->password;

        if ($user->save()) {
            return redirect('profile')->withSuccess('Update profile success');
        }
    }

    public function uploadAvatar($oldImage)
    {
        $file = Input::file('avatar');
        // dd(base_path() . config('settings.avatar_path'));
        $destinationPath = base_path() . config('settings.avatar_path');
        $fileName = uniqid(rand(), true) . '.' . $file->getClientOriginalExtension();
        Input::file('avatar')->move($destinationPath, $fileName);
        if (!empty($oldImage) && file_exists($oldImage)) {
            File::delete($oldImage);
        }

        return $fileName;
    }
}
