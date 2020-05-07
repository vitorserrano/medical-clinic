@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content d-flex justify-content-center align-items-center flex-column">

        <div 
            class="form-row mt-5 col-lg-12 d-flex justify-content-between align-items-center"
        >   
            <div class="col-md-6">
                <div class="col-md-8">
                    <h1>Crie sua conta!</h1>
                </div>    

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="col-md-8 mt-4">
                        <input 
                            id="name" 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            name="name" 
                            value="{{ old('name') }}" 
                            required 
                            autocomplete="name" 
                            autofocus
                            placeholder="Nome de usuário"
                        >

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-8 mt-4">
                        <input 
                            id="email" 
                            type="email"
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autocomplete="email"
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

                    <div class="col-md-8 mt-4">
                        <input 
                            id="password-confirm" 
                            type="password" 
                            class="form-control" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            placeholder="Confirmar senha"
                        >
                    </div>

                    <div class="col-md-8 mt-4">
                        <button type="submit" class="btn btn-default">
                            Criar conta
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{ url('assets/img/register.svg') }}" alt="Login" width="500">
            </div>
        </div>
    </div>    
 </div>
@endsection
