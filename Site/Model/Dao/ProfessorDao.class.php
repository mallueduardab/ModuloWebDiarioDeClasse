<?php
	require_once('../Model/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class ProfessorDao{
		//Conecta com o banco e cadastra o professor
		public static function cadastrar($bean){
			//cria a query
			$query = "INSERT INTO
					Professor(nome,email,senha,imgPerfil)
					VALUES
					('{$bean->getNome()}','{$bean->getEmail()}','{$bean->getSenha()}',NULL);";

			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e retorna o professor cujo dados batem
		public static function getProfessor($bean){
			//cria a query
			$query = "SELECT nome,imgPerfil
					FROM Professor
					WHERE email = '{$bean->getEmail()}' AND senha = '{$bean->getSenha()}';";

			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e altera oo dados do professor
		public static function alterar($bean){
			//cria a query
			$query = "UPDATE Professor
					SET
						nome = '{$bean->getNome()}'/*,
						senha = '{$bean->getSenha()}',
						imgPerfil = '{$bean->getImgPerfil()}'*/
					WHERE email = '{$bean->getEmail()}';";

			//executa
			return ProcessaQuery::executarQuery($query);
		}
	}
?>
