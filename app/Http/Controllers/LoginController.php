<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {
            $username = $request->input('username');
            $password = $request->input('password');
            $rules = [
                'username' => 'required|string',
                'password' => 'required|string',
            ];
            $this->validate($request, $rules);

            $user = DB::table('user')
                ->where('username', $username)
                ->where('password', $password)
                ->first();
            if ($user) {
                Auth::loginUsingId($user->id);
                return redirect('translation');

            } else {
                return back()->withErrors('Incorrect username or password.');
            }
        }
        return view('auth.login');
    }
}
