@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content d-flex justify-content-center align-items-center flex-column">

        <div 
            class="form-row mt-5 col-lg-12 d-flex justify-content-between align-items-center"
        >
            <div class="col-md-6">
                <img src="{{ url('assets/img/login.svg') }}" alt="Login" width="500">
            </div>
            <div class="col-md-6">
                <div class="col-md-8">
                    <h1>Faça seu Logon</h1>
                </div>    

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="col-md-8 mt-4">
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autocomplete="email" 
                            autofocus
                            placeholder="Endereço de E-mail"
                        >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-8 mt-4">
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            required 
                            autocomplete="current-password" 
                            placeholder="Senha"
                        >

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="col-md-8 mt-2">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif
                    </div>

                    <div class="col-md-8 mt-4">
                        <button type="submit" class="btn btn-default">
                            Entrar
                        </button>
                    </div>

                    <div class="col-md-8 mt-2 text-center">
                        @if (Route::has('register'))
                            <p>Novo por aqui? 
                                <a href="{{ route('register') }}"> Criar conta!</a>
                            </p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>    
 </div>
@endsection
