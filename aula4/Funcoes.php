<?php 

$variavelComum = 'oi';

var_dump($variavelComum); //var_dump: Função de debug que imprime o formato da variável
echo nl2br("\n");

echo $variavelComum; // O echo Imprime uma variável numérica ou string
echo nl2br("\n"); // A função nl2br imprime uma quebra de linha
echo $variavelComum;
echo nl2br("\n");

$variavelComum = 1; 

var_dump($variavelComum); //Transformamos a variável de string para int
echo nl2br("\n");

const EXEMPO_DE_CONSTANTE = "Olá mundo!";
echo EXEMPO_DE_CONSTANTE;
echo nl2br("\n");

//die();// Essa função pára a execução do código
$variavelArray = array();
$variavelArray[] = "carrinho";
$variavelArray[] = "estilingue";
$variavelArray[] = "boneca";

echo "<pre>"; // tag utilizada para representar texto pré-formatado
print_r($variavelArray);
echo "</pre>";

echo nl2br("\n");
$arrayAssociativo = array(	
	"fruta"=>"Banana", 
	"dia"=>"Domingo", 
	"lugar"=>"Brasil"
);

echo "<pre>";
print_r($arrayAssociativo);
echo "</pre>";
echo nl2br("\n");

$arrayUsuarios = array();

$arrayKenia = array(	
	"nome"=>"Kênia", 
	"telefone"=>"31 986139502", 
	"email"=>"keniaferreira@live.com"
);
echo "<pre>";
print_r($arrayKenia);
echo "</pre>";
echo nl2br("\n");

array_push($arrayUsuarios,$arrayKenia);

echo "<pre>";
print_r($arrayUsuarios);
echo "</pre>";
echo nl2br("\n");

$arrayHelio = array(	
	"nome"=>"Helio", 
	"telefone"=>"31 85963214", 
	"email"=>"helio@live.com"
);

echo "<pre>";
print_r($arrayHelio);
echo "</pre>";
echo nl2br("\n");

array_push($arrayUsuarios, $arrayHelio);

echo "<pre>";
print_r($arrayUsuarios);
echo "</pre>";
echo nl2br("\n");

foreach ($arrayUsuarios as $key => $usuario) {
	echo $key;
	echo nl2br("\n");
	print_r($usuario);
	echo nl2br("\n");
}

echo nl2br("\n");
echo nl2br("\n");

//Percorrendo um array com Foreach
foreach ($arrayUsuarios as $key => $usuario) {
	echo "Nome: ".$usuario["nome"]." | Telefone: ".$usuario["telefone"]." | E-mail: ".$usuario["email"];
	echo nl2br("\n");
	echo nl2br("\n");
}

$usuariosJson = json_encode($arrayUsuarios);

echo $usuariosJson;

echo nl2br("\n");
echo nl2br("\n");

var_dump($usuariosJson); //string Json
echo nl2br("\n");
echo nl2br("\n");

//Percorrendo um objeto com Foreach
foreach (json_decode($usuariosJson) as $key => $usuario) {
	echo "Nome: ".$usuario->nome." | Telefone: ".$usuario->telefone." | Email: ".$usuario->email;
	echo nl2br("\n");
	echo nl2br("\n");
}


//Percorrendo um array com For
for ($i=0; $i < count($arrayUsuarios) ; $i++) { 
	echo "Nome: ".$arrayUsuarios[$i]["nome"]." | Telefone: ".$arrayUsuarios[$i]["telefone"]." | E-mail: ".$arrayUsuarios[$i]["email"];
	echo nl2br("\n");
	echo nl2br("\n");
}

//Utilizando o for de maneira parecida ao Foreach
foreach (range(1,5) as $ordem)
{
     print('Ordem : '.$ordem.'<br>');
}

echo nl2br("\n");
echo nl2br("\n");

//Comparando o For ao Foreach acima
for ($i=1; $i <= 5 ; $i++) { 
	print('Ordem : '.$i.'<br>');
}

echo nl2br("\n");
echo nl2br("\n");

//Valida uma data no formato gregoriano
if (checkdate('12', '25', '2016')):
	echo 'Válido';
else:
	echo 'Inválido';
endif;

echo nl2br("\n");
echo nl2br("\n");

$today = date("Y-m-d H:i:s");
var_dump($today);

echo nl2br("\n");
echo nl2br("\n");

$dia = date("Y-m-d");
var_dump($dia);

echo nl2br("\n");
echo nl2br("\n");

$hora = date("H:i:s");
var_dump($hora);

echo nl2br("\n");
echo nl2br("\n");

$dia = date("y-M-D");
var_dump($dia);

echo nl2br("\n");
echo nl2br("\n");

$diaBr = date("d-m-Y");
var_dump($diaBr);

echo nl2br("\n");
echo nl2br("\n");

$diaBr = date("d/m/Y");
var_dump($diaBr);

echo nl2br("\n");
echo nl2br("\n");

$numeros = array(3,4,6,7);

function somar($arrayParaSoma) {
	$resultado = 0;
	foreach ($arrayParaSoma as $key => $numero) {
		$resultado += $numero;
	}
	return $resultado;
}

echo somar($numeros);
echo nl2br("\n");
echo nl2br("\n");

$palavras = array("Fomos","tomar","café");

function montarFrase($arrayPalavras) {
	$frase = '';
	foreach ($arrayPalavras as $key => $palavra) {
		$frase .= $palavra." ";
	}
	return $frase;
}

echo montarFrase($palavras);
echo nl2br("\n");
echo nl2br("\n");

$testeRetirarAcentos = "Hoje é feriadão";

function tirarAcentos($string){
	return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$string);
}

echo tirarAcentos($testeRetirarAcentos);
echo nl2br("\n");
echo nl2br("\n");

echo utf8_encode($testeRetirarAcentos);
echo nl2br("\n");
echo nl2br("\n");

echo utf8_decode($testeRetirarAcentos);

echo nl2br("\n");
echo nl2br("\n");

$testeRetirarAcentos2 = "Hoje é feriadão";

$stringSemAcento = tirarAcentos($testeRetirarAcentos2);

echo strtoupper($stringSemAcento);
echo nl2br("\n");
echo nl2br("\n");

$observacao = "o pedido deve ser entregue até sexta";

echo ucfirst($observacao);
echo nl2br("\n");
echo nl2br("\n");

$nome = "kenia ferreira de jesus";

echo ucwords($nome);