<?php
	require_once('../Controller/verificaLogado.php');
	if(isset($email)):
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
	<head>
		<title>Visualização do diário</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/controleAulas.css">
		<link href="https://fonts.googleapis.com/css?family=Fresca|Gloria+Hallelujah|Indie+Flower|Kurale" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/cdst.js"></script>
		<link rel="stylesheet" href="css/fonts.css">
                <link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />
                
		<script>
		//manda ajax assim q a pagina carregar
		$(document).ready(function(){
			var url = "../Controller/diarioInterface.php";
			//informacoes passadas para a url
			var req = {
				acao: 'getDiario',
				id: 1
			};
			$.post(url, req, function(data){
				var res = JSON.parse(data);
				if(res.status){//deu certo
					$("#escola").html(res.resposta.escola);
					$("#serie").html(res.resposta.serie);
					$("#turma").html(res.resposta.turma);
					$("#modalidade").html(res.resposta.modalidade);
				}else{
					alert(res.resposta);
				}
			});
		});
		</script>
	</head>
	<body>

		 <div id="all">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="nav-title-top" id="topo">
						<h4 class="cdst-left">
							<a class="backpage_glypicon" href="assistenteInicialPT3.php">
								<span class="glyphicon glyphicon-chevron-left"></span>
															 Visualizar Diário
							</a>

						</h4>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid body_white" >

			<div class="row">

				<div class="col-sm-2"></div>
				<div class="col-sm-8" id="content">
					<br>
					<p class="description-data">  ESCOLA  </p>
					<p class="description-result" id="escola"> {nome da escola cadastrada} </p>
					<p id="diarieS">DIÁRIO DE CLASSE <P>

					<p class="description-data"> DISCIPLINA  </p>
					<p class="description-result" id="disciplina"> {nome da disciplina cadastrada} </p>

					<div class="row" id="more">
						<div class="col-sm-3">
							<p class="description-data"> SÉRIE</p>
					<p class="description-result" id="serie"> {serie} </p>
						</div>
						<div class="col-sm-3">

					<p class="description-data"> TURMA  </p>
					<p class="description-result" id="turma"> {turma} </p>
						</div>
						<div class="col-sm-6">
						 <p class="description-data"> MODALIDADE  </p>
					<p class="description-result" id="modalidade"> {disciplina} </p>
						</div>
					</div>




				</div>
				<div class="col-sm-2"></div>
				</div>
			<div id="rodape"></div>

		</div>
		 </div>


		 <!-- jQuery -->
		<script src="vendor/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

		<!-- Contact Form JavaScript -->
		<script src="js/jqBootstrapValidation.js"></script>
		<script src="js/contact_me.js"></script>

		<!-- Theme JavaScript -->
		<script src="js/freelancer.min.js"></script>


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
