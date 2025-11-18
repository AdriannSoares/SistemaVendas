<?php
include("db.php"); 
$db = new BancoDeDados(); 
$conn = $db->conectar(); 
$tabela = "usuarios";

$dados = [
    "login" => $_POST['login'],
    "senha" => $_POST['senha'],
    "email" => $_POST['email']
];

if ($db->inserirRegistro($tabela, $dados)) {
    header("Location: login.php?status=cadastrado");
    exit;
} else {
    header("Location: login.php?status=erro");
    exit;
}
?>
