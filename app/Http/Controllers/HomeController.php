<?php

namespace App\Http\Controllers;

use App\Enums\Proses\Proses as ProsesProses;
use App\Enums\Proses\Status;
use App\Models\Proses;
use App\Models\Siswa;
use App\Models\SiswaPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function store(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required',
            ]);
            $siswa = auth()->user()?->siswa;
            if ($request->hasFile('file')) {
                if ($siswa->pembayaran?->file) {
                    Storage::delete('public/pembayaran/' . $siswa->pembayaran?->file);
                }
                $file = $request->file('file');
                $fileName = Str::random() . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/pembayaran', $fileName);
                SiswaPembayaran::query()->updateOrCreate([
                    'siswa_id' => $siswa?->id,
                ], [
                    'bukti' => $fileName,
                ]);
            }
            $siswa->proses()->updateOrCreate([
                'proses' => ProsesProses::PEMBAYARAN,
            ], [
                'status' => Status::MENUNGGU,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
