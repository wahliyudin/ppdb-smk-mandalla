"use strict";

// Class definition
var KTCalonSiswasList = function () {
    // Define shared variables
    var datatable;
    var filterMonth;
    var filterPayment;
    var table

    // Private functions
    var initCalonSiswaList = function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[5].innerHTML, "DD MMM YYYY, LT").format(); // select date from 5th column in table
            dateRow[5].setAttribute('data-order', realDate);
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            processing: true,
            serverSide: true,
            order: [[1, 'asc']],
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                className: 'row-selected'
            },
            ajax: {
                type: "POST",
                url: "/tes-online/datatable"
            },
            columns: [
                {
                    name: 'nama',
                    data: 'nama',
                },
                {
                    name: 'jenis_kelamin',
                    data: 'jenis_kelamin',
                },
                {
                    name: 'action',
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        datatable.on('draw', function () {
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-customer-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    var handleResendRow = () => {
        $('#tes_online_table').on('click', '.btn-resend', function () {
            var siswa = $(this).data('siswa');
            var target = this;
            $(target).attr("data-kt-indicator", "on");
            Swal.fire({
                text: "Are you sure you want to resend ?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, resend!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-success",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: `/tes-online/${siswa}/resend`,
                        dataType: "JSON",
                        success: function (response) {
                            $(target).removeAttr("data-kt-indicator");
                            Swal.fire({
                                text: "You have resend !.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function () {
                                datatable.ajax.reload();
                            });
                        },
                        error: function (jqXHR) {
                            if (jqXHR.status == 422) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Peringatan!',
                                    text: JSON.parse(jqXHR.responseText).message,
                                }).then(function () {
                                    $(target).removeAttr("data-kt-indicator");
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: jqXHR.responseText,
                                }).then(function () {
                                    $(target).removeAttr("data-kt-indicator");
                                });
                            }
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "was not resend.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    }).then(function () {
                        $(target).removeAttr("data-kt-indicator");
                    });
                }
            });

        });
    }

    // Public methods
    return {
        init: function () {
            table = document.querySelector('#tes_online_table');

            if (!table) {
                return;
            }

            initCalonSiswaList();
            handleSearchDatatable();
            handleResendRow();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCalonSiswasList.init();
});
