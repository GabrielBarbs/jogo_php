<?php
session_start();

include '../../../../dashboard/functions_1.php';
include '../../../../../funcoes/db.php';

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

dashboard($usuario, $senha);

$id = $_GET['id'];

if (!isset($_POST['submit'])) {
    $desc = $_POST['description'];
    $v_3_1 = $_POST['v_3_1'];
    $v_3_2 = $_POST['v_3_2'];
    $v_3_3 = $_POST['v_3_3'];
    $v_3_4 = $_POST['v_3_4'];
    $valor = $_POST['value'];
    
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] !== UPLOAD_ERR_NO_FILE){
        $nome_aleatorio = uniqid('img_', true);
        $extensao = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $novo_nome = $nome_aleatorio . '.' . $extensao;

        $imagem = "../../../../img/" . $novo_nome;
        $imagem_loc = "./img/". $novo_nome;

        move_uploaded_file($_FILES["photo"]["tmp_name"] ,$imagem);

        editar_habilidade_3_atk_foto($id, $desc, $valor, $imagem_loc, $v_3_1, $v_3_2, $v_3_3, $v_3_4);
    }else{
        editar_habilidade_3_atk($id, $desc, $valor, $v_3_1, $v_3_2, $v_3_3, $v_3_4);
    }
}else{
    echo("<h1> Habilidade ja existe! </h1>");

    ## fazer um aviso melhor
}

?>