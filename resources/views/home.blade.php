@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    @role('siswa')
        <div class="card">
            <div class="card-header border-0">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            <div class="text-center py-20">
                                <!--begin::Title-->
                                <h2 class="fs-2x fw-bold mb-10">Welcome to {{ env('APP_NAME') }}</h2>
                                <!--end::Title-->

                                <!--begin::Description-->
                                <div
                                    class="notice text-start d-flex bg-light-warning rounded border-warning border border-dashed  p-6 mb-7">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span
                                            class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    <!--end::Icon-->

                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1 ">
                                        <!--begin::Content-->
                                        <div class=" fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">Peringatan!</h4>

                                            @switch($proses?->proses)
                                                @case(\App\Enums\Proses\Proses::TES_ONLINE)
                                                    <div class="fs-6 text-gray-700">Anda belum mengerjakan soal tes online!</div>
                                                @break

                                                @case(\App\Enums\Proses\Proses::PEMBAYARAN)
                                                    <div class="fs-6 text-gray-700">Anda belum melakukan pembayaran biaya pendaftaran!
                                                    </div>
                                                @break

                                                @case(\App\Enums\Proses\Proses::DOKUMEN)
                                                    <div class="fs-6 text-gray-700">Biodata Anda sedang di verifikasi!</div>
                                                @break

                                                @default
                                                    <div class="fs-6 text-gray-700">Anda belum melengkapi biodata!</div>
                                            @endswitch
                                        </div>
                                        <!--end::Content-->

                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Description-->

                                @switch($proses?->proses)
                                    @case(\App\Enums\Proses\Proses::TES_ONLINE)
                                        <a href="{{ route('biodata.index') }}" class="btn btn-primary">Kerjakan Soal Sekarang</a>
                                    @break

                                    @case(\App\Enums\Proses\Proses::PEMBAYARAN)
                                        <a href="{{ route('biodata.index') }}" class="btn btn-primary">Bayar Sekarang</a>
                                    @break

                                    @case(\App\Enums\Proses\Proses::DOKUMEN)
                                        <a href="{{ route('biodata.index') }}" class="btn btn-primary">Lihat Biodata</a>
                                    @break

                                    @default
                                        <a href="{{ route('pendaftaran.index') }}" class="btn btn-primary">Lengkapi Biodata Sekarang</a>
                                @endswitch
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img style="width: 100%; height: auto;" src="assets/media/illustrations/dozzy-1/7.png"
                                alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
@endsection
