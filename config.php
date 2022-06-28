<?php

    session_start();

    date_default_timezone_set('America/Sao_Paulo');

    if(!array_key_exists('login', $_SESSION) || empty(isset($_SESSION['login']))) 
    {
    $page = "errorPage.php";
    setcookie('notify', $msg, (time() + 10), "/aula06/loja/{$page}", 'localhost');
    header("location: {$page}");
    exit;
    }

    

   
   
    //setcookie("cookie01", "Cookie da Loja da Julia");
    //apertar f12 no site para poder ver. O cookie é mais leve, mais rápido, menos seguro e mais rápido de trabalhar.
    // session é mais seguro (criptografa as infos), é um pouco mais lento que o cookie de trabalhar, também um pouco mais complexo e tem tamanho maior que o cookie

    /*if(!$login) // A ! antes da variável é para negar o valor, se for true nega e vira false e se enquadra no caso abaixo
    {
        header("location: errorpage.php?notify=acesso-negado");
        exit;
    }*/
    