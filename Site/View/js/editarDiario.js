$(document).ready(function () {
	var idDiario = $("#idDiario").val();
	getDiario(idDiario);
});

function converteSerieParaView(serie) {
	switch(serie){
		case '1ª Série':
			return '0';
			break;
		case '2ª Série':
			return '1';
			break;
		case '3ª Série':
			return '2';
			break;
		case '4ª Série':
			return '3';
			break;
		case '5ª Série':
			return '4';
			break;
		case '6ª Série':
			return '5';
			break;
		case '7ª Série':
			return '6';
			break;
		case '8ª Série':
			return '7';
			break;
		case '1º Ano':
			return '8';
			break;
		case '2º Ano':
			return '9';
			break;
		case '3º Ano':
			return '10';
			break;
	}
}

function converteModalidadeParaView(modalidade) {
	switch(modalidade){
		case 'Ensino Primário':
			return 'p';
			break;
		case 'Ensino Fundamental':
			return 'f';
			break;
		case 'Ensino Médio':
			return 'm';
			break;
	}
}

//manda ajax assim q a pagina carregar para pegar as informacoes do diario
function getDiario(idDiario){
	var url = "../Controller/diarioInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getDiario',
		idDiario: idDiario
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			$("#nameSchool").val(res.resposta[0].escola);
			$("#nameDiscipline").val(res.resposta[0].disciplina);
			$("#modality").val(converteModalidadeParaView(res.resposta[0].modalidade));
			$("#series").val(converteSerieParaView(res.resposta[0].serie));
			$("#idClass").val(res.resposta[0].turma);
			var reg = "Bimestral";
			if(res.resposta[0].numRegimes == 2)
				reg = "Semestral";
			else if(res.resposta[0].numRegimes == 3)
				reg = "Trimestral";
			$("#classRegimen").val(reg);
			$("#regimeAntigo").val(reg);
		} else {
			alert(res.resposta);
		}
	});
}
