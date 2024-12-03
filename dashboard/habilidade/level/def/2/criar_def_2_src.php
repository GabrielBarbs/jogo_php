<?php

session_start();

    include '../../../../dashboard/functions_1.php';
    include '../../../../../funcoes/db.php';

    $nome_hab = $_SESSION['hab_criando'];

    if (!isset($_POST['submit'])) {
        $desc_2 = $_POST['desc_2'];
        $v_2_1 = $_POST['v_2_1'];
        $v_2_2 = $_POST['v_2_2'];
        $v_2_3 = $_POST['v_2_3'];
        $v_2_4 = $_POST['v_2_4'];
        $valor = $_POST['value'];

        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] !== UPLOAD_ERR_NO_FILE){
            $nome_aleatorio = uniqid('img_', true);
            $extensao = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $novo_nome = $nome_aleatorio . '.' . $extensao;
    
            $imagem = "../../../../img/" . $novo_nome;
            $imagem_loc = "./img/". $novo_nome;
    
            move_uploaded_file($_FILES["photo"]["tmp_name"] ,$imagem);
        }else{
            $imagem_loc = "";
        }

        criar_habilidade_2_def($desc_2, $imagem_loc, $v_2_1, $v_2_2, $v_2_3, $v_2_4, $nome_hab, $valor);
    }
?>