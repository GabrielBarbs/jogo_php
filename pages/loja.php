<?php

session_start();

    include '../dashboard/dashboard/functions_1.php';
    include '../funcoes/db.php';

    $usuario = $_SESSION['usuario'];
    $senha = $_SESSION['senha'];

    If(!checaLogado($usuario)){
        header('Location: login/login_page.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/loja.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="universal">
        <div class="menu">
            <button class="img"> <a href="../index.php"> <img src="img/logo.png" alt="" height="100px" width="100px" style="border-radius: 50%;"></a></button> <!--imagem logo-->
            <!-- menu -->
             <ul class="lista">
                <li> <a href="">PERFIL</a></li>
                <li> <a href="ranking.php">RANKING</a></li>
                <li> <a href="">LOJA</a></li>
             </ul>
             <!-- menu -->

             <!-- parte de baixo -->
             <ul class="baixo">
             <div class="dash">
                <?php
                if(eAdminIndex($usuario, $senha)){
                    echo "<li><a href='../dashboard/dashboard.php'>DashBoard</a></li>";
                }
                ?>
                </div>
                <li><a href="">CONFIGURAÇÕES</a></li>
             </ul>
             <!-- parte de baixo -->

        </div>
        <div class="tela">
            <h1 class="loja" style="text-align: center; margin-top: 30px; font-weight: 700; font-size: 60px; font-family: Arial, Helvetica, sans-serif; color: white;">VENDINHA DO JOSÉ</h1>
            <div class="cartas">
                <div class="buttones">
                    <button class="jones">nivel-1</button>
                    <button class="jones">nivel-2</button>
                    <button class="jones">nivel-3</button>
                    <button class="jones">nivel-4</button>
                    <button class="jones">nivel-5</button>
                </div>
                <div class="imagens">
                    <a href="#"><img src="img/jones.png"  alt="" height="144px" width="144px"></a>
                    <a href="#"><img src="img/jones.png"  alt="" height="144px" width="144px"></a>
                    <a href="#"><img src="img/jones.png"  alt="" height="144px" width="144px"></a>
                    <a href="#"><img src="img/jones.png"  alt="" height="144px" width="144px"></a>
                    <a href="#"><img src="img/jones.png"  alt="" height="144px" width="144px"></a>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>