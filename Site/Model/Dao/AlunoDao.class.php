<?php
	require_once('../Model/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class AlunoDao{
		//Conecta com o banco e adiciona o aluno
		public static function addAluno($bean,$idDiario){
			//cria a query
			$query = "INSERT INTO Aluno(nome,Turma_id)
				VALUES
				('{$bean->getNome()}',(
					SELECT Turma.id
					FROM Turma INNER JOIN Diario
					ON Turma.id = Turma_id WHERE Diario.id = {$idDiario}
				));";
				// die($query);
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera todos os alunos do diario
		public static function getAlunos($idDiario){
			//cria a query
			$query = "SELECT Aluno.id, Aluno.nome, Turma.nome AS turma FROM Aluno INNER JOIN Turma ON Turma_id = Turma.id WHERE Turma_id = (
						SELECT Turma.id
						FROM Turma INNER JOIN Diario
						ON Turma.id = Turma_id WHERE Diario.id = {$idDiario}
					);";
				// die($query);
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recupera a frequencia do aluno
		public static function getFrequencia($idAluno){
			//cria a query
			$query = "SELECT data, presenca FROM Aula INNER JOIN Chamada ON id = Aula_id WHERE Aluno_id = {$idAluno};";
			// die($query);

			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recupera a nota do aluno
		public static function getNotas($idAluno){
			//cria a query
			$query = "SELECT tema, data, nota FROM Avaliacao INNER JOIN Nota ON id = Avaliacao_id WHERE Aluno_id = {$idAluno};";

			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e deleta o aluno e as outras infs correspondentes
		public static function deletar($idAluno){
			//cria a query
			$query = array();
			$query[0] = "DELETE FROM Nota WHERE Aluno_id = {$idAluno};";

			$query[1] = "DELETE FROM Chamada WHERE Aluno_id = {$idAluno};";

			$query[2] = "DELETE FROM Aluno WHERE id = {$idAluno};";
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e adiciona o aluno
		public static function alterar($bean){
			//cria a query
			$query = "UPDATE Aluno SET
					nome = '{$bean->getNome()}'
					WHERE id = {$bean->getId()};";
				// die($query);
			//executa
			return ProcessaQuery::executarQuery($query);
		}
	}
?>
