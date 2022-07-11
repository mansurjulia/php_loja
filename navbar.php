
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Loja</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cliente
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="formulario-cadastro-cliente.php">Cadastro</a></li>
            <li><a class="dropdown-item" href="listagem_de_clientes.php">Listagem</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Busca</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"><?= $_SESSION['login']->email ?></a>
        </li>
      </ul>
      <form id="formSearchName" class="d-flex" role="search" method="post" action="localizaCliente.php">
        
        <input id="searchName" class="form-control me-2" name="nomeCliente" type="search" placeholder="Informe o nome" aria-label="Search"> 
        <a class="btn btn-outline-danger" href="logout.php">Logout</a>
        
      </form>
    </div>
  </div>
</nav> 
