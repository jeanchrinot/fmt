<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Login | Malagasy eto Torkia</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/fontawesome/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body id="login-page" class="bg-light">

	<header class="container-fluid">
		<div class="row bg-info p-1">
			<div class="logo">
				<img src="../assets/img/logo.jpg"> 
			</div>
			<a class="navbar-brand" href="../public/index.php">malagasy eto torkia</a>
		</div>
	</header>

	<div class="container p-3">
		<style type="text/css">
			
		</style>
		<form action="{{ url('admin/auth') }}" class="login-form shadow" method="post">
			{{ csrf_field() }}
			<h4>Administrateur</h4>
			<div class="form-group">
				<label>Pseudo ou adresse email : </label>
				<input type="text" name="email" class="form-control" value="{{ old('email') }}" autofocus>
			</div>
			<div class="form-group">
				<label>Mot de passe : </label>
				<input type="password" name="password" class="form-control">
			</div>
			<p><a href="forgot-password.php">Mot de passe oublié?</a></p>
			<p><input type="checkbox" name="remember-me" checked>&nbsp;&nbsp;Souvenir</p>
			<button class="btn btn-info w-100" type="submit">Se connecter</button>


			@isset($errMessage)

				<span class="error">{{ $errMessage ?? '' }}</span>

			@endisset

			 @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                    @foreach($errors->all() as $error)
                        <li>
                                {{ $error }}
                        </li>
                    @endforeach
                        </ul>
                    </div>
             @endif
		</form>

	</div>
	
</body>
</html>