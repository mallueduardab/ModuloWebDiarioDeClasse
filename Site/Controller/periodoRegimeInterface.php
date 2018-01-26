<?php
	// require_once('C:\xampp\htdocs\SiteMallu\Site\Controller\Utils\Msgs.php');
	// require_once('C:\xampp\htdocs\SiteMallu\Site\Controller\Utils\Util.class.php');
	require_once('verificaLogado.php');
	require_once('Utils/Msgs.php');
	require_once('Utils/Util.class.php');

	require_once('../Model/Bean/PeriodoRegimeBean.class.php');
	require_once('../Model/Dao/PeriodoRegimeDao.class.php');

	$_DADOS = $_POST;

	$acao = trim($_DADOS['acao']);
	if(!isset($acao) || $acao == ''){//se houve algum problema na hora de receber a acao
		?><script>alert('<?php echo $msgSemAcao; ?>');</script><?php
		header('Location: ../View/telaInicio.php');
	}

	switch($acao){
		case 'getPeriodoRegimes':
			//ler dados
			$idDiario = base64_decode(Util::limpaString($_DADOS['idDiario']));

			//executa no banco
			$retorno = PeriodoRegimeDao::getPeriodoRegimes($idDiario);

			if($retorno->status){//deu certo
				//trato os dados
				for($i = 0; $i < count($retorno->resposta); $i++){
					$retorno->resposta[$i]->id = base64_encode(Util::limpaString($retorno->resposta[$i]->id));
					$retorno->resposta[$i]->dataInicio = Util::dataParaView($retorno->resposta[$i]->dataInicio);
					$retorno->resposta[$i]->dataFim = Util::dataParaView($retorno->resposta[$i]->dataFim);
				}
			}
			echo json_encode($retorno);
			break;
	}

?>
