<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - {{ Config::get('app.titlename') }}</title>

    @section('styles')
        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    @show

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .content-container {
            margin-top: 10px;
        }
    </style>
</head>
<body id="app-layout">
    <div class="page-container">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">ToolsForEver</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row row-offcanvas row-offcanvas-left">
                <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation">
                    <ul class="nav">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/medewerkers') }}">Medewerkers</a></li>
                        <li><a href="{{ url('/artikelen') }}">Producten</a></li>
                        <li><a href="{{ url('/voorraad/locatie') }}">Locatie Voorraad</a></li>
                        <li><a href="{{ url('/locaties') }}">Locaties</a></li>
                        <li><a href="{{ url('/fabrieken') }}">Fabrieken</a></li>
                        <li><a href="{{ url('/voorraad/zoeken') }}">Zoeken</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>

                <div class="col-xs-12 col-sm-10 content-container">
                    <noscript>
                        Deze webpagina werkt het beste met Javascript.
                    </noscript>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('js/sidebar.js') }}"></script>
    @show
</body>
</html>
