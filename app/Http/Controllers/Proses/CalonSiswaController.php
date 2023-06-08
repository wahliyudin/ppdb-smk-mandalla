<?php

namespace App\Http\Controllers\Proses;

use App\Enums\Proses\Proses;
use App\Enums\Proses\Status;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
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
            $siswa->proses()->where('proses', Proses::DOKUMEN)->where('status', Status::MENUNGGU)->update([
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
