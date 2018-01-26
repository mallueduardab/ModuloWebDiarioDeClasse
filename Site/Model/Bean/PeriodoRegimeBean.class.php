<?php
	//Classe que representa a tabela Diario
	class PeriodoRegimeBean{
		private $id;
		private $dataInicio;
		private $dataFim;
		private $qntAulas;
		private $valorTotal;
		private $diarioId;

		//Retorna o id do periodoRegime
		public function getId(){
			return $this->id;
		}

		//Altera o id do periodoRegime
		public function setId($valor){
			$this->id = $valor;
		}

		//Retorna o dataInicio do periodoRegime
		public function getDataInicio(){
			return $this->dataInicio;
		}

		//Altera o dataInicio do periodoRegime
		public function setDataInicio($valor){
			$this->dataInicio = $valor;
		}

		//Retorna o dataFim do periodoRegime
		public function getDataFim(){
			return $this->dataFim;
		}

		//Altera o dataFim do periodoRegime
		public function setDataFim($valor){
			$this->dataFim = $valor;
		}

		//Retorna o qntAulas do periodoRegime
		public function getQntAulas(){
			return $this->qntAulas;
		}

		//Altera o qntAulas do periodoRegime
		public function setQntAulas($valor){
			$this->qntAulas = $valor;
		}

		//Retorna o valorTotal do periodoRegime
		public function getValorTotal(){
			return $this->valorTotal;
		}

		//Altera o valorTotal do periodoRegime
		public function setValorTotal($valor){
			$this->valorTotal = $valor;
		}

		//Retorna o diarioId do periodoRegime
		public function getDiarioId(){
			return $this->diarioId;
		}

		//Altera o diarioId do periodoRegime
		public function setDiarioId($valor){
			$this->diarioId = $valor;
		}

	}
?>
