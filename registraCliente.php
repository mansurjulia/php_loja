<?php

    require_once('./repository/ClienteRepository.php');

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_NUMBER_INT);

    
    if(fnAddCliente($nome, $email, $cpf, $contato)) {
        $msg = "Sucesso ao cadastrar o cliente.";
    } else {
        $msg = "Falha ao cadastrar o cliente.";
    }


    $page = "formulario-cadastro-cliente.php";

    setcookie('notify', $msg, (time() + 10), "/aula06/loja/{$page}", 'localhost');

        # redirect para a página de formulário
        header("location: {$page}");
        exit;