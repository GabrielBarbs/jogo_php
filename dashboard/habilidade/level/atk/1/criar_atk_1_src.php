<?php

session_start();

    include '../../../../dashboard/functions_1.php';
    include '../../../../../funcoes/db.php';

    $nome_hab = $_SESSION['hab_criando'];

    if (!isset($_POST['submit'])) {
        $desc_1 = $_POST['desc_1'];
        $imagem_1 = $_FILES['imagem_1']['tmp_name'];
        $v_1_1 = $_POST['v_1_1'];
        $v_1_2 = $_POST['v_1_2'];
        $v_1_3 = $_POST['v_1_3'];
        $v_1_4 = $_POST['v_1_4'];

        criar_habilidade_1_atk($desc_1, $imagem_1, $v_1_1, $v_1_2, $v_1_3, $v_1_4, $nome_hab);
    }
?>