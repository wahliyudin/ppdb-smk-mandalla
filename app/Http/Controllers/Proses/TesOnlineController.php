<?php

namespace App\Http\Controllers\Proses;

use App\Enums\Proses\Proses;
use App\Enums\Proses\Status;
use App\Http\Controllers\Controller;
use App\Jobs\TesOnline;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class TesOnlineController extends Controller
{
    public function index()
    {
        return view('proses.tes-online.index');
    }

    public function datatable()
    {
        $data = Siswa::query()
            ->withWhereHas('proses', function ($query) {
                $query->where('proses', Proses::TES_ONLINE)->whereIn('status', [Status::MENUNGGU, Status::TOLAK]);
            })->get();
        return DataTables::of($data)
            ->editColumn('status', function (Siswa $siswa) {
                return $siswa->proses?->first()?->status == Status::TOLAK ? '<span class="badge badge-exclusive badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1">Tidak Lulus</span>' : '<span class="badge badge-exclusive badge-light-warning fw-semibold fs-8 px-2 py-1 ms-1">Menunggu</span>';
            })
            ->editColumn('jenis_kelamin', function (Siswa $siswa) {
                return $siswa->jenis_kelamin->label();
            })
            ->editColumn('action', function (Siswa $siswa) {
                return view('proses.tes-online.action', compact('siswa'))->render();
            })
            ->rawColumns(['action', 'check', 'status'])
            ->make();
    }

    public function resend(Siswa $siswa)
    {
        try {
            $tesOnline = URL::temporarySignedRoute(
                'tes-online.mulai',
                now()->addDays(3),
                ['siswa' => Crypt::encrypt($siswa->getKey())]
            );
            dispatch(new TesOnline($siswa->user?->email, $tesOnline));
            return response()->json([
                'message' => 'Berhasil dikirim'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Siswa $siswa)
    {
        return view('proses.tes-online.show', compact('siswa'));
    }

    public function verifikasi(Siswa $siswa)
    {
        try {
            $siswa->proses()->where('proses', Proses::TES_ONLINE)->where('status', Status::MENUNGGU)->update([
                'status' => Status::VERIFIKASI
            ]);
            $siswa->proses()->create([
                'proses' => Proses::PEMBAYARAN,
                'status' => Status::MENUNGGU,
            ]);
            return response()->json([
                'message' => 'Berhasil di verifikasi'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function tolak(Siswa $siswa)
    {
        try {
            $siswa->proses()->where('proses', Proses::TES_ONLINE)->where('status', Status::MENUNGGU)->update([
                'status' => Status::TOLAK
            ]);
            return response()->json([
                'message' => 'Berhasil di tolak'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
