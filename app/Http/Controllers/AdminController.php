<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct() {
        $this->data['currentAdminMenu'] = 'te';
        $this->data['currentAdminSubMenu'] = 'as';
    }
    
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('admin.dashboard', $this->data);
            // return view('admin.dashboard');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'username' => 'Please login to access the dashboard.',
        ])->onlyInput('username');
    }
}
