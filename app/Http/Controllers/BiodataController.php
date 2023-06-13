<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        $siswa = auth()->user()?->siswa;
        $isCompleted = isset($siswa);
        return view('biodata.index', compact('isCompleted', 'siswa'));
    }

    public function edit(Siswa $siswa)
    {
        $siswa->load(['orangTua', 'dokumen', 'identitas']);
        return view('biodata.edit', compact('siswa'));
    }
}
