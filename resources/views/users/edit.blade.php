    @extends('layouts.app')

        @section('css')

            <link rel="stylesheet" id="css-main" href="{{ asset('public/template/assets/js/plugins/select2/css/select2.min.css') }}">

        @endsection

        @section('breadcrumb')

            <li class="breadcrumb-item">
                <a class="link-fx" href="{{ route('usuarios.index') }}">Usuarios</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a class="link-fx text-dark" href="#">
                    Edición de usuarios
                </a>
            </li>

        @endsection

        @section('content')

            <div class="block block-themed">
                <div class="block-header bg-amethyst-dark">
                    <h3 class="block-title">Actualización de usuario</h3>
                    <div class="block-options">
                        <a class="btn btn-outline-light" href="{{ route('usuarios.index') }}"> Regresar</a>
                        <a class="btn btn-outline-success btn-usuario-update" href="#"> Editar usuario</a>
                    </div>
                </div>
                <div class="block-content">
                    <form name="frm-usuario-update" id="frm-usuario-update">
                        <input type="hidden" name="id_user" id="id_user" value="{{ $id_user }}" />

                        @include('users.form')

                    </form>
                </div>
            </div>

        @endsection

        @section('js')

            <!-- Personal Js-Script -->
            <script src="{{ asset('public/template/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
            <script src="{{ asset('public/views/users/edit.js') }}"></script>

        @endsection


        @section('script')

            $('._usuario').addClass('active');
            
        @endsection