<?php

session_start();
include '../../dashboard/functions_1.php';
include '../../../funcoes/db.php';
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
dashboard($usuario, $senha);

$id = $_GET['id'];

$result = $db->query("SELECT * FROM habilidade WHERE ID = '$id'");

while ($userdata = mysqli_fetch_assoc($result)){
    if($userdata['atk_def'] == "1"){
        header('Location: view.php?id='.$id);
    }else{
        header('Location: view_def.php?id='.$id);
    }
}

?>