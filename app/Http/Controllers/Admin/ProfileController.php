<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
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
}
