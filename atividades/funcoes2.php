<?php

require_once "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] ==
"POST") {
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];

    $media = calcularMedia($nota1,
    $nota2);

    $situacao = verificarStatus($media);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funções no front</title>
</head>
<body>
        <label>NOTA1</label>
            <h2>nota1:</h2>
    <input type="number" class="nota1" min="a" step="0.1" required>
                <br><br>
        <label>NOTA2</label>
            <h2>nota2:</h2>
    <input type="number" class="nota2" min="a" step="0.1" required>
                <br><br>
                    <button button type="submit">enviar</button>
</body>
</html>