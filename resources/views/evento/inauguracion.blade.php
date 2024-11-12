    @extends('layouts.app')

        @section('css')

            <link rel="stylesheet" href="{{ asset('public/template/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
            <!-- <link rel="stylesheet" href="{{ asset('template/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}"> -->
            <link rel="stylesheet" href="{{ asset('public/template/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
            <link rel="stylesheet" id="css-main" href="{{ asset('public/template/assets/js/plugins/select2/css/select2.min.css') }}">
        @endsection

        @section('breadcrumb')

            <li class="breadcrumb-item" aria-current="page">
                <a class="link-fx" href="{{ route('eventos.index') }}">
                    Evento
                </a>
            </li>

        @endsection

        @section('content')

            <h2 class="content-heading">Listado de evento inaugural</h2>

            <button type="button" class="btn btn-alt-primary push" data-bs-toggle="modal" data-bs-target="#modal-block-tabs-alt">
                Nuevo registro
            </button>

            <div class="block block-header-default">
                <div class="block-header bg-amethyst-dark">
                    <h3 class="block-title">Infantes</h3>
                    <div class="block-options space-x-1">
                        @can('evento-create')
                        <a class="btn btn-sm btn-alt-secondary" href="{{ route('eventos.create') }}">
                            <i class="fa fa-clone"></i> Nuevo registro
                        </a>
                        @endif

                        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#one-dashboard-search-orders" data-class="d-none">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div id="one-dashboard-search-orders" class="block-content border-bottom d-none">
                    <!-- Search Form -->
                    <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                        <div class="push">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-alt" id="search" name="search" placeholder="Ingresar el texto a buscar ...">
                                <span class="input-group-text bg-body border-0">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                    <!-- END Search Form -->
                </div>
                <div class="block-content block-content-full">
                    <div class="table-responsive tbl-evento"></div>
                </div>
            </div>



            <!-- Pop In Block Modal -->
            <div class="modal fade" id="modal-personal" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
                <div class="modal-dialog modal-dialog-popin modal-xl" role="document">
                    <div class="modal-content">
                        <div class="block block-rounded block-transparent mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Inauguración</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content fs-sm">
                                <div class="table-responsive tbl-persona-inauguracion"></div>
                            </div>
                            <div class="block-content block-content-full text-end bg-body">
                                <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Pop In Block Modal -->



            <div class="modal fade" id="modal-block-tabs-alt" tabindex="-1" role="dialog" aria-labelledby="modal-block-tabs-alt" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="block block-rounded block-transparent mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Registro invitado</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content fs-sm">
                                <!--  -->
                                <form name="frm-registro" id="frm-registro">
                                    <input type="hidden" id="evento" name="evento" value="1">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <select class="form-control form-control-alt" id="id_dependencia" name="id_dependencia">
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <select class="form-control form-control-alt" id="cargo" name="cargo">
                                                <option value="">-- Seleccionar Cargo --</option>
                                                <option value="Presidente">Presidente</option>
                                                <option value="Tesorero">Tesorero</option>
                                                <option value="Contralor Interno">Contralor Interno</option>
                                                <option value="Testigo">Testigo</option>
                                                <option value="Invitado especial">Invitado especial</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-2 _cargo_otro" style="display: none">
                                            <input type="text" class="form-control form-control-alt" name="cargo_otro" id="cargo_otro" placeholder="Especifique cargo">
                                        </div>

                                        <div class="col-md-12 col-xl-12 mb-2">
                                            <input type="text" class="form-control form-control-alt" name="nombre" id="nombre" placeholder="* Nombre Completo" required />
                                        </div>                                                                                                    
                                        <div class="col-md-6 col-xl-6 mb-2">
                                            <input type="text" class="form-control form-control-alt js-masked-phone" name="telefono" id="telefono" placeholder="* Teléfono" required />
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input type="text" class="form-control form-control-alt" name="correo" id="correo" placeholder="* Correo electrónico" />
                                        </div>   

                                        <div class="col-md-12 col-xl-12 mb-4">
                                            <div class="form-check form-switch">
                                              <input class="form-check-input" type="checkbox" id="representacion" name="representacion">
                                              <label class="form-check-label" for="representacion">En representación</label>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!--  -->
                            </div>
                            <hr />
                            <div class="block-content block-content-full text-end bg-body">
                                <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-sm btn-secondary py-2 px-3 m-1 js-click-ripple-enabled btn-registro-create">
                                    <i class="fa fa-inbox"></i> Guardar registro
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        @endsection


        @section('js')

            <!-- Page JS Plugins -->
            <script src="{{ asset('public/template/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
            <!-- Personal Js-Script -->
            <script type="text/javascript">
                One.helpersOnLoad(['jq-select2', 'jq-masked-inputs']);
                
                var _i_children=0;
                var vuri=window.location.origin + '/transicion';

                $(document).ready(
                    function() {                        
                        $("#representacion").prop("checked", false); 
                        $('.btn-registro-create').attr('onclick', 'invitadoStore()');
                        //$('.checkboxAcepto').attr('onclick', 'habilitarTerminos()');

                        //$(".btn-registro-store").prop("disabled", true);
                        //$('.btn-registro-store').attr('onclick', 'invitadoStore()');

                        $('#cargo').on( "change",
                            function(){
                                if ( this.value == 'Otro') {
                                    $('._cargo_otro').show();
                                }
                                else {
                                    $('._cargo_otro').hide();
                                }
                            }
                        );
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
                                if ( _DataForm.elements[vj].id != 'cargo_otro' ) {
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
                                    url: vuri + '/evento/inauguracion/store-apertura',
                                    dataType: "JSON",
                                    data: $('#frm-registro').serialize(),
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                                                $('#id_dependencia').val('');
                                                $('#cargo').val('');
                                                $('#cargo_otro').val('');
                                                $('._cargo_otro').hide();

                                                $('#nombre').val('');
                                                $('#telefono').val('');
                                                $('#correo').val('');
                                                $('#procedencia').val('');
                                                $("#representacion").prop("checked", false);  

                                                $('#modal-block-tabs-alt').modal('hide');

                                                Swal.fire(
                                                    {
                                                        icon: 'success',
                                                        title: 'Registro',
                                                        html: vresponse.mensaje,
                                                        showConfirmButton: false,
                                                        timer: 2000 
                                                    }
                                                );

                                               inauguracion();                                  

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
                                    error: function(vjqXHR, vtextStatus, verrorThrown) { }

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
            <script src="{{ asset('public/views/eventos/inauguracion.js') }}"></script>

        @endsection

        @section('script')
            
            var _permissionEdit=false;
            var _permissionDelete=false;

            @can('evento-edit')

                _permissionEdit=true;
            @endcan
            @can('evento-delete')

                _permissionDelete=true;
            @endcan
        @endsection