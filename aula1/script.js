var inputCep = document.querySelector("#cep");

inputCep.addEventListener('change', function(event){

	if(!Number(inputCep.value)){
		document.getElementById("cep").value = "";
		alert("O cep digitado é inválido");
	}

});

var inputConfirmaSenha = document.querySelector("#confirmaSenha");

inputConfirmaSenha.addEventListener('change', function(event){

	var inputSenha = document.querySelector("#senha");

	if(inputSenha.value != inputConfirmaSenha.value){
		document.getElementById("senha").value = "";
		document.getElementById("confirmaSenha").value = "";
		alert("As senhas digitadas não conferem!");
	}

});