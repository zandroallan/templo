    @extends('layouts.app')

        @section('meta')

            <meta name="csrf-token" content="<?= csrf_token() ?>">
            
        @endsection


        @section('breadcrumb')

            <li class="breadcrumb-item">
                <a class="link-fx" href="{{ route('permisos.index') }}">Permisos de Usuario</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a class="link-fx text-dark" href="#">
                    Edicion de Permisos de Usuario
                </a>
            </li>

        @endsection


        @section('content')

            <div class="block block-themed">
                <div class="block-header bg-amethyst-dark">
                    <h3 class="block-title">Actualización de Permisos de Usuario</h3>
                    <div class="block-options">
                        <a class="btn btn-outline-light" href="{{ route('permisos.index') }}"> 
                            <i class="fa fa-arrow-rotate-left"></i> Regresar
                        </a>
                        @can('permiso-edit')
                        <a class="btn btn-outline-success btn-permiso-update" href="#"> 
                            <i class="fa fa-pencil"></i> Editar Permisos de Usuario
                        </a>
                        @endcan
                    </div>
                </div>
                <div class="block-content">
                    <form name="frm-permiso-update" id="frm-permiso-update">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <h5 class="border-bottom pb-2">Datos Generales</h5>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Ingresar el nombre del permiso">
                                    <label for="name">Ingresar el nombre del permiso</label>
                                </div>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </form>
                </div>
            </div>

        @endsection

        @section('js')

            <script src="{{ asset('public/views/permisos/edit.js') }}"></script>

        @endsection

        @section('script')

            $('._permiso').addClass('active');

            $('.btn-permiso-update').attr('onclick', 'confirmUpdate({{ $permission->id }})');
            data_edit({{ $permission->id }});
            
        @endsection