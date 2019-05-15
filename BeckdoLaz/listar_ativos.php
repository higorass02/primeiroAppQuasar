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
    $termo = "";
    if($_GET){
        $termo = $_GET['termo'];
    }
    if($termo){

        include('conection.php');

        $sql = "SELECT * FROM `smb_contatos` WHERE upper(NOME) like upper('%".$_GET['termo']."%') OR CPF like '%".$_GET['termo']."%'";

        $result = $conn->query($sql);
        
        $data = array();    

        while ($resultado = $result->fetch_assoc()){

            $sql1 = "SELECT * FROM `smb_enderecos` WHERE smb_contatos_id = ".$resultado['id'];

            $result1 = $conn1->query($sql1);

            $resultado1 = $result1->fetch_assoc();
            
            $contato = array();

            // //contato
            // $contato[]['ID'] = $resultado['id'];
            // $contato[]['NOME'] = $resultado['nome'];
            // $contato[]['CPF'] = $resultado['cpf'];
            // $contato[]['DT_NASC'] = $resultado['dt_nasc'];
            // $contato[]['STATUS'] = $resultado['status'];
            // //endereco
            // $contato[]['ID_ENDERECO'] = $resultado1['id'];
            // $contato[]['TELEFONE'] = $resultado1['telefone'];
            // $contato[]['CELULAR'] = $resultado1['celular'];
            // $contato[]['EMAIL'] = $resultado1['email'];
            $contato = array(
                'id' => $resultado['id'],
                'nome' => $resultado['nome'],
                'cpf' => $resultado['cpf'],
                'dt_nasc' => $resultado['dt_nasc'],
                'status' => $resultado['status'],
                'id_endereco' => $resultado1['id'],
                'telefone' => $resultado1['telefone'],
                'celular' => $resultado1['celular'],
                'email' => $resultado1['email']
            );
            array_push($data, $contato) ;
        }
        echo(json_encode($data));
        exit();
    }
    else {
        include('conection.php');

        $sql = "SELECT * FROM `smb_contatos` WHERE status = '1'";

        $result = $conn->query($sql);
        
        $data = array();    

        while ($resultado = $result->fetch_assoc()){

            $sql1 = "SELECT * FROM `smb_enderecos` WHERE smb_contatos_id = ".$resultado['id'];

            $result1 = $conn1->query($sql1);

            $resultado1 = $result1->fetch_assoc();
            
            $contato = array();

            // //contato
            // $contato[]['ID'] = $resultado['id'];
            // $contato[]['NOME'] = $resultado['nome'];
            // $contato[]['CPF'] = $resultado['cpf'];
            // $contato[]['DT_NASC'] = $resultado['dt_nasc'];
            // $contato[]['STATUS'] = $resultado['status'];
            // //endereco
            // $contato[]['ID_ENDERECO'] = $resultado1['id'];
            // $contato[]['TELEFONE'] = $resultado1['telefone'];
            // $contato[]['CELULAR'] = $resultado1['celular'];
            // $contato[]['EMAIL'] = $resultado1['email'];
            $contato = array(
                'id' => $resultado['id'],
                'nome' => $resultado['nome'],
                'cpf' => $resultado['cpf'],
                'dt_nasc' => $resultado['dt_nasc'],
                'status' => $resultado['status'],
                'id_endereco' => $resultado1['id'],
                'telefone' => $resultado1['telefone'],
                'celular' => $resultado1['celular'],
                'email' => $resultado1['email']
            );
            array_push($data, $contato) ;
        }
        echo(json_encode($data));
        exit();
    }
    