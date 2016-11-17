<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <header>
            @if (Auth::check())
                <?php
                $menuConfig = [
                        'name' => Auth::user()->name,
                        'menus' => [
                                ['name' => 'Contas a pagar', 'url'  => '/teste', 'dropdownId' => 'teste'],
                                ['name' => 'Contas a receber', 'url'  => '/teste1']
                        ],
                        'menusDropdown' => [
                                [
                                        'id' => 'teste',
                                        'items' => [
                                                ['name' => 'Listar contas', 'url'  => '/listar'],
                                                ['name' => 'Criar contas', 'url'  => '/criar']
                                        ]
                                ]
                        ],
                        'urlLogout' => env('REDIRECT_LOGOUT'),
                        'csrfToken' => csrf_token()
                ];
                ?>
                <admin-menu :config="{{ json_encode($menuConfig) }}"></admin-menu>
            @else
                <div class="row">
                    <div class="col s12 blue-grey darken-4">
                        <h4 class="white-text">SISDS Controle Financeiro</h4>
                    </div>
                </div>
            @endif
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    © {{ date('Y') }} Todos os direitos reservados
                    <a class="white-text" target="_blank" href="http://sisds.com.br"> SISDS-WEB</a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{asset('build/admin.bundle.js')}}"></script>
</body>
</html>
