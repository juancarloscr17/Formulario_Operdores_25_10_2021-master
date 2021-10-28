<?php

    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json");
    $DATA = (array) json_decode(file_get_contents("php://input"), true);

    settype($DATA["operador"], "bool");
    settype($DATA["mensaje"], "string");

    function boleanoString($operador,$mensaje){
        return <<<JSON
            {   
                "$mensaje": "${!${''} = ($operador) ? "TRUE": "FALSE"}",
                "Archivovalidar": "${!${''} = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']}"
            }
JSON;

    }
    print_r(boleanoString($DATA["operador"], $DATA["mensaje"]));

?>