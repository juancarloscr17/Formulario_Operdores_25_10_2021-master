<?php

    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json");
    $DATA = (array) json_decode(file_get_contents("php://input"), true);
    
    extract($DATA ,EXTR_PREFIX_ALL, "JS");
    settype($JS_numero_1, "integer");
    settype($JS_numero_2, "integer");
    $IGUALDAD = (string) $JS_numero_1 == $JS_numero_2;




    $opts = array(
        'http' => array(
            'method'  => 'POST',
            'header'  => "Content-Type: application/json",
            'content' => '{"operador": "'.$IGUALDAD.'", "mensaje": "Igualdad"}',
        ),
        'ssl' => array(
            'verify_peer'      => false,
            'verify_peer_name' => false
        )
    );              
    $context  = stream_context_create($opts);
    $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/Formulario_Operdores_25_10_2021/validarBoleano.php';
    $result = file_get_contents($url, false, $context);


    $json = <<<JSON
    {
        "Numero_1_entrada": $JS_numero_1,
        "Numero_2_entrada": $JS_numero_2,
        "Archivo_Api": "${!${''} = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']}",
        "Operador": $result
    }
JSON;

    print_r($json);

?>