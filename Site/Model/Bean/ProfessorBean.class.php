<?php
	//Classe que representa a tabela Professor
	class ProfessorBean{
		private $nome;
		private $email;
		private $senha;
		private $imgPerfil;

		//Retorna o nome do Professor
		public function getNome(){
			return $this->nome;
		}

		//Altera o nome do Professor
		public function setNome($valor){
			$this->nome = $valor;
		}

		//Retorna o email do Professor
		public function getEmail(){
			return $this->email;
		}

		//Altera o email do Professor
		public function setEmail($valor){
			$this->email = $valor;
		}

		//Retorna a senha do Professor
		public function getSenha(){
			return $this->senha;
		}

		//Altera a senha do Professor
		public function setSenha($valor){
			$this->senha = $valor;
		}

		//Retorna a imgPerfil do Professor
		public function getImgPerfil(){
			return $this->imgPerfil;
		}

		//Altera a imgPerfil do Professor
		public function setImgPerfil($valor){
			$this->imgPerfil = $valor;
		}

	}
?>
