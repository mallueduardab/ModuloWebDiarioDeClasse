<?php
require_once('../Controller/verificaLogado.php');
if (isset($email) && isset($_GET['idDiario']) && isset($_GET['idAvaliacao'])):
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
			<link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />

			<link href="https://fonts.googleapis.com/css?family=Fresca|Gloria+Hallelujah|Indie+Flower|Kurale" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


			<link rel="stylesheet" href="css/principal.css">
			<link rel="stylesheet" href="css/fonts.css">
		</head>
		<body>
			<input type="hidden"  id="idDiario" value="<?php echo $_GET["idDiario"]; ?>">
			<input type="hidden"  id="idAvaliacao" value="<?php echo $_GET["idAvaliacao"]; ?>">
			<header class="header-red">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-xs-12 col-md-6 col-lg-6 text-white mtop20" id="avaliacao">

						</div>
						<div class="col-sm-6 col-xs-12 col-md-6 col-lg-6 mtop40 text-left text-white" id="diario">

						</div>
					</div>
					<a class="top-icon-back m30" href="diario-detalhes.php?idDiario=<?php echo $_GET["idDiario"]; ?>">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					</a>
					<a class="top-icon-trash m30" href="#" data-toggle="modal" data-target="#modalDeletaAvaliacao">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</div>
			</header>

			<div class="container mtop40 text-center">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<table class="table table-responsive">
							<thead>
							<th></th>
							<th></th>
							<th class="text-center">%</th>
							<th class="text-center">Nota</th>
							</thead>
							<tbody id="alunos">

							</tbody>
						</table>
						<a class="btn btn-blue text-center mtop40" id="btnLancar">Concluir Lançamento</a>
					</div>
				</div>
			</div>


			<!--Modals-->
			<div class="modal fade" id="modalDeletaAvaliacao" tabindex="-1" role="dialog" >
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body ">
							<h2>Atenção!</h2>
							<h4>Você está prestes a excluir essa avaliação. Tem certeza que deseja fazer isso?</h4>
							<button type="submit" class="btn btn-default mtop20" id="btnDeletar">Sim, exclua</button>
							<button type="button" class="btn btn-success mtop20" data-dismiss="modal">Voltar</button>

						</div>
					</div>
				</div>
			</div>

			<script src="js/lancarNotas.js"></script>
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
