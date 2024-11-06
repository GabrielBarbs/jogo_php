<?php

include 'db_dash.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $usuario = $_POST['username'];
    $senha = $_POST['password'];
    $poder = $_POST['poder'];
    $xp = $_POST['xp'];
    $classe = $_POST['classe'];
    $admin = $_POST['OPCAO'];

    $result = $db->query("UPDATE usuarios SET username='$usuario', password='$senha', classe='$classe', poder='$poder', xp='$xp', admin='$admin' WHERE ID=$id");
}

header('Location: ../dashboard.php');

?>