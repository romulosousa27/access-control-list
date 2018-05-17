<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        {{--    Bootstrap 3    --}}
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">ACL Laravel</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">Laravel</a></li>
                <li><a href="#">Como Funciona</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Route::has('login'))
                    @auth
                        <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Login </a></li>
                        <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-log-in"></span> Cadastra-se </a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </nav>









    {{--    Bootstrap 3    --}}
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
