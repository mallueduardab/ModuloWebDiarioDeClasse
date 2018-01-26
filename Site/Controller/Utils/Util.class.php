<?php
	//Contem funcoes uteis para o projeto
	class Util{
		//limpa a string passada para evitar ataques no banco
		public static function limpaString($string) {
			return $string;
		}

		//converte a modalidade vinda de forms para a salva no banco
		public static function converteModalidadeParaBanco($modalidade) {
			switch($modalidade){
				case 'm':
					return 'med';
					break;
				case 'f':
					return 'fund';
					break;
				case 'p':
					return 'prim';
					break;
			}
			return '';
		}

		//converte a modalidade vinda do banco para a que e exibida na view
		public static function converteModalidadeParaView($modalidade) {
			switch($modalidade){
				case 'med':
					return 'Ensino Médio';
					break;
				case 'fund':
					return 'Ensino Fundamental';
					break;
				case 'prim':
					return 'Ensino Primário';
					break;
			}
			return '';
		}

		//converte a serie vinda do banco para a que e exibida na view
		public static function converteSerieParaView($serie) {
			switch($serie){
				case '0':
					return '1ª Série';
					break;
				case '1':
					return '2ª Série';
					break;
				case '2':
					return '3ª Série';
					break;
				case '3':
					return '4ª Série';
					break;
				case '4':
					return '5ª Série';
					break;
				case '5':
					return '6ª Série';
					break;
				case '6':
					return '7ª Série';
					break;
				case '7':
					return '8ª Série';
					break;
				case '8':
					return '1º Ano';
					break;
				case '9':
					return '2º Ano';
					break;
				case '10':
					return '3º Ano';
					break;
			}
			return '';
		}

		//converte do formato de data de barra para o de tracos
		// public static function dataParaBanco($data) {
		// 	return substr($data,6,4)."-".substr($data,3,2)."-".substr($data,0,2);
		// }

		//converte do formato de data de tracos para o de barra
		public static function dataParaView($data) {
			return substr($data,8,2)."/".substr($data,5,2)."/".substr($data,0,4);
		}

		//converte o regime vinda do banco para a que e exibida na view
		public static function converteRegimeParaView($modalidade) {
			switch($modalidade){
				case 'b':
					return 'Bimestre';
					break;
				case 't':
					return 'Trimestre';
					break;
				case 's':
					return 'Semestre';
					break;
			}
			return '';
		}
	}

?>
