<?php
session_start();
require_once 'db.php';

// Verifica se os campos foram enviados
if (!isset($_POST['id'], $_POST['nome'], $_POST['email'])) {
    header('Location: listarUsuarios.php?erro=campos_invalidos');
    exit();
}

$id = (int) $_POST['id'];
$nome = trim($_POST['nome']);
$email = trim($_POST['email']);

// Cria conexão com o banco
$banco = new BancoDeDados();
$conexao = $banco->conectar();

try {
    // Atualiza o registro
    $sql = "UPDATE usuarios SET login = :nome, email = :email WHERE idusuario = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location: listarUsuarios.php?status=sucesso');
        exit();
    } else {
        header('Location: listarUsuarios.php?status=erro');
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao atualizar: " . $e->getMessage();
    exit();
}
?>
