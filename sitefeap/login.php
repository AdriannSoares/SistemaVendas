<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formato de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="w-100 m-auto" style="max-width: 380px;">
        <form method="POST" action="valida.php" class="p-4 border rounded-4 shadow bg-body">
            
            <!-- Logo -->
            <div class="text-center mb-4">
                <img src="imagens/Home.png" alt="Logo" height="57" width="72" class="mb-2"/>
                <h1 class="h4 fw-bold">Faça seu login</h1>
            </div>

            <!-- Usuário -->
            <div class="form-floating mb-3">
                <input type="text" name="usuario" class="form-control" id="usuarioInput" placeholder="Digite seu usuário" required autofocus>
                <label for="usuarioInput">Usuário</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu usuário" required autofocus>
                <label for="email">Email</label>
            </div>

            <!-- Senha -->
            <div class="form-floating mb-3">
                <input type="password" name="senha" class="form-control" id="senhaInput" placeholder="Digite sua senha" required>
                <label for="senhaInput">Senha</label>
            </div>

            <!-- Mostrar senha -->
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="mostrarSenha">
                <label class="form-check-label" for="mostrarSenha">Mostrar senha</label>
            </div>

            <!-- Erro de login -->
            <?php if (isset($_GET['status']) && $_GET['status'] == 'erro') { ?>
                <div class="alert alert-danger text-center py-2" role="alert">
                    Usuário ou senha inválidos
                </div>
            <?php } ?>

            <!-- Relembre-me -->
            <div class="form-check text-start mb-3">
                <input type="checkbox" class="form-check-input" id="lembrar">
                <label class="form-check-label" for="lembrar">Relembre-me</label>
            </div>

            <!-- Botão -->
            <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>

            <!-- Link para cadastro -->
            <div class="text-center mt-3">
                <p class="mb-0">Não tem conta? 
                    <a href="cadastro.php" class="text-decoration-none fw-bold">Cadastre-se</a>
                </p>
            </div>

            <!-- Rodapé -->
            <p class="text-body-secondary text-center mt-4 mb-0">© 2017-2025</p>
        </form>
    </main>

    <script>
        // Mostrar/ocultar senha
        document.getElementById("mostrarSenha").addEventListener("change", function() {
            let senha = document.getElementById("senhaInput");
            senha.type = this.checked ? "text" : "password";
        });
    </script>
</body>
</html>
