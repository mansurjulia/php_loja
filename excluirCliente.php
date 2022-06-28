<?php

    require_once('./repository/ClienteRepository.php');

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

 
    if(fnDeleteCliente($id)) {
        $msg = "Sucesso ao apagar o cliente.";
    } else {
        $msg = "Falha ao apagar o cliente.";
    }


        $page = "listagem_de_clientes.php";
    setcookie('notify', $msg, (time() + 10), "/aula06/loja/{$page}", 'localhost');
        # redirect para a página de formulário
    header("location: {$page}");
        exit;
    