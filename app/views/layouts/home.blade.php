@extends('layouts/layout')

@section('content')
@if( ! Auth::check())
<div class="row col-sm-6 col-sm-offset-3">
	<div class="jumbotron">
		<div class="container">

			{{Form::open(['route'=>'login', 'method'=>'post', 'role'=>'form','class'=>'form-horizontal'])}}
			@if(Session::has('login_error'))
				<div class="alert alert-danger" role="alert">Email o Contraseña incorrectos!!!</div>
			@endif
			<h2 class="form-signin-heading">Iniciar Sesion</h2>
				<div class="input-group">
				      <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
					{{Form::email('email',null,['class'=>'form-control','placeholder'=>'Correo electronico','required','autofocus'])}}
				</div>
				<br>
				<div class="input-group">
				      <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
					{{Form::password('password', ['class'=>'form-control','placeholder'=>'Contraseña','required'])}}
				      </div>
				<br>
				<button class="btn btn-success" type="submit">Entrar</button>
			{{Form::close()}}

		</div> <!-- /container -->
	</div>
</div>
@endif
@stop
