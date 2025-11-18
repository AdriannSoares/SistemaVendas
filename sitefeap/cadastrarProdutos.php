<?php
include("db.php");
$db = new BancoDeDados();
$conn = $db->conectar();

// Pasta onde as fotos vão ser salvas
$diretorio = "uploads/";
if (!is_dir($diretorio)) {
    mkdir($diretorio, 0777, true);
}

// Verifica se veio a foto
$fotoPath = "";
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $nomeFoto = uniqid() . "-" . basename($_FILES["foto"]["name"]);
    $caminho = $diretorio . $nomeFoto;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $caminho)) {
        $fotoPath = $caminho;
    }
}

// Dados
$dados = [
    "nome" => $_POST['nome'],
    "preco" => $_POST['preco'],
    "quantidade" => $_POST['quantidade'],
    "categoria" => $_POST['categoria'],
    "descricao" => $_POST['descricao'],
    "foto" => $fotoPath
];

// Inserir no banco
$db->inserirRegistro("Produtos", $dados);

// Redireciona de volta
header("Location: produtos.php");
exit;
?>
