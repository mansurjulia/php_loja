<?php 

    include('config.php');  
    var_dump($_SESSION['login']);

    require_once('repository/ClienteRepository.php');
    $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

?>

<!doctype html>

<html lang="pt_BR">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>

  <body>
    <?php include('navbar.php'); ?>

    <div class="col-6 offset-3">

        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Contato</th>
                    <th>Data de criação</th>
                    <th colspan="2">Gerenciar</th>

                </tr>
            </thead>

            <tbody>
                <?php foreach(fnLocalizaClientePorNome($nome) as $cliente): ?> 

                    <tr>
                        <td><?= $cliente->id ?></td>
                        <td><?= $cliente->nome ?></td>
                        <td><?= $cliente->email ?></td>
                        <td><?= $cliente->cpf ?></td>
                        <td><?= $cliente->contato ?></td>
                        <td><?= $cliente->created_at ?></td>
                        <td><a href="formulario-edita-cliente.php?id=<?= $cliente->id ?>">Editar</a></td>
                        <td><a onclick="return confirm('Deseja realmente excluir?');" href="excluirCliente.php?id=<?= $cliente->id ?>">Excluir</a></td>

                    </tr>

                <?php endforeach; ?> 

            </tbody>
    
            <?php if(isset($notificacao)) : ?>

            <tfoot>
                <tr>
                    <td colspan="7"><?= $_COOKIE['notify'] ?></td>
                </tr>
            </tfoot>

            <?php endif; ?>

        </table>
         
        

    </div>

    <?php include("rodape.php"); ?>
  </body>

</html>