<?php

namespace App\Http\Controllers;

use App\Enums\Proses\Proses as ProsesProses;
use App\Enums\Proses\Status;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran.biodata');
    }

    public function store(Request $request)
    {
        try {
            $siswa = Siswa::query()->updateOrCreate([
                'user_id' => auth()->user()?->id,
            ], [
                'user_id' => auth()->user()?->id,
                'nama' => $request->nama_biodata,
                'jenis_kelamin' => $request->jenis_kelamin_biodata,
                'tgl_lahir' => $request->tanggal_lahir_biodata,
                'tempat_lahir' => $request->tempat_lahir_biodata,
            ]);

            $siswa->orangTua()->updateOrCreate([
                'nama_ayah' => $request->nama_ayah,
                'tempat_lahir_ayah' => $request->tempat_lahir_ayah,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'tgl_lahir_ayah' => $request->tanggal_lahir_ayah,
                'no_telp_ayah' => $request->no_telp_ayah,
                'nama_ibu' => $request->nama_ibu,
                'tempat_lahir_ibu' => $request->tempat_lahir_ibu,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'tgl_lahir_ibu' => $request->tanggal_lahir_ibu,
                'no_telp_ibu' => $request->no_telp_ibu,
            ]);

            $data = [];
            if ($request->hasFile('ktp_orang_tua_file')) {
                $data['ijazah'] = $this->storeFile($request->file('ktp_orang_tua_file'));
            }
            if ($request->hasFile('ijazah_file')) {
                $data['kk'] = $this->storeFile($request->file('ijazah_file'));
            }
            if ($request->hasFile('kip_file')) {
                $data['kip'] = $this->storeFile($request->file('kip_file'));
            }
            if ($request->hasFile('pkh_file')) {
                $data['pkh'] = $this->storeFile($request->file('pkh_file'));
            }
            if ($request->hasFile('kks_file')) {
                $data['kks'] = $this->storeFile($request->file('kks_file'));
            }

            $siswa->dokumen()->updateOrCreate($data);

            $siswa->identitas()->updateOrCreate([
                'nisn' => $request->nisn_biodata,
                'nik' => $request->nik_biodata,
                'jumlah_saudara' => $request->jumlah_saudara_biodata,
                'anak_ke' => $request->anak_ke_biodata,
                'agama' => $request->agama_biodata,
                'suku' => $request->suku_biodata,
                'asal_sekolah' => $request->asal_sekolah_biodata,
                'no_ijazah' => $request->no_ijazah_biodata,
                'berat_badan' => $request->berat_badan_biodata,
                'tinggi_badan' => $request->tinggi_badan_biodata,
                'riwayat_penyakit' => $request->riwayat_penyakit_biodata,
            ]);

            $siswa->proses()->updateOrCreate([
                'proses' => ProsesProses::DOKUMEN,
            ], [
                'proses' => ProsesProses::DOKUMEN,
                'status' => Status::MENUNGGU,
            ]);

            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function storeFile(UploadedFile $file)
    {
        $name = Str::random() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/dokumen', $name);
        return $name;
    }
}
