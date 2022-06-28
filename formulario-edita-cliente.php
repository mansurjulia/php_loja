<?php 

    include('config.php');   

    require_once('repository/ClienteRepository.php');
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $cliente = fnLocalizaClientePorId($id);
    
?>

<!doctype html>

<html lang="pt_BR">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário para Edição de cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>

  <body>
  <?php include('navbar.php'); ?>

    <div class="col-6 offset-3">

        <fieldset>

            <legend>Edição de Clientes</legend>
            <form action="editaCliente.php" method="post" class="form">

                <div>

                    <input type="hidden" name="idCliente" id="clienteId"  required value="<?= $cliente->id ?>">

                </div>

                <div class="mb-3 form-group">

                    <label for="nomeId" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome" required value="<?= $cliente->nome ?>">
                    <div id="helperNome" class="form-text">Informe o nome completo</div>

                </div>

                <div class="mb-3 form-group">

                    <label for="emailId" class="form-label">E-mail</label>
                    <input type="email" name="email" id="emailId" class="form-control" placeholder="Informe o e-mail" required value="<?= $cliente->email ?>">
                    <div id="helperEmail" class="form-text">Informe o e-mail</div>

                </div>

                <div class="mb-3 form-group">

                    <label for="cpfId" class="form-label">CPF</label>
                    <input type="text" name="cpf" id="cpfId" class="form-control" placeholder="xxx.xxx.xxx-xx" required value="<?= $cliente->cpf ?>">
                    <div id="helpercpf" class="form-text">Informe o CPF</div>

                </div>

                <div class="mb-3 form-group">

                    <label for="contatoId" class="form-label">Contato</label>
                    <input type="text" name="contato" id="contatoId" class="form-control" placeholder="(xx)xxxxxxxxx" required value="<?= $cliente->contato ?>">
                    <div id="helpercontato" class="form-text">Informe o contato com ddd</div>

                </div> <br>
               
                <button type="submit" class="btn btn-dark">Enviar</button>

                <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>

            </form>

        </fieldset>

    </div>

    <?php include("rodape.php"); ?>
  </body>

</html>