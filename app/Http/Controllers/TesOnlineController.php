<?php

namespace App\Http\Controllers;

use App\Enums\Proses\Proses;
use App\Enums\Proses\Status;
use App\Models\Siswa;
use App\Models\SiswaTesOnline;
use App\Models\TesOnline;
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
            $siswa = Siswa::query()->with(['lastProses' => function ($query) {
                $query->where('proses', Proses::TES_ONLINE)->where('status', Status::TOLAK);
            }])->withWhereHas('tesOnline.tesOnlines')->findOrFail($siswaId);
            // if ($siswa?->tesOnline?->kesempatan <= 1 && isset($siswa->lastProses)) {
            //     return to_route('tes-online.thank');
            // }
            $soals = $siswa->tesOnline?->tesOnlines;
            $siswaId = $request->siswa;
            $tglMulai = $siswa->tesOnline?->tgl_mulai;
            $jamMulai = $siswa->tesOnline?->jam_mulai;
            if ($siswa?->tesOnline?->tgl_mulai == null) {
                $siswa->tesOnline()?->update([
                    'tgl_mulai' => now()->format('Y-m-d'),
                    'jam_mulai' => now()->format('H:i:s'),
                ]);
                $tglMulai = now()->format('Y-m-d');
                $jamMulai = now()->format('H:i:s');
            }
            $waktu = Carbon::parse($tglMulai)->format('Y/m/d') . ' ' . Carbon::createFromFormat('H:i:s', $jamMulai)->addMinutes(90)->format('H:i:s');
            return view('tes-online.quiz', compact('soals', 'siswaId', 'waktu'));
        } catch (\Throwable $th) {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        try {
            $siswaId = Crypt::decrypt($request->siswa);
            $tesOnline = SiswaTesOnline::query()->with('tesOnlines')->where('siswa_id', $siswaId)->first();
            foreach ($request->jawab as $key => $value) {
                TesOnline::query()->where('siswa_tes_online_id', $tesOnline->getKey())
                    ->where('soal_id', $key)
                    ->first()->update([
                        'jawaban' => $value
                    ]);
            }
            $siswa = Siswa::query()->with('tesOnline.tesOnlines')->find($siswaId);
            $total = 0;
            foreach ($siswa->tesOnline->tesOnlines as $tes) {
                if ($tes->jawaban->value == $tes->pivot->jawaban) {
                    $total++;
                }
            }
            $persen = ($total / count($siswa->tesOnline->tesOnlines)) * 100;
            if ($persen >= 80) {
                $siswa->proses()->updateOrCreate([
                    'proses' => Proses::TES_ONLINE,
                ], [
                    'proses' => Proses::TES_ONLINE,
                    'status' => Status::VERIFIKASI,
                ]);
            } else {
                if ($siswa->tesOnline?->kesempatan > 1) {
                    $siswa->tesOnline()->update([
                        'tgl_mulai' => null,
                        'jam_mulai' => null,
                        'kesempatan' => ($siswa->tesOnline?->kesempatan - 1 <= 0 ? 0 : ($siswa->tesOnline?->kesempatan - 1))
                    ]);
                } else {
                    $siswa->proses()->updateOrCreate([
                        'proses' => Proses::TES_ONLINE,
                    ], [
                        'proses' => Proses::TES_ONLINE,
                        'status' => Status::TOLAK,
                    ]);
                }
            }
            $tesOnline->update([
                'tgl_selesai' => now()->format('Y-m-d'),
                'jam_selesai' => now()->format('H:i:s'),
                'total_benar' => $total,
                'total_salah' => count($siswa->tesOnline->tesOnlines) - $total,
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
