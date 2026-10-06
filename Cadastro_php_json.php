<?php

// Ler arquivo json
$conteudoJson = file_get_contents(__DIR__ . "/dados.json/produtos.json");

// Converte json para array associativo
$alunos = json_decode($conteudoJson, true);

// Método Post
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST["produto"];
    $marca = $_POST["marca"];
    $categoria = $_POST["categoria"];
    $valor = $_POST["valor"];
    $estoque = $_POST["estoque"];
    $fornecedor = $_POST["fornecedor"];
    $origem = $_POST["origem"];

// Organização de informações em array
$Cadastro = [
    "produto" => $produto,
    "marca" => $marca,
    "categoria" => $categoria,
    "valor" => $valor,
    "estoque" => $estoque,
    "fornecedor" => $fornecedor,
    "origem" => $origem,

];

// Receber informações
$produto1 = $_POST["produto"];

$marca = $_POST["marca"];

$categoria = $_POST["categoria"];

$origem = $_POST["origem"];

$valor = $_POST["valor1"];

$estoque = $_POST["estoque1"];

$fornecedor = $_POST["fornecedor"];

// Converter o array php para json
$jsonAtualizado = json_encode(
    $alunos,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

// Salvar o arquivo json
file_put_contents(__DIR__ . "/dados/intro.json", $jsonAtualizado);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CADASTRO DE PRODUTOS</h1>
    <form method="POST">
            <h2>PRODUTO</h2>
    <label>produto:</label>
        <input type="text" name="produto" min="a" required>
            <br><br>
            <h2>MARCA</h2>
        <label>marca:</label>
        <input type="text" name="marca" required>
            <br><br>
            <h2>CATEGORIA</h2>
    <label>categoria:</label>
        <input type="text" name="categoria" required>
            <br><br>
            <h2>ORIGEM:</h2>
    <label>origem:</label>
        <input type="text" name="origem" required>
            <br><br>
       <h2>VALOR</h2>
    <label>valor:</label>
        <input type="number" name="valor" min="a" step="0.1" required>
            <br><br>
            <h2>ESTOQUE</h2>
    <label>estoque:</label>
        <input type="number" name="estoque" min="a"  step="0.1" required>
            <br><br>
   <h2>FORNECEDOR</h2>
   <label>fornecedor:</label>
        <input type="text" name="fornecedor" required>
            <br><br>
       
        <button button type="submit">enviar</button>
<h1>PRODUTOS CADASTRADOS</h1>

<?php foreach ($produto as $produto) { ?>

<h2> <?= $produto["produto"]  ?> </h2>

<p>categoria<?= $produto["categoria"] ?> </p>

<p>Marca: <?= $produto["marca"] ?></p>

<p>valor: <?= $produto["valor"] ?></p>

<p>Estoque: <?= $produto["estoque"] ?></p>

<p>fornecedor: <?= $produto["fornecedor"] ?></p>

<p>origem: <?= $produto["origem"] ?></p>



<?php } ?>


    


























</body>
</html>
