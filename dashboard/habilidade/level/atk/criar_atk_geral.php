<?php

session_start();

include '../../../dashboard/functions_1.php';
include '../../../../funcoes/db.php';

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

dashboard($usuario, $senha);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    body{
    background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
    color: white;
    text-align: center;

    }
    .table-bg{
        background: rgba(0,0,0,0.3);
        height: 670px;
        border-radius:15px 15px 0 0;
    }
    </style>
</head>
<body>
    <div class="table-bg">
        <h1>Habilidade Geral</h1>
        <form action="criar_atk_geral_src.php" method="POST" enctype="multipart/form-data">
            <p>Nome:</p>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome"required>
            <br>
            <p>Descriçao:</p>
            <textarea name="desc_geral" id="desc_geral" placeholder="Digite a descriçao GERAL"required></textarea>
            <br>
            <p>Valor:</p>
            <input type="text" name="preco_hab" id="preco_hab" placeholder="Digite o valor"required>
            <br>
            <p>Foto:</p>
            <input type="file" name="imagem_hab">
            <br>
            
            <p>Nivel referente:</p>
            <select name="nivel_ref" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            </select>
            <br>

            <p>Critico:</p>
            <select name="classe" required>
            <option value="Fogo">Fogo</option>
            <option value="Ar">Ar</option>
            <option value="Agua">Agua</option>
            <option value="Terra">Terra</option>
            </select>
            <br>
            <button type="submit" style="margin-top:50px;">Proxima pagina (Nivel 1)</button>
        </form>
    </div>

    <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>