<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
        // $user = Auth::guard('admin')->user();
        // echo 'Welcome to Dashboard '.$user->name;
        // echo "<hr>";
        // echo "<a href='".route('admin.logout')."'>Logout</a>";
    }



}
