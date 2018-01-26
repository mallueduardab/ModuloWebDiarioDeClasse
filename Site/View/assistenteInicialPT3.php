<?php
require_once('../Controller/verificaLogado.php');
if (isset($email)):
?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Primeiro Acesso</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/controleAulas.css">
		<link rel="stylesheet" href="css/fonts.css">
                <link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />
		<link href="https://fonts.googleapis.com/css?family=Fresca|Gloria+Hallelujah|Indie+Flower|Kurale" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/cdst.js"></script>
	</head>

	<body>


		<div class="container-fluid">

			<div class="row">

                            <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                <img src="../View/img/image3.png" class="image3 pull-right">
                            </div>
				<div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
					<h2 class="cdst-center" id="name-currie"></h2>

					<p class="description text-justify">
						Agora que estamos mais próximos, vou te mostrar como
						criar um diário, e a medida que você for usando a aplicação,
						voltarei para te te ensinar mais algumas ferramentas importantes.
						Vamos começar?! Por favor, clique no botão abaixo pra gente criar um novo diário.
						<br/><br/>

					</p>
                                        <a href="cadastrarDiario.php" class="btn btn-info pull-right" role="button" id="novoDiario">
							CRIAR UM NOVO DIÁRIO 
							<span class="glyphicon glyphicon-file big_glyphicon"> </span>
						</a>
				</div>
			</div>
                    
                    
		<script type="text/javascript">
			document.getElementById("name-currie").innerHTML = ' É UM PRAZER TE CONHERCER, <?php echo $nome; ?>';
		</script>

                    
		</div>

	</body>


</html>
<?php else: ?>
<script>
	window.location.replace("cadastroTela.php");
</script>
<?php endif; ?>
