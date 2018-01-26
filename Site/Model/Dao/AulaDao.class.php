<?php
	require_once('../Model/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class AulaDao{
		//Conecta com o banco e adiciona a aula
		public static function addAula($bean){
			//cria a query
			$query = "INSERT INTO Aula(nome,data,PeriodoRegime_id)
				VALUES
				('{$bean->getNome()}','{$bean->getData()}',{$bean->getPeriodoRegimeId()});";

			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera todos os alunos do diario
		public static function getAulas($idDiario){
			//cria a query
			$query = "SELECT Aula.id, nome, data, td.dataInicio, td.dataFim
					From Aula
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

		//Conecta com o banco e recupera o aluno com base no bean
		public static function getAula($idAula){
			//cria a query
			$query = "SELECT * FROM Aula WHERE id = {$idAula};";

			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recupera a chamada
		public static function getChamada($idDiario){
			//cria a query
			$query = "SELECT id as idAluno, nome, presenca,Aula_id
					FROM Aluno LEFT JOIN Chamada
					ON id = Aluno_id
					WHERE Turma_id IN
					(
					SELECT Turma.id
					FROM Turma INNER JOIN Diario
					ON Turma.id = Turma_id WHERE Diario.id = {$idDiario}
					);";
					// die($query);

			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco lanca a chamada
		public static function lancarChamada($idAula, $presencas){
			//cria a query
			$query = array();
			$query[0] = "DELETE FROM Chamada WHERE Aula_id = {$idAula};";

			$query[1] = "INSERT INTO Chamada(Aluno_Id, Aula_Id, presenca)
				VALUES";
			for($i = 0; $i < count($presencas); $i++){
				$query[1] .= "({$presencas[$i][0]},{$idAula},{$presencas[$i][1]}),";
			}
			$query[1] = rtrim($query[1],",").";";
			// die($query2);
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e deleta a aula e as chamadas correspondentes
		public static function deletar($idAula){
			//cria a query
			$query = array();
			$query[0] = "DELETE FROM Chamada WHERE Aula_id = {$idAula};";

			$query[1]= "DELETE FROM Aula WHERE id = {$idAula};";
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e adiciona a aula
		public static function alterar($bean){
			//cria a query
			$query = "UPDATE Aula SET
					nome = '{$bean->getNome()}',
					data = '{$bean->getData()}',
					PeriodoRegime_id = {$bean->getPeriodoRegimeId()}
					WHERE id = {$bean->getId()};";

			//executa
			return ProcessaQuery::executarQuery($query);
		}
	}
?>
