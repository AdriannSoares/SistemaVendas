    <?php
    $cep = "01001000"; // Exemplo de CEP
    $url = "https://viacep.com.br/ws/" . $cep . "/json/";

    $resultado = file_get_contents($url);
    $dados = json_decode($resultado, true); // Converte o JSON para um array associativo

    if ($dados && !isset($dados->erro)) {
        echo "Logradouro: " . $dados['logradouro'] . "<br>";
        echo "Bairro: " . $dados['bairro'] . "<br>";
        echo "Localidade: " . $dados['localidade'] . "<br>";
        echo "UF: " . $dados['uf'] . "<br>";
    } else {
        echo "CEP não encontrado ou inválido.";
    }
    ?>