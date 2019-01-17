<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <nav>

                <div>
                    <ul>
                        <li><a href="/students">Студенты</a></li>
                        <li><a href="/courses">Курсы</a></li>
                    </ul>
                </div>

                <div class="logout">
                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">{{ __('Выйти') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </nav>

            <div class="logo">
                <a href="/">
                    <img src="{{asset('img/alif_logo.svg')}}" alt="logo" class="img-fluid">
                </a>
            </div>
        </div>
        <div class="col-md-10 main">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>