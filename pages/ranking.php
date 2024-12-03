<?php

session_start();

    include '../dashboard/dashboard/functions_1.php';
    include '../funcoes/db.php';

    $usuario = $_SESSION['usuario'];
    $senha = $_SESSION['senha'];

    If(!checaLogado($usuario)){
        header('Location: login/login_page.php');
    }

    $result = $db->query("SELECT * FROM usuarios WHERE username = '$usuario'");    

    while ($userdata = mysqli_fetch_assoc($result)){
        $xp_atual = $userdata['xp'];
        $saldo = $userdata['poder'];

        if($xp_atual >= 0 && $xp_atual <= 500){
            $level = 1;
            $porcentagem = ($xp_atual / 500) * 100;
        }else if($xp_atual > 500 && $xp_atual <= 1100){
            $level = 2;
            $porcentagem = (($xp_atual-500) / 600) * 100;
        }else if($xp_atual > 1100 && $xp_atual <= 1800){
            $level = 3;
            $porcentagem = (($xp_atual-1100) / 700) * 100;
        }else if($xp_atual > 1800 && $xp_atual <= 2600){
            $level = 4;
            $porcentagem = (($xp_atual-1800) / 800) * 100;
        }else{
            $level = 5;
            $porcentagem = (($xp_atual-2600) / 900) * 100;
        }
    }
    $i = 1;

    $poderdesc = $db->query("SELECT * FROM usuarios ORDER BY poder DESC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="ranking.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Document</title>
    <style>
         .barra-de-xp {
            width: 80%;
            background-color: white;
            border-radius: 10px;
            height: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-left: 20px;
            margin-top: 10px; /* tem q arrumar isso, pq
            ta jogando a config la pra baixao */
        }
        .barra-de-xp-inner {
            height: 100%;
            background-color: #4caf50;
            border-radius: 10px;
            
            display: absolute;
            align-items: center; /* Centraliza verticalmente */
            justify-content: center; /* Centraliza horizontalmente */
        }
        .barra-de-xp-inner p{
            margin-top: 10px; /* Remove espaçamentos adicionais */
        }
        .saldo-container {
            display: flex;
            align-items: center; /* Alinha verticalmente */
            gap: 5px; /* Espaço entre o ícone e o texto */
            margin-top: 20px;
            margin-left: 25px;
        }

        .saldo-text {
            margin: 0; /* Remove espaçamento padrão */
            color: white;
            font-size: 1rem;
            font-weight: bold;
        }
        .baixo {
            position: absolute; /* Fixa a posição dentro do menu */
            bottom: 0; /* Fixa a parte inferior do menu */
            left: 0; /* Alinha ao lado esquerdo do menu */
            width: 100%; /* Garante que ocupe toda a largura do menu */
            text-align: center;
            justify-content: center;
            align-items: center;
            gap: 30px;
            padding-bottom: 10px; /* Adiciona um pouco de espaço na parte inferior */
        }
        .menu {
            background-color: rgb(0, 0, 0);
            height: 100vh;
            width: 10%;
            position: relative; /* Adiciona position relative ao menu */
        }
        .hidden {
    display: none;
}

.modal {
    position: absolute;
    top: -20px; /* Move 10px para cima */
    right: -180px; /* Move 10px para a direita (ajuste de -150px para -160px) */
    background-color: black;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    padding: 10px;
    z-index: 1000;
}

.modal ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.modal ul li {
    margin-bottom: 8px;
}

.modal ul li a {
    text-decoration: none;
    color: #ffffff81;
    font-weight: bold;
}

.modal ul li a:hover {
    color: #ffffffff;
}
    </style>
</head>
<body>
    <div class="universal">
        <div class="menu">
            <button class="img"> 
                <a href="../index.php"> 
                    <img src="img/logo.png" alt="" height="100px" width="100px" style="border-radius: 50%;">
                </a>
            </button> <!--imagem logo-->
            <!-- menu -->
            <ul class="lista">
                <li> <a href="perfil.php">PERFIL</a></li>
                <li> <a href="ranking.php">RANKING</a></li>
                <li> <a href="loja.php">LOJA</a></li>
            </ul>
            <!-- menu -->
            <div class="meio">]
             <p style=" color: black;
            font-weight: bold;
            margin-left: 60px;
            margin-top:17px;
            position:absolute;">
                        <?php if($level == 1){
                            echo $xp_atual . "/500";
                            }else if($level == 2){
                            echo $xp_atual . "/1100";    
                            }else if($level == 3){
                            echo $xp_atual . "/1800";
                            }else if($level == 4){
                            echo $xp_atual . "/2600";
                            }else if($level == 5){
                            echo $xp_atual . "/3500";
                            }?>
                    </p>
             <div class="barra-de-xp">
                <div class="barra-de-xp-inner" style="width: <?php echo $porcentagem; ?>%;">
                </div>
            </div>
             <h3>xp</h3>
             <div class="saldo-container">
                <i class="bi bi-coin" style="font-size: 1.2rem; color: gold;"></i>
                <p class="saldo-text">Saldo: <?php echo $saldo; ?></p>
            </div>
             </div>

            <!-- parte de baixo -->
            <ul class="baixo">
                <div class="dash">
                    <?php
                    if(eAdminIndex($usuario, $senha)){
                        echo "<li><a href='../dashboard/dashboard.php'>DashBoard</a></li>";
                    }
                    ?>
                </div>
                <li>
                    <a href="#" id="config-button">CONFIGURAÇÕES</a>
                    <div id="config-modal" class="modal hidden">
                        <ul>
                            <li><a href="../logout.php">Logout</a></li>
                            <li><a href="pessoal.php">Informações Pessoais</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- parte de baixo -->
        </div>

        <div class="tela">

            <div class="rank">
                <?php while ($userdata = mysqli_fetch_assoc($poderdesc)){
                    if($i == 1){
                        echo"<div class='pri'>1 <p>$userdata[username]</p></div>";
                        $i++;
                    }else if($i == 2){
                        echo"<div class='sec'>2 <p>$userdata[username]</p></div>";
                        $i++;
                    }else if($i == 3){
                        echo"<div class='ter'>3 <p>$userdata[username]</p></div>";
                        $i++;
                    }else{
                        break;
                    }
                }?>

                

                

            </div>
            <div class="tabela">
                <div class="posi">
                <h2>4-</h2>
                <h2>5-</h2>
                <h2>6-</h2>
                <h2>7-</h2>
                <h2>8-</h2>
                <h2>7-</h2>
                <h2>XX - SUA POSIÇAO</h2>
                </div>
            </div>
        </div>
        <script>
    document.addEventListener("DOMContentLoaded", function() {
        const configButton = document.getElementById("config-button");
        const configModal = document.getElementById("config-modal");

        configButton.addEventListener("click", function(e) {
            e.preventDefault();
            configModal.classList.toggle("hidden");
        });

        // Fecha o modal ao clicar fora dele
        document.addEventListener("click", function(e) {
            if (!configModal.contains(e.target) && !configButton.contains(e.target)) {
                configModal.classList.add("hidden");
            }
        });
    });
</script>
</body>
</html>