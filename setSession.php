<?php

    session_start();
    $_SESSION['id'] = json_decode(file_get_contents('php://input'), true)["data"]; 
    exit;
    
    //json_decode transforma as infos que estão em json em php, para transformar de php pra json tem que usar json_encode(). o file_get é como se vc estivesse enviando um arquivo para o php, o json com php ele entende como arquivo enviado e não string