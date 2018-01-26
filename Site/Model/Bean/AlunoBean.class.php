<?php
	//Classe que representa a tabela Aluno
	class AlunoBean{
		private $id;
		private $nome;
		private $turmaId;

		//Retorna o id da Aula
		public function getId(){
			return $this->id;
		}

		//Altera o id da Aula
		public function setId($valor){
			$this->id = $valor;
		}

		//Retorna o nome da Aula
		public function getNome(){
			return $this->nome;
		}

		//Altera o nome da Aula
		public function setNome($valor){
			$this->nome = $valor;
		}

		//Retorna o turmaId da Aula
		public function getTurmaId(){
			return $this->turmaId;
		}

		//Altera o turmaId da Aula
		public function setTurmaId($valor){
			$this->turmaId = $valor;
		}
	}
?>
