<?php
include('db.php');
$db = new BancoDeDados();
$conn = $db->conectar();

$tabela = "usuarios";
$registros = $db->listarRegistros($tabela);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <style>
        :root {
            /* === Tema Claro === */
            --bg-color: #f6f6f6;
            --text-color: #222;
            --table-bg: #ffffff;
            --table-border: #ddd;
            --table-header-bg: #007BFF;
            --table-header-text: #fff;
            --hover-bg: #f1f1f1;
            --btn-editar: #1E90FF;
            --btn-editar-hover: #007BFF;
            --btn-excluir: #E53935;
            --btn-excluir-hover: #C62828;
            --btn-novo: #007BFF;
            --btn-novo-hover: #0056b3;
            --btn-home: #6c63ff;
            --btn-home-hover: #5848f4;
        }

        body.dark {
            /* === Tema Escuro === */
            --bg-color: #121212;
            --text-color: #E0E0E0;
            --table-bg: #1E1E1E;
            --table-border: #333;
            --table-header-bg: #2C2C2C;
            --table-header-text: #00BFFF;
            --hover-bg: #2A2A2A;
            --btn-editar: #1E90FF;
            --btn-editar-hover: #007BFF;
            --btn-excluir: #E53935;
            --btn-excluir-hover: #C62828;
            --btn-novo: #00BFA5;
            --btn-novo-hover: #00E0C0;
            --btn-home: #8E2DE2;
            --btn-home-hover: #5F14B8;
        }

        /* === Estilos gerais === */
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 40px;
            transition: background-color 0.3s, color 0.3s;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        /* === Topo com botões === */
        .topo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 85%;
            margin: 0 auto 20px auto;
        }

        .theme-toggle, .home-btn {
            border: none;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            transition: all 0.3s ease;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .theme-toggle {
            background-color: var(--btn-novo);
        }

        .theme-toggle:hover {
            background-color: var(--btn-novo-hover);
            transform: rotate(10deg);
        }

        .home-btn {
            background-color: var(--btn-home);
            text-decoration: none;
        }

        .home-btn:hover {
            background-color: var(--btn-home-hover);
            transform: scale(1.05);
        }

        /* === Tabela === */
        table {
            width: 85%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: var(--table-bg);
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--table-border);
            text-align: left;
        }

        th {
            background-color: var(--table-header-bg);
            color: var(--table-header-text);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:hover {
            background-color: var(--hover-bg);
            transition: background-color 0.2s;
        }

        .acoes {
            text-align: center;
        }

        /* === Botões de ação === */
        .btn {
            text-decoration: none;
            padding: 7px 14px;
            margin: 0 4px;
            border-radius: 6px;
            color: white;
            font-size: 14px;
            display: inline-block;
            transition: background-color 0.2s, transform 0.1s;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .editar {
            background-color: var(--btn-editar);
        }

        .editar:hover {
            background-color: var(--btn-editar-hover);
        }

        .excluir {
            background-color: var(--btn-excluir);
        }

        .excluir:hover {
            background-color: var(--btn-excluir-hover);
        }

        .novo {
            display: block;
            width: fit-content;
            margin: 20px auto;
            background-color: var(--btn-novo);
            padding: 10px 22px;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: background-color 0.2s, transform 0.1s;
        }

        .novo:hover {
            background-color: var(--btn-novo-hover);
            transform: scale(1.05);
        }

        .mensagem {
            text-align: center;
            color: var(--text-color);
            margin-top: 30px;
        }
    </style>
</head>
<body class="dark">

    <div class="topo">
        <a href="home.php" class="home-btn">🏠 Home</a>
        <button class="theme-toggle" id="toggle-theme" title="Alternar tema">🌙</button>
    </div>

    <h2>Listar Usuários</h2>

    <a href="cadastro.php" class="novo">+ Novo Usuário</a>

    <?php if (!empty($registros)) { ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Tipo</th>
                    <th class="acoes">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro) { ?>
                    <tr>
                        <td><?= htmlspecialchars($registro['idusuario']) ?></td>
                        <td><?= htmlspecialchars($registro['login']) ?></td>
                        <td><?= htmlspecialchars($registro['tipo']) ?></td>
                        <td class="acoes">
                            <a href="editarUsuario.php?id=<?= urlencode($registro['idusuario']) ?>" class="btn editar">Editar</a>
                            <a href="deletarUsuarios.php?id=<?= urlencode($registro['idusuario']) ?>" class="btn excluir" onclick="return confirm('Deseja realmente excluir este usuário?')">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="mensagem">Nenhum usuário cadastrado.</p>
    <?php } ?>

    <script>
        const toggleButton = document.getElementById('toggle-theme');
        const body = document.body;

        // Carrega tema salvo
        const temaSalvo = localStorage.getItem('tema');
        if (temaSalvo === 'light') {
            body.classList.remove('dark');
            toggleButton.textContent = '☀️';
        }

        toggleButton.addEventListener('click', () => {
            body.classList.toggle('dark');
            const modoEscuro = body.classList.contains('dark');

            toggleButton.textContent = modoEscuro ? '🌙' : '☀️';
            localStorage.setItem('tema', modoEscuro ? 'dark' : 'light');
        });
    </script>
</body>
</html>
