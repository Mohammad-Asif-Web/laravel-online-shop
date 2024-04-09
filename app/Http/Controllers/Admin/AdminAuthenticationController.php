<?php

namespace App\Http\Controllers\Admin;

use view;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAuthenticationController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->passes()) {
            $hasUserData = Auth::guard('admin')->attempt([
                                'email'=>$request->email,
                                'password'=>$request->password,
                            ],$request->get('remember'));

            if ($hasUserData) {
                $user = Auth::guard('admin')->user();

                if ($user->role == 2) {
                    return redirect()->route('admin.index');
                } else {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')
                    ->with('error','Your are not authorized to access admin panel');
                }

            } else {
                return redirect()->route('admin.login')->with('error','Either Email/Password is incorrect');
            }

        } else {
            return redirect()->route('admin.login')
            ->withErrors($validator)
            ->withInput($request->only('email','password'));
        }

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')
        ->with('success','You are Logged Out');
    }

}
