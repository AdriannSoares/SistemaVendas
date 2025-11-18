<?php
session_start();
require_once 'db.php';

// cria conexão usando sua classe
$banco = new BancoDeDados();
$conexao = $banco->conectar();

// verifica se o ID foi passado
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: listarUsuarios.php?erro=id_invalido');
    exit();
}

$id = (int) $_GET['id'];

try {
    // busca o usuário pelo ID
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE idusuario = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        header('Location: listarUsuarios.php?erro=usuario_nao_encontrado');
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao buscar usuário: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Editar Usuário</h1>

    <form action="atualizarUsuario.php" method="POST" class="p-3 border rounded shadow-sm">
        <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['idusuario']) ?>">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($usuario['login']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($usuario['email']) ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="listarUsuarios.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
