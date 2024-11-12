<?php
session_start();
include '../../../dashboard/functions_1.php';
include '../../../../funcoes/db.php';
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
        <div class="col">
          <img src="<?php echo "../../../" . $userdata['foto_3']; ?>" alt="<?php echo $userdata['nome']; ?>" class="img-thumbnail" style="
          postion: absolute;
          height: 432px;
          width: 432px;
          ">
        </div>
        <div class="col">
          <h1 style="margin-left:200px; postion:absolute;">Nivel 3</h1>
          <h3><?php echo $userdata['desc_3']; ?></h3>
          
        </div>
        <div style="margin-top: 65px;" class="col">
            <h4>Dano em Fogo:</h4>
            <p><?php echo $userdata['v_3_1']?></p>
            <h4>Dano em Ar:</h4>
            <p><?php echo $userdata['v_3_2']?></p>
            <h4>Dano em Agua:</h4>
            <p><?php echo $userdata['v_3_3']?></p>
            <h4>Dano em Terra:</h4>
            <p><?php echo $userdata['v_3_4']?></p>
          </div>
        <div class="text-white">
          <p>Valor Upgrade:</p>
            <h3><?php echo $userdata['preco_3']; ?></h3>
            <p>Critico:</p>
            <h3 style="margin_bottom:100px;"><?php if($userdata['critico'] == "1"){
                  echo "Fogo";
              }else if($userdata['critico'] == "2"){
                  echo "Ar";
              }else if($userdata['critico'] == "3"){
                  echo "Agua";
              }else{
                  echo "Terra";
              }?></h3>
        </div>
        <?php
        echo"
        <a class='btn btn-sm btn-danger' style='
        margin-top:640px;
        margin-left: 227px; 
        width: 80px;
        position: absolute;' href='../../dashboard_hab.php'>
        Sair
        </a>
        <br>
        ";
        echo"
          <a class='btn btn-sm btn-warning' style='
          margin-top:640px; 
          width: 120px;
          height: 29px;
          margin-left: 312px;
          position: absolute;' href='../view.php?id=$id'>
          Geral
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-right-circle' viewBox='0 0 16 16'>
          <path fill-rule='evenodd' d='M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z'/>
          </svg>
          </a>
          <br>
        ";
        echo"
          <a class='btn btn-sm btn-primary' style='
          margin-top:600px; 
          width: 360px;
          margin-left: 560px;
          position: absolute;' href='../edit/atk/level3.php?id=$id'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
          <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
          <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
          </svg>
          Editar
          </a>
          <br>
        ";
        echo"
          <a class='btn btn-sm btn-warning' style='
          margin-top:640px; 
          width: 120px;
          margin-left: 435px;
          position: absolute;' href='level1.php?id=$id'>
          Nivel 1
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-right-circle' viewBox='0 0 16 16'>
          <path fill-rule='evenodd' d='M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z'/>
          </svg>
          </a>
        ";
        echo"
          <a class='btn btn-sm btn-warning' style='
          margin-top:640px; 
          width: 120px;
          margin-left: 558px;
          position: absolute;' href='level2.php?id=$id'>
          Nivel 2
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-right-circle' viewBox='0 0 16 16'>
          <path fill-rule='evenodd' d='M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z'/>
          </svg>
          </a>
        ";
        echo"
          <a class='btn btn-sm btn-light' style='
          margin-top:640px; 
          width: 120px;
          margin-left: 681px;
          position: absolute;' href=''>
          Nivel 3
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-right-circle' viewBox='0 0 16 16'>
          <path fill-rule='evenodd' d='M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z'/>
          </svg>
          </a>
        ";
        echo"
          <a class='btn btn-sm btn-warning' style='
          margin-top:640px; 
          width: 120px;
          margin-left: 803px;
          position: absolute;' href='level4.php?id=$id'>
          Nivel 4
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-right-circle' viewBox='0 0 16 16'>
          <path fill-rule='evenodd' d='M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z'/>
          </svg>
          </a>
        ";
        echo"
          <a class='btn btn-sm btn-warning' style='
          margin-top:640px; 
          width: 120px;
          margin-left: 925px;
          position: absolute;' href='level5.php?id=$id'>
          Nivel 5
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-right-circle' viewBox='0 0 16 16'>
          <path fill-rule='evenodd' d='M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z'/>
          </svg>
          </a>
        ";
        
        ?>
      <?php endwhile; ?>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>