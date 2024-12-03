<?php

    session_start();

    include '../../../../dashboard/functions_1.php';
    include '../../../../../funcoes/db.php';

    $nome_hab = $_SESSION['hab_criando'];

    if (!isset($_POST['submit'])) {
        $desc_4 = $_POST['desc_4'];
        $v_4_1 = $_POST['v_4_1'];
        $v_4_2 = $_POST['v_4_2'];
        $v_4_3 = $_POST['v_4_3'];
        $v_4_4 = $_POST['v_4_4'];
        $preco_4 = $_POST['value'];

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

        criar_habilidade_4_atk($desc_4, $imagem_loc, $v_4_1, $v_4_2, $v_4_3, $v_4_4, $nome_hab, $preco_4);
    }
?>