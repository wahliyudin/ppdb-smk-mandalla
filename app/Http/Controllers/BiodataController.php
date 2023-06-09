<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        $siswa = auth()->user()?->siswa;
        $isCompleted = isset($siswa);
        return view('biodata.index', compact('isCompleted', 'siswa'));
    }
}
