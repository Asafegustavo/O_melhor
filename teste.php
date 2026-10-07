<?php

// Caminho do arquivo json
$arquivo = __DIR__ . "/dados/teste.json";

// 1.Ler o arquivo json
$conteudo = file_get_contents($arquivo);

// 2.Transformar o arquivo json para array php
$alunos = json_decode($conteudo, true);

// 3.Percorrer todos os alunos
foreach($alunos as $alunos) {

// 4. Procurar o aluno com NOME: "maria"
if ($alunos["nome"] == "maria") {

// 5. Alterar o dado
$aluno["idade"] = 15;

    }
}

// 6. Transformar array php em json novamente
$json = json_encode($alunos,
JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// 7. Salvar no arquivo
file_put_contents($arquivo, $json);

echo "ALUNO ATUALIZADO"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>