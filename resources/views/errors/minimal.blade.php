<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        {{-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
        </style> --}}
        <style>
            *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.img{
    background: url('{{ asset('assets/default/default-error.jpg') }}') center center/cover no-repeat;
    height: 100vh;
}

.overlay {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.4);
}

.text {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    height: 100%;
    color: #fff;
}

.text-1 {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 6rem;
    padding-top: 200px;
}

.text-2 {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 1.8rem;
}

.btn{
    margin-top: 50px;
    background: #FF7300;
    padding: 10px 30px;
    font-size: 1.4rem;
    border-radius: 10px;
    transition: all 0.5s ease-in-out;
}

.btn:hover {
    background: #073975;
}

.btn a {
    text-decoration: none;
    color: #fff;
}
        </style>
        <style>
            @media (max-width:500px) {
    .text-1 {
        font-size: 3rem !important;
    }

    .text-2 {
        font-size: 5vw !important;
        padding: 10px;
    }

    .btn {
        margin-top: 20px !important;
        font-size: 4vw !important;
    }
}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            {{-- <div class="code">
                @yield('code')
            </div>

            <div class="message" style="padding: 10px;">
                @yield('message')
            </div> --}}
            @yield('code')
        </div>
    </body>
</html>
