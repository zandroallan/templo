@extends('layouts.app')

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
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">                    
                            <h5 class="border-bottom pb-2">Datos generales</h5>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Nombre completo" value="{{ $user->name }}" disabled>
                                <label for="name">Nombre completo</label>
                            </div>

                            <div class="form-floating mb-3 ">
                                <input type="email" class="form-control" placeholder="Correo electrónico" value="{{ $user->email }}" disabled>
                                <label for="email">Correo electrónico</label>
                            </div>

                            <div class="row">
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <div class="col-md-6">
                                    <div class="form-check form-block">
                                        <input class="form-check-input" type="checkbox" disabled checked>
                                        <label class="form-check-label" for="roles_{{ $v }}">
                                            <span class="d-flex align-items-center">
                                                <span class="ms-2">
                                                    <span class="d-block fs-sm"> {{ $v }} </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            </div><br />

                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
            </div>


    @endsection

    @section('script')

        $('._usuario').addClass('active');
        
    @endsection