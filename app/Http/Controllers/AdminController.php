<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect('/admin/login');
    }

    public function dashboard()
    {
        $users = DB::table('users')->get();
        return view('admin.dashboard', ['users' => $users]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/");
    }
}
