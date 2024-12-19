<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Tampilkan halaman student.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('student');
    }
}
