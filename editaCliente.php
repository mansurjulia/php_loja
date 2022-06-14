<?php

    require_once('./repository/ClienteRepository.php');

    $id = filter_input(INPUT_POST, 'idCliente', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_NUMBER_INT);

    $msg = "";
    if(fnUpdateCliente($id, $nome, $email, $cpf, $contato)) {
        $msg = "Sucesso ao cadastrar o cliente.";
    } else {
        $msg = "Falha ao cadastrar o cliente.";
    }

        # redirect para a página de formulário
        header("location: formulario-edita-cliente.php?notify={$msg}&id=$id");
        exit;