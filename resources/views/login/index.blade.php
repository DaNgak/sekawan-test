<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login & Register Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset("style/loginstyle.css") }}" />
		<link rel="shortcut icon" href="{{ asset('/assets/img/favicon.ico') }}" type="image/x-icon">	
    </head>
	<body>
		<div class="container" id="container">
			<div class="form-container sign-in-container">
				<form action="{{ route('login.store') }}" method="post">
					@csrf
					<h1 style="margin-bottom: 1rem">Form Login</h1>
					{{-- <div class="social-container">
						<a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-facebook"></em></a>
						<a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-google"></em></a>
						<a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-linkedin"></em></a>
					</div> --}}
					{{-- <span>Masukkan Username dan Password</span> --}}
					<input type="text" name="username" placeholder="Username" required />
					<input type="password" name="password" placeholder="Password" required />
					@if (session()->has("loginError")) 
						<p class="message-error">{{ session("loginError") }}</p>
					@endif
					<a style="cursor: pointer;" onclick="alert('Belum Berfungsi')">Lupa password</a>
					<div class="button-form">
						<button type="submit">Login</button>
					</div>
				</form>
			</div>
			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overlay-right">
						<h1>Tips</h1>
						<p>Jangan beritahukan data pribadi anda, termasuk username dan password saat menggunakan semua sistem informasi</p>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>