<?php
	//Classe que representa a tabela Avaliacao
	class AvaliacaoBean{
		private $id;
		private $tema;
		private $valor;
		private $data;
		private $periodoRegimeId;

		//Retorna o id da Avaliacao
		public function getId(){
			return $this->id;
		}

		//Altera o id da Avaliacao
		public function setId($valor){
			$this->id = $valor;
		}

		//Retorna o tema da Avaliacao
		public function getTema(){
			return $this->tema;
		}

		//Altera o tema da Avaliacao
		public function setTema($valor){
			$this->tema = $valor;
		}

		//Retorna o valor da Avaliacao
		public function getValor(){
			return $this->valor;
		}

		//Altera o valor da Avaliacao
		public function setValor($valor){
			$this->valor = $valor;
		}

		//Retorna o data da Avaliacao
		public function getData(){
			return $this->data;
		}

		//Altera o data da Avaliacao
		public function setData($valor){
			$this->data = $valor;
		}

		//Retorna o periodoRegimeId da Avaliacao
		public function getPeriodoRegimeId(){
			return $this->periodoRegimeId;
		}

		//Altera o periodoRegimeId da Avaliacao
		public function setPeriodoRegimeId($valor){
			$this->periodoRegimeId = $valor;
		}

	}
?>
