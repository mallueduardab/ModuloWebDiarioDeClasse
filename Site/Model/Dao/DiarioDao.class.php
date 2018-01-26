<?php
	require_once('../Model/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class DiarioDao{
		//Conecta com o banco e cadastra o diario
		public static function cadastrar($turmaBean,$diarioBean,$periodoDeRegimeBeans){
			//cria a query
			$query = array();

			$query[0] = "INSERT INTO Turma(nome)
				VALUES
				('{$turmaBean->getNome()}');";

			$query[1] = "INSERT INTO Diario(disciplina,escola,serie,modalidade,Professor_email,Turma_id)
				VALUES
				('{$diarioBean->getDisciplina()}','{$diarioBean->getEscola()}',{$diarioBean->getSerie()},'{$diarioBean->getModalidade()}','{$diarioBean->getProfessorEmail()}',LAST_INSERT_ID());";

			$query[2] = "INSERT INTO PeriodoRegime(dataInicio,dataFim,qntAulas,valorTotal,Diario_id)
						VALUES ";
			foreach ($periodoDeRegimeBeans as $periodoDeRegimeBean) {
				$query[2] .= "('{$periodoDeRegimeBean->getDataInicio()}','{$periodoDeRegimeBean->getDataFim()}',{$periodoDeRegimeBean->getQntAulas()},{$periodoDeRegimeBean->getValorTotal()},LAST_INSERT_ID()),";
			}
			$query[2] = rtrim($query[2],",").";";


			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera o diario pelo id
		public static function getDiario($id){
			//cria a query
			$query = "SELECT diTu.id, escola, disciplina, modalidade, serie, turma, count(diTu.id) AS numRegimes
					FROM PeriodoRegime INNER JOIN
					(SELECT Diario.id, escola, disciplina, modalidade, serie, nome AS turma
						FROM Diario INNER JOIN Turma
						ON Turma_id = Turma.id WHERE Diario.id = {$id}) AS diTu
					ON Diario_id = diTu.id
					GROUP BY diTu.id;";
			// die($query);
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recupera todos os diarios
		public static function getDiarios($email){
			//cria a query
			$query = "SELECT Diario.id, escola, disciplina, modalidade, serie, nome AS turma
					FROM Diario INNER JOIN Turma
					ON Turma_id = Turma.id WHERE Professor_email = '{$email}';";

			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		public static function deletar($id){
			//cria a query
			$query = array();
			$query[0] = "DELETE FROM Turma WHERE id IN (SELECT Turma_id FROM Diario WHERE id = {$id});";
			// $query[1] = "DELETE FROM Diario WHERE id = {$id};";

			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//altera so as informacoes do diario
		public static function alterar($turmaBean,$diarioBean,$periodoDeRegimeBeans){
			//cria a query
			$query = array();

			$query[0] = "UPDATE Turma SET
						nome = '{$turmaBean->getNome()}'
						WHERE id = (SELECT Turma_id FROM Diario WHERE id = {$diarioBean->getId()});";

			$query[1] = "UPDATE Diario SET
						disciplina = '{$diarioBean->getDisciplina()}',
						escola = '{$diarioBean->getEscola()}',
						serie = {$diarioBean->getSerie()},
						modalidade = '{$diarioBean->getModalidade()}'
						WHERE id = {$diarioBean->getId()};";

			$i = 2;
			foreach ($periodoDeRegimeBeans as $periodoDeRegimeBean) {
				$query[$i] = "UPDATE PeriodoRegime SET
						dataInicio = '{$periodoDeRegimeBean->getDataInicio()}',
						dataFim = '{$periodoDeRegimeBean->getDataFim()}',
						qntAulas = {$periodoDeRegimeBean->getQntAulas()},
						valorTotal = {$periodoDeRegimeBean->getValorTotal()}
						WHERE id = {$periodoDeRegimeBean->getId()};";
				$i += 1;
			}
			// die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

	}
?>
