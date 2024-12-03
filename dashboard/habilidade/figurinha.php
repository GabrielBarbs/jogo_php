<?php
session_start();
include '../dashboard/functions_1.php';
include '../../funcoes/db.php';
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
    <link rel="stylesheet" href="view.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-dark">
<div class="container bg-secondary" style="
width:1500px;
height:700px;
">
    <div class="row user-details text-white border border-dark rounded align-items-start">
      <?php while ($userdata = mysqli_fetch_assoc($result)) : ?>
        
        <img style="height: 623px; width:427px; postion: absolute; margin-left: 400px;" src="<?php echo "../" . $userdata['figurinha']; ?>" alt="">    
        <div class="d-absolute" style="margin-left:00px;">
        <a href="dashboard_hab.php" class="btn btn-danger me-5">Sair</a>
    </div>
    </div>
      <?php endwhile; ?>
    </div>
  </div>

  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>