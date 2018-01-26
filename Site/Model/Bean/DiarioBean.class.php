<?php
	//Classe que representa a tabela Diario
	class DiarioBean{
		private $id;
		private $disciplina;
		private $escola;
		private $serie;
		private $turma;
		private $modalidade;

		private $professorEmail;
		private $turmaId;

		//Retorna o id do Diario
		public function getId(){
			return $this->id;
		}

		//Altera o id do Diario
		public function setId($valor){
			$this->id = $valor;
		}

		//Retorna o disciplina do Diario
		public function getDisciplina(){
			return $this->disciplina;
		}

		//Altera o disciplina do Diario
		public function setDisciplina($valor){
			$this->disciplina = $valor;
		}

		//Retorna o escola do Diario
		public function getEscola(){
			return $this->escola;
		}

		//Altera o escola do Diario
		public function setEscola($valor){
			$this->escola = $valor;
		}

		//Retorna o serie do Diario
		public function getSerie(){
			return $this->serie;
		}

		//Altera o serie do Diario
		public function setSerie($valor){
			$this->serie = $valor;
		}

		//Retorna o turma do Diario
		public function getTurma(){
			return $this->turma;
		}

		//Altera o turma do Diario
		public function setTurma($valor){
			$this->turma = $valor;
		}

		//Retorna o modalidade do Diario
		public function getModalidade(){
			return $this->modalidade;
		}

		//Altera o modalidade do Diario
		public function setModalidade($valor){
			$this->modalidade = $valor;
		}

		//Retorna o email do Diario
		public function getProfessorEmail(){
			return $this->professorEmail;
		}

		//Altera o email do Diario
		public function setProfessorEmail($valor){
			$this->professorEmail = $valor;
		}

		//Retorna o turmaId do Diario
		public function getTurmaId(){
			return $this->turmaId;
		}

		//Altera o turmaId do Diario
		public function setTurmaId($valor){
			$this->urmaId = $valor;
		}

	}
?>
