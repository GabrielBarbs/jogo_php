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

function eAdminIndex($usuario, $senha){
    if(checaLogado($usuario) == true){
        if(checaAdmin($usuario) == true){
            return true;
        }
    }else{
        return false;
    }
}

function criar_habilidade_geral_atk($nome, $desc_geral, $nivel_ref, $classe, $imagem_loc, $preco_hab, $figurinha){

    include 'db_dash.php';

    $query = "INSERT INTO habilidade (nome,
    desc_geral,
    nivel_ref,
    critico,
    imagem_geral,
    figurinha,
    atk_def,
    preco_hab,
    desc_1,v_1_1,v_1_2,v_1_3,v_1_4,
    desc_2,preco_2,v_2_1,v_2_2,v_2_3,v_2_4,
    desc_3,preco_3,v_3_1,v_3_2,v_3_3,v_3_4,
    desc_4,preco_4,v_4_1,v_4_2,v_4_3,v_4_4,
    desc_5,preco_5,v_5_1,v_5_2,v_5_3,v_5_4)
    VALUES ('$nome', '$desc_geral', '$nivel_ref','$classe','$imagem_loc','$figurinha','1', '$preco_hab',
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

function criar_habilidade_1_atk($desc_1, $imagem_loc, $v_1_1, $v_1_2, $v_1_3, $v_1_4, $nome_hab){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_1='$desc_1',
        foto_1='$imagem_loc',
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

function criar_habilidade_2_atk($desc_2, $imagem_loc, $v_2_1, $v_2_2, $v_2_3, $v_2_4, $nome_hab, $valor){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_2='$desc_2',
        preco_2='$valor',
        foto_2='$imagem_loc',
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

function criar_habilidade_3_atk($desc_3, $imagem_loc, $v_3_1, $v_3_2, $v_3_3, $v_3_4, $nome_hab, $preco_3){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_3='$desc_3',
        preco_3='$preco_3',
        foto_3='$imagem_loc',
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

function criar_habilidade_4_atk($desc_4, $imagem_loc, $v_4_1, $v_4_2, $v_4_3, $v_4_4, $nome_hab, $preco_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_4='$desc_4',
        preco_4='$preco_4',
        foto_4='$imagem_loc',
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

function criar_habilidade_5_atk($desc_5, $imagem_loc, $v_5_1, $v_5_2, $v_5_3, $v_5_4, $nome_hab, $preco_5){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_5='$desc_5',
        preco_5='$preco_5',
        foto_5='$imagem_loc',
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

function criar_habilidade_geral_def($nome, $desc_geral, $nivel_ref, $classe, $imagem_loc, $preco_hab, $figurinha){

    include 'db_dash.php';

    $query = "INSERT INTO habilidade (nome,
    desc_geral,
    nivel_ref,
    critico,
    imagem_geral,
    figurinha,
    atk_def,
    preco_hab,
    desc_1,v_1_1,v_1_2,v_1_3,v_1_4,
    desc_2,preco_2,v_2_1,v_2_2,v_2_3,v_2_4,
    desc_3,preco_3,v_3_1,v_3_2,v_3_3,v_3_4,
    desc_4,preco_4,v_4_1,v_4_2,v_4_3,v_4_4,
    desc_5,preco_5,v_5_1,v_5_2,v_5_3,v_5_4)
    VALUES ('$nome', '$desc_geral', '$nivel_ref','$classe','$imagem_loc','$figurinha','0', '$preco_hab',
    'ND','0','0','0','0',
    'ND','0','0','0','0','0',
    'ND','0','0','0','0','0',
    'ND','0','0','0','0','0',
    'ND','0','0','0','0','0')";

    $result = mysqli_query($db, $query); 

    if ($result) {
        
        $_SESSION['hab_criando'] = $nome;

        header('Location: 1/criar_def_1.php');
    }
}

function criar_habilidade_1_def($desc_1, $imagem_loc, $v_1_1, $v_1_2, $v_1_3, $v_1_4, $nome_hab){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_1='$desc_1',
        foto_1='$imagem_loc',
        v_1_1='$v_1_1',
        v_1_2='$v_1_2',
        v_1_3='$v_1_3', 
        v_1_4='$v_1_4'
        WHERE nome = '$nome_hab'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../2/criar_def_2.php'); 
        }
}

function criar_habilidade_2_def($desc_2, $imagem_loc, $v_2_1, $v_2_2, $v_2_3, $v_2_4, $nome_hab, $valor){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_2='$desc_2',
        preco_2='$valor',
        foto_2='$imagem_loc',
        v_2_1='$v_2_1',
        v_2_2='$v_2_2',
        v_2_3='$v_2_3', 
        v_2_4='$v_2_4'
        WHERE nome = '$nome_hab'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../3/criar_def_3.php'); 
        }
}

function criar_habilidade_3_def($desc_3, $imagem_loc, $v_3_1, $v_3_2, $v_3_3, $v_3_4, $nome_hab, $valor){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_3='$desc_3',
        preco_3='$valor',
        foto_3='$imagem_loc',
        v_3_1='$v_3_1',
        v_3_2='$v_3_2',
        v_3_3='$v_3_3', 
        v_3_4='$v_3_4'
        WHERE nome = '$nome_hab'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../4/criar_def_4.php'); 
        }
}

function criar_habilidade_4_def($desc_4, $imagem_loc, $v_4_1, $v_4_2, $v_4_3, $v_4_4, $nome_hab, $valor){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_4='$desc_4',
        preco_4='$valor',
        foto_4='$imagem_loc',
        v_4_1='$v_4_1',
        v_4_2='$v_4_2',
        v_4_3='$v_4_3', 
        v_4_4='$v_4_4'
        WHERE nome = '$nome_hab'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../5/criar_def_5.php'); 
        }
}

function criar_habilidade_5_def($desc_5, $imagem_loc, $v_5_1, $v_5_2, $v_5_3, $v_5_4, $nome_hab, $valor){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET desc_5='$desc_5',
        preco_5='$valor',
        foto_5='$imagem_loc',
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

function editar_habilidade_geral_atk_foto($id, $desc_geral, $nivel_ref, $classe, $imagem_loc, $preco_hab){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET 
        desc_geral='$desc_geral',
        nivel_ref='$nivel_ref',
        critico='$classe',
        imagem_geral='$imagem_loc',
        preco_hab='$preco_hab'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view.php?id='.$id); 
        }
}

function editar_habilidade_geral_atk($id, $desc_geral, $nivel_ref, $classe, $preco_hab){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_geral='$desc_geral',
        nivel_ref='$nivel_ref',
        critico='$classe',
        preco_hab='$preco_hab'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view.php?id='.$id); 
        }
}

function editar_habilidade_1_atk_foto($id, $desc, $imagem_loc, $v_1_1, $v_1_2, $v_1_3, $v_1_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_1='$desc',
        foto_1='$imagem_loc',
        v_1_1='$v_1_1',
        v_1_2='$v_1_2',
        v_1_3='$v_1_3',
        v_1_4='$v_1_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level/level1.php?id='.$id); 
        }
}

function editar_habilidade_1_atk($id, $desc, $v_1_1, $v_1_2, $v_1_3, $v_1_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_1='$desc',
        v_1_1='$v_1_1',
        v_1_2='$v_1_2',
        v_1_3='$v_1_3',
        v_1_4='$v_1_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level/level1.php?id='.$id); 
        }
}

function editar_habilidade_2_atk($id, $desc,$valor, $v_2_1, $v_2_2, $v_2_3, $v_2_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_2='$desc',
        preco_2='$valor',
        v_2_1='$v_2_1',
        v_2_2='$v_2_2',
        v_2_3='$v_2_3',
        V_2_4='$v_2_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level/level2.php?id='.$id); 
        }
}
function editar_habilidade_2_atk_foto($id, $desc, $valor,$imagem_loc, $v_2_1, $v_2_2, $v_2_3, $v_2_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_2='$desc',
        foto_2='$imagem_loc',
        preco_2='$valor',
        v_2_1='$v_2_1',
        v_2_2='$v_2_2',
        v_2_3='$v_2_3',
        v_2_4='$v_2_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level/level2.php?id='.$id); 
        }
}
function editar_habilidade_3_atk($id, $desc,$valor, $v_3_1, $v_3_2, $v_3_3, $v_3_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_3='$desc',
        preco_3='$valor',
        v_3_1='$v_3_1',
        v_3_2='$v_3_2',
        v_3_3='$v_3_3',
        v_3_4='$v_3_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level/level3.php?id='.$id); 
        }
}
function editar_habilidade_3_atk_foto($id, $desc, $valor,$imagem_loc, $v_3_1, $v_3_2, $v_3_3, $v_3_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_3='$desc',
        foto_3='$imagem_loc',
        preco_3='$valor',
        v_3_1='$v_3_1',
        v_3_2='$v_3_2',
        v_3_3='$v_3_3',
        v_3_4='$v_3_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level/level3.php?id='.$id); 
        }
}

function editar_habilidade_4_atk($id, $desc,$valor, $v_4_1, $v_4_2, $v_4_3, $v_4_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_4='$desc',
        preco_4='$valor',
        v_4_1='$v_4_1',
        v_4_2='$v_4_2',
        v_4_3='$v_4_3',
        v_4_4='$v_4_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level/level4.php?id='.$id); 
        }
}
function editar_habilidade_4_atk_foto($id, $desc, $valor,$imagem_loc, $v_4_1, $v_4_2, $v_4_3, $v_4_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_4='$desc',
        foto_4='$imagem_loc',
        preco_4='$valor',
        v_4_1='$v_4_1',
        v_4_2='$v_4_2',
        v_4_3='$v_4_3',
        v_4_4='$v_4_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level/level4.php?id='.$id); 
        }
}

function editar_habilidade_5_atk($id, $desc,$valor, $v_5_1, $v_5_2, $v_5_3, $v_5_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_5='$desc',
        preco_5='$valor',
        v_5_1='$v_5_1',
        v_5_2='$v_5_2',
        v_5_3='$v_5_3',
        v_5_4='$v_5_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level/level5.php?id='.$id); 
        }
}
function editar_habilidade_5_atk_foto($id, $desc, $valor,$imagem_loc, $v_5_1, $v_5_2, $v_5_3, $v_5_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_5='$desc',
        foto_5='$imagem_loc',
        preco_5='$valor',
        v_5_1='$v_5_1',
        v_5_2='$v_5_2',
        v_5_3='$v_5_3',
        v_5_4='$v_5_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level/level5.php?id='.$id); 
        }
}

####################################################################################################

function editar_habilidade_geral_def_foto($id, $desc_geral, $nivel_ref, $classe, $imagem_loc, $preco_hab){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET 
        desc_geral='$desc_geral',
        nivel_ref='$nivel_ref',
        critico='$classe',
        imagem_geral='$imagem_loc',
        preco_hab='$preco_hab'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_def.php?id='.$id); 
        }
}

function editar_habilidade_geral_def($id, $desc_geral, $nivel_ref, $classe, $preco_hab){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_geral='$desc_geral',
        nivel_ref='$nivel_ref',
        critico='$classe',
        preco_hab='$preco_hab'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_def.php?id='.$id); 
        }
}

function editar_habilidade_1_def_foto($id, $desc, $imagem_loc, $v_1_1, $v_1_2, $v_1_3, $v_1_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_1='$desc',
        foto_1='$imagem_loc',
        v_1_1='$v_1_1',
        v_1_2='$v_1_2',
        v_1_3='$v_1_3',
        v_1_4='$v_1_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level_def/level1.php?id='.$id); 
        }
}

function editar_habilidade_1_def($id, $desc, $v_1_1, $v_1_2, $v_1_3, $v_1_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_1='$desc',
        v_1_1='$v_1_1',
        v_1_2='$v_1_2',
        v_1_3='$v_1_3',
        v_1_4='$v_1_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level_def/level1.php?id='.$id); 
        }
}

function editar_habilidade_2_def($id, $desc,$valor, $v_2_1, $v_2_2, $v_2_3, $v_2_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_2='$desc',
        preco_2='$valor',
        v_2_1='$v_2_1',
        v_2_2='$v_2_2',
        v_2_3='$v_2_3',
        V_2_4='$v_2_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level_def/level2.php?id='.$id); 
        }
}
function editar_habilidade_2_def_foto($id, $desc, $valor,$imagem_loc, $v_2_1, $v_2_2, $v_2_3, $v_2_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_2='$desc',
        foto_2='$imagem_loc',
        preco_2='$valor',
        v_2_1='$v_2_1',
        v_2_2='$v_2_2',
        v_2_3='$v_2_3',
        v_2_4='$v_2_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level_def/level2.php?id='.$id); 
        }
}
function editar_habilidade_3_def($id, $desc,$valor, $v_3_1, $v_3_2, $v_3_3, $v_3_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_3='$desc',
        preco_3='$valor',
        v_3_1='$v_3_1',
        v_3_2='$v_3_2',
        v_3_3='$v_3_3',
        v_3_4='$v_3_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level_def/level3.php?id='.$id); 
        }
}
function editar_habilidade_3_def_foto($id, $desc, $valor,$imagem_loc, $v_3_1, $v_3_2, $v_3_3, $v_3_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_3='$desc',
        foto_3='$imagem_loc',
        preco_3='$valor',
        v_3_1='$v_3_1',
        v_3_2='$v_3_2',
        v_3_3='$v_3_3',
        v_3_4='$v_3_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level_def/level3.php?id='.$id); 
        }
}

function editar_habilidade_4_def($id, $desc,$valor, $v_4_1, $v_4_2, $v_4_3, $v_4_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_4='$desc',
        preco_4='$valor',
        v_4_1='$v_4_1',
        v_4_2='$v_4_2',
        v_4_3='$v_4_3',
        v_4_4='$v_4_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level_def/level4.php?id='.$id); 
        }
}
function editar_habilidade_4_def_foto($id, $desc, $valor,$imagem_loc, $v_4_1, $v_4_2, $v_4_3, $v_4_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_4='$desc',
        foto_4='$imagem_loc',
        preco_4='$valor',
        v_4_1='$v_4_1',
        v_4_2='$v_4_2',
        v_4_3='$v_4_3',
        v_4_4='$v_4_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level_def/level4.php?id='.$id); 
        }
}

function editar_habilidade_5_def($id, $desc,$valor, $v_5_1, $v_5_2, $v_5_3, $v_5_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_5='$desc',
        preco_5='$valor',
        v_5_1='$v_5_1',
        v_5_2='$v_5_2',
        v_5_3='$v_5_3',
        v_5_4='$v_5_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level_def/level5.php?id='.$id); 
        }
}
function editar_habilidade_5_def_foto($id, $desc, $valor,$imagem_loc, $v_5_1, $v_5_2, $v_5_3, $v_5_4){

    include 'db_dash.php';

    $query = "UPDATE habilidade SET
        desc_5='$desc',
        foto_5='$imagem_loc',
        preco_5='$valor',
        v_5_1='$v_5_1',
        v_5_2='$v_5_2',
        v_5_3='$v_5_3',
        v_5_4='$v_5_4'
        WHERE id = '$id'
        ";
    
        $result = mysqli_query($db, $query); 
    
        if ($result) {
           header('Location: ../../../view/view_level_def/level5.php?id='.$id); 
        }
}

function userHasCard($userId, $cardId) {
    
    include 'db_dash.php';

    $query = "SELECT COUNT(*) AS total FROM inventory WHERE user_id = ? AND card_id = ?";
    $stmt = $db->prepare($query);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $db->error);
    }

    $stmt->bind_param("ii", $userId, $cardId);

    $stmt->execute();

    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();


    return $data['total'] > 0;
}
function initializeSlots($userId) {
    
    include 'db_dash.php';

    for ($i = 1; $i <= 2; $i++) {
        $sql = "INSERT INTO slots (user_id, slot_number, inventory_id) VALUES (?, ?, NULL)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ii", $userId, $i);
        $stmt->execute();
    }
        
}

function addCardToInventory($userId, $cardId, $valor) {

    include 'db_dash.php';

    $sql = "INSERT INTO inventory (user_id, card_id, level) VALUES (?, ?, 1)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ii", $userId, $cardId);
    $stmt->execute();

    $sqlUpdate = "UPDATE usuarios SET poder = poder - ? WHERE ID = ?";
    $stmtUpdate = $db->prepare($sqlUpdate);
    $stmtUpdate->bind_param("ii", $valor, $userId);
    $stmtUpdate->execute();
    
}

function nivel($userId, $nivel){
    include 'db_dash.php';

    $query = "SELECT xp FROM usuarios WHERE ID = ?";
    
    if ($stmt = mysqli_prepare($db, $query)) {

        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) > 0) {

            mysqli_stmt_bind_result($stmt, $xp);
            
            mysqli_stmt_fetch($stmt);
            
            if($nivel == 2){
                if($xp > 500){
                    return true;
                }else{
                    return false;
                }
            }else if($nivel == 3){
                if($xp > 1100){
                    return true;
                }else{
                    return false;
                }
            }else if($nivel == 4){
                if($xp > 1800){
                    return true;
                }else{
                    return false;
                }
            }else if($nivel == 5){
                if($xp > 2600){
                    return true;
                }else{
                    return false;
                }
            }
        } else {
            return "Usuário não encontrado.";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        return "Erro na consulta ao banco de dados.";
    }
}
function upgradeCardWithPower($userID, $cardID, $valor) {
    include 'db_dash.php';

    $query = "
        UPDATE inventory 
        SET level = level + 1 
        WHERE user_id = '$userID' AND card_id = '$cardID'
    ";

    $result = mysqli_query($db, $query); 

    $query2 = "
        UPDATE usuarios
        SET poder = poder - '$valor'
        WHERE ID = '$userID'
    ";

    $result2 = mysqli_query($db, $query2); 

    if($result && $result2){
        $_SESSION['compra_sucesso'] = true;
        header('Location: ../pages/perfil.php');
    }
}

function contarElementosPorUsuario($userId) {
        include 'db_dash.php';

        try {
            // Prepara a consulta SQL
            $query = "SELECT id FROM slots WHERE user_id = $userId";
    
            // Executa a consulta
            $result = mysqli_query($db, $query);
    
            if (!$result) {
                throw new Exception("Erro na execução da consulta: " . mysqli_error($db));
            }
    
            // Armazena os IDs recuperados
            $ids = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $ids[] = $row['id'];
            }
    
            // Retorna a contagem e os IDs
            return [
                'count' => count($ids),
                'ids' => $ids
            ];
        } catch (Exception $e) {
            // Lida com erros
            echo "Erro: " . $e->getMessage();
            return false;
        }
}

?>
