
//manda ajax assim q a pagina carregar
$(document).ready(function () {
	getDiarios();
});

//recupera informacoes dos diarios no banco
function getDiarios(){
	var url = "../Controller/diarioInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getDiarios'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var pai = $("#diariosExibicao");
			for (var i = 0; i < res.resposta.length; i++) {
				pai.append(criarDiario(res.resposta[i].id, res.resposta[i].escola, res.resposta[i].disciplina, res.resposta[i].turma, res.resposta[i].serie));
			}
		} else {
			alert(res.resposta);
		}
	});
}

//cria o escopo de um diario
function criarDiario(id, escola, disciplina, turma, serie) {
	var retorno = '<div class="col-sm-4 col-lg-4 col-sm-4 col-xs-12">';
	retorno += '<div class="box-diario">';
	retorno += '<p class="nome-escola">' + escola + '<a href="editarDiario.php?idDiario='+id+'" class="glyphicon glyphicon-edit config-ico-diaries pull-right"></a> <a href="../Controller/diarioInterface.php?acao=deletar&idDiario='+id+'" class="glyphicon glyphicon-trash config-ico-diaries pull-right"></a></p>';
	retorno += '<h2 class="nome-disc"> <a href="diario-detalhes.php?idDiario=' + id + '" style="color:black" > ' + disciplina + '</a></h2>';
	retorno += '<h5 class="serie-turma ">' + serie + '</h5>';
	retorno += '<h5 class="text-rodape">' + turma + ' <span href="#" class="glyphicon glyphicon-heart config-ico-heart pull-right"></span></h5>  ' ;
	retorno += '</div></div>';

	return retorno;
}
