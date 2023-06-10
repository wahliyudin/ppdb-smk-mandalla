<?php

namespace App\Http\Controllers;

use App\Enums\Proses\Proses;
use App\Enums\Proses\Status;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index');
    }

    public function datatable()
    {
        $data = Siswa::query()->whereHas('proses', function ($query) {
            $query->where('proses', Proses::PEMBAYARAN)->where('status', Status::VERIFIKASI);
        })->get();
        return DataTables::of($data)
            ->editColumn('jenis_kelamin', function (Siswa $siswa) {
                return $siswa->jenis_kelamin->label();
            })
            ->editColumn('check', function (Siswa $siswa) {
                return view('siswa.checkbox', compact('siswa'))->render();
            })
            ->editColumn('action', function (Siswa $siswa) {
                return view('siswa.action', compact('siswa'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make();
    }

    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    public function destroy(Siswa $siswa)
    {
        try {
            $siswa->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
