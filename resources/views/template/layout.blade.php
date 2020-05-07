<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School</title>

    <link rel="stylesheet" href="{{ url('assets/styles/lib/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <link rel="stylesheet" href="{{ url('assets/styles/global.css') }}" />
</head>

<body>
    <header>
        <div class="nav-container">
            <div class="nav-content">
                <a href="/home" class="nav-logo">MEDICAL CLINIC</a>
                <div class="menu d-flex justify-content-center align-items-center">
                    <div class="user pr-3 d-flex justify-content-center align-items-center">
                        <img src="{{ url('assets/img/user.svg') }}" alt="Usuário" width="25">
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                    
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bars"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/schedule">Consultas</a>
                            <a class="dropdown-item" href="/patient">Pecientes</a>
                            <a class="dropdown-item" href="/doctor">Médicos</a>
                            <a class="dropdown-item" href="/specialty">Especialidades</a>
                            <a 
                                class="dropdown-item text-danger" 
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >
                                {{ __('Logout') }}
                            </a>

                            <form 
                                id="logout-form" 
                                action="{{ route('logout') }}" 
                                method="POST" 
                                style="display: none;"
                            >
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container">
        @yield('content')
    </main>
    
    <script src="{{ url('assets/js/lib/jquery-3.4.1.slim.mim.js') }}"></script>
    <script src="{{ url('assets/js/lib/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/lib/bootstrap.min.js') }}"></script>
</body>

</html>