<?php

//verifica se o formulário enviado usando o método POST
if($_SERVER["REQUEST_METHOD"] == "POST") {
$nome = $_POST["nome"];
$idade = $_POST["idade"];

// recebe as notas de português

$portugues_prova1 = $_POST["portugues_prova1"];
$portugues_prova2 = $_POST["portugues_prova2"];
$portugues_prova3 = $_POST["portugues_prova3"];

//recebe as notas de matemática

$matematica_prova1 = $_POST["matematica_prova1"];
$matematica_prova2 = $_POST["matematica_prova2"];
$matematica_prova3 = $_POST["matematica_prova3"];

//receba as notas de história

$historia_prova1 = $_POST["historia_prova1"];
$historia_prova2 = $_POST["historia_prova2"];
$historia_prova3 = $_POST["historia_prova3"];


//organiza as informações em um array

$novoAluno = [
    "nome" => $nome,
    "idade" => $idade,

    "notas" => [

        "portugues" => [
            "prova1" => $portugues_prova1,
            "prova2" => $portugues_prova2,
            "prova3" => $portugues_prova3,
        ],

        "matematica" => [
            "prova1" => $matematica_prova1,
            "prova2" => $matematica_prova2,
            "prova3" => $matematica_prova3,
        ],

        "historia" => [
            "prova1" => $historia_prova1,
            "prova2" => $historia_prova2,
            "prova3" => $historia_prova3,
        ]


    ]

        ];

//serve para ler/abrir arquivo json

$conteudoJson = file_get_contents(__DIR__ . "/dados/intro.json");

//serve para converter json para array php
// o true serve para converter o json em array associativo para php ler

$alunos = json_decode($conteudoJson, true);

//adicionar novo aluno

$alunos[] = $novoAluno;

//converter o array php para json

$jsonAtualizado = json_encode(
    $alunos,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

//salvar o arquivo json

file_put_contents(__DIR__ . "/dados/intro.json", $jsonAtualizado);

};

//leitura dos dados para exibição  

//lê o arquivo json

$conteudoJson = file_get_contents(__DIR__ . "/dados/intro.json");

//converte o json para array php

$alunos = json_decode($conteudoJson, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CADASTRO DE NOTAS</h1>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome "required>
        <br><br>
        <label>idade:</label>
        <input type="number" name="nome" required> 
        <h2>portugues</h2>
        <label>prova1:</label>
        <input type="number" name="portugues_prova1" min="a" max="10" step="0.1" required>
        <br><br>
        <label>prova2:</label>
        <input type="number" name="portugues_prova2" min="a" max="10" step="0.1" required>
        <br><br>
        <label>prova3:</label>
        <input type="number" name="portugues_prova3" min="a" max="10" step="0.1" required>
         <br><br>
        <h2>matematica</h2>
        <label>prova1:</label>
        <input type="number" name="matematica_prova1" min="a" max="10" step="0.1" required>
        <br><br>
        <label>prova2:</label>
        <input type="number" name="matematica_prova2" min="a" max="10" step="0.1" required>
         <br><br>
         <label>prova3:</label>
         <input type="number" name="matematica_prova3" min="a" max="10" step="0.1" required>
         <br><br>
        <button button type="subnit">enviar</button>
    </form>

<h1>ALUNOS CADASTRADOS</h1>

<?php

    foreach($alunos as $alunos) { ?>
        <h2><?= $alunos["nome"] ?></h2>
        <p>idade: <?= $alunos["nome"] ?></p>

        <!-- PORTUGUÊS -->
        <h2>PORTUGUÊS</h2>
        <P>Prova1: <?= $alunos["notas"]["portugues"]["prova1"] ?></P>
        <P>Prova2: <?= $alunos["notas"]["portugues"]["prova2"] ?></P>
        <P>Prova3: <?= $alunos["notas"]["portugues"]["prova3"] ?></P>

         <!-- MATEMÁTICA -->
         <h2>MATEMÁTICA</h2>
        <P>Prova1: <?= $alunos["notas"]["matematica"]["prova1"] ?></P>
        <P>Prova2: <?= $alunos["notas"]["matematica"]["prova2"] ?></P>
        <P>Prova3: <?= $alunos["notas"]["matematica"]["prova3"] ?></P>

        <!-- HISTÓRIA -->
        <h2>HISTÓRIA</h2>
        <P>Prova1: <?= $alunos["notas"]["historia"]["prova1"] ?></P>
        <P>Prova2: <?= $alunos["notas"]["historia"]["prova2"] ?></P>
        <P>Prova3: <?= $alunos["notas"]["historia"]["prova3"] ?></P>

     <?php

    } ?>






















</body>
</html>

    






