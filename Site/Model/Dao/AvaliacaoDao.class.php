<?php
	require_once('../Model/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class AvaliacaoDao{
		//Conecta com o banco e adiciona a avaliacao
		public static function addAvaliacao($bean){
			//cria a query
			$query = "INSERT INTO Avaliacao(tema, valor, data, PeriodoRegime_id)
					VALUES
					('{$bean->getTema()}','{$bean->getValor()}','{$bean->getData()}',{$bean->getPeriodoRegimeId()});";

			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera todas as avaliacoes do diario
		public static function getAvaliacoes($idDiario){
			//cria a query
			$query = "SELECT Avaliacao.id, tema, valor, data, td.dataInicio, td.dataFim
					From Avaliacao
					INNER JOIN
					(
						SELECT periodoRegime.id, dataInicio, dataFim
						FROM diario INNER JOIN periodoRegime
						ON diario.id = Diario_id WHERE Diario_id = {$idDiario}
					) AS td
					ON td.id = PeriodoRegime_id;";

			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recupera todas as avaliacoes do diario
		public static function getAvaliacao($bean,$idDiario){
			//cria a query
			$query = "SELECT Avaliacao.id, tema, valor, data, td.dataInicio, td.dataFim
					From Avaliacao
					INNER JOIN
					(
						SELECT periodoRegime.id, dataInicio, dataFim
						FROM diario INNER JOIN periodoRegime
						ON diario.id = Diario_id WHERE Diario_id = {$idDiario}
					) AS td
					ON td.id = PeriodoRegime_id WHERE Avaliacao.id = {$bean->getId()};";

			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco lanca as notas
		public static function lancarNotas($idAvaliacao, $notas){
			//cria a query
			$query = array();
			$query[0] = "DELETE FROM Nota WHERE Avaliacao_id = {$idAvaliacao};";

			$query[1] = "INSERT INTO Nota(Aluno_Id, Avaliacao_Id, nota)
				VALUES";
			for($i = 0; $i < count($notas); $i++){
				$query[1] .= "({$notas[$i][0]},{$idAvaliacao},{$notas[$i][1]}),";
			}
			$query[1] = rtrim($query[1],",").";";
			// die($query2);
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera todas as notas dos alunos da avaliacao
		public static function getAlunosNotas($idAvaliacao){
			//cria a query
			$query = "SELECT * FROM Nota WHERE Avaliacao_Id = {$idAvaliacao};";

			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e deleta a avaliacao e as notas correspondentes
		public static function deletar($idAvaliacao){
			//cria a query
			$query = array();
			$query[0] = "DELETE FROM Nota WHERE Avaliacao_id = {$idAvaliacao};";

			$query[1] = "DELETE FROM Avaliacao WHERE id = {$idAvaliacao};";
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e adiciona a avaliacao
		public static function alterar($bean){
			//cria a query
			$query = "UPDATE Avaliacao SET
					tema = '{$bean->getTema()}',
					valor = '{$bean->getValor()}',
					data = '{$bean->getData()}',
					PeriodoRegime_id = {$bean->getPeriodoRegimeId()}
					WHERE id = {$bean->getId()};";

			//executa
			return ProcessaQuery::executarQuery($query);
		}
	}
?>
