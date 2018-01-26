<?php
	// require_once('C:\xampp\htdocs\SiteMallu\Site\Controller\Utils\Msgs.php');
	// require_once('C:\xampp\htdocs\SiteMallu\Site\Controller\Utils\Util.class.php');
	require_once('verificaLogado.php');
	require_once('Utils/Msgs.php');
	require_once('Utils/Util.class.php');


	require_once('../Model/Bean/TurmaBean.class.php');
	require_once('../Model/Bean/DiarioBean.class.php');
	require_once('../Model/Bean/PeriodoRegimeBean.class.php');

	require_once('../Model/Dao/DiarioDao.class.php');
	$_DADOS = $_REQUEST;

	$acao = trim($_DADOS['acao']);
	if(!isset($acao) || $acao == ''){//se houve algum problema na hora de receber a acao
		?><script>alert('<?php echo $msgSemAcao; ?>');</script><?php
		header('Location: ../View/telaInicio.php');
	}

	switch($acao){
		case 'cadastrar':
			//ler dados
			$escola = Util::limpaString($_DADOS['escola']);
			$disciplina = Util::limpaString($_DADOS['disciplina']);
			$modalidade = Util::limpaString($_DADOS['modalidade']);
			$serie = Util::limpaString($_DADOS['serie']);

			$turma = Util::limpaString($_DADOS['turma']);

			$dataInicioLista = $_DADOS['dataInicio'];
			$dataFimLista = $_DADOS['dataFim'];
			$qntAulasLista = $_DADOS['qntAulas'];
			$valor = $_DADOS['valor'];

			//trata dados
			$modalidade = Util::converteModalidadeParaBanco($modalidade);

			//criar beans
			$diarioBean = new DiarioBean();
			$diarioBean->setEscola($escola);
			$diarioBean->setDisciplina($disciplina);
			$diarioBean->setModalidade($modalidade);
			$diarioBean->setSerie($serie);
			$diarioBean->setProfessorEmail($_SESSION["email"]);

			$turmaBean = new TurmaBean();
			$turmaBean->setNome($turma);

			$periodoDeRegimeBeans = array();
			for($i = 0; $i < count($dataInicioLista); $i++){
				$periodoRegimeBean = new PeriodoRegimeBean();
				$periodoRegimeBean->setDataInicio(Util::limpaString($dataInicioLista[$i]));
				$periodoRegimeBean->setDataFim(Util::limpaString($dataFimLista[$i]));
				$periodoRegimeBean->setQntAulas(Util::limpaString($qntAulasLista[$i]));
				$periodoRegimeBean->setValorTotal(Util::limpaString($valor[$i]));
				//add na lista
				array_push($periodoDeRegimeBeans, $periodoRegimeBean);
			}

			//executa no banco
			$retorno = DiarioDao::cadastrar($turmaBean,$diarioBean,$periodoDeRegimeBeans);
			if($retorno->status){//se tudo ocorreu bem
				//redireciona
				?>
					<script>
						window.location.replace("../View/telaInicio.php");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('<?php echo $msgErroCadastrarDiario; ?>');
						window.location.replace("../View/cadastrarDiario.php");
					</script>
				<?php
			}
			break;
		case 'getDiario':
			//ler dados
			$idDiario = base64_decode(Util::limpaString($_DADOS['idDiario']));

			//executa no banco
			$retorno = DiarioDao::getDiario($idDiario);
			if($retorno->status){//deu certo
				//trato os dados
				$retorno->resposta[0]->escola = utf8_encode($retorno->resposta[0]->escola);
				$retorno->resposta[0]->disciplina = utf8_encode($retorno->resposta[0]->disciplina);
				$retorno->resposta[0]->modalidade = Util::converteModalidadeParaView($retorno->resposta[0]->modalidade);
				$retorno->resposta[0]->serie = Util::converteSerieParaView($retorno->resposta[0]->serie);
			}

			echo json_encode($retorno);
			break;
		case 'getDiarios':
			//ler dados
			$email = $_SESSION['email'];

			//executa no banco
			$retorno = DiarioDao::getDiarios($email);

			if($retorno->status){//deu certo
				//trato os dados
				for($i = 0; $i < count($retorno->resposta); $i++){
					$retorno->resposta[$i]->id = base64_encode($retorno->resposta[$i]->id);
					$retorno->resposta[$i]->escola = utf8_encode($retorno->resposta[$i]->escola);
					$retorno->resposta[$i]->disciplina = utf8_encode($retorno->resposta[$i]->disciplina);
					$retorno->resposta[$i]->serie = Util::converteSerieParaView($retorno->resposta[$i]->serie);
				}
			}
			echo json_encode($retorno);
			break;
		case 'deletar':
			//ler dados
			$idDiario = base64_decode(Util::limpaString($_DADOS['idDiario']));

			//executa no banco
			$retorno = DiarioDao::deletar($idDiario);
			if($retorno->status){//se tudo ocorreu bem
				//redireciona
				?>
					<script>
						window.location.replace("../View/telaInicio.php");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('<?php echo $msgErroDeletarDiario; ?>');
						window.location.replace("../View/telaInicio.php");
					</script>
				<?php
			}
			break;
		case 'alterar':
			//ler dados
			$idDiario = base64_decode(Util::limpaString($_DADOS['idDiario']));
			$regimeAntigo = Util::limpaString($_DADOS['regimeAntigo']);
			$regime = Util::limpaString($_DADOS['regime']);

			$escola = Util::limpaString($_DADOS['escola']);
			$disciplina = Util::limpaString($_DADOS['disciplina']);
			$modalidade = Util::limpaString($_DADOS['modalidade']);
			$serie = Util::limpaString($_DADOS['serie']);

			$turma = Util::limpaString($_DADOS['turma']);

			$dataInicioLista = $_DADOS['dataInicio'];
			$dataFimLista = $_DADOS['dataFim'];
			$qntAulasLista = $_DADOS['qntAulas'];
			$valor = $_DADOS['valor'];
			$idRegime = $_DADOS['idRegime'];

			//trata dados
			$modalidade = Util::converteModalidadeParaBanco($modalidade);

			//criar beans
			$diarioBean = new DiarioBean();
			$diarioBean->setId($idDiario);
			$diarioBean->setEscola($escola);
			$diarioBean->setDisciplina($disciplina);
			$diarioBean->setModalidade($modalidade);
			$diarioBean->setSerie($serie);
			$diarioBean->setProfessorEmail($_SESSION["email"]);

			$turmaBean = new TurmaBean();
			$turmaBean->setNome($turma);

			$periodoDeRegimeBeans = array();
			for($i = 0; $i < count($dataInicioLista); $i++){
				$periodoRegimeBean = new PeriodoRegimeBean();
				$periodoRegimeBean->setId(base64_decode(Util::limpaString($idRegime[$i])));
				$periodoRegimeBean->setDataInicio(Util::limpaString($dataInicioLista[$i]));
				$periodoRegimeBean->setDataFim(Util::limpaString($dataFimLista[$i]));
				$periodoRegimeBean->setQntAulas(Util::limpaString($qntAulasLista[$i]));
				$periodoRegimeBean->setValorTotal(Util::limpaString($valor[$i]));
				//add na lista
				array_push($periodoDeRegimeBeans, $periodoRegimeBean);
			}

			//executa no banco
			if($regimeAntigo == $regime)
				$retorno = DiarioDao::alterar($turmaBean,$diarioBean,$periodoDeRegimeBeans);


			if($retorno->status){//se tudo ocorreu bem
				//redireciona
				?>
					<script>
						window.location.replace("../View/telaInicio.php");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('<?php echo $msgErroCadastrarDiario; ?>');
						window.location.replace("../View/cadastrarDiario.php");
					</script>
				<?php
			}
			break;
	}

?>
