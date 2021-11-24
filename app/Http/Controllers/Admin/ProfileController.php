<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        return view('admin.profile.index',compact('user'));
    }
    public function edit(Request $request)
    {
        $user = Auth::user();
        return view('admin.profile.edit',compact('user'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = Auth::user();
        
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/images'), $imageName);
        }
        $user = User::findOrFail($user->id);
        unset($request->_token);
        if($user){
            $user->update(['name'=> $request->name]);
            $profile = Profile::where('user_id',$user->id)->firstOrFail();
            if($profile){
                $profile->update(['image'=> $imageName]);
            }
        }
        return redirect()->route('profile.edit')
                        ->with('success','Profile updated successfully');
    }
}
