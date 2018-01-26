var nome = "É UM PRAZER TE CONHECER, (NOME CADASTRADO ANTERIORMENTE) "

function atribuiNome(){
	nome += document.getElementById("form-currie");
}

function getNome(){
	return nome;
}

function setNome(nome){
	this.nome += nomeDado;
}