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

        editar_habilidade_2_def_foto($id, $desc, $valor, $imagem_loc, $v_2_1, $v_2_2, $v_2_3, $v_2_4);
    }else{
        editar_habilidade_2_def($id, $desc, $valor, $v_2_1, $v_2_2, $v_2_3, $v_2_4);
    }
}else{
    echo("<h1> Habilidade ja existe! </h1>");

    ## fazer um aviso melhor
}

?>