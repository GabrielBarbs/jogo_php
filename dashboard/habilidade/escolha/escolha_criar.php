<?php
session_start();
include '../../dashboard/functions_1.php';
include '../../../funcoes/db.php';
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


    <style>
        body{
            display:flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <form action="escolha_criar_2.php" method="post" style="width: 50; height:50;">
        <input type="submit" name="acao" value="Ataque">
        <input type="submit" name="acao" value="Defesa">
    </form>

    <!-- tem que colocar essa bosta no meio e deixar fofis -->
</body>
</html>