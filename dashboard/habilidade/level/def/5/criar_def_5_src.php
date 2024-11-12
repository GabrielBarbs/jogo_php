<?php

    session_start();

    include '../../../../dashboard/functions_1.php';
    include '../../../../../funcoes/db.php';

    $nome_hab = $_SESSION['hab_criando'];

    if (!isset($_POST['submit'])) {
        $desc_5 = $_POST['desc_5'];
        $imagem_5 = $_FILES['imagem_5']['tmp_name'];
        $v_5_1 = $_POST['v_5_1'];
        $v_5_2 = $_POST['v_5_2'];
        $v_5_3 = $_POST['v_5_3'];
        $v_5_4 = $_POST['v_5_4'];
        $preco_5 = $_POST['preco_5'];

        criar_habilidade_5_def($desc_5, $imagem_5, $v_5_1, $v_5_2, $v_5_3, $v_5_4, $nome_hab, $preco_5);
    }
?>