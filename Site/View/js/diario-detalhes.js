selecionado = false;
var idDiario = $("#idDiario").val();

$(document).ready(function () {
	//carrega informacoes
	getDiario();
	getPeriodoRegimes();
	getAulas();
	getAvaliacoes();
	getAlunos();

	//ouvintes dos botoes
	$("#salvarAula").on("click", addAulaNoBanco);
	$("#salvarAvaliacao").on("click", addAvaliacaoNoBanco);
	$("#salvarAluno").on("click", addAlunoNoBanco);

	$("#aulasBtn").on("click", aulasBtnFunc);
	$("#avaliacaoBtn").on("click", avaliacaoBtnFunc);
	$("#alunosBtn").on("click", alunosBtnFunc);



	$("#alterarAula").on("click", alteraAulaNoBanco);
	$("#alterarAvaliacao").on("click", alteraAvaliacaoNoBanco);
	$("#alterarAluno").on("click", alteraAlunoNoBanco);
});



//exibe o menu de aulas
function aulasBtnFunc(){
	$(".title-box>p").text("Últimas aulas cadastradas");
	$("#aula").show();
	$("#adicionaAula").show();
	$("#adicionaAvaliacao").hide();
	$("#adicionaAlunos").hide();
	$("#aluno").hide();
	$("#avaliacao").hide();

		 //barra de navegação no topo
	$("#title-nav").text("Diário - Aulas");

	$(this).find(".icone").addClass("active-btn");
	$(this).find(".option").addClass("active-btn");

	$(this).siblings().find(".icone").removeClass("active-btn");
	$(this).siblings().find(".option").removeClass("active-btn");
}

//exibe o menu de avaliacoes
function avaliacaoBtnFunc(){
	$(".title-box>p").text("Últimas avaliações cadastradas");
	$("#aula").hide();
	$("#aluno").hide();
	$("#avaliacao").show();
	$("#adicionaAula").hide();
	$("#adicionaAvaliacao").show();
	$("#adicionaAlunos").hide();

	$("#title-nav").text("Diário - Avaliação");

	$(this).find(".icone").addClass("active-btn");
	$(this).find(".option").addClass("active-btn");

	$(this).siblings().find(".icone").removeClass("active-btn");
	$(this).siblings().find(".option").removeClass("active-btn");
}

//exibe o menu de alunos
function alunosBtnFunc(){
	$(".title-box>p").text("Alunos cadastrados nessa turma");
	$("#aula").hide();
	$("#aluno").show();
	$("#avaliacao").hide();
	$("#adicionaAula").hide();
	$("#adicionaAvaliacao").hide();
	$("#adicionaAlunos").show();

	$("#title-nav").text("Diário - Alunos");

	$(this).find(".icone").addClass("active-btn");
	$(this).find(".option").addClass("active-btn");


	$(this).siblings().find(".icone").removeClass("active-btn");
	$(this).siblings().find(".option").removeClass("active-btn");
}



//manda ajax assim q a pagina carregar para pegar as informacoes do diario
function getDiario(){
	var url = "../Controller/diarioInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getDiario',
		idDiario: idDiario
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			$("#diario p").html(res.resposta[0].escola);
			$("#diario h2").html(res.resposta[0].disciplina);
			$("#diario h5").html(res.resposta[0].serie + " | " + res.resposta[0].turma);
			$("#turma").val(res.resposta[0].turma);
		} else {
			alert(res.resposta);
		}
	});
}

//manda ajax assim q a pagina carregar para pegar as informacoes dos regimes
function getPeriodoRegimes(){
	var url = "../Controller/periodoRegimeInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getPeriodoRegimes',
		idDiario: idDiario
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			adicionaPeriodoRegimesNoHTML(res.resposta);
		} else {
			alert(res.resposta);
		}
	});
}

//manda ajax assim q a pagina carregar para pegar as informacoes das aulas
function getAulas(){
	var url = "../Controller/aulaInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAulas',
		idDiario: idDiario
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for (var i = 0; i < res.resposta.length; i++) {
				adicionaAulaNoHTML(res.resposta[i].id, res.resposta[i].nome, res.resposta[i].data, res.resposta[i].dataInicio, res.resposta[i].dataFim);
			}
		} else {
			alert(res.resposta);
		}
	});
}

//manda ajax assim q a pagina carregar para pegar as informacoes das avaliacoes
function getAvaliacoes(){
	var url = "../Controller/avaliacaoInterface.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAvaliacoes',
		idDiario: idDiario
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for (var i = 0; i < res.resposta.length; i++) {
				adicionaAvaliacaoNoHTML(res.resposta[i].id, res.resposta[i].tema, res.resposta[i].data, res.resposta[i].dataInicio, res.resposta[i].dataFim,res.resposta[i].valor);
			}
		} else {
			alert(res.resposta);
		}
	});
}

//manda ajax assim q a pagina carregar para pegar as informacoes dos alunos
function getAlunos(){
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
				adicionaAlunoNoHTML(res.resposta[i].id, res.resposta[i].nome, res.resposta[i].turma);
			}
		} else {
			alert(res.resposta);
		}
	});
}



//add o aula no banco, e depois na view
function addAulaNoBanco(){
	//manda ajax assim q a pagina carregar para pegar as informacoes do diario
	var url = "../Controller/aulaInterface.php";
	//informacoes passadas para a url
	var dataAula = $("#dataAula").val().trim();
	var nome = $("#nomeAula").val().trim();
	var periodoRegime = $("#modalAula").find(".selectPeriodoRegimes").val();
	var req = {
		acao: 'addAula',
		data: dataAula,
		nome: nome,
		periodoRegime: periodoRegime
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Adicionada com sucesso!");
			//adiciona na lista
			$("#aula").html(" ");
			getAulas();
		} else {
			alert(res.resposta);
		}
	});
}

//add o avaliacao no banco, e depois na view
function addAvaliacaoNoBanco(){
	//manda ajax assim q a pagina carregar para pegar as informacoes do diario
	var url = "../Controller/avaliacaoInterface.php";
	//informacoes passadas para a url
	var temaAvaliacao = $("#temaAvaliacao").val().trim();
	var dataAvaliacao = $("#dataAvaliacao").val().trim();
	var valorAvaliacao = $("#valorAvaliacao").val().trim();
	var periodoRegime = $("#modalAvaliacao").find(".selectPeriodoRegimes").val();
	var req = {
		acao: 'addAvaliacao',
		temaAvaliacao: temaAvaliacao,
		dataAvaliacao: dataAvaliacao,
		valorAvaliacao: valorAvaliacao,
		periodoRegime: periodoRegime
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Adicionada com sucesso!");
			//adiciona na lista
			$("#avaliacao").html(" ");
			getAvaliacoes();
		} else {
			alert(res.resposta);
		}
	});
}

//add o aluno no banco, e depois na view
function addAlunoNoBanco(){
	//manda ajax assim q a pagina carregar para pegar as informacoes do diario
	var url = "../Controller/alunoInterface.php";
	//informacoes passadas para a url
	var nome = $("#nomeAluno").val().trim();
	var req = {
		acao: 'addAluno',
		idDiario: idDiario,
		nomeAluno: nome
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Adicionado com sucesso!");
			//adiciona na lista
			$("#aluno").html(" ");
			getAlunos();
		} else {
			alert(res.resposta);
		}
	});
}



//adiciona os periodoregime no html
function adicionaPeriodoRegimesNoHTML(periodoRegimes){
	var retorno = "";
	for (var i = 0; i < periodoRegimes.length; i++) {
		retorno += "<option value='"+periodoRegimes[i].id+"'>"+periodoRegimes[i].dataInicio+" -> "+periodoRegimes[i].dataFim+"</option>"
	}
	$(".selectPeriodoRegimes").html(retorno);
}

//add a aula no html
function adicionaAulaNoHTML(id,nome,data,dataInicio,dataFim){
	$("#aula").append(
		"<div class='box-aula-cadastrada' data-id='"+id+"' data-nome='"+nome+"' data-data='"+data+"' data-dataInicio='"+dataInicio+"' data-dataFim='"+dataFim+"'>"
						+ "<a class='pull-right text-center pt10 icon-box' onclick='alterarAula(this);'>"
						+ "<span class='glyphicon glyphicon-check '></span>"
						+ "<p>Editar aula</p>" +
						"</a>"
			+"<a href='listarPresencas.php?idDiario="+idDiario+"&idAula="+id+"'class='pull-right pt10 text-center icon-box' >"
				+"<span class='glyphicon glyphicon-check '></span>"
								+"<p>Fazer chamada</p>"+
			"</a>\n\
            <h4>"+nome+"</h4><p>"+ data +"</p><p>Regime: "+ dataInicio +" -> " + dataFim + "</p></div>"
	)
}

//add a avaliacao no html
function adicionaAvaliacaoNoHTML(id, nome,data,dataInicio,dataFim,valor){
	$("#avaliacao").append(

		"<div class='box-avaliacoes' data-id='"+id+"' data-nome='"+nome+"' data-data='"+data+"' data-dataInicio='"+dataInicio+"' data-dataFim='"+dataFim+"' data-valor='"+valor+"'>"
		+ "<a class='pull-right text-center pt10 icon-box' onclick='alterarAvaliacao(this);'>"
		+ "<span class='glyphicon glyphicon-check '></span>"
		+ "<p>Editar avaliação</p>" +
		"</a>"
			+"<a href='lancarNotas.php?idDiario="+idDiario+"&idAvaliacao="+id+"' class='pull-right pt10 text-center icon-box'>"
				+"<span class='glyphicon glyphicon-check '></span>"
				+"<p>Lançar Notas</p>"+
			"</a><h4>"+nome+"</h4><p>Regime: "+ dataInicio +" -> " + dataFim + "</p></div>"
	)
}

//add o aluno no html
function adicionaAlunoNoHTML(id, nome, turma){
	var add = "<div class='box-alunos' data-id='"+id+"' data-nome='"+nome+"' data-turma='"+turma+"'>"
	+ "<a class='pull-right text-center pt10 icon-box'' onclick='alterarAluno(this);'>"
	+ "<span class='glyphicon glyphicon-check '></span>"
	+ "<p>Editar aluno</p>" +
	"</a>"
	+"<a href='sobreAluno.php?idDiario="+idDiario+"&idAluno="+id+"&nomeAluno="+nome+"' class='pull-right  pt10 text-center icon-box '>"
			+"<span class='glyphicon glyphicon-list-alt '></span>"
			+"<p>Boletim</p></a><h4>"+nome+"</h4></div>";
	$("#aluno").append(add)
}





//altera aula
function alterarAula(obj){
	//coloca infs
	$("#idAula").val($(obj).parent().attr("data-id"));

	var data = $(obj).parent().attr("data-data");
	data = data.substr(6,4)+"-"+data.substr(3,2)+"-"+data.substr(0,2);
	$("#dataAulaAlterar").val(data);

	$("#nomeAulaAlterar").val($(obj).parent().attr("data-nome"));

	var inicio = $(obj).parent().attr("data-dataInicio");
	var fim = $(obj).parent().attr("data-dataFim");
	// console.log($($(".selectPeriodoRegimes")[0]).find("option"));
	for (var i = 0; i < $($(".selectPeriodoRegimes")[0]).find("option").length; i++) {
		// console.log($($($(".selectPeriodoRegimes")[0]).find("option")[i]).html());
		// console.log($($(".selectPeriodoRegimes")[0]).find("option")[i].value);
		if($($($(".selectPeriodoRegimes")[0]).find("option")[i]).html() == (inicio + " -&gt; "+fim)){
				$("#regimeAula").val($($(".selectPeriodoRegimes")[0]).find("option")[i].value);
				break;
		}
	}

	//exibe modal
	$("#modalAulaAlterar").modal("show");
}

//add o aula no banco, e depois na view
function alteraAulaNoBanco(){
	//manda ajax assim q a pagina carregar para pegar as informacoes do diario
	var url = "../Controller/aulaInterface.php";
	//informacoes passadas para a url
	var idAula = $("#idAula").val().trim();
	var dataAula = $("#dataAulaAlterar").val().trim();
	var nome = $("#nomeAulaAlterar").val().trim();
	var periodoRegime = $("#modalAulaAlterar").find(".selectPeriodoRegimes").val();
	var req = {
		acao: 'alterar',
		idAula: idAula,
		data: dataAula,
		nome: nome,
		periodoRegime: periodoRegime
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Alterada com sucesso!");
			//adiciona na lista
			$("#aula").html(" ");
			getAulas();
		} else {
			alert(res.resposta);
		}
	});
}

//altera aula
function alterarAvaliacao(obj){
	//coloca infs
	$("#idAvaliacao").val($(obj).parent().attr("data-id"));

	var data = $(obj).parent().attr("data-data");
	data = data.substr(6,4)+"-"+data.substr(3,2)+"-"+data.substr(0,2);
	$("#dataAvaliacaoAlterar").val(data);

	$("#temaAvaliacaoAlterar").val($(obj).parent().attr("data-nome"));
	$("#valorAvaliacaoAlterar").val($(obj).parent().attr("data-valor"));

	var inicio = $(obj).parent().attr("data-dataInicio");
	var fim = $(obj).parent().attr("data-dataFim");
	// console.log($($(".selectPeriodoRegimes")[0]).find("option"));
	for (var i = 0; i < $($(".selectPeriodoRegimes")[0]).find("option").length; i++) {
		// console.log($($($(".selectPeriodoRegimes")[0]).find("option")[i]).html());
		// console.log($($(".selectPeriodoRegimes")[0]).find("option")[i].value);
		if($($($(".selectPeriodoRegimes")[0]).find("option")[i]).html() == (inicio + " -&gt; "+fim)){
				$("#regimeAvaliacao").val($($(".selectPeriodoRegimes")[0]).find("option")[i].value);
				break;
		}
	}

	//exibe modal
	$("#modalAvaliacaoAlterar").modal("show");
}

//add o aula no banco, e depois na view
function alteraAvaliacaoNoBanco(){
	//manda ajax assim q a pagina carregar para pegar as informacoes do diario
	var url = "../Controller/avaliacaoInterface.php";
	//informacoes passadas para a url
	var idAvaliacao = $("#idAvaliacao").val().trim();
	var temaAvaliacao = $("#temaAvaliacaoAlterar").val().trim();
	var dataAvaliacao = $("#dataAvaliacaoAlterar").val().trim();
	var valorAvaliacao = $("#valorAvaliacaoAlterar").val().trim();
	var periodoRegime = $("#modalAvaliacaoAlterar").find(".selectPeriodoRegimes").val();
	var req = {
		acao: 'alterar',
		idAvaliacao: idAvaliacao,
		temaAvaliacao: temaAvaliacao,
		dataAvaliacao: dataAvaliacao,
		valorAvaliacao: valorAvaliacao,
		periodoRegime: periodoRegime
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Alterada com sucesso!");
			//adiciona na lista
			$("#avaliacao").html(" ");
			getAvaliacoes();
		} else {
			alert(res.resposta);
		}
	});
}

//altera aula
function alterarAluno(obj){
	//coloca infs
	$("#idAluno").val($(obj).parent().attr("data-id"));
	$("#nomeAlunoAlterar").val($(obj).parent().attr("data-nome"));
	$("#turmaAlterar").val($(obj).parent().attr("data-turma"));

	//exibe modal
	$("#modalAlunosAlterar").modal("show");
}

//add o aula no banco, e depois na view
function alteraAlunoNoBanco(){
	//manda ajax assim q a pagina carregar para pegar as informacoes do diario
	var url = "../Controller/alunoInterface.php";
	//informacoes passadas para a url
	var idAluno = $("#idAluno").val().trim();
	var nome = $("#nomeAlunoAlterar").val().trim();
	var req = {
		acao: 'alterar',
		idAluno: idAluno,
		nomeAluno: nome
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Alterado com sucesso!");
			//adiciona na lista
			$("#aluno").html(" ");
			getAlunos();
		} else {
			alert(res.resposta);
		}
	});
}
