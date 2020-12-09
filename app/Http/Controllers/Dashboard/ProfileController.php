<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($id)
    {
        $profile = Profile::with(['admin'=>function($q){
            $q->select('name', 'email', 'active', 'id');
        }])->find($id);
        $profile->admin->makeHidden('id');

        return view('admin.users.profile', compact('profile'));
    }

    public function profileUpdate(Request $request,Profile $profile)
    {
        $this->validate($request,[
            'gender'=> 'required',
            'name'=> 'required|string',
            'email'=> 'required',
            'phone'=> 'required',
        ]);
        return $request;
        $profile->update([
            'phone' => $request->phone,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'address' => $request->address,
            'bio' => $request->bio,
            'gender' => $request->gender
        ]);
        $profile->admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        //if($profile && $profile->admin)
            

    }
}
