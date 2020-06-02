<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/solid.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <section class="container-wrap">
        @include('_nav')

        @if (session('Error'))
            <div class="alert alert-danger">
                <div class="container">
                    {{ session('Error') }}
                </div>
            </div>
        @endif

        @if (session('Info'))
            <div class="alert alert-info">
                <div class="container">
                    {{ session('Info') }}
                </div>
            </div>
        @endif

        @if(session('errors'))
            <div class="alert alert-danger">
                <div class="container">
                    Please fix the following errors
                    <ul>
                        @foreach(session('errors')->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <br>
        <div class="container">
            @yield('content')
        </div>

        <footer>
            Copyright &copy; 2020. Mater Dei College
        </footer>
    </section>
    @yield('scripts')

</body>
</html>
