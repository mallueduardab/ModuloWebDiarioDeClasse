<?php
	require_once('../Model/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class PeriodoRegimeDao{
		//Conecta com o banco e recupera todos os alunos do diario
		public static function getPeriodoRegimes($idDiario){
			//cria a query
			$query = " SELECT id,dataInicio,dataFim,qntAulas,valorTotal FROM PeriodoRegime WHERE Diario_Id = {$idDiario} ORDER BY dataFim asc;";

			//executa
			return ProcessaQuery::consultarQuery($query);
		}
	}
?>
