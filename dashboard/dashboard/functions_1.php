<?php

function checa_habilidade_existe($db, $nome) {
    $stmt = mysqli_prepare($db, "SELECT * FROM habilidade WHERE nome = ?");
    mysqli_stmt_bind_param($stmt, "s", $nome);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return mysqli_num_rows($result) > 0;
}

function checaAdmin($usuario) {
    include 'db_dash.php';

    $stmt = $db->prepare("SELECT admin FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $usuario);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            return $row['admin'] == 1;
        }
    } else {
        header('Location: ../../error_404.html');
    }

    return false;
}

function checaLogado($usuario) {
    if(($usuario == "")){
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);  
        return false;
    }else{
        return true;
    }
}

function dashboard($usuario, $senha){
    if(checaLogado($usuario) == true){
        if(checaAdmin($usuario) == false){
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);

            // por aviso que a pessoa nao é admin
        }
    }else{
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: ../../login/login_page.php');
    }
}

function criar_habilidade_geral_atk($nome, $desc_geral, $nivel_ref, $classe, $imagem, $preco_hab){

    include 'db_dash.php';

    $query = "INSERT INTO habilidade (nome,
    desc_geral,
    nivel_ref,
    critico,
    imagem_geral,
    atk_def,
    preco_hab,
    desc_1,v_1_1,v_1_2,v_1_3,v_1_4,
    desc_2,preco_2,v_2_1,v_2_2,v_2_3,v_2_4,
    desc_3,preco_3,v_3_1,v_3_2,v_3_3,v_3_4,
    desc_4,preco_4,v_4_1,v_4_2,v_4_3,v_4_4,
    desc_5,preco_5,v_5_1,v_5_2,v_5_3,v_5_4)
    VALUES ('$nome', '$desc_geral', '$nivel_ref','$classe','$imagem','1', '$preco_hab',
    'ND','0','0','0','0',
    'ND','0','0','0','0','0',
    'ND','0','0','0','0','0',
    'ND','0','0','0','0','0',
    'ND','0','0','0','0','0')";

    $result = mysqli_query($db, $query); 

    if ($result) {
        
        $_SESSION['hab_criando'] = $nome;

        header('Location: 1/criar_atk_1.php');
    }
}

function criar_habilidade_1_atk($desc_1, $imagem_1, $v_1_1, $v_1_2, $v_1_3, $v_1_4, $nome_hab){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_1='$desc_1',
        foto_1='$imagem_1',
        v_1_1='$v_1_1',
        v_1_2='$v_1_2',
        v_1_3='$v_1_3', 
        v_1_4='$v_1_4'
        WHERE nome = '$nome_hab'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../2/criar_atk_2.php'); 
        }
}

function criar_habilidade_2_atk($desc_2, $imagem_2, $v_2_1, $v_2_2, $v_2_3, $v_2_4, $nome_hab, $preco_2){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_2='$desc_2',
        preco_2='$preco_2',
        foto_2='$imagem_2',
        v_2_1='$v_2_1',
        v_2_2='$v_2_2',
        v_2_3='$v_2_3', 
        v_2_4='$v_2_4'
        WHERE nome = '$nome_hab'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../3/criar_atk_3.php'); 
        }
}

function criar_habilidade_3_atk($desc_3, $imagem_3, $v_3_1, $v_3_2, $v_3_3, $v_3_4, $nome_hab, $preco_3){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_3='$desc_3',
        preco_3='$preco_3',
        foto_3='$imagem_3',
        v_3_1='$v_3_1',
        v_3_2='$v_3_2',
        v_3_3='$v_3_3', 
        v_3_4='$v_3_4'
        WHERE nome = '$nome_hab'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../4/criar_atk_4.php'); 
        }
}

function criar_habilidade_4_atk($desc_4, $imagem_4, $v_4_1, $v_4_2, $v_4_3, $v_4_4, $nome_hab, $preco_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_4='$desc_4',
        preco_4='$preco_4',
        foto_4='$imagem_4',
        v_4_1='$v_4_1',
        v_4_2='$v_4_2',
        v_4_3='$v_4_3', 
        v_4_4='$v_4_4'
        WHERE nome = '$nome_hab'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../5/criar_atk_5.php'); 
        }
}

function criar_habilidade_5_atk($desc_5, $imagem_5, $v_5_1, $v_5_2, $v_5_3, $v_5_4, $nome_hab, $preco_5){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_5='$desc_5',
        preco_5='$preco_5',
        foto_5='$imagem_5',
        v_5_1='$v_5_1',
        v_5_2='$v_5_2',
        v_5_3='$v_5_3', 
        v_5_4='$v_5_4'
        WHERE nome = '$nome_hab'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
            unset($_SESSION['hab_criando']);
            header('Location: ../../../dashboard_hab.php'); 
        }
}
?>