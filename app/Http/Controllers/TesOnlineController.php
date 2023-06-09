<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\SiswaTesOnline;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TesOnlineController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (!$request->hasValidSignature()) {
                abort(403);
            }
            $siswaId = Crypt::decrypt($request->siswa);
            $siswa = Siswa::query()->withWhereHas('tesOnline.tesOnlines')->findOrFail($siswaId);
            if ($siswa?->tesOnline?->tgl_selesai != null) {
                return to_route('tes-online.thank');
            }
            $soals = $siswa->tesOnline?->tesOnlines;
            $siswaId = $request->siswa;
            if ($siswa?->tesOnline?->tgl_mulai == null) {
                $siswa->tesOnline()?->update([
                    'tgl_mulai' => now()->format('Y-m-d'),
                    'jam_mulai' => now()->format('H:i:s'),
                ]);
            }
            $waktu = Carbon::parse($siswa->tesOnline?->tgl_mulai)->format('Y/m/d') . ' ' . Carbon::createFromFormat('H:i:s', $siswa->tesOnline?->jam_mulai)->addMinutes(90)->format('H:i:s');
            return view('tes-online.quiz', compact('soals', 'siswaId', 'waktu'));
        } catch (\Throwable $th) {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        try {
            $siswaId = Crypt::decrypt($request->siswa);
            $tesOnline = SiswaTesOnline::query()->where('siswa_id', $siswaId)->first();
            foreach ($request->jawab as $key => $value) {
                $tesOnline->tesOnlines()->updateOrCreate([
                    'soal_id' => $key
                ], [
                    'jawaban' => $value
                ]);
            }
            $tesOnline->update([
                'tgl_selesai' => now()->format('Y-m-d'),
                'jam_selesai' => now()->format('H:i:s'),
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function thank()
    {
        return view('tes-online.thank');
    }
}
