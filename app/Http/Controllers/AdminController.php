<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function logout()
    {
        Log::newLog('Logout',Auth::user()->name);
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
}
