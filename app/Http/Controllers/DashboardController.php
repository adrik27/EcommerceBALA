<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        if (auth()->user()->role_id == '2') {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        }
        return view('dashboard.index', [
            'tittlePage'    =>  "Dashboard " . strtoupper(auth()->user()->nama)
        ]);
    }
}
