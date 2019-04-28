<?php 

	if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        exit(0);
    }

    $json = file_get_contents('php://input');
	$resultado = json_decode($json, true);
	var_dump($resultado["txtnome"]);

	exit();
////axios.post(url, JSON.stringify(data))
    
    // var_dump($var);
// var_dump(json_decode($_POST));
    // var_dump($_POST);

//array(1) { ["{"id":"","txtnome":"HIGOR_AUGUSTO_DA_SILVA_SANTOS","tell":"","cell":"","email":"","bairro":""}"]=> string(0) "" }


?>