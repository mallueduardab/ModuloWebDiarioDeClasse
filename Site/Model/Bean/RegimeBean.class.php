<?php
	//Classe que representa a tabela Diario
	class RegimeBean{
		private $id;
		private $dataInicio;
		private $dataFim;
		private $qntAulas;
		private $diario;

		//Retorna o id do Regime
		public function getId(){
			return $this->id;
		}

		//Altera o id do Regime
		public function setId($valor){
			$this->id = $valor;
		}

		//Retorna o dataInicio do Regime
		public function getDataInicio(){
			return $this->dataInicio;
		}

		//Altera o dataInicio do Regime
		public function setDataInicio($valor){
			$this->dataInicio = $valor;
		}

		//Retorna o dataFim do Regime
		public function getDataFim(){
			return $this->dataFim;
		}

		//Altera o dataFim do Regime
		public function setDataFim($valor){
			$this->dataFim = $valor;
		}

		//Retorna o qntAulas do Regime
		public function getQntAulas(){
			return $this->qntAulas;
		}

		//Altera o qntAulas do Regime
		public function setQntAulas($valor){
			$this->qntAulas = $valor;
		}

		//Retorna o diario do Regime
		public function getDiario(){
			return $this->diario;
		}

		//Altera o diario do Regime
		public function setDiario($valor){
			$this->diario = $valor;
		}

	}
?>
