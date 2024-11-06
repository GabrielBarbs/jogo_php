<?php
session_start();
include '../../dashboard/functions_1.php';
include '../../../funcoes/db.php';
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
dashboard($usuario, $senha);

$id = $_GET['id'];

$result = $db->query("SELECT * FROM habilidade WHERE ID = '$id'");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
while($userdata = mysqli_fetch_assoc($result)){
    $imageData = base64_decode($userdata['imagem_geral']);
        echo '<img src="image/' . $imageData . '" />';

}
    ?>

    <img src="" alt="">

</body>
</html>