$(function() {
	$("#salvar").on("click", restricaoDeData);
});

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
