<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<div class="container py-5">
    <h2 class="text-center mb-4">Cadastro de Produtos</h2>

    <!-- Formulário de Cadastro -->
    <div class="card shadow-lg mb-5">
        <div class="card-body">
            <!-- enctype obrigatório para enviar imagens -->
            <form action="cadastrarProdutos.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="col-md-3">
                        <label for="preco" class="form-label">Preço (R$)</label>
                        <input type="number" class="form-control" id="preco" name="preco" step="0.01" required>
                    </div>
                    <div class="col-md-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-select" id="categoria" name="categoria" required>
                        <option value="" selected disabled>Selecione...</option>
                        <option value="Eletrônicos">Eletrônicos</option>
                        <option value="Roupas">Roupas</option>
                        <option value="Papelaria">Papelaria</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" required>
                </div>

                <!-- Upload da foto -->
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto do Produto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                </div>

                <div class="text-end">
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Lista de Produtos -->
    <?php
    include("db.php");
    $db = new BancoDeDados();
    $conn = $db->conectar();
    $tabela = "Produtos";
    $registros = $db->listarRegistros($tabela);
    ?>

    <div class="mb-4">
        <a href="home.php" class="btn btn-primary">← Voltar à Home</a>
        <a href="estoque.php" class="btn btn-primary ms-2">← Gerencie seu estoque</a>
    </div>

    <h3 class="mb-3">Lista de Produtos</h3>
    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover align-middle text-center">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço (R$)</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro) { ?>
                    <tr>
                        <td><?= $registro['idProduto'] ?></td>
                        <td><?= $registro['nome'] ?></td>
                        <td><?= number_format($registro['preco'], 2, ',', '.') ?></td>
                        <td><?= $registro['quantidade'] ?></td>
                        <td><?= $registro['categoria'] ?></td>
                        <td><?= $registro['descricao'] ?></td>
                        <td>
                            <?php if (!empty($registro['foto'])): ?>
                                <img src="<?= $registro['foto'] ?>" alt="Foto do produto" width="80">
                            <?php else: ?>
                                Sem foto
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
