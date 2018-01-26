<?php
require_once('../Controller/verificaLogado.php');
require_once('../Controller/Utils/Util.class.php');
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
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

			<link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />
			<link rel="stylesheet" href="css/diario-detalhes.css">
			<link rel="stylesheet" href="css/principal.css">
			<link rel="stylesheet" href="css/fonts.css">

		</head>
		<body>
			<input type="hidden"  id="idDiario" value="<?php echo $_GET["idDiario"]; ?>">


			<header class="header-red">

				<a class="top-icon-back m15" href="telaInicio.php">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span id="title-nav">Diário - Aulas</span>
				</a>

			</header>

			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-4 col-md-3 col-lg-3 col-xs-12 bg-gray p0 border">
						<div class="pleft0 sec_info text-center p20" id="diario">
							<p class="ptop0 nome-escola"></p>
							<h2 class="nome-disc"></h2>
							<h5></h5>
						</div>

						<a href="#" id="aulasBtn" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 p0 option-menu">
							<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 icone active-btn">
								<i class="large material-icons">content_paste   </i>
							</div>
							<div class="col-md-9 col-lg-9 col-sm-9 col-xs-9 active-btn  option">
								<h3>Aulas</h3>
							</div>
						</a>

						<a href="#"  id="avaliacaoBtn" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 p0 mtop2 option-menu">
							<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 icone">
								<i class="large material-icons">description</i>
							</div>
							<div class="col-md-9 col-lg-9 col-sm-9 col-xs-9  option">
								<h3>Avaliações</h3>
							</div>
						</a>

						<a href="#"  id="alunosBtn" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 p0 mtop2 option-menu">
							<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 icone">
								<i class="large material-icons">people</i>
							</div>
							<div class="col-md-9 col-lg-9 col-sm-9 col-xs-9 t option">
								<h3>Alunos</h3>
							</div>
						</a>
					</div>


					<div class="col-sm-8 col-md-9 col-lg-9 col-xs-12 p0 bg-white">
						<a href=""  data-toggle="modal" data-target="#modalAula" id="adicionaAula" class="btn btn-blue m20 pull-right" >Adicionar Aula</a>
						<a href="" data-toggle="modal" data-target="#modalAvaliacao" style="display:none;" id="adicionaAvaliacao" class="btn btn-blue m20 pull-right" >Adicionar Avaliação</a>
						<a href="" data-toggle="modal" data-target="#modalAlunos" style="display:none;" id="adicionaAlunos" class="btn btn-blue m20 pull-right" >Adicionar Aluno</a>

						<div class="bg-pastel-white col-sm-12 col-md-12 col-lg-12 p0">

							<div class=" col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
								<div class="title-box mtop20">
									<p>Últimas aulas cadastradas </p>
								</div>
								<div class="container-box col-md-12 col-lg-12 col-sm-12 col-xs-12 ">

									<!-- Aulas -->
									<div id="aula">

									</div>


									<!-- Avaliações -->
									<div id="avaliacao"  style="display:none;"></div>


									<!-- Alunos -->
									<div id="aluno" style="display:none;"></div>


								</div>
							</div>
						</div>

					</div>

				</div>
			</div>


			<!-- Modals -->

			<div class="modal fade" id="modalAula" tabindex="-1" role="dialog" aria-labelledby="Pop up para inserção de nova aula">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="modalAulaLabel">Adicionar nova aula</h4>
						</div>
						<div class="modal-body ">
							<form>
								<div class="form-group">
									<label for="dataAula">Data da Aula</label>
									<input type="date" required class="form-control" id="dataAula" placeholder="Digite a data da aula">
								</div>
								<label>Nome</label>
								<input type="text" required class="form-control"  placeholder="Digite o nome da Aula" id="nomeAula">

								<br/><label>Período Regime</label>
								<select class="selectPeriodoRegimes form-control">

								</select>

								<button type="button" class="btn btn-default mtop20" data-dismiss="modal">Fechar</button>
								<button type="button" class="btn btn-success mtop20" id="salvarAula">Cadastrar</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modalAvaliacao" tabindex="-1" role="dialog" aria-labelledby="Pop up para inserção de nova avaliação">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="modalAvaliacaoLabel">Adicionar nova avaliação</h4>
						</div>
						<div class="modal-body ">
							<form>

								<div class="form-group">
									<label for="temaAvaliacao">Tema</label>
									<input type="text" class="form-control" required id="temaAvaliacao" placeholder="Digite o tema da avaliação">
								</div>

								<div class="form-group">
									<label for="dataAvaliacao">Data da Avaliação</label>
									<input type="date" class="form-control" required id="dataAvaliacao" placeholder="Digite a data da avaliação">
								</div>

								<div class="form-group mtop20">
									<label for="valorAvaliacao">Informe a valor (%) para essa avaliação</label>
									<input type="number" required class="form-control" id="valorAvaliacao" placeholder="Digite o valor da avaliação">
								</div>

								<label>Período Regime</label>
								<select class="selectPeriodoRegimes form-control" >

								</select>

								<button type="button" class="btn btn-default mtop20" data-dismiss="modal">Fechar</button>
								<button type="button" class="btn btn-success mtop20" id="salvarAvaliacao">Cadastrar</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modalAlunos" tabindex="-1" role="dialog" aria-labelledby="Pop up para inserção de alunos">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="modalAlunosLabel">Adicionar aluno</h4>
						</div>
						<div class="modal-body ">
							<form>
								<div class="form-group">
									<label for="nome">Nome</label>
									<input type="text" required class="form-control"  placeholder="Digite o nome do aluno" name="nome" id="nomeAluno">
								</div>

								<div class="form-group">
									<label for="turma">Turma</label>
									<input type="text" required class="form-control" name="turma" id="turma" disabled>
								</div>

								<button type="button" class="btn btn-default mtop20" data-dismiss="modal">Fechar</button>
								<button type="button" class="btn btn-success mtop20" id="salvarAluno">Adicionar</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modalAulaAlterar" tabindex="-1" role="dialog" aria-labelledby="Pop up para inserção de nova aula">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="modalAulaAlterarLabel">Alterar aula</h4>
						</div>
						<div class="modal-body ">
							<form>
								<input type="hidden" name="idAula" id="idAula">
								<div class="form-group">
									<label for="dataAula">Data da Aula</label>
									<input type="date" required class="form-control" id="dataAulaAlterar" placeholder="Digite a data da aula">
								</div>
								<label>Nome</label>
								<input type="text" required class="form-control"  placeholder="Digite o nome da Aula" id="nomeAulaAlterar">

								<br/><label>Período Regime</label>
								<select class="selectPeriodoRegimes form-control" id="regimeAula">

								</select>

								<button type="button" class="btn btn-default mtop20" data-dismiss="modal">Fechar</button>
								<button type="button" class="btn btn-success mtop20" id="alterarAula">Alterar</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modalAvaliacaoAlterar" tabindex="-1" role="dialog" aria-labelledby="Pop up para inserção de nova avaliação">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="modalAvaliacaoLabel">Alterar avaliação</h4>
						</div>
						<div class="modal-body ">
							<form>
								<input type="hidden" name="idAvaliacao" id="idAvaliacao">
								<div class="form-group">
									<label for="temaAvaliacao">Tema</label>
									<input type="text" class="form-control" required id="temaAvaliacaoAlterar" placeholder="Digite o tema da avaliação">
								</div>

								<div class="form-group">
									<label for="dataAvaliacao">Data da Avaliação</label>
									<input type="date" class="form-control" required id="dataAvaliacaoAlterar" placeholder="Digite a data da avaliação">
								</div>

								<div class="form-group mtop20">
									<label for="valorAvaliacao">Informe a valor (%) para essa avaliação</label>
									<input type="number" required class="form-control" id="valorAvaliacaoAlterar" placeholder="Digite o valor da avaliação">
								</div>

								<label>Período Regime</label>
								<select class="selectPeriodoRegimes form-control" id="regimeAvaliacao">

								</select>

								<button type="button" class="btn btn-default mtop20" data-dismiss="modal">Fechar</button>
								<button type="button" class="btn btn-success mtop20" id="alterarAvaliacao">Alterar</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modalAlunosAlterar" tabindex="-1" role="dialog" aria-labelledby="Pop up para inserção de alunos">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="modalAlunosLabel">Alterar aluno</h4>
						</div>
						<div class="modal-body ">
							<form>
								<input type="hidden" name="idAluno" id="idAluno">
								<div class="form-group">
									<label for="nome">Nome</label>
									<input type="text" required class="form-control"  placeholder="Digite o nome do aluno" name="nome" id="nomeAlunoAlterar">
								</div>

								<div class="form-group">
									<label for="turma">Turma</label>
									<input type="text" required class="form-control" name="turma" id="turmaAlterar" disabled>
								</div>

								<button type="button" class="btn btn-default mtop20" data-dismiss="modal">Fechar</button>
								<button type="button" class="btn btn-success mtop20" id="alterarAluno">Alterar</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<script src="js/diario-detalhes.js"></script>
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
