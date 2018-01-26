<?php
	//Classe que representa a tabela Aula
	class AulaBean{
		private $id;
		private $nome;
		private $data;
		private $periodoRegimeId;

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

		//Retorna o data da Aula
		public function getData(){
			return $this->data;
		}

		//Altera o data da Aula
		public function setData($valor){
			$this->data = $valor;
		}

		//Retorna o periodoRegimeId da Aula
		public function getPeriodoRegimeId(){
			return $this->periodoRegimeId;
		}

		//Altera o periodoRegimeId da Aula
		public function setPeriodoRegimeId($valor){
			$this->periodoRegimeId = $valor;
		}
	}
?>
