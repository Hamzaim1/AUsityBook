
<html>
  <head>
<link rel="stylesheet" type="text/css" href="css/main.css">
	
  </head>
<body id="LoginForm">
<div class="container">
<div class="login-form">
<div class="main-div">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" id="Login" method="post" action="monApplication.php?action=login">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Pseudo</span>
						<input class="input100" type="text" placeholder="Enter username" name="log">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Mot de passe</span>
						<input class="input100" type="password"  placeholder="Enter password"  name="pass">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">


						<div>
							<a href="#" class="txt1">
								Mot de passe oublié ?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Se connecter
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
    </div>

	</div>
</div>


</body>
</html>
