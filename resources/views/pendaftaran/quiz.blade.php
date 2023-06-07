<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizo HTML Template - V.5</title>
    <!-- FontAwesome-cdn include -->
    <link rel="stylesheet" href="frontend/quiz/css/all.min.css">
    <!-- Google fonts include -->
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800&amp;family=Sen:wght@400;700;800&amp;display=swap"
        rel="stylesheet">
    <!-- Bootstrap-css include -->
    <link rel="stylesheet" href="frontend/quiz/css/bootstrap.min.css">
    <!-- Animate-css include -->
    <link rel="stylesheet" href="frontend/quiz/css/animate.min.css">
    <!-- Main-StyleSheet include -->
    <link rel="stylesheet" href="frontend/quiz/css/style.css">
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
                            <img src="frontend/quiz/images/logo.png" alt="image-not-found">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 pt-5">
                    <div
                        class="count_box pe-3 me-5 rounded-pill d-flex align-items-center justify-content-center float-end">
                        <div class="count_clock ps-2">
                            <img src="frontend/quiz/images/clock.png" alt="image-not-found">
                        </div>
                        <div class="count_title">
                            <h4 class="ps-1">Quiz</h4>
                            <span class="px-1">Time start</span>
                        </div>
                        <div class="count_number rounded-pill px-3 d-flex justify-content-around align-items-center position-relative overflow-hidden countdown_timer"
                            data-countdown="2023/06/07 21:02:00">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <form class="multisteps_form mt-4 overflow-hidden position-relative" id="wizard" method="POST"
                action="https://jthemes.net/themes/html/quizo/thankyou/index-2.html">
                <!------------------------- Step-1 ----------------------------->
                <div class="multisteps_form_panel">
                    <div class="question_title">
                        <h1 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">Siapa pengarang
                            jurossic park yong mengantongi ijazah
                            dokter dari Harvard University denga</h1>
                    </div>
                    <div class="row pt-3">
                        <ul class="text-center">
                            <li
                                class="position-relative step_1 d-inline-block animate__animated animate__fadeInRight animate_50ms active">
                                <input id="opt_1" type="checkbox" name="stp_1_select_option" value="sea grass bed">
                                <label for="opt_1">sea grass bed</label>
                                <span class="position-absolute">A</span>
                            </li>
                            <li
                                class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms">
                                <input id="opt_2" type="checkbox" name="stp_1_select_option" value="coral reefs"
                                    checked>
                                <label for="opt_2">coral reefs</label>
                                <span class="position-absolute">B</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <ul class="text-center">
                            <li
                                class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms">
                                <input id="opt_3" type="checkbox" name="stp_1_select_option"
                                    value="None of the above">
                                <label for="opt_3">None of the above</label>
                                <span class="position-absolute">C</span>
                            </li>
                            <li
                                class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms">
                                <input id="opt_4" type="checkbox" name="stp_1_select_option" value="hot spots">
                                <label for="opt_4">hot spots</label>
                                <span class="position-absolute">D</span>
                            </li>
                        </ul>
                        <!-- Progress bar -->
                        <div class="step_progress position-absolute text-center step">
                            <span class="text-capitalize">question 1 / 4</span>
                            <div class="progress rounded-pill">
                                <div class="progress-bar rounded-pill" role="progressbar" style="width: 25%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!------------------------- Step-2 ----------------------------->
                <div class="multisteps_form_panel">
                    <div class="question_title">
                        <h1 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">The habitats
                            valuable
                            for commercially harvested
                            species are called</h1>
                    </div>
                    <div class="row pt-3">
                        <ul class="text-center">
                            <li
                                class="position-relative step_2 d-inline-block animate__animated animate__fadeInRight animate_50ms">
                                <input id="opt_5" type="checkbox" name="stp_2_select_option" value="Japan">
                                <label for="opt_5">Japan</label>
                                <span class="position-absolute">A</span>
                            </li>
                            <li
                                class="step_2 position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms">
                                <input id="opt_6" type="checkbox" name="stp_2_select_option" value="Britain">
                                <label for="opt_6">Britain</label>
                                <span class="position-absolute">B</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <ul class="text-center">
                            <li
                                class="step_2 position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms">
                                <input id="opt_7" type="checkbox" name="stp_2_select_option" value="Poland"
                                    checked>
                                <label for="opt_7">Poland</label>
                                <span class="position-absolute">C</span>
                            </li>
                            <li
                                class="step_2 position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms">
                                <input id="opt_8" type="checkbox" name="stp_2_select_option" value="Germany">
                                <label for="opt_8">Germany</label>
                                <span class="position-absolute">D</span>
                            </li>
                        </ul>
                        <!-- Progress bar -->
                        <div class="step_progress position-absolute text-center step">
                            <span class="text-capitalize">question 2 / 4</span>
                            <div class="progress rounded-pill">
                                <div class="progress-bar rounded-pill" role="progressbar" style="width: 50%"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!------------------------- Step-3 ----------------------------->
                <div class="multisteps_form_panel">
                    <div class="question_title">
                        <h1 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">The iron and
                            steel
                            industries of which of the following countries are almost fully dependent on imported raw
                            materials
                        </h1>
                    </div>
                    <div class="row pt-3">
                        <ul class="text-center">
                            <li
                                class="position-relative step_3 d-inline-block animate__animated animate__fadeInRight animate_50ms">
                                <input id="opt_9" type="checkbox" name="stp_3_select_option" value="artesian">
                                <label for="opt_9">artesian</label>
                                <span class="position-absolute">A</span>
                            </li>
                            <li
                                class="step_3 position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms">
                                <input id="opt_10" type="checkbox" name="stp_3_select_option"
                                    value="artesian well" checked>
                                <label for="opt_10">artesian well</label>
                                <span class="position-absolute">B</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <ul class="text-center">
                            <li
                                class="step_3 position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms">
                                <input id="opt_11" type="checkbox" name="stp_3_select_option"
                                    value="unconfined groundwater">
                                <label for="opt_11">unconfined groundwater</label>
                                <span class="position-absolute">C</span>
                            </li>
                            <li
                                class="step_3 position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms">
                                <input id="opt_12" type="checkbox" name="stp_3_select_option"
                                    value="confined groundwater">
                                <label for="opt_12">confined groundwater</label>
                                <span class="position-absolute">D</span>
                            </li>
                        </ul>
                        <!-- Progress bar -->
                        <div class="step_progress position-absolute text-center step">
                            <span class="text-capitalize">question 3 / 4</span>
                            <div class="progress rounded-pill">
                                <div class="progress-bar rounded-pill" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!------------------- Step-4 -------------------------->
                <div class="multisteps_form_panel">
                    <div class="question_title">
                        <h1 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">The
                            groundwater
                            can
                            become confined between two impermeable layers.This type of enclosed water is called</h1>
                    </div>
                    <div class="row pt-3">
                        <ul class="text-center">
                            <li
                                class="position-relative step_4 d-inline-block animate__animated animate__fadeInRight animate_50ms">
                                <input id="opt_13" type="checkbox" name="stp_2_select_option"
                                    value="Michoel Crichton" checked>
                                <label for="opt_13">Michoel Crichton</label>
                                <span class="position-absolute">A</span>
                            </li>
                            <li
                                class="step_4 position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms">
                                <input id="opt_14" type="checkbox" name="stp_2_select_option"
                                    value="Nicholos Sporks">
                                <label for="opt_14">Nicholos Sporks</label>
                                <span class="position-absolute">B</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <ul class="text-center">
                            <li
                                class="step_4 position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms">
                                <input id="opt_15" type="checkbox" name="stp_2_select_option"
                                    value="James Redfield">
                                <label for="opt_15">James Redfield</label>
                                <span class="position-absolute">C</span>
                            </li>
                            <li
                                class="step_4 position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms">
                                <input id="opt_16" type="checkbox" name="stp_2_select_option"
                                    value="Dovid Guterson">
                                <label for="opt_16">Dovid Guterson</label>
                                <span class="position-absolute">D</span>
                            </li>
                        </ul>
                        <!-- Progress bar -->
                        <div class="step_progress position-absolute text-center step">
                            <span class="text-capitalize">question 4 / 4</span>
                            <div class="progress rounded-pill">
                                <div class="progress-bar rounded-pill" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------- Form Button ---------->
                <button type="button" class="f_btn prev_btn text-uppercase position-absolute" id="prevBtn"
                    onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> Last Question</button>
                <button type="button" class="f_btn next_btn text-uppercase position-absolute" id="nextBtn"
                    onclick="nextPrev(1)">Next Question</button>
            </form>
        </div>
    </div>
    <!-- jQuery-js include -->
    <script src="frontend/quiz/js/jquery-3.6.0.min.js"></script>
    <!-- jquery-count-down include -->
    <script src="frontend/quiz/js/countdown.js"></script>
    <!-- Bootstrap-js include -->
    <script src="frontend/quiz/js/bootstrap.min.js"></script>
    <!-- jQuery-validate-js include -->
    <script src="frontend/quiz/js/jquery.validate.min.js"></script>
    <!-- Custom-js include -->
    <script src="frontend/quiz/js/script.js"></script>
    <!-- <script type="text/javascript">
        $('#getting-started').countdown('2020/07/25', function(event) {
            $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
        });
    </script> -->
</body>

</html>
