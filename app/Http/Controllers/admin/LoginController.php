<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('admin.index');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $user = User::where([
            'uname' => $request->uname,
            'status' => 'a'
        ])->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->route('admin.login-page')->withErrors('notfound', 'Kullanıcı bulunamadı.');
        }

        /* DRY => Dont repeat yourself
        if (!Hash::check($user->password, $request->password)) {
            return redirect()->route('panel.login')->with('error', 'Şifreler uyuşmuyor.');
        }
        */


        Auth::login($user);
        return redirect()->route('admin.index');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login-page');
    }
}
