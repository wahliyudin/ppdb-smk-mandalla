<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Online</title>
    <!-- FontAwesome-cdn include -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend/quiz/css/all.min.css') }}">
    <!-- Google fonts include -->
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800&amp;family=Sen:wght@400;700;800&amp;display=swap"
        rel="stylesheet">
    <!-- Bootstrap-css include -->
    <link rel="stylesheet" href="{{ asset('frontend/quiz/css/bootstrap.min.css') }}">
    <!-- Animate-css include -->
    <link rel="stylesheet" href="{{ asset('frontend/quiz/css/animate.min.css') }}">
    <!-- Main-StyleSheet include -->
    <link rel="stylesheet" href="{{ asset('frontend/quiz/css/style.css') }}">
    <style>
        @media screen and (max-width: 767.98px) {

            .count_number .count_hours:after,
            .count_number .count_min:after,
            .count_number .count_sec:after {
                top: 50% !important;
                right: 66px !important;
            }

            .count_number .count_hours:before,
            .count_number .count_min:before,
            .count_number .count_sec:before {
                top: 50% !important;
                left: 68px !important;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Top content -->
        <div class="container">
            <div class="row">
                <div class="col-6 d-none d-md-block">
                    <div class="logo_area ps-5 pt-5">
                        <a href="index-2.html">
                            <img src="{{ asset('frontend/quiz/images/logo.png') }}" alt="image-not-found">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 pt-5">
                    <div
                        class="count_box pe-3 me-5 rounded-pill d-flex align-items-center justify-content-center float-end">
                        <div class="count_clock ps-2">
                            <img src="{{ asset('frontend/quiz/images/clock.png') }}" alt="image-not-found">
                        </div>
                        <div class="count_title">
                            <h4 class="ps-1">Quiz</h4>
                            <span class="px-1">Time start</span>
                        </div>
                        <div class="count_number rounded-pill px-3 d-flex justify-content-around align-items-center position-relative overflow-hidden countdown_timer"
                            data-countdown="{{ $waktu }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <form class="multisteps_form mt-4 overflow-hidden position-relative" id="wizard" method="POST">
                <!------------------------- Step-1 ----------------------------->
                <input type="hidden" name="siswa" value="{{ $siswaId }}">
                @foreach ($soals as $soal)
                    <div class="multisteps_form_panel">
                        <div class="question_title">
                            <h1 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">
                                {{ $soal->pertanyaan }}</h1>
                        </div>
                        <div class="row pt-3">
                            <ul class="text-center">
                                <li
                                    class="position-relative step_{{ $loop->iteration }} d-inline-block animate__animated animate__fadeInRight animate_50ms ">
                                    <input id="opt_1" type="radio" name="jawab[{{ $soal->getKey() }}]"
                                        value="a">
                                    <label for="opt_1">{{ $soal->pilihan_a }}</label>
                                    <span class="position-absolute">A</span>
                                </li>
                                <li
                                    class="step_{{ $loop->iteration }} position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms">
                                    <input id="opt_2" type="radio" name="jawab[{{ $soal->getKey() }}]"
                                        value="b" checked>
                                    <label for="opt_2">{{ $soal->pilihan_b }}</label>
                                    <span class="position-absolute">B</span>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <ul class="text-center">
                                <li
                                    class="step_{{ $loop->iteration }} position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms">
                                    <input id="opt_3" type="radio" name="jawab[{{ $soal->getKey() }}]"
                                        value="c">
                                    <label for="opt_3">{{ $soal->pilihan_c }}</label>
                                    <span class="position-absolute">C</span>
                                </li>
                                <li
                                    class="step_{{ $loop->iteration }} position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms">
                                    <input id="opt_4" type="radio" name="jawab[{{ $soal->getKey() }}]"
                                        value="d">
                                    <label for="opt_4">{{ $soal->pilihan_d }}</label>
                                    <span class="position-absolute">D</span>
                                </li>
                            </ul>
                            <!-- Progress bar -->
                            <div class="step_progress position-absolute text-center step">
                                <span class="text-capitalize">question {{ $loop->iteration }} /
                                    {{ count($soals) }}</span>
                                <div class="progress rounded-pill">
                                    <div class="progress-bar rounded-pill" role="progressbar"
                                        style="width: {{ ($loop->iteration / count($soals)) * 100 }}%"
                                        aria-valuenow="{{ ($loop->iteration / count($soals)) * 100 }}"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!---------- Form Button ---------->
                <button type="button" class="f_btn prev_btn text-uppercase position-absolute" id="prevBtn"
                    onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> Last Question</button>
                <button type="button" class="f_btn next_btn text-uppercase position-absolute" id="nextBtn"
                    onclick="nextPrev(1)">Next Question</button>
            </form>
        </div>
    </div>
    <!-- jQuery-js include -->
    <script src="{{ asset('frontend/quiz/js/jquery-3.6.0.min.js') }}"></script>
    <!-- jquery-count-down include -->
    <script src="{{ asset('frontend/quiz/js/countdown.js') }}"></script>
    <!-- Bootstrap-js include -->
    <script src="{{ asset('frontend/quiz/js/bootstrap.min.js') }}"></script>
    <!-- jQuery-validate-js include -->
    <script src="{{ asset('frontend/quiz/js/jquery.validate.min.js') }}"></script>
    <!-- Custom-js include -->
    <script src="{{ asset('frontend/quiz/js/script.js') }}"></script>
    <!-- <script type="text/javascript">
        $('#getting-started').countdown('2020/07/25', function(event) {
            $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
        });
    </script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            for (let index = 1; index < "{{ count($soals) }}" + 1; index++) {
                $(`.step_${index}`).on('click', function() {
                    $(`.step_${index}`).removeClass("active");
                    $(this).addClass("active");
                    var target = this;
                    $($(this).parent().parent().parent().find('input[type="radio"]')).each(function(index,
                        element) {
                        if ($(element).get(0) == $(target).find('input[type="radio"]').get(0)) {
                            $($(target).find('input[type="radio"]')).attr('checked', true);
                        } else {
                            $(element).attr('checked', false);
                        }
                    });
                });
            }
        });
    </script>
</body>

</html>
