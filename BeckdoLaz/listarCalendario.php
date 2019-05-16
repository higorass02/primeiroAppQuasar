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
    $data = "";

    if($_GET){
        $data = $_GET['data'];
    }

    include('conection.php');

    $sql = "SELECT * FROM `smb_agenda` WHERE DATE_FORMAT(data_agenda, '%Y/%m/%d') = '".$data."'";
    
    $result = $conn->query($sql);
    
    $data = array();

    $resultado = $result->fetch_assoc();
    if(!$resultado){
        exit();
    }
    $contato = array();

    $contato = array(
        'id' => $resultado['id'],
        'data_agenda' => $resultado['data_agenda'],
        'data_criacao' => $resultado['data_criacao'],
        'hora' => $resultado['hora'],
        'status' => $resultado['status'],
        'id_contato' => $resultado['id_contato'],
        'id_servico' => $resultado['id_servico']
    );

    array_push($data, $contato) ;
    
    echo(json_encode($data));
    exit();