<?php
include("db.php");
$db = new BancoDeDados();
$conn = $db->conectar();

// Inicializa a variável para evitar warning
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['data_nascimento'];
    $celular = $_POST['telefone'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

     

    $sql = "INSERT INTO clientes 
        (nome, cpf, dataNascimento, celular, logradouro, numero, complemento, bairro, cep, cidade, uf)
        VALUES 
        (:nome, :cpf, :dataNascimento, :celular, :logradouro, :numero, :complemento, :bairro, :cep, :cidade, :uf)";
    
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':dataNascimento' => $dataNascimento,
            ':celular' => $celular,
            ':logradouro' => $logradouro,
            ':numero' => $numero,
            ':complemento' => $complemento,
            ':bairro' => $bairro,
            ':cep' => $cep,
            ':cidade' => $cidade,
            ':uf' => $uf
        ]);
        $mensagem = "✅ Cliente cadastrado com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "❌ Erro: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        // Função para consultar o CEP no ViaCEP
        async function consultarCEP() {
            const cep = document.getElementById('cep').value.replace(/\D/g, '');
            if (cep.length !== 8) {
                return;
            }

            try {
                const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                const data = await response.json();

                if (data.erro) {
                    alert("CEP não encontrado!");
                    return;
                }

                document.getElementById('logradouro').value = data.logradouro || '';
                document.getElementById('bairro').value = data.bairro || '';
                document.getElementById('cidade').value = data.localidade || '';
                document.getElementById('uf').value = data.uf || '';
            } catch (error) {
                console.error("Erro ao consultar o CEP:", error);
            }
        }
    </script>
</head>
<body class="bg-dark text-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">Cadastro de Clientes</h2>

    <?php if ($mensagem): ?>
        <div class="alert alert-info"><?= $mensagem ?></div>
    <?php endif; ?>

    <form method="POST" action="">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control form-control-sm" required>
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control form-control-sm" required>
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control form-control-sm">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Celular</label>
            <input type="text" name="telefone" class="form-control form-control-sm">
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control form-control-sm" onblur="consultarCEP()">
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">UF</label>
            <input type="text" name="uf" id="uf" class="form-control form-control-sm" maxlength="2">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Logradouro</label>
            <input type="text" name="logradouro" id="logradouro" class="form-control form-control-sm">
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-label">Número</label>
            <input type="text" name="numero" class="form-control form-control-sm" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Complemento</label>
            <input type="text" name="complemento" class="form-control form-control-sm">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Bairro</label>
            <input type="text" name="bairro" id="bairro" class="form-control form-control-sm">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control form-control-sm">
        </div>
    </div>

    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
    <a href="home.php" class="btn btn-primary w-100 mt-3">Ir para Home</a>
</form>

</div>
</body>
</html>
