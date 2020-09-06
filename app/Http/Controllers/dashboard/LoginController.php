<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard.auth.login');
    }

    public function loginPost(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->hasRole('admin') == 'true' || $user->hasRole('super_admin') == 'true') {

                if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                    $user = Auth::user();

                    return redirect()->route('dashboard');
                }else{
                    return redirect()->route('admin.login');
                }
            }else{
                return redirect()->route('admin.login');

            }
        }
    }
}
