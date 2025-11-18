<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
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
          <li class="nav-item"><a class="nav-link" href="perfil.php">Perfil</a></li>
          <li class="nav-item"><a class="nav-link active" href="configuracoes.php">Configurações</a></li>
          <li class="nav-item"><a class="nav-link text-danger fw-bold" href="logout.php">Sair</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo -->
  <main class="container my-5" style="max-width: 700px;">
    <h1 class="fw-bold text-center mb-4">⚙️ Configurações</h1>

    <!-- Card Geral -->
    <div class="card border-0 shadow rounded-4 p-4 mb-4">
      <h5 class="fw-bold mb-3">Preferências do Sistema</h5>

      <!-- Tema -->
      <div class="form-check form-switch mb-3">
        <input class="form-check-input" type="checkbox" id="modoEscuro" checked>
        <label class="form-check-label" for="modoEscuro">Ativar modo escuro</label>
      </div>

      <!-- Notificações -->
      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="notificacoes" checked>
        <label class="form-check-label" for="notificacoes">Receber notificações por e-mail</label>
      </div>

      <!-- Idioma -->
      <div class="mb-3">
        <label for="idioma" class="form-label">Idioma</label>
        <select id="idioma" class="form-select">
          <option selected>Português (Brasil)</option>
          <option>Inglês (EN)</option>
          <option>Espanhol (ES)</option>
        </select>
      </div>
    </div>

    <!-- Card Segurança -->
    <div class="card border-0 shadow rounded-4 p-4 mb-4">
      <h5 class="fw-bold mb-3">Segurança</h5>
      <p class="text-secondary">Mantenha sua conta segura.</p>
      <a href="alterarSenha.php" class="btn btn-warning">Alterar Senha</a>
    </div>

    <!-- Botão Salvar -->
    <div class="text-center">
      <button class="btn btn-primary px-5 py-2">Salvar Alterações</button>
    </div>
  </main>

  <!-- Rodapé -->
  <footer class="bg-dark text-center text-secondary py-3 mt-5">
    <p class="mb-0">© 2017-2023 - Minha Aplicação</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
