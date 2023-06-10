<?php

namespace App\Http\Controllers;

use App\Enums\Proses\Status;
use App\Models\Proses;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $siswa = Siswa::query()->with(['proses', 'tesOnline'])->where('user_id', auth()->user()?->id)->first();
        $proses = Proses::query()->where('siswa_id', $siswa?->getKey())->latest()?->first();
        return view('home', compact('proses', 'siswa'));
    }
}
