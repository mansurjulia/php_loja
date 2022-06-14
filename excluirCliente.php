<?php

    require_once('./repository/ClienteRepository.php');

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $msg = "";
    if(fnDeleteCliente($id)) {
        $msg = "Sucesso ao apagar o cliente.";
    } else {
        $msg = "Falha ao apagar o cliente.";
    }

        # redirect para a página de formulário
        header("location: listagem_de_clientes.php?notify={$msg}");
        exit;