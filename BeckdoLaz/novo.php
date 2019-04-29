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
    // var_dump($resultado);

    $nome       = trim($resultado['nome']);
    $data_nasc  = trim($resultado['dtnasc']);
    $cpf        = trim($resultado['cpf']);
    $tell       = trim($resultado['tell']);
    $cell       = trim($resultado['cell']);
    $email      = trim($resultado['email']);

    if(!$nome || $nome == '' || !$cpf || $cpf == ''){
        if($nome == ''){
            echo 'Campo NOME Obrigatório!\n';
        }
        if($cpf == ''){
            echo 'Campo CPF Obrigatório!\n';
        }
    }else{
        include('conection.php');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            exit();
        }
        $sql = "SELECT ID FROM `smb_contatos` WHERE cpf = '".$cpf."'";

        $result = $conn->query($sql);

        $resultado2 = $result->fetch_assoc();

        if($resultado2['ID'] == null){
            
            $sql1 = "INSERT INTO `smb_contatos` (`id`, `nome`, `status`, `dt_nasc`, `cpf`) VALUES (NULL, '".$nome."', '1', '".$data_nasc."', '".$cpf."')";
            $result1 = $conn1->query($sql1);


            $result = $conn->query($sql);
            $resultado2 = $result->fetch_assoc();
            $id_contato = $resultado2['ID'];

            $sql2 = "INSERT INTO `smb_enderecos` (`id`, `telefone`, `celular`, `email`, `status`, `smb_contatos_id`) 
                    VALUES (null, '".$tell."', '".$cell."', '".$email."', '1', ".$id_contato.")";
            $result2 = $conn2->query($sql2);
            echo 'inserido';
        }
        
    }


?>