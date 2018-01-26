var idDiario = $("#idDiario").val();
var idAvaliacao = $("#idAvaliacao").val();

$(document).ready(function () {
	//carrega informacoes
	getDiarioDoBanco();
	getAvaliacaoDoBanco();

	//ouvintes
	$("#btnLancar").on("click",lancar);
	$("#btnDeletar").on("click",deletar);
});

//manda ajax assim q a pagina carregar para pegar as informacoes do diario
function getDiarioDoBanco(){
	var url = "../Controller/diarioInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getDiario',
		idDiario: idDiario
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			$("#diario").html("<p>"+res.resposta[0].escola+"</p><p>Disciplina: "+res.resposta[0].disciplina+"</p><p>Série: "+res.resposta[0].serie+"  &nbsp&nbsp&nbsp     Turma: "+res.resposta[0].turma+"  &nbsp&nbsp&nbsp     Regime: <span id='regime'></span></p>");
		} else {
			alert(res.resposta);
		}
	});
}

//manda ajax assim q a pagina carregar para pegar as informacoes da avaliacao
function getAvaliacaoDoBanco(){
	var url = "../Controller/avaliacaoInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAvaliacao',
		idAvaliacao: idAvaliacao,
		idDiario: idDiario
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
				$("body").append("<input type='hidden' id='idAva' value='"+res.resposta[0].id+"'>");
				$("#avaliacao").html("<h3>Avaliação - Valor "+res.resposta[0].valor+" pontos</h3>	<h1 class='pleft0'>"+res.resposta[0].data+"</h1><h4>"+res.resposta[0].tema+"</h4>");
				$("#regime").html(res.resposta[0].dataInicio+" -> "+res.resposta[0].dataFim);

				getAlunosDoBanco(res.resposta[0].valor);
		} else {
			alert(res.resposta);
		}
	});
}

//manda ajax assim q a pagina carregar para pegar as informacoes dos alunos
function getAlunosDoBanco(valor){
	var url = "../Controller/alunoInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAlunos',
		idDiario: idDiario
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for (var i = 0; i < res.resposta.length; i++) {
				var add = "<tr>"+
					"<td><p >"+(i+1)+"</p></td>"+
					"<td><p class='nomeAluno' id='"+res.resposta[i].id+"'>"+res.resposta[i].nome+"</p></td>"+
					"<td class='porcentagem text-center'><input type='number'></td>"+
					"<td class='text-center'><p>"+valor+"</p></td>"+
				"</tr>";
				$("#alunos").append(add);
			}
			//chamo a funcao aqui pq dai e garantido q os alunos ja estao no html
			getAlunosNotas();
		} else {
			alert(res.resposta);
		}
	});
}

//lança as notas no banco
function lancar(){
	//pega o valors das notas
	var notas = [];
	for(var i = 0; i < $(".porcentagem input").length; i++){
		var valor = parseFloat($(".porcentagem input")[i].value);
		var id = $(".nomeAluno")[i].id;
		if(isNaN(valor))
			continue;
		notas.push([id, valor]);
	}


	var url = "../Controller/avaliacaoInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'lancarNotas',
		idAvaliacao: idAvaliacao,
		idDiario: idDiario,
		notas: notas
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

//coloca o valor das ntoas que estiverem no banco
function getAlunosNotas(){
	var url = "../Controller/avaliacaoInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAlunosNotas',
		idAvaliacao: idAvaliacao
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for (var i = 0; i < $(".nomeAluno").length; i++) {//for da dos inputs
				for (var j = 0; j < res.resposta.length; j++) {//for da resposta
					if($(".nomeAluno")[i].id == res.resposta[j].Aluno_id){
						$(".porcentagem input")[i].value = res.resposta[j].nota;
					}
				}
			}
		} else {
			alert(res.resposta);
		}
	});
}

//deleta a avaliacao
function deletar(){
	var url = "../Controller/avaliacaoInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'deletar',
		idAvaliacao: idAvaliacao
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
