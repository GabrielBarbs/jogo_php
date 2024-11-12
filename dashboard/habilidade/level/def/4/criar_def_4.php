<?php

session_start();

include '../../../../dashboard/functions_1.php';
include '../../../../../funcoes/db.php';

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

dashboard($usuario, $senha);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
    body{
    background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
    color: white;
    text-align: center;
    }
    .table-bg{
        background: rgba(0,0,0,0.3);
        height: 3800px;
        border-radius:15px 15px 0 0;
    }
    </style>
</head>
<body>
    <h1 style="margin-top: 80px">Nivel 4</h1>
    <form action="criar_def_4_src.php" method="POST">
        <p>Descriçao:</p>
        <textarea name="desc_4" id="desc_4" placeholder="Digite a descriçao do nivel 4" required></textarea>
        <br>
        <p>Foto (Nivel 4):</p>
        <input type="file" name="imagem_4">
        <br>
        <p>Valor (Valor upgrade nivel 4)</p>
        <input type="text" name="preco_4" id="preco_4" placeholder="Digite o valor do upgrade" required>
        <br>
        <p>Defesa (Fogo)</p>
        <input type="text" name="v_4_1" id="v_4_1" placeholder="Digite a defesa em fogo (%, nivel 4)" required>
        <br>
        <p>Defesa (Ar)</p>
        <input type="text" name="v_4_2" id="v_4_2" placeholder="Digite a defesa em ar (%, nivel 4)" required>
        <br>
        <p>Defesa (Agua)</p>
        <input type="text" name="v_4_3" id="v_4_3" placeholder="Digite a defesa em agua (%, nivel 4)" required>
        <br>
        <p>Defesa (Terra)</p>
        <input type="text" name="v_4_4" id="v_4_4" placeholder="Digite a defesa em terra (%, nivel 4)" required>
        <br>
        <button type="submit" style="margin-top:50px;">Proxima pagina (Nivel 5)</button>
    </form>

    <div class="d-flex">
        <a href="../sair.php" class="btn btn-danger me-5">Sair</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>