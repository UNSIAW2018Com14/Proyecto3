@extends ('layout')
@section ('content')

<link href="{{ asset('css/estiloLogin.css') }}" rel="stylesheet">
<div class = "login">
    <h1 class="login-title">Bienvenido</h1>
    <form method ="post" action ="/login">
        {{ csrf_field() }}
        <div class = "form-group">
            <input type ="email" class ="form-control, login-input"  placeholder="Email Adress" id = "email" name = "email" required autofocus>
        </div>
        <div class = "form-group">
            <input type ="password" class ="form-control, login-input" id = "password" name = "password" placeholder="Password" required>
        </div>
        <div class = "form-group">
            <button type ="submit" class="btn btn-primary, login-button"><a href="{{ url('/login') }}"><div class="texto-boton">Ingresar</div></button>
        </div>
    @include ('errors')
    </form>
</div>
@endsection
