        @extends('layouts.app')

            @section('css')

                <!-- Styles para el dataTables -->
                <link rel="stylesheet" href="{{ asset('public/tools/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}" />
                <!-- <link rel="stylesheet" href="{{ asset('tools/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}"> -->
                <link rel="stylesheet" href="{{ asset('public/tools/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}" />

            @endsection
            
            @section('breadcrumb')

                <li class="breadcrumb-item">
                    <a class="link-fx" href="javascript:void(0)">Inicio</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a class="link-fx text-dark" href="javascript:void(0)">
                        Mi Perfil
                    </a>
                </li>

            @endsection

            @section('content')
                <!-- style="background-image: url('assets/media/photos/photo12@2x.jpg');" -->
                <div class="bg-amethyst-darker" >
                    <div class="">
                        <div class="content content-full text-center">
                            <div class="my-3 _img_perfil_0">
                                
                            </div>
                            <h1 class="h2 text-white mb-0 _nombre"></h1>
                            <span class="text-white-75 _area"></span>
                        </div>
                    </div>
                </div>

                <br />
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Datos personales</h3>
                    </div>
                    <div class="block-content">
                        <div class="row push">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <form class="frm-data" id="frm-data" name="frm-data">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="name">Nombre (s)</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre (s)">
                                            </div>
                                            <!-- <div class="col-lg-12"> -->
                                                <!-- <div class="mb-4">
                                                    <label class="form-label" for="correo">Correo electrónico</label>
                                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electrónico">
                                                </div> -->
                                            <!-- </div> -->
                                            <!-- <div class="mb-4">
                                                <label class="form-label" for="primer_apellido">Primer apellido</label>
                                                <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Primer apellido">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="segundo_apellido">Segundo apellido</label>
                                                <input type="email" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo apellido">
                                            </div> -->
                                            <div class="mb-4">
                                                <div class="block block-rounded">
                                                    <div class="block-content block-content-full ribbon ribbon-modern ribbon-info">
                                                        <div class="ribbon-box">
                                                            <i class="fa fa-fw fa-heart"></i>
                                                        </div>
                                                        <div class="text-center py-4 _img_perfil_1"></div>
                                                    </div>
                                                </div>                                                
                                                <div class="mb-4">
                                                    <label class="form-label" for="imagen">Cambiar foto de perfil</label>
                                                    <input type="file" class="form-control" id="imagen" name="imagen">
                                                </div>                                               
                                            </div>
                                        </div>

                                        <!-- <div class="col-lg-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="curp">Clave Única de Registro de Población</label>
                                                <input type="email" class="form-control" id="curp" name="curp" placeholder="CURP">
                                            </div>
                                        </div> -->
                                        
                                    </div>
                                </form>                                    
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-alt-primary btn-update-data">
                                        Actualizar datos
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                </div>

                <br />
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Datos de acceso</h3>
                    </div>
                    <div class="block-content">                        
                        <div class="row push">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <form class="frm-password" name="frm-password">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="email">Correo electrónico</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="password">Contraseña</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="confirm-password">Confirmar contraseña</label>
                                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirmar contraseña">
                                            </div>                                            
                                        </div>                                          
                                    </div>
                                </form>                                    
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-alt-primary btn-update-password">
                                        Actualizar datos de acceso
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                </div>

            @endsection

            @section('js')

                <!-- Scripts para los dataTables -->
                <script src="{{ asset('public/tools/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('public/tools/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
                <script src="{{ asset('public/tools/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
                <script src="{{ asset('public/tools/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
                <script src="{{ asset('public/views/mi_perfil.js?v='. time()) }}"></script>

            @endsection
