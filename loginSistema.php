<?php

    session_start();

    require_once('repository/LoginRepository.php');

    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

    $page = "listagem_de_clientes.php";
    
    if(!$_SESSION['login'] = fnLogin($email, $senha)) {
        $page = "errorPage.php";
    
        $expire = (time() + 10); //esse número 15 representa os segundos que eu quero que dure os dias, ele vai colocar o tempo atual + a quantidade de segundos que você quiser adicionar. Posso substituir a var que está dentro do cookie pelo seu valor, ao invés de $expire posso colocar apenas (time() + 20)

        setcookie('notify', 'Falha ao efetuar o login, tente novamente.', $expire, '/aula06/loja/errorPage.php', 'localhost', isset($_SERVER['HTTPS']), true);
    }

    header("location: {$page}");
    exit;


        
        
    /* OUTRA OPÇÃO
    if(fnLogin($email, $senha)) {
        header('location: listagem-de-clientes.php');
        exit;
    } else {
        header('location: errorPage.php?notify=acesso-negado');
        exit;     
    }


        # redirect para a página de formulário
        //header("location: formulario-edita-cliente.php?notify={$msg}&id=$id");
        //exit;
        */
        