<?php
session_start();
include('db.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?status=nao_logado");
    exit();
}

$db = new BancoDeDados();
$conn = $db->conectar();

// Busca os registros da tabela "clientes"
$tabela = "clientes";
$registros = $db->listarRegistros($tabela);
?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4 text-center">📋 Lista de Clientes</h1>

    <!-- Mensagens de status -->
    <?php if (isset($_GET['status']) && $_GET['status'] == 'excluido'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ✅ Cliente excluído com sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'erro'): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            ❌ Erro ao excluir cliente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    <?php endif; ?>

    <!-- Botões de ação -->
<div class="mb-3 d-flex justify-content-between">
    <a href="home.php" class="btn btn-secondary">
        🏠 Voltar à Home
    </a>
    <a href="clientes.php" class="btn btn-success">
        ➕ Cadastrar Cliente
    </a>
</div>


    <!-- Tabela de clientes -->
    <table class="table table-dark table-striped table-bordered align-middle text-center">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($registros) > 0): ?>
                <?php foreach ($registros as $cliente): ?>
                    <tr>
                        <td><?= htmlspecialchars($cliente['idCliente']) ?></td>
                        <td><?= htmlspecialchars($cliente['nome']) ?></td>
                        <td><?= htmlspecialchars($cliente['cpf']) ?></td>
                        <td><?= htmlspecialchars($cliente['celular']) ?></td>
                        <td>
                            <a href="editarCliente.php?id=<?= urlencode($cliente['idCliente']) ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="deletarClientes.php?id=<?= urlencode($cliente['idCliente']) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Deseja realmente excluir este cliente?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">Nenhum cliente cadastrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
