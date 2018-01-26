<?php
require_once('../Controller/verificaLogado.php');
if (isset($email) && isset($_GET['idDiario']) && isset($_GET['idAluno']) && isset($_GET['nomeAluno'])):
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
			<link rel="stylesheet" href="css/sobreAluno.css">
			<link rel="stylesheet" href="css/principal.css">
			<link rel="stylesheet" href="css/fonts.css">
		</head>
		<body>
			<input type="hidden"  id="idDiario" value="<?php echo $_GET["idDiario"]; ?>">
			<input type="hidden"  id="idAluno" value="<?php echo $_GET["idAluno"]; ?>">
			<header class="header-red">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 text-white mtop40">
							<h4>Boletim de</h4>
							<h1 class="pleft0"><?php echo $_GET["nomeAluno"]; ?></h1>
							<h3 id="mediaGeral"></h3>

						</div>

						<a class="top-icon-back m30" href="diario-detalhes.php?idDiario=<?php echo $_GET["idDiario"]; ?>">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>

						<a class="top-icon-trash m30" href="#" data-toggle="modal" data-target="#modalDeletaAluno">
							<span class="glyphicon glyphicon-trash"></span>
						</a>
					</div>
				</div>
			</header>


			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-12 col-md-6 col-lg-6 ">
						<div class="box">
							<div class="box-cabecalho">
								<h3 class="upper">Frequência</h3>
							</div>
							<div class="main-box-frequencia p15" id="presenca">

							</div>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12 col-md-6 col-lg-6">
						<div class="box">
							<div class="box-cabecalho">
								<h3 class="upper">Notas</h3>
							</div>
							<div class="main-box-notas p15 text-center" id="avaliacao">
								<div id="avaliacoes">

								</div>

								<a href="tabela.php" class="btn btn-blue text-center mtop20">Gerar Tabela</a>
							</div>
						</div>
					</div>

				</div>
			</div>


			<!--Modals-->
			<div class="modal fade" id="modalDeletaAluno" tabindex="-1" role="dialog" >
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body ">
							<h2>Atenção!</h2>
							<h4>Você está prestes a excluir esse aluno. Tem certeza que deseja fazer isso?</h4>
							<button type="submit" class="btn btn-default mtop20" id="btnDeletar">Sim, exclua</button>
							<button type="button" class="btn btn-success mtop20" data-dismiss="modal">Voltar</button>

						</div>
					</div>
				</div>
			</div>
			<script src="js/sobreAluno.js"></script>
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
