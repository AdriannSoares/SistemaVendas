<?php 
session_start();
include("db.php"); 

$db = new BancoDeDados(); 
$conn = $db->conectar(); 

$usuario = $_POST['usuario'];
$senha   = $_POST['senha'];

$resultado = $db->validarUsuario($usuario, $senha);

if ($resultado) {
    // aqui você já pode salvar o nome ou usuário na sessão
    $_SESSION['usuario'] = $usuario; 
    $_SESSION['email'] = $email;
    header("Location: home.php");
    exit();
} else {
    $_SESSION['usuario'] = $usuario; 
    header("Location: login.php?status=erro");
    exit();
}
?> 
