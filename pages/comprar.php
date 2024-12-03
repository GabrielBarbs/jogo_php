<?php

    session_start();

    include '../dashboard/dashboard/functions_1.php';
    include '../funcoes/db.php';

    $usuario = $_SESSION['usuario'];
    $senha = $_SESSION['senha'];
    $cardId = $_GET['id'];
    $page = $_GET['page'];

    $resultCarta = $db->query("SELECT * FROM habilidade WHERE ID = '$cardId'");    

    $result = $db->query("SELECT * FROM usuarios WHERE username = '$usuario'");    

    while ($userdata = mysqli_fetch_assoc($result)){
        $userId = $userdata['ID'];
        $userSaldo = $userdata['poder'];
    }

    while($userdata = mysqli_fetch_assoc($resultCarta)){
        if($userSaldo >= $userdata['preco_hab']){
            $valor = $userdata['preco_hab'];

            $_SESSION['compra_sucesso'] = true;

            addCardToInventory($userId, $cardId, $valor);
            if($page == 1){
                header('Location: loja.php');
            }else if($page == 2){
                header('Location: loja_2.php');
            }else if($page == 3){
                header('Location: loja_3.php');
            }else if($page == 4){
                header('Location: loja_4.php');
            }else if($page == 5){
                header('Location: loja_5.php');
            }
        }else{
            echo '
        <div class="message-box" id="messageBox">
            <h2>Saldo Insuficiente</h2>
            <p>Você não tem saldo suficiente para comprar essa carta.</p>
            <button onclick="goBackToStore()">OK</button>
        </div>

        <style>
            .message-box {
                width: 300px;
                padding: 20px;
                border: 2px solid #000;
                background-color: #f8d7da;
                color: #721c24;
                font-family: Arial, sans-serif;
                border-radius: 5px;
                text-align: center;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                display: block;
            }

            .message-box button {
                margin-top: 15px;
                padding: 10px 20px;
                background-color: #721c24;
                color: white;
                border: none;
                cursor: pointer;
                border-radius: 5px;
            }

            .message-box button:hover {
                background-color: #9a2d29;
            }
        </style>

        <script>
            // Função para redirecionar para loja.php quando clicar em "OK"
            function goBackToStore() {
                window.location.href = "loja.php";
            }
        </script>
        ';
            
        }
    }


?>