    @extends('layouts.app')

        @section('css')

            <link rel="stylesheet" id="css-main" href="{{ asset('public/template/assets/js/plugins/select2/css/select2.min.css') }}">

        @endsection

        @section('title')

            <h1 class="h3 fw-bold mb-0">Registro de usuarios</h1>

        @endsection

        @section('breadcrumb')

            <li class="breadcrumb-item">
                <a class="link-fx" href="{{ route('usuarios.index') }}">Usuarios</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a class="link-fx text-dark" href="#">
                    Registro de usuarios
                </a>
            </li>

        @endsection

        @section('content')

            <div class="block block-themed">
                <div class="block-header bg-amethyst-dark">
                    <h3 class="block-title">Registrar usuario</h3>
                    <div class="block-options">
                        <a class="btn btn-outline-light" href="{{ route('usuarios.index') }}">
                            <i class="fa fa-arrow-rotate-left"></i> Regresar
                        </a>
                        @can('usuario-create')
                        <a class="btn btn-outline-success btn-usuario-store" href="#">
                            <i class="fa fa-floppy-disk"></i> Registro de usuario
                        </a>
                        @endcan
                    </div>
                </div>
                <div class="block-content">
                    <form name="frm-usuario-store" id="frm-usuario-store">
                        
                        @include('users.form')

                    </form>
                </div>
            </div>
        
        @endsection

        @section('js')

            <!-- Personal Js-Script -->
            <script src="{{ asset('public/template/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
            <script src="{{ asset('public/views/users/create.js') }}"></script>

        @endsection


        @section('script')

            $('._usuario').addClass('active');
            
        @endsection