"use strict";

// Class definition
var KTModalCustomersAdd = function () {
    var submitButton;
    var cancelButton;
    var closeButton;
    var validator;
    var form;
    var modal;

    // Init form inputs
    var handleForm = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'pertanyaan': {
                        validators: {
                            notEmpty: {
                                message: 'Pertanyaan wajib diisi'
                            }
                        }
                    },
                    'pilihan_a': {
                        validators: {
                            notEmpty: {
                                message: 'Pilihan A wajib diisi'
                            }
                        }
                    },
                    'pilihan_b': {
                        validators: {
                            notEmpty: {
                                message: 'Pilihan B wajib diisi'
                            }
                        }
                    },
                    'pilihan_c': {
                        validators: {
                            notEmpty: {
                                message: 'Pilihan C wajib diisi'
                            }
                        }
                    },
                    'pilihan_d': {
                        validators: {
                            notEmpty: {
                                message: 'Pilihan D wajib diisi'
                            }
                        }
                    },
                    'jawaban': {
                        validators: {
                            notEmpty: {
                                message: 'Jawaban wajib diisi'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Action buttons
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        var kode = $(submitButton).data('soal');
                        // Disable submit button whilst loading
                        submitButton.disabled = true;
                        $.ajax({
                            type: kode ? "PUT" : "POST",
                            url: kode ? `/soal/${kode}/update` : "/soal/store",
                            data: {
                                pertanyaan: $($(form).find('textarea[name="pertanyaan"]')).val(),
                                pilihan_a: $($(form).find('input[name="pilihan_a"]')).val(),
                                pilihan_b: $($(form).find('input[name="pilihan_b"]')).val(),
                                pilihan_c: $($(form).find('input[name="pilihan_c"]')).val(),
                                pilihan_d: $($(form).find('input[name="pilihan_d"]')).val(),
                                jawaban: $($(form).find('select[name="jawaban"]')).val(),
                            },
                            dataType: "JSON",
                            success: function (response) {
                                submitButton.removeAttribute('data-kt-indicator');
                                Swal.fire({
                                    text: response.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function (result) {
                                    if (result.isConfirmed) {
                                        modal.hide();
                                        submitButton.disabled = false;
                                        location.reload();
                                    }
                                });
                            },
                            error: handleError
                        });
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

        closeButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        })
    }

    var handleError = function (jqXHR) {
        if (jqXHR.status == 422) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan!',
                text: JSON.parse(jqXHR.responseText).message,
            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: jqXHR.responseText,
            })
        }
    };

    var buttonCreate = () => {
        $('[data-bs-target="#create-soal"]').on('click', function () {
            $($(form).find('textarea[name="pertanyaan"]')).val('');
            $($(form).find('input[name="pilihan_a"]')).val('');
            $($(form).find('input[name="pilihan_b"]')).val('');
            $($(form).find('input[name="pilihan_c"]')).val('');
            $($(form).find('input[name="pilihan_d"]')).val('');
            $($(form).find('select[name="jawaban"]')).val('');
            $(submitButton).data('soal', '');
        });
    }
    var buttonEdit = () => {
        $('#soal_table').on('click', '.btn-edit', function () {
            var target = this;
            $(target).attr("data-kt-indicator", "on");
            var soal = $(this).data('soal');
            $(submitButton).data('soal', soal);
            $.ajax({
                type: "POST",
                url: `/soal/${soal}/edit`,
                dataType: "JSON",
                success: function (response) {
                    $($(form).find('textarea[name="pertanyaan"]')).val(response.pertanyaan);
                    $($(form).find('input[name="pilihan_a"]')).val(response.pilihan_a);
                    $($(form).find('input[name="pilihan_b"]')).val(response.pilihan_b);
                    $($(form).find('input[name="pilihan_c"]')).val(response.pilihan_c);
                    $($(form).find('input[name="pilihan_d"]')).val(response.pilihan_d);
                    $($(form).find('select[name="jawaban"]')).val(response.jawaban).trigger('change');
                    $(target).removeAttr("data-kt-indicator");
                    modal.show();
                },
                error: handleError
            });
        });
    }

    return {
        // Public functions
        init: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#create-soal'));

            form = document.querySelector('#create-soal_form');
            submitButton = form.querySelector('#create-soal_submit');
            cancelButton = form.querySelector('#create-soal_cancel');
            closeButton = form.querySelector('#create-soal_close');

            handleForm();
            buttonCreate();
            buttonEdit();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalCustomersAdd.init();
});
