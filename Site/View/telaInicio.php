<?php
require_once('../Controller/verificaLogado.php');
if (isset($email)):
	?>
	<!DOCTYPE html>
	<!--
	To change this license header, choose License Headers in Project Properties.
	To change this template file, choose Tools | Templates
	and open the template in the editor.
	-->
	<html>
		<head>
			<title>Dashboard</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

			<link href="https://fonts.googleapis.com/css?family=Fresca|Gloria+Hallelujah|Indie+Flower|Kurale" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

			<link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />
			<link rel="stylesheet" href="css/dashboard.css">
			<link rel="stylesheet" href="css/principal.css">
			<link rel="stylesheet" href="css/fonts.css">

			<script src="js/telaInicio.js"></script>
		</head>
		<body>

			<header>
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<img src="https://scontent.fbhz1-1.fna.fbcdn.net/v/t1.0-9/22195304_1532098256869998_3735058284248166732_n.jpg?oh=fafdd412830304a5d9a23dbb94a71fd0&oe=5A90EDDA" class="img-circle img-prof" alt="">
								<a href="#" class="dropdown-toggle nome-prof-nav" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="nomeProfessor"><?php echo $nome; ?><span class="caret caret-nav"></span></a>
								<ul class="dropdown-menu">
									<li class="drop-item">
										<a class="glyphicon glyphicon-pencil"   data-toggle="modal" data-target="#modalPerfil" href="#"></a>
										<a href="#" class="pleft0" data-toggle="modal" data-target="#modalPerfil" >Editar perfil</a>
									</li>
									<li role="separator" class="divider"></li>
									<li class="drop-item">
										<a class="glyphicon glyphicon-lock" href="#"></a>
										<a href="#" class="pleft0">Alterar minha senha</a>
									</li>
									<li role="separator" class="divider"></li>
									<li class="drop-item">
										<a href-"../Controller/sairLogado.php" class=" glyphicon glyphicon-log-out" href="#"></a>
										<a href="../Controller/sairLogado.php" class="pleft0">Encerrar sessão </a>
									</li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<ul class="nav navbar-nav inline pull-right">
								<li><a class=" glyphicon glyphicon-cog config-ico" href="#"></a></li>
								</ul>
							</div>
						</div>
					</div>

					 <!-- organizacao diarios -->
			<section id="organized">
				<div class="container-fluid" id="organizaDiarios">
					<div class="row" >
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<ul class="nav navbar-nav inline pull-right">
								<li><a class=" glyphicon glyphicon-th config-ico-organized" href="#"></a></li>
								<li><a class=" glyphicon glyphicon-th-list config-ico-organized" href="#"></a></li>
							</ul>
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<ul class="nav navbar-nav inline pull-center" >
								<li><a  href="#" class="organizedSchool">Por escola</a></li>
							</ul>
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<ul class="nav navbar-nav inline" >
								<li><a  href="#" class="organizedSchool">Por disciplina</a></li>
							</ul>
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
							<ul class="nav navbar-nav inline pull-right">
									<li><a href="cadastrarDiario.php" class="btn btn-novo-diario">Criar novo diário</a></li>

								</ul>
						</div>
					</div>
				</div>
			</section>

				</nav>
			</header>



			<!-- caixas de exibição de diarios-->
			<section id="diarios">
				<div class="container">
					<div class="row" id="diariosExibicao">
						<!-- Aqui ficam os diarios -->
					</div>
				</div>
			</section>




			<!-- Modals -->

			<div class="modal fade" id="modalPerfil" tabindex="-1" role="dialog" aria-labelledby="Pop up para edição de dados do perfil">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="modalPerfilLabel">Editar Perfil</h4>
						</div>
						<form class="form-signin" action="../Controller/professorInterface.php" method="POST">
							<input type="hidden" value="<?php echo $email; ?>" name="emailProfessor">
							<input type="hidden" value="alterar" name="acao">
							<div class="modal-body text-center">
								<img src="https://scontent.fbhz1-1.fna.fbcdn.net/v/t1.0-9/22195304_1532098256869998_3735058284248166732_n.jpg?oh=fafdd412830304a5d9a23dbb94a71fd0&oe=5A90EDDA" class="img-circle img-edPerfil" alt="">
								<br>
								<input type="text" id="nomeProfessor" name="nomeProfessor" class="mtop30 form-control-cdst btn-outline" placeholder="Digite seu nome" required value="<?php echo $nome; ?>">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								<button type="submit"  class="btn btn-primary" id="btnAlterarNome">Salvar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</body>
	</html>
	<?php
else:
	?>
	<script>
		window.location.replace("loginTela.php");
	</script>
<?php
endif;
?>
