<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Registro | Web</title>
        <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Open Graph Meta -->
        <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="OneUI">
        <meta property="og:description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">
        <!-- Icons -->
        <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->
        <!-- Stylesheets -->
        <link rel="stylesheet" id="css-main" href="{{ asset('public/template/assets/css/oneui.min.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('public/template/assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
        <link rel="stylesheet" id="css-theme" href="{{ asset('public/template/assets/css/themes/flat.min.css') }}">
        <link rel="stylesheet" id="css-theme" href="{{ asset('public/template/assets/js/plugins/select2/css/select2.min.css') }}">
        <!-- END Stylesheets -->
        <style type="text/css">
            .mayus {
                text-transform: uppercase;
            }
            .minus {
                text-transform: lowercase;
            }
        </style>
    </head>
    <body>
        <div id="page-container">
            <main id="main-container">
                <div class="hero-static d-flex align-items-center">
                    <div class="w-100">
                        <div class="bg-body-extra-light">
                            <div class="content content-full">
                                <div class="row g-0 justify-content-center">
                                    <div class="col-md-8 col-lg-6 col-xl-7 py-4 px-4 px-lg-5">
                                        <!-- Header -->
                                        <div class="text-center">
                                            <!--
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <img src="{{ asset('public/tools/img/escritorio.png') }}" class="img-fluid rounded" />
                                                </div>
                                            </div>
                                            -->
                                            <h1 class="h3 mb-0">Proceso de Entrega Recepción Final de la Administración Pública Estatal<br /> 2018-2024</h1>
                                            <hr />
                                            <h1 class="h3 mb-0 text-info">Registro Inauguracion</h1>
                                            <h1 class="h3 mb-0 text-info">Registro a las mesas de trabajo</h1>
                                            <hr />
                                            <p class="fw-medium mb-3" style="text-align: justify;">
                                                Con la finalidad de llevar un control de los funcionarios que participarán, solicitamos de la manera más respetuosa requisitar los siguientes datos:
                                            </p>
                                        </div>
                                        <hr/>
                                            
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4 col-xl-4">
                                                <a class="block block-rounded block-link-pop h-100 mb-0" href="{{ url('registro/mesa/internos') }}">
                                                    <div class="block-content block-content-full text-center bg-flat">
                                                        <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                                                            <i class="si si-user-following fa-2x text-white-75"></i>
                                                        </div>
                                                    </div>
                                                    <div class="block-content block-content-full text-center">
                                                        <h5 class="h5 mb-1">
                                                            <span class="text-flat">OIC y Comisarías</span>
                                                        </h5>
                                                        <!-- <div class="fs-sm text-muted">Noviembre 4 al 8, 2024</div> -->
                                                    </div>
                                                </a>
                                            </div>                                          
                                            <div class="col-md-6 col-lg-4 col-xl-4">
                                                <a class="block block-rounded block-link-pop h-100 mb-0" href="{{ url('registro/mesa/entrante') }}">
                                                    <div class="block-content block-content-full text-center bg-success">
                                                        <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                                                            <i class="si si-user-following fa-2x text-white-75"></i>
                                                        </div>
                                                    </div>
                                                    <div class="block-content block-content-full text-center">
                                                        <h5 class="h5 mb-1">
                                                            <span class="text-success">Equipo de Transición Entrante</span>
                                                        </h5>
                                                        <!-- <div class="fs-sm text-muted">Noviembre 4 al 8, 2024</div> -->
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6 col-lg-4 col-xl-4">
                                                <a class="block block-rounded block-link-pop h-100 mb-0" href="{{ url('registro/mesa/saliente') }}">
                                                    <div class="block-content block-content-full text-center bg-warning">
                                                        <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                                                            <i class="si si-user-following fa-2x text-white-75"></i>
                                                        </div>
                                                    </div>
                                                    <div class="block-content block-content-full text-center">
                                                        <h5 class="h5 mb-1">
                                                            <span class="text-warning">Organismos Públicos</span>
                                                        </h5>
                                                        <!-- <div class="fs-sm text-muted">Noviembre 4 al 8, 2024</div> -->
                                                    </div>
                                                </a>
                                            </div>

                                            
                                        </div> 

                                        <hr/>                                            
                                    </div>
                                </div>
                            </div>
                        </div>           

                        <!-- Footer -->
                        <div class="fs-sm text-center text-muted py-3">
                            <!-- <strong>SHyFP-UIyDD 0.1</strong> &copy; <span data-toggle="year-copy"></span> -->
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @include('layouts.privacidad')

        <script src="{{ asset('public/template/assets/js/oneui.app.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/lib/jquery.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/pages/op_auth_reminder.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
    
        <script type="text/javascript">

            $(document).ready(
                function() {

                }
            );

        </script>
  </body>
</html>