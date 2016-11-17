@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 5%;">
            <div class="col s8 offset-s2 z-depth-2">
                <h5 class="center">DS-Financeiro Admin</h5>
                <form method="POST" action="{{ url(env('REDIRECT_LOGIN')) }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12">
                            <?php $msgError = $errors->has('email') ? "data-error='{$errors->first('email')}'" : null ?>
                            <input id="email" type="email" class="validate {{$msgError?'invalid':$msgError}}" name="email" value="{{ old('email') }}"
                                   required autofocus>
                            <label for="email" {!! $msgError !!} class="active">E-Mail</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <?php $msgError = $errors->has('password') ? "data-error='{ $errors->first('password') }'" : null ?>
                            <input id="password" type="password" class="validate {{$msgError?'invalid':$msgError}}" name="password"
                                   value="{{ old('password') }}"
                                   required autofocus>
                            <label for="password" {!! $msgError !!} class="active">Senha</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Lembrar</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="btn blue-grey darken-2">Entrar</button>
                            <a class="btn btn-link  blue-grey darken-2" href="{{ url('/password/reset') }}">
                                Esqueceu sua senha?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
