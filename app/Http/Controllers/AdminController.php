<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\penilaianBeo;
use App\Models\Users;
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

    public function detailResult(int $id)
    {
        $data = penilaianBeo::where('id_user', $id)->get();

        return view('admin.detail.result', ['data' => $data]);
    }

    public function result(int $item, int $user)
    {

        $data = penilaianBeo::where('id_penilaian', $item)->get();
        $dataUser = Users::where('id', $user)->get();

        return view('result', ['data' => $data[0], 'dataUser' => $dataUser[0]]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/");
    }
}
