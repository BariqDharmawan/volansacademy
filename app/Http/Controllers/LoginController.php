<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxlogin(Request $request)
    {
        $email      = $request->input('email');
        $password   = $request->input('password');

        if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil login!'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal!'
            ], 200);
        }

    }
}