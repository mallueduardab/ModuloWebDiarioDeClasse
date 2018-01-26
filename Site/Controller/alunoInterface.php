<?php
	require_once('verificaLogado.php');
	require_once('Utils/Msgs.php');
	require_once('Utils/Util.class.php');

	require_once('../Model/Bean/AlunoBean.class.php');
	require_once('../Model/Dao/AlunoDao.class.php');
	$_DADOS = $_POST;

	$acao = trim($_DADOS['acao']);
	if(!isset($acao) || $acao == ''){//se houve algum problema na hora de receber a acao
		?><script>alert('<?php echo $msgSemAcao; ?>');</script><?php
		header('Location: ../View/telaInicio.php');
	}

	switch($acao){
		case 'addAluno':
			//ler dados
			$nomeAluno = Util::limpaString($_DADOS['nomeAluno']);
			$idDiario = base64_decode(Util::limpaString($_DADOS['idDiario']));

			//cria Bean
			$alunoBean = new AlunoBean();
			$alunoBean->setNome($nomeAluno);

			//executa no banco
			$retorno = AlunoDao::addAluno($alunoBean,$idDiario);

			echo json_encode($retorno);
			break;
		case 'getAlunos':
			//ler dados
			$idDiario = base64_decode(Util::limpaString($_DADOS['idDiario']));

			//executa no banco
			$retorno = AlunoDao::getAlunos($idDiario);

			if($retorno->status){//deu certo
				//trato os dados
				for($i = 0; $i < count($retorno->resposta); $i++){
					$retorno->resposta[$i]->nome = utf8_encode($retorno->resposta[$i]->nome);
					$retorno->resposta[$i]->id = base64_encode($retorno->resposta[$i]->id);
				}
			}
			echo json_encode($retorno);
			break;
		case 'getFrequencia':
			//ler dados
			$idAluno = base64_decode(Util::limpaString($_DADOS['idAluno']));

			//executa no banco
			$retorno = AlunoDao::getFrequencia($idAluno);

			if($retorno->status){//deu certo
				//trato os dados
				for($i = 0; $i < count($retorno->resposta); $i++){
					$retorno->resposta[$i]->data = Util::dataParaView($retorno->resposta[$i]->data);
					$retorno->resposta[$i]->presenca = ($retorno->resposta[$i]->presenca == 1);
				}
			}
			echo json_encode($retorno);
			break;
		case 'getNotas':
			//ler dados
			$idAluno = base64_decode(Util::limpaString($_DADOS['idAluno']));

			//executa no banco
			$retorno = AlunoDao::getNotas($idAluno);

			if($retorno->status){//deu certo
				//trato os dados
				for($i = 0; $i < count($retorno->resposta); $i++){
					$retorno->resposta[$i]->tema = utf8_encode($retorno->resposta[$i]->tema);
					$retorno->resposta[$i]->data = Util::dataParaView($retorno->resposta[$i]->data);
				}
			}
			echo json_encode($retorno);
			break;
		case 'deletar':
			//ler dados
			$idAluno = base64_decode(Util::limpaString($_DADOS['idAluno']));

			//executa no banco
			$retorno = AlunoDao::deletar($idAluno);

			echo json_encode($retorno);
			break;
		case 'alterar':
			//ler dados
			$idAluno = base64_decode(Util::limpaString($_DADOS['idAluno']));
			$nomeAluno = Util::limpaString($_DADOS['nomeAluno']);

			//cria Bean
			$alunoBean = new AlunoBean();
			$alunoBean->setId($idAluno);
			$alunoBean->setNome($nomeAluno);

			//executa no banco
			$retorno = AlunoDao::alterar($alunoBean);

			echo json_encode($retorno);
			break;
	}

?>
