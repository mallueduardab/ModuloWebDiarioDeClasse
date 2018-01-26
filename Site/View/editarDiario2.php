<?php
require_once('../Controller/verificaLogado.php');
require_once('../Controller/Utils/Util.class.php');
if(isset($email) && isset($_POST["idDiario"])):

?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Editar Diário</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/controleAulas.css">
		<link rel="stylesheet" href="css/fonts.css">
		<link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />
		<script src="js/cdst.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Fresca|Gloria+Hallelujah|Indie+Flower|Kurale" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/editarDiario2.js"></script>
	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="nav-title-top">
						<h4 class="cdst-left">
							<a class="backpage_glypicon" href="index.php">
								<span class="glyphicon glyphicon-chevron-left"></span>
								Assistente de Edição de Diário
							</a>
						</h4>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid body_white">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="row ">
					<p class="description-about-theme text-justify">
						No regime bimestral, você pode adicionar até 4 períodos. Lembre-se que cada período tem uma data de início e fim.
						Caso queira fazer isso depois, clique no botão finalizar. Ao adicionar um novo período não se esqueça de clicar
						no botão confirmar (Você sempre poderá editar essas informações futuramente, caso cometa algum engano).
					</p>

				</div>
				<form id="formSalvar" action="../Controller/diarioInterface.php" method="POST">
					<!-- hiddens -->
					<input type="hidden" name="escola" value="<?php echo $_POST['escola']; ?>">
					<input type="hidden" name="disciplina" value="<?php echo $_POST['disciplina']; ?>">
					<input type="hidden" name="modalidade" value="<?php echo $_POST['modalidade']; ?>">
					<input type="hidden" name="serie" value="<?php echo $_POST['serie']; ?>">
					<input type="hidden" name="turma" value="<?php echo $_POST['turma']; ?>">
					<input type="hidden" id="regime" name="regime" value="<?php echo $_POST['regime']; ?>">
					<input type="hidden" id="idDiario" name="idDiario" value="<?php echo $_POST["idDiario"]; ?>">
					<input type="hidden" id="regimeAntigo" name="regimeAntigo" value="<?php echo $_POST["regimeAntigo"]; ?>">
					<input type="hidden" name="acao" value="alterar">

					<div id="periodos">

					</div>

					<br/>
					<br/>
					<div class=" col-sm-12 col-md-12 col-lg-12 col-xl-12 row">
						<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
							<!-- essa parte precisa arrumar casodeseje cancelar a criação do diário, e não salvar os dados -->
							<a href="#">
								<button  class="btn-cdst-rtrn btn">
									<span class="glyphicon glyphicon-chevron-left"></span> Cancelar e sair
								</button>
							</a>
						</div>

						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6"></div>

						<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
							<span class="btn-cdst-rtrn btn" id="salvar" value="salvar">
								Próximo <span class="glyphicon glyphicon-chevron-right"></span>
							</span>
						</div>
					</div>

				</form><!-- fecha form -->



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
