<?php
session_start();

include '../../../dashboard/functions_1.php';
include '../../../../funcoes/db.php';

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

dashboard($usuario, $senha);

$nome = $_POST['nome'];

if (!isset($_POST['submit']) && !checa_habilidade_existe($db, $nome)) {
    $desc_geral = $_POST['desc_geral'];
    $preco_hab = $_POST['preco_hab'];
    $nivel_ref = $_POST['nivel_ref'];
    $classe = $_POST['classe'];
    $imagem = file_get_contents($_FILES['imagem_hab']['tmp_name']);

    if($classe == "Fogo"){
        $classe = "1";
    }else if($classe == "Ar"){
        $classe = "2";
    }else if($classe == "Agua"){
        $classe = "3";
    }else{
        $classe = "4";
    }

    criar_habilidade_geral_atk($nome, $desc_geral, $nivel_ref, $classe, $imagem, $preco_hab);
}else{
    echo("<h1> Habilidade ja existe! </h1>");

    ## fazer um aviso melhor
}

?>