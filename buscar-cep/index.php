<?php
header("Access-Control-Allow-Origin: *"); // Permite requisições de qualquer origem

// Função para validar o CEP
function validarCEP($cep) {
	$cep = preg_replace('/\D/', '', $cep);
	return strlen($cep) === 8;
}

// Recebe o CEP via GET
$cep = $_GET['cep'];

// Valida o CEP antes de fazer a requisição externa
if (!validarCEP($cep)) {
	echo json_encode(["error" => "CEP inválido. Insira um CEP com 8 dígitos numéricos."]);
	http_response_code(400); 
	exit;
}

// Se o CEP é válido, continua 
$url = "https://viacep.com.br/ws/{$cep}/json/";

// Faz a requisição para a API da ViaCEP
$response = file_get_contents($url);
$data = json_decode($response, true);

// Verifica se a resposta contém um erro ou está vazia
if (isset($data['erro']) || empty($data)) {
	echo json_encode(["error" => "O CEP não foi encontrado. Por favor, verifique e tente novamente."]);
	http_response_code(404);
	exit;
}


echo json_encode($data);
