<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        $isCompleted = isset(auth()->user()?->siswa);
        return view('biodata.index', compact('isCompleted'));
    }
}
