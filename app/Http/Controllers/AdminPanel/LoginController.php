<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($credentials->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Username dan password harus diisi.',
            ]);
        } else {
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials, $request->remember)) {
                $request->session()->regenerate();

                return response()->json([
                    'status' => 200,
                    'message' => 'Log in berhasil.'
                ]);
            }
            return response()->json([
                'status' => 400,
                'message' => 'Username atau password salah.'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
