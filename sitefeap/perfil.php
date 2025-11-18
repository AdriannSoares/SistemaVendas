<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?status=nao_logado");
    exit();
}

$usuarioLogado = $_SESSION['usuario'];
$emailLogado = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meu Perfil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="home.php">
        <img src="imagens/Home.png" alt="Logo" width="35" height="35" class="me-2">
        Home
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="home.php">Início</a></li>
          <li class="nav-item"><a class="nav-link active" href="perfil.php">Perfil</a></li>
          <li class="nav-item"><a class="nav-link" href="configuracoes.php">Configurações</a></li>
          <li class="nav-item"><a class="nav-link text-danger fw-bold" href="logout.php">Sair</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo -->
  <main class="container my-5" style="max-width: 800px;">
    <h1 class="fw-bold text-center mb-4">👤 Meu Perfil</h1>

    <div class="row g-4">
      <!-- Card com informações -->
      <div class="col-md-6">
        <div class="card border-0 shadow rounded-4 p-4 h-100">
          <h5 class="fw-bold mb-3">Informações Pessoais</h5>
          <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuarioLogado); ?></p>
          <p><strong>E-mail:</strong> <?php echo htmlspecialchars($emailLogado); ?></p>
          <p><strong>Data de cadastro:</strong> <?php echo date("d/m/Y"); ?></p>
        </div>
      </div>

      <!-- Card com avatar e botão editar -->
      <div class="col-md-6">
        <div class="card border-0 shadow rounded-4 p-4 text-center h-100">
          <img src="imagens/avatar.png" alt="Avatar" class="rounded-circle mb-3" width="120" height="120">
          <h5 class="fw-bold"><?php echo htmlspecialchars($usuarioLogado); ?></h5>
          <p class="text-secondary">Membro desde <?php echo date("Y"); ?></p>
          <a href="editarPerfil.php" class="btn btn-primary mt-3">Editar Perfil</a>
        </div>
      </div>
    </div>

  <!-- Rodapé -->
  <footer class="bg-dark text-center text-secondary py-3 mt-5">
    <p class="mb-0">© 2017-<?php echo date("Y"); ?> - Minha Aplicação</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
