    @extends('layouts.app')

        @section('meta')
            <meta name="csrf-token" content="<?= csrf_token() ?>">
        @endsection

        @section('css')

            <link rel="stylesheet" href="{{ asset('public/template/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
            <!-- <link rel="stylesheet" href="{{ asset('template/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}"> -->
            <link rel="stylesheet" href="{{ asset('public/template/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
            <link rel="stylesheet" id="css-main" href="{{ asset('public/template/assets/js/plugins/select2/css/select2.min.css') }}">
        
        @endsection

        @section('breadcrumb')
            
            <li class="breadcrumb-item" aria-current="page">
                <a class="link-fx" href="{{ route('permisos.index') }}">
                    Permisos de usuario
                </a>
            </li>

        @endsection

        @section('content')

            <h2 class="content-heading">
                Listado de Roles de Usuario
            </h2>
            <div class="block block-themed">
                <div class="block-header bg-amethyst-dark">
                    <h3 class="block-title">Permisos de Usuarios</h3>
                    <div class="block-options space-x-1">
                        @can('permiso-create')
                        <a class="btn btn-sm btn-alt-secondary" href="{{ route('permisos.create') }}">
                            <i class="fa fa-clone"></i> Nuevo registro
                        </a>
                        @endcan

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
                    <div class="table-responsive tbl-permisos"></div>
                </div>
            </div>


        @endsection

        @section('js')
            
            <script src="{{ asset('public/template/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
            <script src="{{ asset('public/views/permisos/index.js') }}"></script>
            <!-- <script src="{{ asset('views/tools.js') }}"></script> -->

        @endsection

        @section('script')  

            $('._permiso').addClass('active');
            var _permissionEdit=false;
            var _permissionDelete=false;

            @can('rol-edit')

                _permissionEdit=true;
            @endcan
            @can('rol-delete')

                _permissionDelete=true;
            @endcan

        @endsection