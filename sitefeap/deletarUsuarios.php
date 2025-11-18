<?php
// inicia a sessão (caso precise verificar login)
session_start();

// inclui o arquivo de conexão
include('db.php');
$db = new BancoDeDados();
$conn = $db->conectar();

// verifica se foi enviado um ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // prepara e executa o DELETE
    $sql = "DELETE FROM usuarios WHERE idusuario = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // exclusão bem-sucedida
        header("Location: listarUsuarios.php?status=excluido");
        exit();
    } else {
        // erro na exclusão
        header("Location: listarUsuarios.php?status=erro");
        exit();
    }
} else {
    // se não recebeu ID, volta para a lista
    header("Location: listarUsuarios.php?status=sem_id");
    exit();
}
?>
