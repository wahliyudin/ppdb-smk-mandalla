<?php

namespace App\Http\Controllers\Proses;

use App\Enums\Proses\Proses;
use App\Enums\Proses\Status;
use App\Http\Controllers\Controller;
use App\Jobs\TesOnline;
use App\Models\Siswa;
use App\Models\SiswaTesOnline;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class CalonSiswaController extends Controller
{
    public function index()
    {
        return view('proses.calon-siswa.index');
    }

    public function datatable()
    {
        $data = Siswa::query()
            ->whereHas('proses', function ($query) {
                $query->where('proses', Proses::DOKUMEN)->where('status', Status::MENUNGGU);
            });
        return DataTables::of($data)
            ->editColumn('jenis_kelamin', function (Siswa $siswa) {
                return $siswa->jenis_kelamin->label();
            })
            ->editColumn('check', function (Siswa $siswa) {
                return view('proses.calon-siswa.checkbox', compact('siswa'))->render();
            })
            ->editColumn('action', function (Siswa $siswa) {
                return view('proses.calon-siswa.action', compact('siswa'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make();
    }

    public function show(Siswa $siswa)
    {
        return view('proses.calon-siswa.show', compact('siswa'));
    }


    public function verifikasi(Siswa $siswa)
    {
        try {
            $siswa->proses()->where('proses', Proses::DOKUMEN)->where('status', Status::MENUNGGU)->update([
                'status' => Status::VERIFIKASI
            ]);
            $siswa->proses()->create([
                'proses' => Proses::TES_ONLINE,
                'status' => Status::MENUNGGU,
            ]);
            $tesOnline = $siswa->tesOnline()->create([
                'kesempatan' => SiswaTesOnline::KESEMPATAN
            ]);
            $soals = Soal::query()->where('status', true)->pluck('id')->toArray();
            $tesOnline->tesOnlines()->sync($soals);
            $tesOnline = URL::temporarySignedRoute(
                'tes-online.mulai',
                now()->addDays(3),
                ['siswa' => Crypt::encrypt($siswa->getKey())]
            );
            dispatch(new TesOnline($siswa->user?->email, $tesOnline));
            return response()->json([
                'message' => 'Berhasil di verifikasi'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function tolak(Request $request, Siswa $siswa)
    {
        try {
            $siswa->proses()->where('proses', Proses::DOKUMEN)->where('status', Status::MENUNGGU)->update([
                'status' => Status::TOLAK,
                'alasan' => $request->notes
            ]);
            return response()->json([
                'message' => 'Berhasil di tolak'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
