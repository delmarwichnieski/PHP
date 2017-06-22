<?php
	//TRAINING
	function getRequestHeaders() {
		$headers = array();
		foreach($_SERVER as $key => $value) {
			if (substr($key, 0, 5) <> 'HTTP_') {
				continue;
			}
			$header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
			$headers[$header] = $value;
		}
		return $headers;
	}

	$headers_request1 = apache_request_headers();
	$headers_request2 = getallheaders();
	$headers_request3 = getRequestHeaders();
	$cookies = $_COOKIE;
	$server = $_SERVER;
	$request = $_REQUEST;
	$post = $_POST;
	$get = $_GET;

	$sessao_existe = $_COOKIE['PHPSESSID'] ?? false;

	ini_set('session.use_strict_mode', 1);
	ini_set('session.sid_length', 32);
	ini_set('session.sid_bits_per_character', 5);

	if($sessao_existe){
		session_start();
		//fazer algo específico na primeira vez
	}else{
		session_start();
		//fazer algo em comum nas demais vez
	}

	$sess_id = session_id();
	$sess_id_length = strlen($sess_id);

	$fim = 'fim';
?>