<?php
require_once('../Controller/verificaLogado.php');
if (!isset($email)):
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/cadastro.css">
		<link rel="stylesheet" href="css/fonts.css">
                <link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />
		<link href="https://fonts.googleapis.com/css?family=Fresca|Gloria+Hallelujah|Indie+Flower|Kurale" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="card card-container">
				<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
				<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
				<p id="profile-name" class="profile-name-card">CRIAR NOVO USUÁRIO</p>
				<form class="form-signin" action="assistenteInicialPT1.php" method="POST">
					<span id="reauth-email" class="reauth-email"></span>
					<input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required >
					<input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="senha" required>


					<div id="remember" class="checkbox">
						<label>
							 <!--<input type="checkbox" value="remember-me" name="lembrar"> Remember me -->
							<input type="checkbox" name="lembrar" value="s"> Remember me
						</label>
					</div>

					<button class="btn btn-lg btn-primary btn-block btn-signin">ENTRAR</button>
				</form><!-- /form -->
				<a href="#" class="forgot-password">
					Esqueceu sua senha
				</a>
			</div><!-- /card-container -->

			<a href="loginTela.php">
				<button class="btn-cdst-rtrn btn btn-blockk">
					<span class="glyphicon glyphicon-chevron-left"> </span> JÁ POSSUO CADASTRO
				</button>
			</a>

		</div><!-- /container -->

	</body>
</html>
<?php else: ?>
<script>
	window.location.replace("telaInicio.php");
</script>
<?php endif; ?>
