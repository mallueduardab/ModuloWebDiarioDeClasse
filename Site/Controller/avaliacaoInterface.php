<?php
	// require_once('C:\xampp\htdocs\SiteMallu\Site\Controller\Utils\Msgs.php');
	// require_once('C:\xampp\htdocs\SiteMallu\Site\Controller\Utils\Util.class.php');
	require_once('verificaLogado.php');
	require_once('Utils/Msgs.php');
	require_once('Utils/Util.class.php');

	require_once('../Model/Bean/AvaliacaoBean.class.php');
	require_once('../Model/Dao/AvaliacaoDao.class.php');
	$_DADOS = $_POST;

	$acao = trim($_DADOS['acao']);
	if(!isset($acao) || $acao == ''){//se houve algum problema na hora de receber a acao
		?><script>alert('<?php echo $msgSemAcao; ?>');</script><?php
		header('Location: ../View/telaInicio.php');
	}

	switch($acao){
		case 'addAvaliacao':
			//ler dados
			$temaAvaliacao = Util::limpaString($_DADOS['temaAvaliacao']);
			$dataAvaliacao = Util::limpaString($_DADOS['dataAvaliacao']);
			$valorAvaliacao = Util::limpaString($_DADOS['valorAvaliacao']);
			$periodoRegime = base64_decode(Util::limpaString($_DADOS['periodoRegime']));

			//cria Bean
			$avaliacaoBean = new AvaliacaoBean();
			$avaliacaoBean->setTema($temaAvaliacao);
			$avaliacaoBean->setData($dataAvaliacao);
			$avaliacaoBean->setValor($valorAvaliacao);
			$avaliacaoBean->setPeriodoRegimeId($periodoRegime);

			//executa no banco
			$retorno = AvaliacaoDao::addAvaliacao($avaliacaoBean);

			echo json_encode($retorno);
			break;
		case 'getAvaliacoes': //
			//ler dados
			$idDiario = base64_decode(Util::limpaString($_DADOS['idDiario']));

			//executa no banco
			$retorno = AvaliacaoDao::getAvaliacoes($idDiario);

			if($retorno->status){//deu certo
				//trato os dados
				for($i = 0; $i < count($retorno->resposta); $i++){
					$retorno->resposta[$i]->id = base64_encode($retorno->resposta[$i]->id);
					$retorno->resposta[$i]->tema = utf8_encode($retorno->resposta[$i]->tema);
					$retorno->resposta[$i]->data = Util::dataParaView($retorno->resposta[$i]->data);
					$retorno->resposta[$i]->dataInicio = Util::dataParaView($retorno->resposta[$i]->dataInicio);
					$retorno->resposta[$i]->dataFim = Util::dataParaView($retorno->resposta[$i]->dataFim);
				}
			}
			echo json_encode($retorno);
			break;
		case 'getAvaliacao':  //
			//ler dados
			$idAvaliacao = base64_decode(Util::limpaString($_DADOS['idAvaliacao']));
			$idDiario = base64_decode(Util::limpaString($_DADOS['idDiario']));

			//cria Bean
			$avaliacaoBean = new AvaliacaoBean();
			$avaliacaoBean->setId($idAvaliacao);

			//executa no banco
			$retorno = AvaliacaoDao::getAvaliacao($avaliacaoBean,$idDiario);

			if($retorno->status){//deu certo
				//trato os dados
				$retorno->resposta[0]->tema = utf8_encode($retorno->resposta[0]->tema);
				$retorno->resposta[0]->data = Util::dataParaView($retorno->resposta[0]->data);
				$retorno->resposta[0]->dataInicio = Util::dataParaView($retorno->resposta[0]->dataInicio);
				$retorno->resposta[0]->dataFim = Util::dataParaView($retorno->resposta[0]->dataFim);
			}
			echo json_encode($retorno);
			break;
		case 'lancarNotas':
			//ler dados
			$idAvaliacao = base64_decode(Util::limpaString($_DADOS['idAvaliacao']));
			$notas = Util::limpaString($_DADOS['notas']);

			//trato
			for($i = 0; $i < count($notas); $i++){
				$notas[$i][0] = base64_decode($notas[$i][0]);
			}

			//executa no banco
			$retorno = AvaliacaoDao::lancarNotas($idAvaliacao, $notas);

			echo json_encode($retorno);
			break;
		case 'getAlunosNotas':
			//ler dados
			$idAvaliacao = base64_decode(Util::limpaString($_DADOS['idAvaliacao']));

			//executa no banco
			$retorno = AvaliacaoDao::getAlunosNotas($idAvaliacao);

			if($retorno->status){//deu certo
				//trato os dados
				for($i = 0; $i < count($retorno->resposta); $i++){
					$retorno->resposta[$i]->Aluno_id = base64_encode($retorno->resposta[$i]->Aluno_id);
				}
			}
			echo json_encode($retorno);
			break;
		case 'deletar':
			//ler dados
			$idAvaliacao = base64_decode(Util::limpaString($_DADOS['idAvaliacao']));

			//executa no banco
			$retorno = AvaliacaoDao::deletar($idAvaliacao);

			echo json_encode($retorno);
			break;
		case 'alterar':
			//ler dados
			$idAvaliacao = base64_decode(Util::limpaString($_DADOS['idAvaliacao']));
			$temaAvaliacao = Util::limpaString($_DADOS['temaAvaliacao']);
			$dataAvaliacao = Util::limpaString($_DADOS['dataAvaliacao']);
			$valorAvaliacao = Util::limpaString($_DADOS['valorAvaliacao']);
			$periodoRegime = base64_decode(Util::limpaString($_DADOS['periodoRegime']));

			//cria Bean
			$avaliacaoBean = new AvaliacaoBean();
			$avaliacaoBean->setId($idAvaliacao);
			$avaliacaoBean->setTema($temaAvaliacao);
			$avaliacaoBean->setData($dataAvaliacao);
			$avaliacaoBean->setValor($valorAvaliacao);
			$avaliacaoBean->setPeriodoRegimeId($periodoRegime);

			//executa no banco
			$retorno = AvaliacaoDao::alterar($avaliacaoBean);

			echo json_encode($retorno);
			break;
	}

?>
