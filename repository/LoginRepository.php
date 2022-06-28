<?php

    require_once('Connection.php');

    #CRUD

    function fnAddCliente($nome, $email, $cpf, $contato) {

        $con = getConnection();

        #SQL injection
        $sql = "insert into cliente (nome, email, cpf, contato) values (:pNome, :pEmail, :pCpf, :pContato)";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pNome", $nome);
        $stmt->bindParam(":pEmail", $email);
        $stmt->bindParam(":pCpf", $cpf);
        $stmt->bindParam(":pContato", $contato);

        return $stmt->execute();

    }

    function fnListClientes() {
        $con = getConnection();

        $sql = "select * from cliente";

        $result = $con->query($sql);

        $lstClientes = array();
        while($cliente = $result->fetch(PDO::FETCH_OBJ)) {
            array_push($lstClientes, $cliente);            
        }

        return $lstClientes;

    }

    function fnLocalizaClientePorId($id) {
        $con = getConnection();

        $sql = "select * from cliente where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetch();
        }

        return null;

    }

    function fnUpdateCliente($id, $nome, $email, $cpf, $contato) {

        $con = getConnection();

        #SQL injection
        $sql = "update cliente set nome = :pNome, email = :pEmail, cpf = :pCpf, contato = :pContato where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pNome", $nome);
        $stmt->bindParam(":pEmail", $email);
        $stmt->bindParam(":pCpf", $cpf);
        $stmt->bindParam(":pContato", $contato);

        return $stmt->execute();

    }

    function fnDeleteCliente($id) {

        $con = getConnection();

        #SQL injection
        $sql = "delete from cliente where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        return $stmt->execute();

    }
    function fnLogin($email, $senha) {
        $con = getConnection();

        $sql = "select id, email, created_at as createdAt from login where email = :pEmail and senha = :pSenha";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pEmail", $email);
        $stmt->bindValue(":pSenha", md5($senha));

        if($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        return null;

    }