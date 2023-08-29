<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Users;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     function postSignUp(Request $request){
        $data = 'WOIIIIIIIIIIIIIIIIIIIIIIII';
    
        
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $passwordcrpyt = bcrypt($validate['password']);

        
        // if ($validate && $validate['password'] == $validate['confirm_password']){
        //     $passwordcrpyt = bcrypt($validate['password']);
            
        $createMember = Users::create([
            'username' => $validate['username'],
            // 'email' => $validate['email'],
            'password' => $passwordcrpyt
            // tambahan
            // 'access_group_id' => 0 , 
            // 'created_id' => 0 , 
            // 'updated_id' => 0
        ]);

            // if ($createMember){
            //     return redirect()->route('login')->with('success', 'Sign Up berhasil! Silakan login.');
            // } else {
            //     return redirect()->back()->with('error', 'Sign Up Failed.');
            // }
            
            if ($createMember) {
                // echo '<script>alert("Sign Up berhasil! Silakan login.");</script>';
                echo '<script>window.location.href = "'.route('consent').'";</script>';
            } else {
                return dd($data);
                // echo '<script>alert("Sign Up Failed.");</script>';
                echo '<script>window.history.back();</script>';
            }
            

        // } else {
        //     return redirect()->back();
        // }
    }

    function postSignIn(Request $request){
        $data = 'WOIIIIIIIIIIIIIIIIIIIIIIII';
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        //return dd($validated);

        $signInFailed = true;

        if (Auth::guard('web')->attempt(['username' => $validated['username'], 'password' => $validated['password']])){
            return redirect()->route('consent');
            // echo '<script>alert("Login Berhasil.");</script>';
            echo '<script>window.location.href = "'.route('consent').'";</script>';

            // return redirect()->route('consent');
        } else {
            //return dd($validated);
            $lastAttempted = Auth::guard('web')->getLastAttempted();
            $attemptedCredentials = Auth::guard('web')->getAttempted();
            
            // Check if you're getting the expected values in the above variables
            dd($lastAttempted, $attemptedCredentials);
            echo '<script>window.location.href = "'.route('login').'";</script>';
            // return back()->with('signInFailed', $signInFailed);
            // return back()->with('error', 'Sign In Failed.');
            
        }
    }

    // function handlePost($email){
    //     if (Auth::guard('web')->attempt(['email' => $email, 'password' => 'default'])){
    //         // echo '<script>alert("Login Berhasil.");</script>';
    //         echo '<script>window.location.href = "'.route('getCourse').'";</script>';

    //         // return redirect()->route('getHomepage');
    //     } else {
    //         // return back()->with('error', 'Sign In Failed.');
    //         // echo '<script>alert("Error , Sign In Failed.");</script>';
    //         echo '<script>window.history.back();</script>';
    //     }
    // }
    public function __invoke(Request $request)
    {
        //
    }
}
