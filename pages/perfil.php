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

    $result2 = $db->query("SELECT * FROM inventory WHERE user_id = '$userId'");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="perfil.css">
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
            position: fixed;
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

.botao_img{
    width: 150px;
    height: 40px;
    margin-top: 10px;
    border-radius: 5px;
    background-color: aquamarine;
    font-weight: 700;
    transition: 0.5s;
}
.botao_img:hover{
    transform: scale(1.1);
}
.botao_img_upar{
    width: 150px;
    height: 40px;
    margin-top: 10px;
    border-radius: 5px;
    background-color: green;
    font-weight: 700;
    transition: 0.5s;
    color: white;
}
.botao_img_upar:hover{
    transform: scale(1.1);
}
.itens{
    margin-top: 200px;
    width: 30vh;
    height: 400px;
    align-items: center;
    justify-content: center;
    text-align: center;
  }
  .itens img{
    margin-top: 20px;

  }
  .itens button{
    align-items: center;
    justify-content: center;
    text-align: center;
    width: 20vh;
    height: 30px;
    margin-top: 10px;
  }

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

        .usuario{
    height: 400px;
    width: 400px;
    border-radius: 50%;
    background-color: #ffffff;
    overflow: hidden;
    margin-left: 45%;
    margin-top: 100px;
    border: solid 2px black;
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
                <li> <a href="">PERFIL</a></li>
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
                            <li><a href="../pessoal.php">Informações Pessoais</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- parte de baixo -->
        </div>
        <?php if (isset($_SESSION['compra_sucesso']) && $_SESSION['compra_sucesso'] === true): ?>
    <div id="modal-sucesso">Carta upada com sucesso!</div>

    <script>
        window.onload = function() {
            var modal = document.getElementById('modal-sucesso');
            modal.style.display = 'block';
            
            setTimeout(function() {
                modal.style.display = 'none';
            }, 2000);
        }
    </script>

    <?php
    unset($_SESSION['compra_sucesso']);
    ?>

<?php endif; ?>
                    <div class="tela">
                    <div class="usuario">
                      <img src="img/perso.png" alt="" height="400px" width="400px">
                        <img src="" alt="">
                    </div>
                    <div class="infos">
                        <h1><?php
                            echo $usuario;
                        ?></h1>
                        <div style="align-items: center;
                        justify-content: center;
                        text-align: center;
                        margin-bottom:200px;
                        margin-top:90px;">

                        <?php

                        $slot = contarElementosPorUsuario($userId);

                        if($slot['count'] == 2){

                        $id1 = $slot['ids'][0]; // Posição 0
                        $id2 = $slot['ids'][1];

                        $id1_result_a = "SELECT * FROM slots WHERE id = '$id1'";
                        $id1_result = mysqli_query($db, $id1_result_a);
                        
                        while($userdata = mysqli_fetch_assoc($id1_result)){
                            if($userdata['inventory_id'] == NULL){
                                echo"
                                    
                                <img src='' alt='' style='height:350px;width:250px;
                                margin-left:200px;
                                border: 2px dashed #ccc; /* Borda visível */'>

                                <button class='botao_img_upar' style='
                                position:absolute;
                                margin-top:360px;
                                margin-left:-200px;
                                background-color:black;'
                                title='Nenhuma carta colocada no slot'>Retirar</button>
                                ";                              
                            }else{
                                $abc = "SELECT * FROM inventory WHERE id = '$userdata[inventory_id]'";
                            $abcd = mysqli_query($db, $abc);
                            while($userdata2 = mysqli_fetch_assoc($abcd)){
                                $def = "SELECT * FROM habilidade WHERE ID = '$userdata2[card_id]'";
                                $defg = mysqli_query($db, $def);
                                while($userdata3 = mysqli_fetch_assoc($defg)){

                                    if($userdata3['atk_def'] == 1){
                                        echo "<div style='opacity: 70%;position:absolute;
                                    margin-top:-60px;
                                    margin-left:600px;'>
                                        <p>Ataque</p>
                                        <div style='margin-top:5px;'>
                                        <i title='Nivel atual da sua carta!'  class='bi bi-info-circle-fill' style='font-size: 1.2rem; color: black;'></i>
                                        <span style='gap: 0;' title='Nivel atual da sua carta!'>Nivel: $userdata2[level]</span> <!-- Exibe o valor da carta ao lado do ícone -->   
                                        </div>
                                        </div>
                                        ";
                                    }else{
                                        echo "<div style='opacity: 70%;position:absolute;
                                        margin-top:-60px;
                                        margin-left:600px;'>
                                        <p>Defesa</p>
                                        <div style='margin-top:5px;'>
                                        <i title='Nivel atual da sua carta!'  class='bi bi-info-circle-fill' style='font-size: 1.2rem; color: black;'></i>
                                        <span style='gap: 0;' title='Nivel atual da sua carta!'>Nivel: $userdata2[level]</span> <!-- Exibe o valor da carta ao lado do ícone -->   
                                        </div>
                                        </div>
                                        ";
                                    }

                                    echo "<img src='../dashboard/$userdata3[figurinha]' alt='' style='height:350px;width:250px;
                                    margin-left:50px;'>
                                    
                                    <button class='botao_img_upar' style='
                                    position:absolute;
                                    margin-top:360px;
                                    margin-left:-200px;
                                    '>Retirar</button>
                                    ";
                                    }
                                    
                                }
                            }
                        }
                        }
                        $id2_result_a = "SELECT * FROM slots WHERE id = '$id2'";
                        $id2_result = mysqli_query($db, $id2_result_a);
                        
                        while($userdata = mysqli_fetch_assoc($id2_result)){
                            $abc = "SELECT * FROM inventory WHERE id = '$userdata[inventory_id]'";
                            $abcd = mysqli_query($db, $abc);
                            if($userdata['inventory_id'] == NULL){
                                echo"
                                    
                                <img src='' alt='' style='height:350px;width:250px;
                                margin-left:200px;
                                border: 2px dashed #ccc; /* Borda visível */'>

                                <button class='botao_img_upar' style='
                                position:absolute;
                                margin-top:360px;
                                margin-left:-200px;
                                background-color:black;
                                '
                                title='Nenhuma carta colocada no slot'>Retirar</button>
                                ";                        
                            }else{
                            while($userdata2 = mysqli_fetch_assoc($abcd)){
                                $def = "SELECT * FROM habilidade WHERE ID = '$userdata2[card_id]'";
                                $defg = mysqli_query($db, $def);
                                while($userdata3 = mysqli_fetch_assoc($defg)){
                                    
                                    if($userdata3['atk_def'] == 1){
                                        echo "<div style='opacity: 70%;position:absolute;
                                        margin-top:-410px;
                                        margin-left:1050px;'>
                                        <p>Ataque</p>
                                        <div style='margin-top:5px;'>
                                        <i title='Nivel atual da sua carta!'  class='bi bi-info-circle-fill' style='font-size: 1.2rem; color: black;'></i>
                                        <span style='gap: 0;' title='Nivel atual da sua carta!'>Nivel: $userdata2[level]</span> <!-- Exibe o valor da carta ao lado do ícone -->   
                                        </div>
                                        </div>
                                        ";
                                    }else{
                                        echo "<div style='opacity: 70%;position:absolute;
                                        margin-top:-410px;
                                        margin-left:1050px;'>
                                        <p>Defesa</p>
                                        <div style='margin-top:5px;'>
                                        <i title='Nivel atual da sua carta!'  class='bi bi-info-circle-fill' style='font-size: 1.2rem; color: black;'></i>
                                        <span style='gap: 0;' title='Nivel atual da sua carta!'>Nivel: $userdata2[level]</span> <!-- Exibe o valor da carta ao lado do ícone -->   
                                        </div>
                                        </div>
                                        ";
                                    }

                                    echo"
                                    
                                    <img src='../dashboard/$userdata3[figurinha]' alt='' style='height:350px;width:250px;
                                    margin-left:200px;'>

                                    <button class='botao_img_upar' style='
                                    position:absolute;
                                    margin-top:360px;
                                    margin-left:-200px;
                                    '>Retirar</button>
                                    ";
                            }
                        }
                    }
                    }
                
                        ?>
                        

                        </div>

                        <div class="janela" >
                            <h1 style="color:black; margin-bottom: -170px;">Inventario</h1>
                        <div class="conteudo">
                            <?php
                            while($userdata = mysqli_fetch_assoc($result2)){
                                $result3 = $db->query("SELECT * FROM habilidade WHERE ID = $userdata[card_id] AND nivel_ref ='1'");

                                while($userdata2 = mysqli_fetch_assoc($result3)){
                                    echo"<div class='itens'>";
                                    if($userdata2['atk_def'] == 1){
                                        echo "<div style='opacity: 70%;'>
                                        <p>Ataque</p>
                                        <div style='margin-top:5px;'>
                                        <i title='Nivel atual da sua carta!'  class='bi bi-info-circle-fill' style='font-size: 1.2rem; color: black;'></i>
                                        <span style='gap: 0;' title='Nivel atual da sua carta!'>Nivel: $userdata[level]</span> <!-- Exibe o valor da carta ao lado do ícone -->   
                                        </div>
                                        </div>
                                        ";
                                        
                                    }else{
                                        echo "<div style='opacity: 70%;'>
                                        <p>Defesa</p>
                                        <i title='Nivel atual da sua carta!'  class='bi bi-info-circle-fill' style='font-size: 1.2rem; color: black;'></i>
                                        <span style='gap: 0;' title='Nivel atual da sua carta!'>Nivel: $userdata[level]</span> <!-- Exibe o valor da carta ao lado do ícone -->   
                                        </div>
                                        ";
                                    }
                                    echo "<img class='item' src='../dashboard/$userdata2[figurinha]' alt='' height='350px' widht='250px'>
                                    <button class='botao_img' onclick=\"window.location.href='view/view_def.php?id=$userdata2[ID]&page=6'\">DESCRIÇÃO</button>
                                    ";
                                    if($userdata['level'] == 1){
                                        $level_card = 1;
                                        if($saldo >= $userdata2['preco_2']){
                                            echo "
                                            <button class='botao_img_upar' style='button-color:green; color:white;' onclick=\"window.location.href='upar.php?user=$userId&card=$userdata[card_id]&value=$userdata2[preco_2]'\">UPAR</button>
                                            ";
                                        }else{
                                            echo "
                                            <button class='botao_img_upar' style='background-color:black; color:white;' title='Poder insuficiente!'>UPAR</button>
                                            ";
                                        }
                                    }else if($userdata['level'] == 2){
                                        $level_card = 2;
                                        if($saldo >= $userdata2['preco_3']){
                                            echo "
                                            <button class='botao_img_upar' style='button-color:green; color:white;' onclick=\"window.location.href='upar.php?user=$userId&card=$userdata[card_id]&value=$userdata2[preco_3]'\">UPAR</button>
                                            ";
                                        }else{
                                            echo "
                                            <button class='botao_img_upar' style='background-color:black; color:white;' title='Poder insuficiente!'>UPAR</button>
                                            ";
                                        }
                                    }else if($userdata['level'] == 3){
                                        $level_card = 3;
                                        if($saldo >= $userdata2['preco_4']){
                                            echo "
                                            <button class='botao_img_upar' style='button-color:green; color:white;' onclick=\"window.location.href='upar.php?user=$userId&card=$userdata[card_id]&value=$userdata2[preco_4]'\">UPAR</button>
                                            ";
                                        }else{
                                            echo "
                                            <button class='botao_img_upar' style='background-color:black; color:white;' title='Poder insuficiente!'>UPAR</button>
                                            ";
                                        }
                                    }else if($userdata['level'] == 4){
                                        $level_card = 4;
                                        if($saldo >= $userdata2['preco_5']){
                                            echo "
                                            <button class='botao_img_upar' style='button-color:green; color:white;' onclick=\"window.location.href='upar.php?user=$userId&card=$userdata[card_id]&value=$userdata2[preco_5]'\">UPAR</button>
                                            ";
                                        }else{
                                            echo "
                                            <button class='botao_img_upar' style='background-color:black; color:white;' title='Poder insuficiente!'>UPAR</button>
                                            ";
                                        }
                                    }else{
                                        $level_card = 5;
                                        echo "
                                            <button class='botao_img_upar' style='background-color:black; color:white;' title='Carta no nivel maximo!'>UPAR</button>
                                            ";
                                    }
                                    echo "
                                    <button class='botao_img_upar' onclick=\"window.location.href='view/view_def.php?id=$userdata2[ID]&page=6'\">COLOCAR</button>
                                    </div>";
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
                </body>
                </html>