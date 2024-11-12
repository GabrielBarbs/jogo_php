<?php

session_start();

    include '../../../../dashboard/functions_1.php';
    include '../../../../../funcoes/db.php';

    $nome_hab = $_SESSION['hab_criando'];

    if (!isset($_POST['submit'])) {
        $desc_2 = $_POST['desc_2'];
        $imagem_2 = $_FILES['imagem_2']['tmp_name'];
        $v_2_1 = $_POST['v_2_1'];
        $v_2_2 = $_POST['v_2_2'];
        $v_2_3 = $_POST['v_2_3'];
        $v_2_4 = $_POST['v_2_4'];
        $preco_2 = $_POST['preco_2'];

        criar_habilidade_2_def($desc_2, $imagem_2, $v_2_1, $v_2_2, $v_2_3, $v_2_4, $nome_hab, $preco_2);
    }
?>