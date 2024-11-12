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
                                                <h1 class="h3 mb-0">Proceso de Entrega Recepción Final de la Administración Pública Estatal<br /> 2018-2024</h1>
                                                <hr />
                                                <h1 class="h4 mb-0">Mesas de Trabajo del Procedimiento de Transición</h1>
                                                <hr />
                                                <p class="fw-medium text-muted mb-3">
                                                    Es un honor para nosotros darle la bienvenida al evento <b>Acto inaugural de las mesas de trabajo del procedimiento de transición</b> que se lleva a cabo.
                                                </p>
                                            </div>
                                                <hr />

                                            <?php 
                                            $_folio='---';
                                            if ( isset($_GET['folio']) ) {
                                                $_folio=$_GET['folio'];
                                            }
                                            ?>

                                            <input type="hidden" name="folio" class="folio" value="{{ $_folio }}" />

                                            <div class="row _secundario">
                                                <div class="bg-primary-dark py-5">
                                                    <div class="content content-full content-boxed text-center _mensaje"></div>
                                                </div>
                                            </div>
                                            
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
            One.helpersOnLoad(['jq-select2', 'jq-masked-inputs']);
            var vuri=window.location.origin + '/transicion';

            $(document).ready(
                function() {
                    index($('.folio').val());
                }
            );

            function index(folio)
             {
                console.log(folio);
                // Begin: Store record invitados
                $.ajax({
                    type: 'GET',
                    url: vuri + '/asistencia/'+ folio +'/evento',
                    dataType: "JSON",
                    success: function(vresponse, vtextStatus, vjqXHR) {
                        switch ( vresponse.codigo ) {
                            // case 0:
                                
                              // break;
                            case 1:
                                var _vhtml='';
                                    _vhtml+='<h3 class="h3 fw-normal text-white-75">';
                                    _vhtml+='   Estimado/a: <b>'+ vresponse.data.nombre +'</b><br />';
                                    _vhtml+='   De Cargo: <b>'+ vresponse.data.cargo +'</b><br />';
                                    _vhtml+='   Dependencia: <b>'+ vresponse.dependencia +'</b>';
                                    _vhtml+='</h3>';
                                    _vhtml+='<h3 class="h4 fw-normal text-white-75">';
                                    _vhtml+='   Agradecemos profundamente su presencia y participación en esta importante ocasión.';
                                    _vhtml+='</h3>';
                                    _vhtml+='<h3 class="h4 fw-normal text-white-75">';
                                    _vhtml+='   Si necesita asistencia en cualquier momento, no dude en acercarse a ';
                                    _vhtml+='   nuestro equipo de apoyo, que estará encantado de ayudarle. <br />';
                                    _vhtml+='</h3>';
                                    _vhtml+='<h3 class="h4 fw-normal text-white-75">';
                                    _vhtml+='   Una vez más, les damos una calurosa bienvenida y les deseamos un ';
                                    _vhtml+='   evento productivo y exitoso.';
                                    _vhtml+='</h3>';

                                $("._mensaje").html(_vhtml);                                       

                              break;
                            default:
                                var _vhtml ='';
                                    _vhtml+='<h3 class="h4 fw-normal text-white-75">'+ vresponse.mensaje +'</h3>';
                                $("._mensaje").html(_vhtml);  
                              break;
                        }
                    },
                    error: function(vjqXHR, vtextStatus, verrorThrown) { }

                });
                // End: Store record
                         
             }
        </script>

  </body>
</html>