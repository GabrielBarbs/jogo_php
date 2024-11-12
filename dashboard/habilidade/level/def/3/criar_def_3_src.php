<?php

    session_start();

    include '../../../../dashboard/functions_1.php';
    include '../../../../../funcoes/db.php';

    $nome_hab = $_SESSION['hab_criando'];

    if (!isset($_POST['submit'])) {
        $desc_3 = $_POST['desc_3'];
        $imagem_3 = $_FILES['imagem_3']['tmp_name'];
        $v_3_1 = $_POST['v_3_1'];
        $v_3_2 = $_POST['v_3_2'];
        $v_3_3 = $_POST['v_3_3'];
        $v_3_4 = $_POST['v_3_4'];
        $preco_3 = $_POST['preco_3'];

        criar_habilidade_3_def($desc_3, $imagem_3, $v_3_1, $v_3_2, $v_3_3, $v_3_4, $nome_hab, $preco_3);
    }
?>