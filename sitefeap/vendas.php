<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Vendas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Cabeçalho -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="home.php">Minha Loja</a>
      <button class="btn btn-outline-light" data-bs-toggle="offcanvas" data-bs-target="#carrinho">
        Carrinho 🛒
      </button>
    </div>
  </nav>

  <!-- Conteúdo principal -->
  <div class="container my-4">
    <h2 class="text-center mb-4">Produtos em Destaque</h2>
    <div class="row g-4">
      <!-- Produto 1 -->
      <div class="col-md-4">
        <div class="card h-100 text-center">
          <img src="https://via.placeholder.com/250" class="card-img-top" alt="Produto 1">
          <div class="card-body">
            <h5 class="card-title">Produto 1</h5>
            <p class="card-text">Descrição curta do produto.</p>
            <p class="fw-bold">R$ 59,90</p>
            <button class="btn btn-success">Adicionar</button>
          </div>
        </div>
      </div>
      <!-- Produto 2 -->
      <div class="col-md-4">
        <div class="card h-100 text-center">
          <img src="https://via.placeholder.com/250" class="card-img-top" alt="Produto 2">
          <div class="card-body">
            <h5 class="card-title">Produto 2</h5>
            <p class="card-text">Descrição curta do produto.</p>
            <p class="fw-bold">R$ 89,90</p>
            <button class="btn btn-success">Adicionar</button>
          </div>
        </div>
      </div>
      <!-- Produto 3 -->
      <div class="col-md-4">
        <div class="card h-100 text-center">
          <img src="https://via.placeholder.com/250" class="card-img-top" alt="Produto 3">
          <div class="card-body">
            <h5 class="card-title">Produto 3</h5>
            <p class="card-text">Descrição curta do produto.</p>
            <p class="fw-bold">R$ 120,00</p>
            <button class="btn btn-success">Adicionar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Carrinho lateral -->
  <div class="offcanvas offcanvas-end bg-dark text-light" tabindex="-1" id="carrinho">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Carrinho de Compras</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item bg-dark text-light">Produto 1 - R$ 59,90</li>
        <li class="list-group-item bg-dark text-light">Produto 2 - R$ 89,90</li>
      </ul>
      <h5>Total: R$ 149,80</h5>
      <button class="btn btn-success w-100 mt-3">Finalizar Compra</button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
