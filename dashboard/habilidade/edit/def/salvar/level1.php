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
    $v_1_1 = $_POST['v_1_1'];
    $v_1_2 = $_POST['v_1_2'];
    $v_1_3 = $_POST['v_1_3'];
    $v_1_4 = $_POST['v_1_4'];
    
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] !== UPLOAD_ERR_NO_FILE){
        $nome_aleatorio = uniqid('img_', true);
        $extensao = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $novo_nome = $nome_aleatorio . '.' . $extensao;

        $imagem = "../../../../img/" . $novo_nome;
        $imagem_loc = "./img/". $novo_nome;

        move_uploaded_file($_FILES["photo"]["tmp_name"] ,$imagem);

        editar_habilidade_1_def_foto($id, $desc, $imagem_loc, $v_1_1, $v_1_2, $v_1_3, $v_1_4);
    }else{
        editar_habilidade_1_def($id, $desc, $v_1_1, $v_1_2, $v_1_3, $v_1_4);
    }
}else{
    echo("<h1> Habilidade ja existe! </h1>");

    ## fazer um aviso melhor
}

?>