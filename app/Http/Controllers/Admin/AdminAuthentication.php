<?php

namespace App\Http\Controllers\Admin;

use view;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuthentication extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
}
