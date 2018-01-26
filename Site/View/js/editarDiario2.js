$(document).ready(function () {
	var idDiario = $("#idDiario").val();
	var regimeAntigo = $("#regimeAntigo").val();
	var regime = $("#regime").val();

	if(regimeAntigo == regime){//buscar do banco
		getPeriodos(idDiario);
	}
	else{
		var qnt = 2;
		var tipoRegime = "Semestre";
		if(regime == "Trimestral"){
			qnt = 3;
			tipoRegime = "Trimestre";
		}
		else if(regime == "Bimestral"){
			qnt = 4;
			tipoRegime = "Bimestre";
		}
		printPeriodoVazio(qnt,tipoRegime);
	}

	$("#salvar").on("click", restricaoDeData);
});

//manda ajax assim q a pagina carregar para pegar as informacoes dos periodos
function getPeriodos(idDiario){
	var url = "../Controller/periodoRegimeInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getPeriodoRegimes',
		idDiario: idDiario
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var tamanho = res.resposta.length;

			var tipoRegime = "Semestre";
			if(tamanho == 3)
				tipoRegime = "Trimestre";
			else if(tamanho == 4)
				tipoRegime = "Bimestre";

			var periodo = "";
			var vetorId = [0,1,2,3,4,5,6,7];//esquema para cada input ter um id
			var contId = 0;
			for(var i = 0; i < tamanho; i++){
				periodo += '<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">'+
					'<div class="ctn-prds">'+
						'<h3 class="nome-periodo"> '+(i+1)+' '+tipoRegime+'</h3>'+
						'<h3 class="cdst">Início do periodo</h3>'+
						'<input type="date" class="restricaoData" id="regime'+vetorId[contId]+'" name="dataInicio[]" required style="color:black" value="'+converteDataParaBanco(res.resposta[i].dataInicio)+'">'+
						'<h3 class="cdst">Fim do periodo</h3>'+
						'<input type="date" class="restricaoData" id="regime'+vetorId[contId+1]+'" name="dataFim[]" required style="color:black" value="'+converteDataParaBanco(res.resposta[i].dataFim)+'">'+
						'<h3 class="cdst">Quantidade de aulas</h3>'+
						'<input type="number" id="qnt-aulas" name="qntAulas[]" required value="'+res.resposta[i].qntAulas+'">'+
						'<h3 class="cdst">Valor do '+tipoRegime+' </h3>'+
						'<input type="number" id="valor-periodo-regime" name="valor[]" required value="'+res.resposta[i].valorTotal+'">'+
					'</div>'+
				'</div>';
				periodo += "<input type='hidden' name='idRegime[]' value='"+res.resposta[i].id+"'>";
				contId+=2;
			}
			$("#periodos").html(periodo);
		} else {
			alert(res.resposta);
		}
	});
}

function printPeriodoVazio(qnt,regime){
	var periodo = "";
	var now = new Date;
	var data = ''+now.getFullYear()+'-'+now.getMonth()+'-'+now.getDate();
	for(var i = 1; i <= qnt; i++){
		periodo += '<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">'+
			'<div class="ctn-prds">'+
				'<h3 class="nome-periodo"> '+i+' '+regime+'</h3>'+
				'<h3 class="cdst">Início do periodo</h3>'+
				'<input type="date" id="inicio-periodoParte" name="dataInicio[]" required style="color:black" value="'+data+'">'+
				'<h3 class="cdst">Fim do periodo</h3>'+
				'<input type="date" id="fim-periodoParte" name="dataFim[]" required style="color:black" value="'+data+'">'+
				'<h3 class="cdst">Quantidade de aulas</h3>'+
				'<input type="number" id="qnt-aulas" name="qntAulas[]" required value="">'+
				'<h3 class="cdst">Valor do '+regime+' </h3>'+
				'<input type="number" id="valor-periodo-regime" name="valor[]" required value="">'+
			'</div>'+
		'</div>';
	}
	$("#periodos").html(periodo);
}

function converteDataParaBanco(data){
	return data.substr(6, 4)+"-"+data.substr(3, 2)+"-"+data.substr(0, 2);
}

//garante que as datas nao se cruzem e salva
function restricaoDeData(){
	var id = -1;
	var flg = true;
	for(var i = 0;i < $(".restricaoData").length; i++){
		id = $($(".restricaoData")[i]).attr("id").substr(6,1);
		var dataAtual = new Date($($(".restricaoData")[i]).val());

		if(typeof $($(".restricaoData")[i-1]).attr("id") != "undefined"){
			var dataAnterior = new Date($("#regime"+(id-1)).val());
			if(dataAtual.getTime() - dataAnterior.getTime() < 0){
				alert("Datas se cruzam!");
				flg = false;
			}
		}
		if(typeof $($(".restricaoData")[i+1]).attr("id") != "undefined"){
			var dataSeguinte = new Date($("#regime"+(id+1)).val());
			if(dataSeguinte.getTime() - dataAtual.getTime() < 0){
				alert("Datas se cruzam!");
				flg = false;
			}
		}
		// console.log(dataAtual.getTime() - dataSeguinte.getTime());
	}

	if(flg)
		$("#formSalvar").submit();
}
