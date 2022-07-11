<?php

    require_once('repository/ClienteRepository.php');
    session_start();

 
    if(fnDeleteCliente($_SESSION['id'])) {
        $msg = "Sucesso ao apagar o cliente.";
    } else {
        $msg = "Falha ao apagar o cliente.";
    }

    # apagar sessão: 
    unset($_SESSION['id']);


        $page = "listagem_de_clientes.php";
    setcookie('notify', $msg, (time() + 10), "aula06/loja/{$page}", 'localhost');
        # redirect para a página de formulário:
    header("location: {$page}");
        exit;
    