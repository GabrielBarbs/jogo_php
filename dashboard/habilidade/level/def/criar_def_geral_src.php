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
    
    if( isset($_FILES["imagem_hab"]) && !empty($_FILES["imagem_hab"])){
        $nome_aleatorio = uniqid('img_', true);
        $extensao = pathinfo($_FILES['imagem_hab']['name'], PATHINFO_EXTENSION);
        $novo_nome = $nome_aleatorio . '.' . $extensao;

        $imagem = "../../../img/" . $novo_nome;
        $imagem_loc = "./img/". $novo_nome;

        move_uploaded_file($_FILES["imagem_hab"]["tmp_name"] ,$imagem);
    }

    if($classe == "Fogo"){
        $classe = "1";
    }else if($classe == "Ar"){
        $classe = "2";
    }else if($classe == "Agua"){
        $classe = "3";
    }else{
        $classe = "4";
    }

    criar_habilidade_geral_def($nome, $desc_geral, $nivel_ref, $classe, $imagem_loc, $preco_hab);
}else{
    echo("<h1> Habilidade ja existe! </h1>");

    ## fazer um aviso melhor
}

?>