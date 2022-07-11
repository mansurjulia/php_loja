<?php

    require_once('Connection.php');

    #CRUD
    function fnAddCliente($foto, $nome, $email, $cpf, $contato) {

        $con = getConnection();

        #SQL injection
        $sql = "insert into cliente (foto, nome, email, cpf, contato) values (:pFoto, :pNome, :pEmail, :pCpf, :pContato)";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pFoto", $foto);
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

    function fnLocalizaClientePorNome($nome) {
        $con = getConnection();

        $sql = "select * from cliente where nome like :pNome"; //Se quiser colocar limite na quantidade de resposta escrever "select * from cliente where nome like :pNome limit 20" ou qualquer outro número que você queira para o limite.

        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pNome", "%{$nome}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }     
    }
    function fnLocalizaClientePorId($id) {
        $con = getConnection();

        $sql = "select * from cliente where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);

        if($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    function fnUpdateCliente($id, $foto, $nome, $email, $cpf, $contato) {

        $con = getConnection();

        #SQL injection
        $sql = "update cliente set foto = :pFoto, nome = :pNome, email = :pEmail, cpf = :pCpf, contato = :pContato where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pFoto", $foto);
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

        //Stmt->debugDumpParams(); #faz um dump da query
    }
