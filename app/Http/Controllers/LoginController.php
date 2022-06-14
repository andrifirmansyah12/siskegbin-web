<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('admin.login.index');
    }

    public function loginAdmin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|min:6|max:50',
        ], [
            'email.required' => 'Email diperlukan!',
            'password.required' => 'Kata sandi diperlukan!',
        ]);

        $credentials = $request->except(['_token']);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = User::where('email', $request->email)->first();
            if($user){
                if(Hash::check($request->password, $user->password)) {
                    if (auth()->attempt($credentials)) {
                        if (auth()->check() && $user->hasRole('admin')) {
                            return response()->json([
                                'status' => 200,
                                'messages' => 'Berhasil Masuk',
                            ]);
                        } else {
                            \Auth::logout();
                            return response()->json([
                                'status' => 401,
                                'messages' => 'Hak akses hanya untuk Admin!'
                            ]);
                        }
                    } else {
                        return response()->json([
                            'status' => 401,
                            'messages' => 'Kredensial tidak valid!'
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 401,
                        'messages' => 'Email atau Kata Sandi salah!',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'Akun tidak ditemukan!'
                ]);
            }
        }
    }

    public function forgotPassword() {
        return view('admin.login.password.forgot');
    }

    public function forgotPasswordEmail(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = DB::table('users')->where('email', $request->email)->first();

            if ($user) {
                return response()->json([
                    'status' => 200,
                    'messages' => ''
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'Email ini tidak terdaftar pada kami!'
                ]);
            }
        }
    }

    public function reset() {
        return view('admin.login.password.reset');
    }

    public function resetPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'npass' => 'required|min:6|max:50',
            'cnpass' => 'required|min:6|max:50|same:npass',
        ], [
            'cnpass.same' => 'Kata sandi tidak cocok!',
            'npass.required' => 'Kata sandi diperlukan!',
            'npass.min' => 'Kata sandi harus minimal 6 karakter!',
            'npass.max' => 'Kata sandi maksimal 50 karakter!',
            'cnpass.required' => 'Konfirmasi kata sandi diperlukan!',
            'cnpass.min' => 'Kata sandi harus minimal 6 karakter!',
            'cnpass.max' => 'Kata sandi maksimal 50 karakter!',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            User::where('email', $request->email)->update([
                'password' => Hash::make($request->npass),
            ]);

            return response()->json([
                'status' => 200,
                'success' => '<span>Klik disini untuk <a href="/admin/login" class="text-decoration" style="font-weight: bold; color: black;">Masuk Sekarang!</a></span>',
                'messages' => 'Kata Sandi Baru Diperbarui!'
            ]);
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        return redirect()->route('home');
    }
}
