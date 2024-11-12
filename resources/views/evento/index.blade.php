    @extends('layouts.app')

        @section('css')

            <link rel="stylesheet" href="{{ asset('public/template/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
            <link rel="stylesheet" href="{{ asset('template/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
            <link rel="stylesheet" href="{{ asset('public/template/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
            <link rel="stylesheet" id="css-main" href="{{ asset('public/template/assets/js/plugins/select2/css/select2.min.css') }}">
        @endsection

       

        @section('content')

            <h2 class="content-heading">Total registrados <b class="fs-3 fw-bold _total_registro"></b></h2>
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
                    <div class=" tbl-evento"></div>
                </div>
            </div>

        @endsection


        @section('js')

            <!-- Page JS Plugins -->
            <script src="{{ asset('public/template/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>        
            <!-- Begin: DataTable Export -->
            <script src="{{ asset('public/template/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
            <script src="{{ asset('public/template/assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
            <!-- End: DataTable Export -->
            <script src="{{ asset('public/template/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
            <!-- Personal Js-Script -->
            <script src="{{ asset('public/views/eventos/index.js') }}"></script>

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