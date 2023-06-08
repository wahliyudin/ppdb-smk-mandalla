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
            ->editColumn('check', function (Siswa $siswa) {
                return view('proses.calon-siswa.checkbox', compact('siswa'))->render();
            })
            ->editColumn('action', function (Siswa $siswa) {
                return view('proses.calon-siswa.action', compact('siswa'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make();
    }
}
