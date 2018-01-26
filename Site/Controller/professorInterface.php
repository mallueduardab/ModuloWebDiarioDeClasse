<?php

	// require_once('C:\xampp\htdocs\SiteMallu\Site\Controller\Utils\Msgs.php');
	// require_once('C:\xampp\htdocs\SiteMallu\Site\Controller\Utils\Util.class.php');
	require_once('verificaLogado.php');
	require_once('Utils/Msgs.php');
	require_once('Utils/Util.class.php');
	require_once('../Model/Bean/ProfessorBean.class.php');
	require_once('../Model/Dao/ProfessorDao.class.php');
	$_DADOS = $_POST;

	$acao = trim($_DADOS['acao']);
	if(!isset($acao) || $acao == ''){//se houve algum problema na hora de receber a acao
		?><script>alert('<?php echo $msgSemAcao; ?>');</script><?php
		header('Location: ../View/telaInicio.php');
	}

	switch($acao){
		case 'cadastrar':
			//ler dados
			$nome = Util::limpaString($_DADOS['nome']);
			$email = Util::limpaString($_DADOS['email']);
			$senha = Util::limpaString($_DADOS['senha']);

			//criar bean
			$professorBean = new ProfessorBean();
			$professorBean->setNome($nome);
			$professorBean->setEmail($email);
			$professorBean->setSenha($senha);

			//executa no banco
			$retorno = ProfessorDao::cadastrar($professorBean);
			if($retorno->status){//se tudo ocorreu bem
				//seta a session
				session_start();
				$_SESSION['email'] = $email;
				$_SESSION['nome'] = $nome;
				$_SESSION['imgPerfil'] = $semImagem;

				//seta os cookies se houver
				if(isset($_DADOS['lembrar'])){
					$_COOKIE['email'] = $email;
					$_COOKIE['nome'] = $nome;
					$_COOKIE['imgPerfil'] = $semImagem;
				}

				//redireciona
				?>
					<script>
						window.location.replace("../View/assistenteInicialPT3.php");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('<?php echo $retorno->resposta; ?>');
						window.location.replace("../View/cadastroTela.php");
					</script>
				<?php
			}
			break;
		case 'logar':
			//ler dados
			$email = Util::limpaString($_DADOS['email']);
			$senha = Util::limpaString($_DADOS['senha']);

			//criar bean
			$professorBean = new ProfessorBean();
			$professorBean->setEmail($email);
			$professorBean->setSenha(sha1($senha));

			//executa no banco
			$retorno = ProfessorDao::getProfessor($professorBean);

			if($retorno->status){//se tudo ocorreu bem
				if($retorno->resposta != null){//usuario existe
					//seta a session
					session_start();
					$_SESSION['email'] = $email;
					$_SESSION['nome'] = $retorno->resposta[0]->nome;
					$_SESSION['imgPerfil'] = $retorno->resposta[0]->imgPerfil;

					//seta os cookies se houver
					if(isset($_DADOS['lembrar'])){
						$_COOKIE['email'] = $email;
						$_COOKIE['nome'] = $retorno->resposta[0]->nome;
						$_COOKIE['imgPerfil'] = $retorno->resposta[0]->imgPerfil;
					}

					//redireciona
					?>
						<script>
							window.location.replace("../View/telaInicio.php");
						</script>
					<?php
				}else{//se o usuario nao existe
					//redireciona
					?>
						<script>
							alert('<?php echo $msgErroLogin; ?>');
							window.location.replace("../View/loginTela.php");
						</script>
					<?php
				}
			}else{
				?>
					<script>
						alert('<?php echo $retorno->resposta; ?>');
						window.location.replace("../View/loginTela.php");
					</script>
				<?php
			}
			break;
		case 'alterar':
			//ler dados
			$nomeProfessor = Util::limpaString($_DADOS['nomeProfessor']);
			$emailProfessor = Util::limpaString($_DADOS['emailProfessor']);

			// //Testa a imagem
			// $nomeImg = $semImagem;//nome da imagegem quando nenhuma for selecionada
			// //testando se há arquivo
			// if(!empty($img['name'])){
			// 	//verifica se o arquivo é uma imagem
			// 	if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/',$img['type'])){
			// 		?>
			 			<!-- <script>
			// 				alert('<?php echo $msgErroImgTipo; ?>');
			// 				window.location.replace("../View/.php");
			// 			</script> -->
			 		<?php
			// 	}
			// 	//tamanho limite da imagem
			// 	$tamanho = 3000000;
			// 	if($img['size']>$tamanho){
			// 		?>
			 			<!-- <script>
			// 				alert('<?php echo $msgErroImgTamanho; ?>');
			// 				window.location.replace("../View/.php");
			// 			</script> -->
			 		<?php
			// 	}
			// 	//Se nao houver erro
			// 	//pega a extenção da imagem
			// 	preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i',$img['name'], $ext);
			// 	//gera nome da imagem
			// 	$nomeImg = time()."_".rand(1,50000).".".$ext[1];
			// 	//caminho
			// 	$caminhoImg = "img/perfil/".$nomeImg;
			// }

			//criar bean
			$professorBean = new ProfessorBean();
			$professorBean->setNome($nomeProfessor);
			$professorBean->setEmail($emailProfessor);
			// $professorBean->setSenha(sha1($senha));
			// $professorBean->setImgPerfil($nomeImg);

			//executa no banco
			$retorno = ProfessorDao::alterar($professorBean);

			if($retorno->status){//se tudo ocorreu bem
				// $fotoAntiga = $_SESSION['imgPerfil'];//salva o nome da foto antiga para remocao
				// //seta a session
				session_start();
				// $_SESSION['email'] = $email;
				$_SESSION['nome'] = $nomeProfessor;
				// $_SESSION['imgPerfil'] = $nomeImg;
                //
				// //seta os cookies se houver
				if(isset($_COOKIE['email'])){
				// 	$_COOKIE['email'] = $email;
					$_COOKIE['nome'] = $nomeProfessor;
				// 	$_COOKIE['imgPerfil'] = $nomeImg;
				}
                //
				// //Faz upload da imagem
				// if($nomeImg != $semImagem){
				// 	move_uploaded_file($img['tmp_name'], $caminhoImg);
				// 	unlink('img/perfil/'.$fotoAntiga);
				// }

				//redireciona
				?>
					<script>
						window.location.replace("../View/telaInicio.php");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('<?php echo $retorno->resposta; ?>');
						window.location.replace("../View/telaInicio.php");
					</script>
				<?php
			}
			break;
	}
?>
