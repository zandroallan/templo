@extends('layouts.app')
    
    @section('css')

        <link rel="stylesheet" href="{{ asset('public/template/assets/js/plugins/flatpickr/flatpickr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/template/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('template/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('public/template/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    @endsection

    @section('content')


        <div class="block block-themed">
            <div class="block-header bg-amethyst-dark">
                <h3 class="block-title">Acuerdos de trabajo</h3>
                <div class="block-options">
                    <a class="btn btn-outline-light" href="{{ url('dependencia/mesa/trabajo') }}">
                        <i class="fa fa-arrow-rotate-left"></i> Regresar
                    </a>
                    @can('mesa-trabajo-create')
                    <button class="btn btn-outline-success btn-create" data-bs-toggle="modal" data-bs-target="#mdl-acuerdos">
                        <i class="fa fa-floppy-disk"></i> Nuevo acuerdo
                    </button>
                    @endcan
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="table-responsive tbl-response"></div>
            </div>
        </div>


        <div class="modal fade" id="mdl-acuerdos" tabindex="-1" role="dialog" aria-labelledby="mdl-acuerdos" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popout modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Agregar acuerdo</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <form id="frm-acuerdo" name="frm-acuerdo">
                                <input type="hidden" name="id" id="id" value="0">
                                <input type="hidden" name="id_dependencia" id="id_dependencia" value="{{ $id_dependencia }}">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control flatpickr" id="fecha" name="fecha" placeholder="Fecha acuerdo">
                                            <label for="fecha">Fecha acuerdo</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="asunto" name="asunto" style="height: 50px" placeholder="Asunto acuerdo"></textarea>
                                            <label for="asunto">Asunto acuerdo</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="descripcion" name="descripcion" style="height: 180px" placeholder="Descripción acuerdo"></textarea>
                                            <label for="descripcion">Descripción acuerdo</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="files">
                                                 Cargar minuta de trabajo
                                            </label>
                                            <input class="form-control" type="file" id="files" name="files">
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <hr>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-secondary mb-2" data-bs-dismiss="modal">
                                <i class="fa fa-clone opacity-50 me-1"></i> Salir
                            </button>
                            <button type="button" class="btn btn-success btn-follow-store mb-2">
                                <i class="fa fa-save opacity-50 me-1"></i> Guardar acuerdo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection

    @section('js')

        <script src="{{ asset('public/template/assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
        <!-- Page JS Plugins -->
        <script src="{{ asset('public/template/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
        <!-- Personal Js-Script -->
        <script src="{{ asset('public/views/mesas/show.js') }}"></script>

    @endsection

    @section('script')

        var _permissionEdit=false;
        var _permissionDelete=false;

        @can('mesa-trabajo-edit')

            _permissionEdit=true;
        @endcan
        @can('mesa-trabajo-delete')

            _permissionDelete=true;
        @endcan

        index({{ $id_dependencia }});
 
    @endsection