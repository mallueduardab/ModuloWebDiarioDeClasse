var idDiario = $("#idDiario").val();
var idAluno = $("#idAluno").val();

$(document).ready(function () {
	//carrega informacoes
	getFrequenciaDoBanco();
	getNotasDoBanco();
	// getDiarioDoBanco();

	//ouvintes
	$("#btnDeletar").on("click",deletar);
});

//retorna a frequencia do aluno nas auals
function getFrequenciaDoBanco(){
	var url = "../Controller/alunoInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getFrequencia',
		idAluno: idAluno
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for (var i = 0; i < res.resposta.length; i++) {
				if(res.resposta[i].presenca){
					$("#presenca").append("<h4>Presente no dia "+res.resposta[i].data+"</h4>");
				}else{
					$("#presenca").append("<h4 class='ausente'>Ausente no dia "+res.resposta[i].data+"</h4>");
				}
			}
		} else {
			alert(res.resposta);
		}
	});
}

//retorna as notas do aluno nas avaliacoes
function getNotasDoBanco(){
	var url = "../Controller/alunoInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getNotas',
		idAluno: idAluno
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var media = 0;
			for (var i = 0; i < res.resposta.length; i++) {
				var add = "<div class=\"info-nota col-lg-12\">"+
					"<p class=\"text-left col-lg-6\">"+res.resposta[i].tema+" - ("+res.resposta[i].data+")</p>"+
					"<p class=\"text-right col-lg-6\">"+res.resposta[i].nota+" % do total</p>"+
					"</div>"+
					"<hr>";
				$("#avaliacoes").append(add);
				media += parseFloat(res.resposta[i].nota);
			}
			if(res.resposta.length != 0)
				media /= res.resposta.length;
				
			//att media
			$("#mediaGeral").html("Média geral: "+media+"%");
		} else {
			alert(res.resposta);
		}
	});
}

//deleta o aluno
function deletar(){
	var url = "../Controller/alunoInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'deletar',
		idAluno: idAluno
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
