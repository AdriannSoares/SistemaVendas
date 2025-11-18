<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="w-100 m-auto form-container" style="max-width: 400px;">
        <form method="POST" action="cadastrarUsuario.php" class="p-4 border rounded-4 shadow bg-body">
            
            <div class="text-center mb-4">
                <img src="imagens/Home.png" alt="Logo" class="m-2" height="57" width="72"/>
                <h1 class="h4 fw-bold">Faça o seu cadastro</h1>
            </div>
            
            <!-- Login -->
            <div class="form-floating mb-3">
                <input type="text" name="login" class="form-control" id="loginInput" placeholder="Digite seu login" required autofocus>
                <label for="loginInput">Login</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu login" required autofocus>
                <label for="email">Email</label>
            </div>


            <!-- Senha -->
            <div class="form-floating mb-3">
                <input type="password" name="senha" class="form-control" id="senhaInput" placeholder="Digite sua senha" required>
                <label for="senhaInput">Senha</label>
            </div>

            <!-- Confirmar Senha -->
            <div class="form-floating mb-3">
                <input type="password" name="confirma_senha" class="form-control" id="confirmaInput" placeholder="Confirme sua senha" required>
                <label for="confirmaInput">Confirmar Senha</label>
            </div>

            <!-- Mostrar senha -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="mostrarSenha">
                <label class="form-check-label" for="mostrarSenha">Mostrar senha</label>
            </div>

            <!-- Botão cadastrar -->
            <button class="btn btn-primary w-100 py-2 mb-2" type="submit">Cadastrar</button>

          
            <!-- Botão Login estilo link -->
            <div class="text-center mt-3">
            <a href="login.php" class="btn btn-link text-decoration-none small">
                <i class="bi bi-box-arrow-in-right me-1"></i> Já tenho uma conta
            </a>
            </div>


            <p class="text-body-secondary text-center mt-4">© 2017-2025</p>
        </form>
    </main>

    <script>
        // Mostrar/ocultar senha
        document.getElementById("mostrarSenha").addEventListener("change", function() {
            let senha = document.getElementById("senhaInput");
            let confirma = document.getElementById("confirmaInput");
            if (this.checked) {
                senha.type = "text";
                confirma.type = "text";
            } else {
                senha.type = "password";
                confirma.type = "password";
            }
        });
    </script>
</body>
</html>
