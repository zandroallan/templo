    @extends('layouts.app')

        @section('meta')

            <meta name="csrf-token" content="<?= csrf_token() ?>">
            
        @endsection


        @section('breadcrumb')

            <li class="breadcrumb-item">
                <a class="link-fx" href="{{ route('roles.index') }}">Roles de Usuario</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a class="link-fx text-dark" href="#">
                    Edición de Rol de Usuario
                </a>
            </li>

        @endsection


        @section('content')

            <div class="block block-themed">
                <div class="block-header bg-amethyst-dark">
                    <h3 class="block-title">Actualización de Rol de Usuario</h3>
                    <div class="block-options">
                        <a class="btn btn-outline-light" href="{{ route('roles.index') }}"> 
                            <i class="fa fa-arrow-rotate-left"></i> Regresar
                        </a>
                        @can('rol-edit')
                        <a class="btn btn-outline-success btn-rol-update" href="#"> 
                            <i class="fa fa-pencil"></i> Editar Rol de Usuario
                        </a>
                        @endcan
                    </div>
                </div>
                <div class="block-content">
                    <form name="frm-rol-update" id="frm-rol-update">                        
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <input type="hidden" id="idRol" name="idRol" value="{{ $role->id }}">
                                
                                @include('roles.form')
                                
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </form>
                </div>
            </div>



        <div id="dvErrors" name="dvErrors" class="dvErrors"></div>


        @endsection

        @section('js')

            <script src="{{ asset('public/views/roles/edit.js') }}"></script>

        @endsection

        @section('script')

            $('._rol').addClass('active');

            $('.btn-rol-update').attr('onclick', 'confirmUpdate({{ $role->id }})');
            data_edit({{ $role->id }});
            

        @endsection