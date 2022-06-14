<?php

    require_once('repository/LoginRepository.php');

    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

    $msg = "";
    if(fnLogin($email, $senha)) {
        echo "Sucesso ao logar.";
    } else {
        echo "Falha ao logar.";
    }

        # redirect para a página de formulário
        //header("location: formulario-edita-cliente.php?notify={$msg}&id=$id");
        //exit;