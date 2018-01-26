var idDiario = $("#idDiario").val();
var idAula = $("#idAula").val();

$(document).ready(function () {
	//carrega informacoes
	getAulaDoBanco();
	getChamadaDoBanco();

	$("#btnDeletar").on("click",deletar);//add no html
	$("#btnLancar").on("click",lancar);
});

//manda ajax assim q a pagina carregar para pegar as informacoes da aula
function getAulaDoBanco(){
	var url = "../Controller/aulaInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAula',
		idAula: idAula
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			$("#data").html(res.resposta[0].data);
			$("#nomeAula").html(res.resposta[0].nome);
		} else {
			alert(res.resposta);
		}
	});
}

//manda ajax assim q a pagina carregar para pegar as informacoes da chamada
function getChamadaDoBanco(){
	var url = "../Controller/aulaInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getChamada',
		idDiario: idDiario
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var adicionados = [];
			for (var i = 0; i < res.resposta.length; i++) {
				// alert(JSON.stringify(res.resposta[i]))
				if(res.resposta[i].Aula_id == idAula){
					addChamadaNoHTML(res.resposta[i].idAluno, res.resposta[i].nome, res.resposta[i].presenca, i+1);
					adicionados.push(res.resposta[i].idAluno);
				}
			}
			for (var i = 0; i < res.resposta.length; i++) {
				// alert(JSON.stringify(res.resposta[i]))
				if(adicionados.indexOf(res.resposta[i].idAluno) == -1){
					addChamadaNoHTML(res.resposta[i].idAluno, res.resposta[i].nome, null, i+1);
					adicionados.push(res.resposta[i].idAluno);
				}
			}

		}else{
			alert(res.resposta);
		}
	});
}



//adiciona a chamada no html
function addChamadaNoHTML(id, nome, presenca, cod){
	//tipos de presenca
	//n = nao computado
	//1 = presente
	//0 = ausente
	if(presenca == null)
		presenca = "n";

	var add = "<tr>"+
		"<td><p>"+cod+"</p></td>"+
		"<td><p>"+nome+"</p></td>";

	if(presenca == 1){
		add += "<td ><button  class='btn btn-default btn-table presenca green' onclick='presente(this)'></button></a></td>"+
		"<td ><button class='btn btn-default btn-table ausencia' onclick='ausente(this)'></button></td>"+
		"<input type='hidden' name='"+id+"' value='1'>"+
		"</tr>";
	}else if(presenca == 0){
		add += "<td ><button  class='btn btn-default btn-table presenca' onclick='presente(this)'></button></a></td>"+
		"<td ><button class='btn btn-default btn-table ausencia red' onclick='ausente(this)'></button></td>"+
		"<input type='hidden' name='"+id+"' value='0'>"+
		"</tr>";
	}else{
		add += "<td ><button  class='btn btn-default btn-table presenca' onclick='presente(this)'></button></a></td>"+
		"<td ><button class='btn btn-default btn-table ausencia' onclick='ausente(this)'></button></td>"+
		"<input type='hidden' name='"+id+"' value='n'>"+
		"</tr>";
	}



	$("#chamada").append(add);
}


//deleta a aula
function deletar(){
	var url = "../Controller/aulaInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'deletar',
		idAula: idAula
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Deletado com sucesso!");
			window.location.replace("diario-detalhes.php?idDiario="+idDiario+"");
		} else {
			alert(res.resposta);
		}
	});
}

//lança as notas no banco
function lancar(){
	//pega o valors das notas
	var presencas = [];
	for(var i = 0; i < $("#chamada input").length; i++){
		var valor = $("#chamada input")[i].value;
		var id = $("#chamada input")[i].name;

		// if(valor == "n")
		// 	presencas.push([id, 1]);

		if(valor != "n")
		 	presencas.push([id, valor]);
	}


	var url = "../Controller/aulaInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'lancarChamada',
		idAula: idAula,
		presencas: presencas
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Lançamento efetuado com sucesso!");
		} else {
			alert(res.resposta);
		}
	});
}

function presente(obj){
	$(obj).toggleClass("green");
	$(obj).parent().next().find("button").removeClass("red");
	$(obj).parent().parent().find("input").attr("value",1);
	if($(obj).attr("class").indexOf("green") == -1)
		$(obj).parent().parent().find("input").attr("value","n");
}

function ausente(obj){
	$(obj).toggleClass("red");
	$(obj).parent().prev().find("button").removeClass("green");
	$(obj).parent().parent().find("input").attr("value",0);
	if($(obj).attr("class").indexOf("red") == -1)
		$(obj).parent().parent().find("input").attr("value","n");
}
