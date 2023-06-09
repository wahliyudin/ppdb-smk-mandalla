<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SoalController extends Controller
{
    public function index()
    {
        return view('soal.index');
    }

    public function datatable()
    {
        $data = Soal::query()->get();
        return DataTables::of($data)
            ->editColumn('pertanyaan', function (Soal $soal) {
                return $soal->pertanyaan;
            })
            ->editColumn('pilihan_a', function (Soal $soal) {
                return $soal->pilihan_a;
            })
            ->editColumn('pilihan_b', function (Soal $soal) {
                return $soal->pilihan_b;
            })
            ->editColumn('pilihan_c', function (Soal $soal) {
                return $soal->pilihan_c;
            })
            ->editColumn('pilihan_d', function (Soal $soal) {
                return $soal->pilihan_d;
            })
            ->editColumn('jawaban', function (Soal $soal) {
                return $soal->jawaban->label();
            })
            // ->editColumn('status', function (Soal $soal) {
            //     return $soal->status ? '<span class="badge badge-exclusive badge-light-success fw-semibold fs-8 px-2 py-1 ms-1">Aktif</span>' : '<span class="badge badge-exclusive badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1">Tidak Aktif</span>';
            // })
            ->editColumn('status', function (Soal $soal) {
                return '<div class="form-check form-switch form-check-custom form-check-solid">
                <input data-soal="' . $soal->getKey() . '" class="form-check-input" ' . ($soal->status ? 'checked' : '') . ' type="checkbox" name="status" />
            </div>';
            })
            ->editColumn('check', function (Soal $soal) {
                return view('soal.checkbox', compact('soal'))->render();
            })
            ->editColumn('action', function (Soal $soal) {
                return view('soal.action', compact('soal'))->render();
            })
            ->rawColumns(['action', 'check', 'status'])
            ->make();
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'pertanyaan' => 'required',
                'pilihan_a' => 'required',
                'pilihan_b' => 'required',
                'pilihan_c' => 'required',
                'pilihan_d' => 'required',
                'jawaban' => 'required',
            ]);
            Soal::query()->create([
                'pertanyaan' => $request->pertanyaan,
                'pilihan_a' => $request->pilihan_a,
                'pilihan_b' => $request->pilihan_b,
                'pilihan_c' => $request->pilihan_c,
                'pilihan_d' => $request->pilihan_d,
                'jawaban' => $request->jawaban,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Soal $soal)
    {
        try {
            return response()->json($soal);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, Soal $soal)
    {
        try {
            $request->validate([
                'pertanyaan' => 'required',
                'pilihan_a' => 'required',
                'pilihan_b' => 'required',
                'pilihan_c' => 'required',
                'pilihan_d' => 'required',
                'jawaban' => 'required',
            ]);
            $soal->update([
                'pertanyaan' => $request->pertanyaan,
                'pilihan_a' => $request->pilihan_a,
                'pilihan_b' => $request->pilihan_b,
                'pilihan_c' => $request->pilihan_c,
                'pilihan_d' => $request->pilihan_d,
                'jawaban' => $request->jawaban,
            ]);
            return response()->json([
                'message' => 'Berhasil diubah'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function status(Soal $soal)
    {
        try {
            $soal->update([
                'status' => !$soal->status
            ]);
            return response()->json([
                'message' => "Berhasil diubah"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Soal $soal)
    {
        return view('soal.show', compact('soal'));
    }

    public function destroy(Soal $soal)
    {
        try {
            $soal->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
