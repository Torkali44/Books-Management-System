<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // إضافة هذا السطر لاستخدام الـ Auth facade

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = $this->handleRegister($request);

        if ($user) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back();
        }
    }

    private function handleRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // استخدام Auth::attempt بدلاً من AuthController::attempt
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'تم تسجيل الدخول بنجاح!');
        }

        return back()->withErrors(['email' => 'بيانات تسجيل الدخول غير صحيحة']);
    }

    // تنفيذ تسجيل الخروج
    public function logout()
    {
        Auth::logout(); // استخدام Auth::logout بدلاً من AuthController::logout
        return redirect()->route('login.form')->with('success', 'تم تسجيل الخروج!');
    }
}
