<?php
	require_once('../Controller/verificaLogado.php');
	if(!isset($email)):
?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Controle suas Aulas!</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/controleAulas.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/fonts.css">
                <link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />


	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
					<h1 class="title">CONTROLE SUAS AULAS ONDE <br/> ESTIVER, SEM COMPLICAÇÃO!</h1>
				</div>
			</div>
		</div>


		<div class="container-fluid" >
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 " >
					<p class="description text-justify">
						O Diário de Classe é a plataforma que você precisa <br/>
						dizer adeus à papelada e às dezenas de diários <br/>
						usados todos os dias. Agora você pode ter todos os <br/>
						seus dados em um único dispositivo!
					</p>
				</div>
			</div>
		</div>


		<!--Botoes-->
		<div class="container">
			<div class="row btn-initial">
				<div class=" col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2 col-xl-4 col-xl-offset-2">
					<a href="cadastroTela.php" class="btn btn-info " role="button" >FAZER MEU CADASTRO</a>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" >
					<a href="loginTela.php" class="btn btn-info btn-initial" role="button" >ACESSAR MEUS DIÁRIOS</a>
				</div>
			</div>
		</div>

	</body>


</html>
<?php
	else:
		?>
			<script>
				window.location.replace("telaInicio.php");
			</script>
		<?php
	endif;
?>
