<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function profile() {
        return view('user.profile')->with('user', Auth::user());
    }

    public function postProfile(Request $request) {
        $messages = [
            'required' => 'No file selected',
        ];
        $this->validate($request, [
            'image' => 'required'
        ], $messages);

        if($request->hasFile('image')){
            $user = Auth::user();

            $current = $user->avatar;

            $avatar = $request->file('image');

            $fileName = time().'.'.$avatar->getClientOriginalExtension();


            $img = Image::make($avatar);

            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->crop(300, 300, 0, 0);
            $img->save( public_path('/uploads/avatars/'. $fileName) );


            $user->avatar = $fileName;
            $user->save();

            if($current != 'default.jpg'){
                $process = Storage::disk('avatar')->exists($current)?Storage::disk('avatar')->delete($current):'';
            }

            return view('user.profile')->with('user', Auth::user());
        }
    }
}
