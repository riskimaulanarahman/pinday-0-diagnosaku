<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('auth.login');
        } else if ($request->method() == 'POST') {
            $user = User::where('email', $request->email)->first();
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if ($user->role == 'doctor') {
                    Auth::login($user);
                    return redirect('/doctor/home');
                } elseif ($user->role == 'patient') {
                    Auth::login($user);
                    return redirect('/patient/home');
                } else {
                    return back()->with('failed', 'Akun anda tidak dapat diidentifikasi, silahkan hubungi Admin!');
                }
            } else {
                return back()->with('failed', 'Username atau Password salah!');
            }
        }
    }

    public function signUp(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('auth.sign-up');
        } else if ($request->method() == 'POST') {
            $user = User::where('email', $request->email)->first();

            if ($user == null) {
                $newUser = new User();
                $newUser->email = $request->email;
                $newUser->password = Hash::make($request->password);
                $newUser->role = 'patient';
                $newUser->save();

                $newPatient = new Patient();
                $newPatient->user_id = $newUser->user_id;
                $newPatient->name = $request->name;
                $newPatient->gender = $request->gender;
                $newPatient->address = $request->address;
                $newPatient->save();

                return redirect('/')->with('success', 'Akun anda berhasil dibuat.');
            } else {
                return back()->with('failed', 'Maaf, Email sudah terdaftar!');
            }
        }
    }

    public function logout() {
        Auth::logout();
        return redirect("/");
    }
}
