    @extends('layouts.app')

        @section('css')

            <link rel="stylesheet" href="{{ asset('template/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
            <!-- <link rel="stylesheet" href="{{ asset('template/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}"> -->
            <link rel="stylesheet" href="{{ asset('template/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">

        @endsection

        @section('breadcrumb')

            <li class="breadcrumb-item" aria-current="page">
                <a class="link-fx" href="{{ route('home') }}">
                    Inicio
                </a>
            </li>

        @endsection

        @section('content')

            <!-- <div class="row items-push">
                <div class="col-sm-6 col-xxl-6">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold" id="_sesion_ordinaria">0</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Profesores</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-hourglass-half fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="#">
                                <span>Ver todas los Profesores</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xxl-6">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold" id="_sesion_extraordinaria">0</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Alumnos</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-hourglass fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="#">
                                <span>Ver todos los Alumnos</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block block-themed">
                <div class="block-header bg-flat-dark">
                    <h3 class="block-title">Listado de insidencias del día</h3>
                    <div class="block-options space-x-1">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#one-dashboard-search-orders" data-class="d-none">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div id="one-dashboard-search-orders" class="block-content border-bottom d-none">
                    <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                        <div class="push">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-alt" id="one-ecom-orders-search" name="one-ecom-orders-search" placeholder="Search all orders..">
                                <span class="input-group-text bg-body border-0">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full">
                    <div class="table-responsive tbl-usuario-dependencias"></div>
                </div>
            </div> -->

        @endsection

        @section('js')

            <!-- Page JS Plugins -->
            <script src="{{ asset('template/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('template/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
            <script src="{{ asset('template/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('template/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
            <!-- Personal Js-Script -->
            <script src="{{ asset('views/home-administrador.js') }}"></script>

        @endsection
