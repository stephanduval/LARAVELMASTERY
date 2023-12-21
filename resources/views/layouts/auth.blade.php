<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Tracking MIS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


</head>

<body>

    <div class="auth-main">
        <div class="auth-container">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 d-md-block d-none max-height:10px">
                        <img src="{{ asset('images/auth.png') }}" alt="auth" width="auto" height="560em">

                    </div>

                    <div class="col-md-6">
                        @if (Session::has('success-message'))
                            <p class="text-success text-center">
                                {{ session::get('success-message') }}
                            </p>
                        @endif
                        @yield('content')

                    </div>
                </div>
            </div>

        </div>
    </div>


</body>

</html>
