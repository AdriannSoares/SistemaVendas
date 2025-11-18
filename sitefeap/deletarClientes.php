<?php
include('db.php');
$db = new BancoDeDados();
$conn = $db->conectar();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM clientes WHERE idcliente = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: listarClientes.php?status=excluido");
        exit();
    } else {
        header("Location: listarClientes.php?status=erro");
        exit();
    }
} else {
    header("Location: listarClientes.php?status=sem_id");
    exit();
}
?>
