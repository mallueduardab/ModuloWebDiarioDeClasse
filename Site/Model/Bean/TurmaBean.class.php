<?php
	//Classe que representa a tabela Turma
	class TurmaBean{
		private $id;
		private $nome;
		private $professorEmail;
		private $turmaId;

		//Retorna o id da Turma
		public function getId(){
			return $this->id;
		}

		//Altera o id da Turma
		public function setId($valor){
			$this->id = $valor;
		}

		//Retorna o nome da Turma
		public function getNome(){
			return $this->nome;
		}

		//Altera o nome da Turma
		public function setNome($valor){
			$this->nome = $valor;
		}

	}
?>
