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
                url: "/pembayaran/datatable"
            },
            columns: [
                {
                    name: 'check',
                    data: 'check',
                    orderable: false,
                    searchable: false
                },
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
            initToggleToolbar();
            handleDeleteRows();
            toggleToolbars();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-customer-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-customer-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const customerName = parent.querySelectorAll('td')[1].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + customerName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            text: "You have deleted " + customerName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function () {
                            // Remove current row
                            datatable.row($(parent)).remove().draw();
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: customerName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    // Init toggle toolbar
    var initToggleToolbar = () => {
        // Toggle selected action toolbar
        // Select all checkboxes
        const checkboxes = table.querySelectorAll('[type="checkbox"]');

        // Select elements
        const deleteSelected = document.querySelector('[data-kt-customer-table-select="delete_selected"]');

        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
            // Checkbox on click event
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });

        // Deleted selected rows
        deleteSelected.addEventListener('click', function () {
            // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
            Swal.fire({
                text: "Are you sure you want to delete selected customers?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        text: "You have deleted all selected customers!.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    }).then(function () {
                        // Remove all selected customers
                        checkboxes.forEach(c => {
                            if (c.checked) {
                                datatable.row($(c.closest('tbody tr'))).remove().draw();
                            }
                        });

                        // Remove header checked box
                        const headerCheckbox = table.querySelectorAll('[type="checkbox"]')[0];
                        headerCheckbox.checked = false;
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Selected customers was not deleted.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        });
    }

    // Toggle toolbars
    const toggleToolbars = () => {
        // Define variables
        const toolbarBase = document.querySelector('[data-kt-customer-table-toolbar="base"]');
        const toolbarSelected = document.querySelector('[data-kt-customer-table-toolbar="selected"]');
        const selectedCount = document.querySelector('[data-kt-customer-table-select="selected_count"]');

        // Select refreshed checkbox DOM elements
        const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add('d-none');
            toolbarSelected.classList.remove('d-none');
        } else {
            toolbarBase.classList.remove('d-none');
            toolbarSelected.classList.add('d-none');
        }
    }

    var handleDeleteRow = () => {
        $('#pembayaran_table').on('click', '.btn-delete', function () {
            var pembayaran = $(this).data('pembayaran');
            var target = this;
            $(target).attr("data-kt-indicator", "on");
            Swal.fire({
                text: "Are you sure you want to delete ?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: `/pembayaran/${pembayaran}/destroy`,
                        dataType: "JSON",
                        success: function (response) {
                            $(target).removeAttr("data-kt-indicator");
                            Swal.fire({
                                text: "You have deleted !.",
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
                        text: "was not deleted.",
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
    var handleVerifikasiRow = () => {
        $('#pembayaran_table').on('click', '.btn-verifikasi', function () {
            var pembayaran = $(this).data('pembayaran');
            var target = this;
            $(target).attr("data-kt-indicator", "on");
            Swal.fire({
                text: "Are you sure you want to verifikasi ?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, verifikasi!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-success",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: `/pembayaran/${pembayaran}/verifikasi`,
                        dataType: "JSON",
                        success: function (response) {
                            $(target).removeAttr("data-kt-indicator");
                            Swal.fire({
                                text: "You have verifikasi !.",
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
                        text: "was not verifikasi.",
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
    var handleTolakRow = () => {
        $('#pembayaran_table').on('click', '.btn-tolak', function () {
            var pembayaran = $(this).data('pembayaran');
            var target = this;
            $(target).attr("data-kt-indicator", "on");
            Swal.fire({
                text: "Are you sure you want to tolak ?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, tolak!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: `/pembayaran/${pembayaran}/tolak`,
                        dataType: "JSON",
                        success: function (response) {
                            $(target).removeAttr("data-kt-indicator");
                            Swal.fire({
                                text: "You have tolak !.",
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
                        text: "was not tolak.",
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
            table = document.querySelector('#pembayaran_table');

            if (!table) {
                return;
            }

            initCalonSiswaList();
            initToggleToolbar();
            handleSearchDatatable();
            handleDeleteRows();
            handleDeleteRow();
            handleVerifikasiRow();
            handleTolakRow();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCalonSiswasList.init();
});
