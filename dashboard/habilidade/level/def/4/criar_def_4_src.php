<?php

    session_start();

    include '../../../../dashboard/functions_1.php';
    include '../../../../../funcoes/db.php';

    $nome_hab = $_SESSION['hab_criando'];

    if (!isset($_POST['submit'])) {
        $desc_4 = $_POST['desc_4'];
        $imagem_4 = $_FILES['imagem_4']['tmp_name'];
        $v_4_1 = $_POST['v_4_1'];
        $v_4_2 = $_POST['v_4_2'];
        $v_4_3 = $_POST['v_4_3'];
        $v_4_4 = $_POST['v_4_4'];
        $preco_4 = $_POST['preco_4'];

        criar_habilidade_4_def($desc_4, $imagem_4, $v_4_1, $v_4_2, $v_4_3, $v_4_4, $nome_hab, $preco_4);
    }
?>