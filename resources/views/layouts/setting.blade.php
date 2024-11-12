    @extends('app')

        @section('content')

            <div id="accordion">
                <p class="text-muted">
                    <strong> Datos de la cuenta </strong>
                </p>
                <div class="card">
                    <div aria-expanded="false" class="d-flex align-items-center px-4 py-3 pointer collapsed in" data-parent="#accordion" data-target="#c_1" data-toggle="collapse" aria-expanded="true">
                        <div>
                            <span class="w-48 avatar circle bg-info-lt" data-toggle-class="loading">
                                <img alt="." src="../assets/img/a9.jpg"/>
                            </span>
                        </div>
                        <div class="mx-3 d-none d-md-block">
                            <strong> {{ Auth::User()->name }} </strong>
                            <div class="text-sm text-muted"> {{ Auth::User()->email }} </div>
                        </div>
                        <div class="flex"></div>
                        <div class="mx-3">
                            <svg class="feather feather-chevron-right" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                        <div>
                            <a class="text-prmary text-sm" href="signin.1.html"> Desconectar </a>
                        </div>
                    </div>
                    <div class="p-4 collapse show" id="c_1" style="">
                        <form role="form">
                            <div class="form-group">
                                <label> Nombre </label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label> Correo electrónico </label>
                                <input type="text" class="form-control" />
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">
                                Actualizar
                            </button>
                        </form>
                    </div>
                    
                    <div aria-expanded="false" class="d-flex align-items-center px-4 py-3 b-t pointer collapsed" data-parent="#accordion" data-target="#c_2" data-toggle="collapse">
                        <svg class="feather feather-lock" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                            <rect height="11" rx="2" ry="2" width="18" x="3" y="11"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <div class="px-3">
                            <div> Contraseña </div>
                        </div>
                        <div class="flex"></div>
                        <div>
                            <svg class="feather feather-chevron-right" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </div>
                    <div class="collapse p-4" id="c_2">
                        <form role="form">
                            <div class="form-group">
                                <label>
                                    Contraseña Actual
                                </label>
                                <input type="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label> Nueva contraseña </label>
                                <input type="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label> Confirmar nueva contraseña </label>
                                <input type="password" class="form-control" />
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">
                                Actualizar
                            </button>
                        </form>
                    </div>                    
                </div>
                
                
                <p class="text-muted">
                    <strong> Seguridad </strong>
                </p>
                <div class="card">
                    <div aria-expanded="false" class="d-flex align-items-center px-4 py-3 b-t pointer collapsed" data-parent="#accordion" data-target="#c_5" data-toggle="collapse">
                        <div>
                            Eliminar cuenta?
                        </div>
                        <div class="flex"></div>
                        <div>
                            <svg class="feather feather-chevron-right" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="9 18 15 12 9 6">
                                </polyline>
                            </svg>
                        </div>
                    </div>
                    <div class="collapse p-4" id="c_5">
                        <div class="py-3">
                            <p> Esta seguro de eliminar su cuenta? </p>
                            <button class="btn btn-warning" type="button">No</button>
                            <button class="btn btn-danger" type="button">Si</button>
                        </div>
                    </div>
                </div>
            </div>

        @endsection