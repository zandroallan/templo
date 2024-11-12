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

                                                <!-- <div class="row">
                                                    <div class="col-md-12">
                                                        <img src="{{ asset('public/tools/img/escritorio.png') }}" class="img-fluid rounded" />
                                                    </div>
                                                </div>   -->  
                                                <h1 class="h3 mb-0">Proceso de Entrega Recepción Final de la Administración Pública Estatal 2018-2024</h1>
                                                <hr />
                                                <h1 class="h4 mb-0">Acto Inaugural del Procedimiento de Transición</h1>
                                                <hr />
                                                <p class="fw-medium mb-3" style="text-align: justify;">
                                                    Con la finalidad de llevar un control de los funcionarios que asistirán al evento, solicitamos de la manera más respetuosa requisitar los siguientes datos:                                                    
                                                </p>

                                                <p class="fw-medium mb-3" style="text-align: center;">
                                                    <b>Nota: Al correo electrónico proporcionado se hará llegar una liga para descarga del código QR que será solicitado para acceder al evento.</b>
                                                </p>
                                            </div>

                                            <div class="_primario">
                                                                                                
                                                <form name="frm-registro" id="frm-registro">
                                                    <div class="row">
                                                        <h2 class="content-heading border-bottom mb-4 pb-2">Organismo público</h2>
                                                        <div class="col-md-12 mb-2">
                                                            <select class="form-control form-control-alt" id="id_dependencia" name="id_dependencia"></select>
                                                        </div>

                                                        <h2 class="content-heading border-bottom mb-4 pb-2">Datos del titular</h2>
                                                        <div class="col-md-8 col-xl-8 mb-2">
                                                            <input type="text" class="form-control form-control-alt mayus" name="nombre[]" id="nombre1" placeholder="Nombre Titular" required>
                                                        </div>
                                                        <div class="col-md-4 col-xl-4 mb-2">
                                                            <input type="text" class="form-control form-control-alt js-masked-phone" name="telefono[]" id="telefono1" placeholder="Teléfono" required>
                                                        </div>
                                                        <input type="hidden" class="form-control form-control-alt" name="cargo[]" id="cargo1" value="SECRETARIO (A)">
                                                        <div class="col-md-12 mb-2">
                                                            <input type="text" class="form-control form-control-alt minus" name="correo[]" id="correo1" placeholder="Correo electrónico titular">
                                                        </div>

                                                        <h2 class="content-heading border-bottom mb-4 pb-2">Datos del enlace operativo</h2>

                                                        <div class="col-md-8 col-xl-8 mb-2">
                                                            <input type="text" class="form-control form-control-alt mayus" name="nombre[]" id="nombre2" placeholder="Nombre Enlace" required>
                                                        </div>
                                                        <div class="col-md-4 col-xl-4 mb-2">
                                                            <input type="text" class="form-control form-control-alt js-masked-phone" name="telefono[]" id="telefono2" placeholder="Teléfono" required>
                                                        </div>
                                                        <!-- <div class="col-md-5 mb-2"> -->
                                                            <input type="hidden"  name="cargo[]" id="cargo2" value="ENLACE OPERATIVO">
                                                        <!-- </div> -->
                                                        <div class="col-md-12 mb-2">
                                                            <input type="text" class="form-control form-control-alt minus" name="correo[]" id="correo2" placeholder="Correo Electrónico enlace">
                                                        </div>
                                                    </div>
                                                </form>                                            
                                               
                                            
                                                <!-- END Reminder Form -->
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-secondary py-2 px-3 m-1 js-click-ripple-enabled btn-registro-create">
                                                        <i class="fa fa-inbox"></i> Enviar y registrarme
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="row _secundario" style="padding: 20px !important; display: none;">
                                                <div class="bg-primary-dark py-5">
                                                    <div class="content content-full content-boxed text-center">
                                                        <h2 class="fw-semibold text-white mb-2">
                                                            Registro exitoso
                                                        </h2>
                                                        <div class="_mensaje"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>           

                        <!-- Footer -->
                        <div class="fs-sm text-center text-muted py-3">
                            <strong>SHyFP-UIyDD 0.1</strong> &copy; <span data-toggle="year-copy"></span>
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
            
            var _i_children=0;
            var vuri=window.location.origin + '/apertura-entrega-recepcion';

            $(document).ready(
                function() {

                    $('.checkboxAcepto').prop('checked', false);

                    $('.btn-registro-create').attr('onclick', 'validarFormulario()');
                    $('.checkboxAcepto').attr('onclick', 'habilitarTerminos()');
                    // $('.email').attr('onkeypress', 'isEmail(this)');

                    $(".btn-registro-store").prop("disabled", true);
                    $('.btn-registro-store').attr('onclick', 'invitadoStore()');

                    dependencias_select();
                }
            );

            function validateForm(vidFormulario)
             {
                var vstatus=true;
                var _DataForm=document.getElementById(vidFormulario);

                for ( vj = 0; vj < _DataForm.elements.length; vj++ ) {
                    switch ( _DataForm.elements[vj].type ) {
                        case 'text':
                        case 'select-one':
                        case 'textarea':
                            if ( _DataForm.elements[vj].id != 'search') {
                                if ( document.getElementById(_DataForm.elements[vj].id).disabled == false) {
                                    let _valueDataForm=document.getElementById(_DataForm.elements[vj].id).value;
                                    if (  _valueDataForm == '' ) {
                                        $('#' + _DataForm.elements[vj].id).addClass("is-invalid");
                                        if (vstatus) {
                                            $('#' + _DataForm.elements[vj].id).focus();
                                        }
                                        vstatus = false;
                                    }
                                }
                            }
                          break;
                    }
                }
                return vstatus;
             }

            function clearFormFields(vidFormulario) 
             {
                var vformulario=document.getElementById(vidFormulario);    
                for (vj=0;vj<vformulario.elements.length;vj++){

                    if ($('#'+vformulario.elements[vj].id).hasClass("error"))  {
                        $('#'+vformulario.elements[vj].id).removeClass("error");
                    }                  
                }
             }

            function isEmail(vstring)
             {
                var vregularExpression=/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
                return vstring.match(vregularExpression);
             }

            function habilitarTerminos()
             {
                if( $('#checkboxAcepto').prop('checked') ) {
                    $(".btn-registro-store").prop("disabled", false);
                }
                else {
                    $(".btn-registro-store").prop("disabled", true);
                }
             }

            function validarFormulario()
             { 
                if ( validateForm('frm-registro') ) {
                    $('#mdl-aviso-privacidad').modal('show');
                    // $('#_name').html('<b>'+ $('#curp').val() +'</b>');
                    // $('#_nameATT').html($('#curp').val());
                }
             }

            function dependencias_select()
             {
                $.ajax({
                    type: 'GET',
                    url: vuri + '/api/dependencias',
                    dataType: "JSON",
                    data: {
                        method: 'get'
                    },
                    success: function(vresponse, vtextStatus, vjqXHR) {
                        $('#id_dependencia').html('');

                        let vhtml ='';
                            vhtml+='<option value="">-- Seleccionar --</option>';
                        for ( vi=0; vi < vresponse.respuesta.length; vi++ ) {
                            vhtml+='<option value="'+ vresponse.respuesta[vi].id +'">'+ vresponse.respuesta[vi].nombre +'</option>';
                        }
                        $('#id_dependencia').html(vhtml);
                    },
                    error: function(vjqXHR, vtextStatus, verrorThrown) { }
                });
             }

            function invitadoStore()
             {
                Swal.fire({
                    title: "¡ Advertencia !",
                    text: "¿ Realmente desea enviar el formulario y registarse ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#31708f",
                    confirmButtonText: "Confirmar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.value) { 

                        if ( validateForm('frm-registro') ) {
                            // Begin: Store record invitados
                            $.ajax({
                                type: 'POST',
                                url: vuri + '/evento/store',
                                dataType: "JSON",
                                data: $('#frm-registro').serialize(),
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                beforeSend: function(){
                                    $('._loading').show();
                                    $('._button').hide();
                                },
                                success: function(vresponse, vtextStatus, vjqXHR) {
                                    switch ( vresponse.codigo ) {
                                        case 0:
                                            Swal.fire(
                                                { 
                                                    icon: 'warning', 
                                                    title: 'Mesanje', 
                                                    html: vresponse.mensaje, 
                                                    showConfirmButton: false, 
                                                    timer: 2000
                                                }
                                            );
                                          break;
                                        case 1:
                                            $('#nombre1').val('');
                                            $('#telefono1').val('');
                                            $('#correo1').val('');

                                            $('#nombre2').val('');
                                            $('#telefono2').val('');
                                            $('#correo2').val('');

                                            $('._loading').hide();
                                            $('._button').show();
                                            $('.checkboxAcepto').prop('checked', false);                                            
                                            $('#mdl-aviso-privacidad').modal('hide');

                                            Swal.fire(
                                                {
                                                    icon: 'success',
                                                    title: 'Registro',
                                                    html: vresponse.mensaje,
                                                    showConfirmButton: false,
                                                    timer: 2000 
                                                }
                                            );

                                            $("._primario").hide("slow");
                                            $("._secundario").show("slow");

                                            let _vhtml= '';
                                                _vhtml+='<h3 class="h4 fw-normal text-white-75">'+ vresponse.mensaje +'</h3>';

                                            $("._mensaje").html(_vhtml);                                       

                                          break;
                                        default:
                                            Swal.fire(
                                                { 
                                                    icon: 'warning', 
                                                    title: 'Registro', 
                                                    html: vresponse.mensaje, 
                                                    showConfirmButton: false, 
                                                    timer: 2000
                                                }
                                            );
                                          break;
                                    }
                                },
                                error: function(vjqXHR, vtextStatus, verrorThrown) { },
                                complete: function() {
                                    $('._loading').hide();
                                    $('._button').show();
                                }
                            });
                            // End: Store record
                        }
                        else {
                            Swal.fire({ icon: 'warning', title: 'Registro', html: 'El registro no tiene los datos solicitados.', showConfirmButton: false, timer: 2000 });
                        }
                    }
                });  
             }
        </script>

  </body>
</html>