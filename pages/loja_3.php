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
        $userId = $userdata['ID'];

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
    $resultAtk = $db->query("SELECT * FROM habilidade WHERE nivel_ref = '3' AND atk_def = 1");
    $resultDef = $db->query("SELECT * FROM habilidade WHERE nivel_ref = '3' AND atk_def = 0");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="loja.css">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .body{
            text-decoration: none;
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

.img2{
    width: 25%;
    height: 60%;
    background-color: rgb(255, 255, 255);
    margin-top: 80px;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    text-align: center;
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
.img2 {
    display: flex;
    align-items: center;
    gap: 20px; /* Espaço entre os elementos dentro da div */
    margin-bottom: 100px; /* Espaço entre cada div img2 */
}
.img2 p {
    margin: 0; /* Remove margens adicionais do parágrafo */
    font-weight: bold; /* Opcional: realça o texto */
    text-align: center; /* Centraliza o texto */
}
.img2 button{
    margin-top: 0px;
}
/* Estilo do Modal */
/* Estilo do Modal */
#modal-sucesso {
            display: none;
            position: fixed;
            top: 50%;
            left: 54%;
            transform: translateX(-50%);
            background-color: #28a745;
            color: white;
            padding: 20px;
            border-radius: 5px;
            font-size: 18px;
            z-index: 1000;
        }

/* Animar a remoção do modal */
@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
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
                <li> <a href="">LOJA</a></li>
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
                            <li><a href="../pessoal.php">Informações Pessoais</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- parte de baixo -->
        </div>

        <div class="tela">
            <h1 class="loja" style="text-align: center; margin-top: 30px; font-weight: 700; font-size: 60px; font-family: Arial, Helvetica, sans-serif; color: white;">VENDINHA DO FERREIRA</h1>
            <div class="cartas">
            <div class="buttones" style="margin-bottom: -60px;">
                    <button class="jones" onclick="window.location.href='loja.php'">Nivel 1</a</button>
                    <button class="jones" onclick="window.location.href='loja_2.php'">Nivel 2</button>
                    <button class="jones" >Nivel 3</button>
                    <button class="jones" onclick="window.location.href='loja_4.php'">Nivel 4</button>
                    <button class="jones" onclick="window.location.href='loja_5.php'">Nivel 5</button>
                </div>
               <div class="todas">
               <?php
               while ($userdata = mysqli_fetch_assoc($resultAtk)){
                    echo "<div class='img2'>
                            <p style='margin-bottom: 0px; gap:0px;'>Ataque</p>
                            <i class='bi bi-coin' style='font-size: 1.2rem; color: green; margin-left: 0px;'></i>
                            <span style='gap: 0;'>$userdata[preco_hab]</span> <!-- Exibe o valor da carta ao lado do ícone -->
                    
                            <button class='imagemn'><img src='../dashboard/$userdata[figurinha]' alt='' height='350px' width='250px'></a></button>
                            <button class='botao_img' onclick=\"window.location.href='view/view.php?id=$userdata[ID]&page=3'\">DESCRIÇÃO</button>";
                            $cardId = $userdata['ID'];
                            $nivel = 3;
                            
                            if(userHasCard($userId, $cardId)){
                                echo"<button class='botao_img' style='background-color: black;color: white;' title='Voce ja possui essa carta!'>COMPRAR</button> </div>";
                            }else{
                                if(nivel($userId, $nivel) == false){
                                    echo"<button class='botao_img' style='background-color: black;color: white;' title='Voce nao possui o nivel necessario!'>COMPRAR</button> </div>";
                                }else{
                                echo"<button class='botao_img' style='background-color: green;' onclick=\"window.location.href='comprar.php?id=$userdata[ID]&page=3'\">COMPRAR</button> </div>";
                                }
                            }
                }
                while ($userdata = mysqli_fetch_assoc($resultDef)){
                    echo "<div class='img2'>
                            <p style='margin-bottom: 0px; gap:0px;'>Defesa</p>
                            <i class='bi bi-coin' style='font-size: 1.2rem; color: green; margin-left: 0px;'></i>
                            <span style='gap: 0;'>$userdata[preco_hab]</span> <!-- Exibe o valor da carta ao lado do ícone -->                           
                            <button class='botao_img' onclick=\"window.location.href='view/view_def.php?id=$userdata[ID]&page=3'\">DESCRIÇÃO</button>";                            
                            $cardId = $userdata['ID'];
                            $nivel = 3;
                            
                            if(userHasCard($userId, $cardId)){
                                echo"<button class='botao_img' style='background-color: black;color: white;' title='Voce ja possui essa carta!'>COMPRAR</button> </div>";
                            }else{
                                if(nivel($userId, $nivel) == false){
                                    echo"<button class='botao_img' style='background-color: black;color: white;' title='Voce nao possui o nivel necessario!'>COMPRAR</button> </div>";
                                }else{
                                echo"<button class='botao_img' style='background-color: green;' onclick=\"window.location.href='comprar.php?id=$userdata[ID]&page=3'\">COMPRAR</button> </div>";
                                }
                            }
                        }
                ?>
               </div>
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

<?php if (isset($_SESSION['compra_sucesso']) && $_SESSION['compra_sucesso'] === true): ?>
    <!-- Modal de Compra Realizada com Sucesso -->
    <div id="modal-sucesso">Compra realizada com sucesso!</div>

    <script>
        // Exibe o modal e desaparece após 2 segundos
        window.onload = function() {
            var modal = document.getElementById('modal-sucesso');
            modal.style.display = 'block';
            
            // Espera 2 segundos para ocultar o modal
            setTimeout(function() {
                modal.style.display = 'none';
            }, 2000);
        }
    </script>

    <?php
    // Limpa a sessão de sucesso após exibir a mensagem
    unset($_SESSION['compra_sucesso']);
    ?>

<?php endif; ?>

</script>
</body>
</html>
