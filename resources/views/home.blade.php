@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-header border-0">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6">
                        <div class="card-px text-center py-20">
                            <!--begin::Title-->
                            <h2 class="fs-2x fw-bold mb-10">Welcome to Customers App</h2>
                            <!--end::Title-->

                            <!--begin::Description-->
                            <p class="text-gray-400 fs-4 fw-semibold mb-10">
                                There are no customers added yet.<br>
                                Kickstart your CRM by adding a your first customer
                            </p>
                            <!--end::Description-->

                            <!--begin::Action-->
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_customer">Add Customer</a>
                            <!--end::Action-->
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
@endsection
