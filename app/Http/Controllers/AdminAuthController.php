<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    private $adminUsers = [
        [
            'email' => 'admin@office.gov',
            'password' => 'admin123',
            'name' => 'System Administrator',
            'role' => 'Super Admin'
        ],
        [
            'email' => 'manager@office.gov',
            'password' => 'manager123',
            'name' => 'Office Manager',
            'role' => 'Manager'
        ],
        [
            'email' => 'clerk@office.gov',
            'password' => 'clerk123',
            'name' => 'Office Clerk',
            'role' => 'Clerk'
        ]
    ];

    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        foreach ($this->adminUsers as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                session([
                    'admin_logged_in' => true,
                    'admin_user' => $user
                ]);
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors(['login' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect()->route('admin.login');
    }
}