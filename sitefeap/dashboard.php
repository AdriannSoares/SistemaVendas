<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
          <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="perfil.php">Perfil</a></li>
          <li class="nav-item"><a class="nav-link" href="configuracoes.php">Configurações</a></li>
          <li class="nav-item"><a class="nav-link text-danger fw-bold" href="logout.php">Sair</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo -->
  <main class="container my-5">

    <h1 class="fw-bold mb-4 text-center">📊 Dashboard</h1>

    <!-- Cards -->
    <div class="row g-4 mb-5">
      <div class="col-md-3">
        <div class="card text-center shadow rounded-4 border-0">
          <div class="card-body">
            <h6 class="text-secondary">Usuários</h6>
            <h3 class="fw-bold">1.250</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-center shadow rounded-4 border-0">
          <div class="card-body">
            <h6 class="text-secondary">Produtos</h6>
            <h3 class="fw-bold">320</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-center shadow rounded-4 border-0">
          <div class="card-body">
            <h6 class="text-secondary">Vendas</h6>
            <h3 class="fw-bold">875</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-center shadow rounded-4 border-0">
          <div class="card-body">
            <h6 class="text-secondary">Lucro</h6>
            <h3 class="fw-bold">R$ 45K</h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Gráfico -->
    <div class="card shadow rounded-4 border-0 mb-5">
      <div class="card-body">
        <h5 class="fw-bold mb-3">Vendas Mensais</h5>
        <canvas id="graficoVendas" height="100"></canvas>
      </div>
    </div>

    <!-- Tabela -->
    <div class="card shadow rounded-4 border-0">
      <div class="card-body">
        <h5 class="fw-bold mb-3">Últimas Transações</h5>
        <div class="table-responsive">
          <table class="table table-dark table-hover align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Produto</th>
                <th>Valor</th>
                <th>Data</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Adriann</td>
                <td>Notebook</td>
                <td>R$ 3.500</td>
                <td>18/09/2025</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Kenzo</td>
                <td>Headset</td>
                <td>R$ 350</td>
                <td>17/09/2025</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Jorge</td>
                <td>Mouse Gamer</td>
                <td>R$ 220</td>
                <td>16/09/2025</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </main>

  <!-- Rodapé -->
  <footer class="bg-dark text-center text-secondary py-3 mt-5">
    <p class="mb-0">© 2017-2025 - Minha Aplicação</p>
  </footer>

  <!-- Script Gráfico -->
  <script>
    const ctx = document.getElementById('graficoVendas');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul'],
        datasets: [{
          label: 'Vendas',
          data: [120, 190, 300, 250, 420, 380, 460],
          borderColor: 'rgb(75, 192, 192)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          fill: true,
          tension: 0.3
        }]
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
