<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $user = Auth::user();

        // Kirim data role ke view
        return view('dashboard', [
            'role' => $user->role,
        ]);
    }
}
