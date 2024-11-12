<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Transición</title>
        <meta name="description" content="Descripcion del sitio">
        <meta name="author" content="Autor sitio web">
        <meta name="robots" content="noindex, nofollow">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Open Graph Meta -->
        <meta property="og:title" content="Titulo del sistema">
        <meta property="og:site_name" content="Nombre del sistema">
        <meta property="og:description" content="Descripcion del sistema">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://127.0.0.1/">
        <meta property="og:image" content="">
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('template/assets/media/favicons/favicon.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('template/assets/media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('template/assets/media/favicons/apple-touch-icon-180x180.png') }}">
        <!-- END Icons -->
        <!-- Stylesheets, OneUI framework -->
        <link rel="stylesheet" id="css-main" href="{{ asset('public/template/assets/css/oneui.min.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('public/template/assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('public/template/assets/js/plugins/animate/animate.min.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('public/template/assets/css/themes/amethyst.min.css') }}">
        <!-- END Stylesheets -->

        @yield('css')

        <style>
            .select2-selection__rendered {
                line-height: 60px !important;
            }
            .select2-container .select2-selection--single {
                height: 65px !important;
            }
            .select2-selection__arrow {
                height: 65px !important;
            }
            .bg-thead { /*eff3f6*/
                background-color: #eff3f6  !important;
            }
        </style>
    </head>
    <body>
        <div class="page-header-dark main-content-boxed" id="page-container">
            <header id="page-header">
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <a class="fw-semibold fs-5 tracking-wider text-dual me-3" href="{{ route('home') }}">
                            TRAN<span class="fw-normal">SICIÓN</span>
                        </a>

                        <!-- Notifications Dropdown -->
                        @include('layouts.notifications')
                        <!-- END Notifications Dropdown -->

                    </div>
                    <div class="d-flex align-items-center">
                        <div class="dropdown d-inline-block ms-2">
                            <button aria-expanded="false" aria-haspopup="true" class="btn btn-sm btn-alt-secondary" data-bs-toggle="dropdown" id="page-header-user-dropdown" type="button">
                                <img alt="Avatar" class="rounded-circle" src="{{ asset('public/template/assets/media/avatars/avatar.png') }}" style="width: 21px;">
                                    <span class="d-none d-sm-inline-block ms-1">
                                        {{ Auth::user()->name }}
                                    </span>
                                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                                </img>
                            </button>
                            <div aria-labelledby="page-header-user-dropdown" class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0">
                                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                                    <img alt="" class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('public/template/assets/media/avatars/avatar.png') }}">
                                        <p class="mt-2 mb-0 fw-medium">
                                            {{ Auth::user()->name }}
                                        </p>
                                        <p class="mb-0 text-muted fs-sm fw-medium">
                                            {{ Auth::user()->roles->pluck('name')[0] }}
                                        </p>
                                    </img>
                                </div>
                                <div class="p-2">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('mi/perfil') }}">
                                        <span class="fs-sm fw-medium">
                                            Mi perfil
                                        </span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <span class="fs-sm fw-medium">
                                                Cerrar sesión
                                            </span>
                                    </a>
                                    <input type="hidden" id="id_usuario" name="id_usuario" value="{{ Auth::user()->id }}">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay-header bg-primary-lighter" id="page-header-loader">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin text-primary">
                            </i>
                        </div>
                    </div>
                </div>
            </header>
            <main id="main-container">
                <div class="bg-primary-darker">
                    <div class="content py-3">
                        <div class="d-lg-none">
                            <button class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center" data-class="d-none" data-target="#main-navigation" data-toggle="class-toggle" type="button">
                                Menu <i class="fa fa-bars"></i>
                            </button>
                        </div>

                        <!-- Main Navigation -->
                        @include('layouts.navigations')
                        <!-- END Main Navigation -->

                    </div>
                </div>
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                            <div class="flex-grow-1">
                                <h1 class="h4 fw-bold mb-0">
                                    @if ( !empty(session('dependencia_slc')) )
                                        {{ session('dependencia_slc') }}
                                    @endif
                                </h1>
                            </div><br />
                            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">

                                    @yield('breadcrumb')

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="content">

                    <!-- Your Block -->
                    @yield('content')
                    <!-- END Your Block -->

                </div>
            </main>
            <footer class="bg-body-extra-light" id="page-footer">
                <div class="content py-3">
                    <div class="row fs-sm">
                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                            <a class="fw-semibold" href="" target="_blank">Blank v1.0</a> © <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- END Page Container -->
        <script src="{{ asset('public/template/assets/js/oneui.app.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/lib/jquery.min.js') }}"></script>
        <script src="{{ asset('public/template/assets/js/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
        <!-- Personal Js-Script -->
        <script src="{{ asset('public/views/tools.js') }}"></script>
        <script>var vURL=window.location.origin + '/transicion';</script>

        @yield('js')

        <script type="text/javascript">
            @yield('script')
        </script>
    </body>
</html>