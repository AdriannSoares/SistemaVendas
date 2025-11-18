<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Estoque</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Cabeçalho -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <!-- Nome da loja como link para home -->
      <a class="navbar-brand fw-bold" href="home.php">Controle de Estoque</a>
      <div>
        <button class="btn btn-outline-light me-2" onclick="window.location.href='home.php'">Home</button>
        <button class="btn btn-outline-light me-2" onclick="window.location.href='produtos.php'">Novo Produto</button>
      </div>
    </div>
  </nav>

  <!-- Conteúdo -->
  <div class="container my-4">
    <h2 class="mb-4 text-center">Estoque Atual</h2>

    <div class="table-responsive">
      <table class="table table-dark table-striped align-middle text-center">
        <thead>
          <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Categoria</th>
            <th>Quantidade</th>
            <th>Preço (R$)</th>
            <th>Descrição</th>
            <th>Foto</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("db.php");
          $db = new BancoDeDados();
          $conn = $db->conectar();
          $tabela = "produtos"; // cuidado: nome da tabela deve ser o mesmo usado no banco!
          $registros = $db->listarRegistros($tabela);

          if (!empty($registros)) {
              foreach ($registros as $registro) {
                  echo "<tr>";
                  echo "<td>" . $registro['idProduto'] . "</td>";
                  echo "<td>" . $registro['nome'] . "</td>";
                  echo "<td>" . $registro['categoria'] . "</td>";
                  echo "<td>" . $registro['quantidade'] . "</td>";
                  echo "<td>R$ " . number_format($registro['preco'], 2, ',', '.') . "</td>";
                  echo "<td>" . $registro['descricao'] . "</td>";
                  echo "<td>";
                  if (!empty($registro['foto'])) {
                      echo "<img src='" . $registro['foto'] . "' width='60' class='rounded'>";
                  } else {
                      echo "<span class='text-muted'>Sem foto</span>";
                  }
                  echo "</td>";
                  echo "<td>
                          <button class='btn btn-sm btn-warning'>Editar</button>
                          <button class='btn btn-sm btn-danger'>Excluir</button>
                        </td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='8'>Nenhum produto encontrado</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
