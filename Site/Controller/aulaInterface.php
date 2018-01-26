<?php
	require_once('verificaLogado.php');
	require_once('Utils/Msgs.php');
	require_once('Utils/Util.class.php');

	require_once('../Model/Bean/AulaBean.class.php');
	require_once('../Model/Dao/AulaDao.class.php');

	$_DADOS = $_POST;

	$acao = trim($_DADOS['acao']);
	if(!isset($acao) || $acao == ''){//se houve algum problema na hora de receber a acao
		?><script>alert('<?php echo $msgSemAcao; ?>');</script><?php
		header('Location: ../View/telaInicio.php');
	}

	switch($acao){
		case 'addAula':
			//ler dados
			$nome = Util::limpaString($_DADOS['nome']);
			$data = Util::limpaString($_DADOS['data']);
			$periodoRegime = base64_decode(Util::limpaString($_DADOS['periodoRegime']));

			//cria bean
			$aulaBean = new AulaBean();
			$aulaBean->setNome($nome);
			$aulaBean->setData($data);
			$aulaBean->setPeriodoRegimeId($periodoRegime);

			//executa no banco
			$retorno = AulaDao::addAula($aulaBean);

			echo json_encode($retorno);
			break;
		case 'getAulas':
			//ler dados
			$idDiario = base64_decode(Util::limpaString($_DADOS['idDiario']));

			//executa no banco
			$retorno = AulaDao::getAulas($idDiario);

			if($retorno->status){//deu certo
				//trato os dados
				for($i = 0; $i < count($retorno->resposta); $i++){
					$retorno->resposta[$i]->id = base64_encode(Util::limpaString($retorno->resposta[$i]->id));
					$retorno->resposta[$i]->nome = utf8_encode($retorno->resposta[$i]->nome);
					$retorno->resposta[$i]->data = Util::dataParaView($retorno->resposta[$i]->data);
					$retorno->resposta[$i]->dataInicio = Util::dataParaView($retorno->resposta[$i]->dataInicio);
					$retorno->resposta[$i]->dataFim = Util::dataParaView($retorno->resposta[$i]->dataFim);
				}
			}
			echo json_encode($retorno);
			break;
		case 'getAula':
			//ler dados
			$idAula = base64_decode(Util::limpaString($_DADOS['idAula']));

			//executa no banco
			$retorno = AulaDao::getAula($idAula);

			if($retorno->status){//deu certo
				//trato os dados
				$retorno->resposta[0]->data = Util::dataParaView($retorno->resposta[0]->data);
			}
			echo json_encode($retorno);
			break;
		case 'getChamada':
			//ler dados
			// die(print_r($_DADOS,true));
			// $idAula = base64_decode(Util::limpaString($_DADOS['idAula']));
			$idDiario = base64_decode(Util::limpaString($_DADOS['idDiario']));

			//executa no banco
			$retorno = AulaDao::getChamada($idDiario);

			if($retorno->status){//deu certo
				//trato os dados
				for($i = 0; $i < count($retorno->resposta); $i++){
					$retorno->resposta[$i]->idAluno = base64_encode($retorno->resposta[$i]->idAluno);
					$retorno->resposta[$i]->Aula_id = base64_encode($retorno->resposta[$i]->Aula_id);
					$retorno->resposta[$i]->nome = utf8_encode($retorno->resposta[$i]->nome);
				}
			}
			echo json_encode($retorno);
			break;
		case 'lancarChamada':
			//ler dados
			$idAula = base64_decode(Util::limpaString($_DADOS['idAula']));
			$presencas = $_DADOS['presencas'];

			//trato
			for($i = 0; $i < count($presencas); $i++){
				$presencas[$i][0] = base64_decode(Util::limpaString($presencas[$i][0]));
			}

			//executa no banco
			$retorno = AulaDao::lancarChamada($idAula, $presencas);

			echo json_encode($retorno);
			break;
		case 'deletar':
			//ler dados
			$idAula = base64_decode(Util::limpaString($_DADOS['idAula']));

			//executa no banco
			$retorno = AulaDao::deletar($idAula);

			echo json_encode($retorno);
			break;
		case 'alterar':
			//ler dados
			$idAula = base64_decode(Util::limpaString($_DADOS['idAula']));
			$nome = Util::limpaString($_DADOS['nome']);
			$data = Util::limpaString($_DADOS['data']);
			$periodoRegime = base64_decode(Util::limpaString($_DADOS['periodoRegime']));

			//cria bean
			$aulaBean = new AulaBean();
			$aulaBean->setId($idAula);
			$aulaBean->setNome($nome);
			$aulaBean->setData($data);
			$aulaBean->setPeriodoRegimeId($periodoRegime);

			//executa no banco
			$retorno = AulaDao::alterar($aulaBean);

			echo json_encode($retorno);
			break;
	}

?>
