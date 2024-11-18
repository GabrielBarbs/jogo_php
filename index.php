<!-- <?php 

session_start();

    include 'dashboard/dashboard/functions_1.php';
    include 'funcoes/db.php';

    $usuario = $_SESSION['usuario'];
    $senha = $_SESSION['senha'];

    If(!checaLogado($usuario)){
        header('Location: login/login_page.php');
    }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="pages/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="universal">
        <div class="menu">
            <button class="img"> <a href=""> <img src="pages/img/logo.png" alt="" height="100px" width="100px" style="border-radius: 50%;"></a></button> <!--imagem logo-->
            <!-- menu -->
             <ul class="lista">
                <li> <a href="">PERFIL</a></li>
                <li> <a href="pages/ranking.php">RANKING</a></li>
                <li> <a href="pages/loja.php">LOJA</a></li>
             </ul>
             <!-- menu -->

             <!-- parte de baixo -->
             <ul class="baixo">
                <div class="dash">
                <?php
                if(eAdminIndex($usuario, $senha)){
                    echo "<li><a href='dashboard/dashboard.php'>DashBoard</a></li>";
                }
                ?>
                </div>
               
                <li><a href="">CONFIGURAÇÕES</a></li>
             </ul>
             <!-- parte de baixo -->

        </div>
    </div>
</body>
</html>