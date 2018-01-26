<?php
	require_once('Conexao.class.php');
	//Classe que processa as querys
	class ProcessaQuery{
		//Conecta com o banco e executa a query passada, pode ser passado uma lista de querys
		public static function executarQuery($query){
			$retorno = new stdClass();
			$retorno->status = true;

			//conecta
			$conexao = new Conexao('localhost', 'malluDB', 'root', '');
			if(!$conexao->getErros()){
				$retorno->status = false;
				$retorno->resposta = $GLOBALS['msgErroConectarBanco'];
				// print_r($conexao->getErros());
				return $retorno;
			}

			//comeca transacao
			if(!$conexao->iniciarTransacao()){
				$retorno->status = false;
				$retorno->resposta = $GLOBALS['msgErroIniciarTransacao'];
				// print_r($conexao->getErros());
				return $retorno;
			}

			//executa query
			if(is_array($query)){
				foreach ($query as $q) {
					$result = $conexao->executarQuery($q);
					if($result == false && $result[2] != ""){
						$conexao->rollbackTransacao();
						$retorno->status = false;
						$retorno->resposta = $GLOBALS['msgErroExecQuery'];
						echo $q;print_r($conexao->getErros());die("erro");
						return $retorno;
					}
				}
			}
			else{
				if($conexao->executarQuery($query) != 1){
					$conexao->rollbackTransacao();
					$retorno->status = false;
					$retorno->resposta = $GLOBALS['msgErroExecQuery'];
					echo $query;print_r($conexao->getErros());die("erro");
					return $retorno;
				}
			}


			$conexao->commitTransacao();

			return $retorno;
		}

		//Conecta com o banco e consulta a query passada, pode ser passado uma lista de querys
		//se for passado um array a resposta do retorno tera um array onde cada posicao e relativa a uma query
		public static function consultarQuery($query){
			$retorno = new stdClass();
			$retorno->status = true;

			//conecta
			$conexao = new Conexao('localhost', 'malluDB', 'root', '');
			if(!$conexao->getErros()){
				$retorno->status = false;
				$retorno->resposta = $GLOBALS['msgErroConectarBanco'];
				// print_r($conexao->getErros());die("erro");
				return $retorno;
			}

			//comeca transacao
			if(!$conexao->iniciarTransacao()){
				$retorno->status = false;
				$retorno->resposta = $GLOBALS['msgErroIniciarTransacao'];
				// print_r($conexao->getErros());die("erro");
				return $retorno;
			}

			//executa query
			$retorno->resposta = array();
			if(is_array($query)){
				foreach ($query as $q) {
					$consultaResposta = $conexao->consultarQuery($q);
					if($consultaResposta == false){
						$conexao->rollbackTransacao();
						$retorno->status = false;
						$retorno->resposta = $GLOBALS['msgErroExecQuery'];
						echo $q;print_r($conexao->getErros());die("erro");
						return $retorno;
					}

					$umaConsulta = array();
					while($obj = $consultaResposta->fetchObject()){
						array_push($umaConsulta, $obj);
					}
					array_push($retorno->resposta, $umaConsulta);
				}
			}
			else{
				$consultaResposta = $conexao->consultarQuery($query);
				if(!$consultaResposta){
					$conexao->rollbackTransacao();
					$retorno->status = false;
					$retorno->resposta = $GLOBALS['msgErroExecQuery'];
					echo $query;print_r($conexao->getErros());die("erro");
					return $retorno;
				}

				while($obj = $consultaResposta->fetchObject()){
					array_push($retorno->resposta, $obj);
				}
			}

			$conexao->commitTransacao();

			return $retorno;
		}
	}
?>
