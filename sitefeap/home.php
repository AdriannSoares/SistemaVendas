<?php
session_start();

// se não existir usuário na sessão, redireciona para o login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?status=nao_logado");
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Inicial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">
        <img src="imagens/Home.png" alt="Logo" width="35" height="35" class="me-2">
        SmartShop
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="home.php">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="perfil.php">Perfil</a></li>
          <li class="nav-item"><a class="nav-link" href="configuracoes.php">Configurações</a></li>
          <li class="nav-item"><a class="nav-link text-danger fw-bold" href="logout.php">Sair</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo -->
  <main class="container my-5">
    <div class="text-center mb-5">
      <h1 class="fw-bold">Bem-vindo(a), <?php echo htmlspecialchars($usuario); ?>!</h1>
      <p class="text-secondary">Aqui está sua página inicial.</p>
    </div>

    <!-- Cards -->
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4">

      <!-- Dashboard -->
      <div class="col">
        <div class="card border-0 shadow rounded-4 h-100 text-center">
          <div class="card-body">
            <h5 class="card-title fw-bold">📊 Dashboard</h5>
            <p class="card-text text-secondary">Veja estatísticas e relatórios do sistema.</p>
            <a href="dashboard.php" class="btn btn-primary w-100">Acessar</a>
          </div>
        </div>
      </div>

      <!-- Vendas -->
      <div class="col">
        <div class="card border-0 shadow rounded-4 h-100 text-center">
          <div class="card-body">
            <h5 class="card-title fw-bold">💰 Vendas</h5>
            <p class="card-text text-secondary">Faça as suas vendas e fature para a sua empresa.</p>
            <a href="vendas.php" class="btn btn-primary w-100">Acessar</a>
          </div>
        </div>
      </div>

      <!-- Produtos -->
      <div class="col">
        <div class="card border-0 shadow rounded-4 h-100 text-center">
          <div class="card-body">
            <h5 class="card-title fw-bold">📦 Produtos</h5>
            <p class="card-text text-secondary">Veja e gerencie os produtos cadastrados.</p>
            <a href="produtos.php" class="btn btn-primary w-100">Acessar</a>
          </div>
        </div>
      </div>

      <!-- Estoque -->
      <div class="col">
        <div class="card border-0 shadow rounded-4 h-100 text-center">
          <div class="card-body">
            <h5 class="card-title fw-bold">📊 Estoque</h5>
            <p class="card-text text-secondary">Gerencie seu estoque e veja os produtos disponíveis.</p>
            <a href="estoque.php" class="btn btn-primary w-100">Acessar</a>
          </div>
        </div>
      </div>

      <!-- Listar Clientes -->
<div class="col">
  <div class="card border-0 shadow rounded-4 h-100 text-center">
    <div class="card-body">
      <h5 class="card-title fw-bold">📋 Listar Clientes</h5>
      <p class="card-text text-secondary">Visualize e gerencie os clientes cadastrados.</p>
      <a href="listarClientes.php" class="btn btn-primary w-100">Listar Clientes</a>
    </div>
  </div>
</div>


      <!-- NOVO CARD: Listar Usuários -->
      <div class="col">
        <div class="card border-0 shadow rounded-4 h-100 text-center">
          <div class="card-body">
            <h5 class="card-title fw-bold">👥 Usuários</h5>
            <p class="card-text text-secondary">Visualize e gerencie os usuários do sistema.</p>
            <a href="listarUsuarios.php" class="btn btn-primary w-100">Listar Usuários</a>
          </div>
        </div>
      </div>

    </div>
  </main>

  <!-- Rodapé -->
  <footer class="bg-dark text-center text-secondary py-3 mt-5">
    <p class="mb-0">© 2017-2025 - Minha Aplicação</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
