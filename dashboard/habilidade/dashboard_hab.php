<?php

session_start();

include '../dashboard/functions_1.php';
include '../../funcoes/db.php';

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

dashboard($usuario, $senha);

            if(!empty($_GET['search'])){
                $data = $_GET['search'];

                $result = $db->query("SELECT * FROM habilidade WHERE ID LIKE '%data%' or username LIKE '%data' ORDER BY ID DESC");

            }else{
                $result = $db->query('SELECT * FROM habilidade ORDER BY nivel_ref DESC');
            }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_dash.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <p>DashBoard</p>
        <a href="../dashboard.php">Inicio</a>
        <a href="dias/dash_dia.php">Dias</a>
        <!-- arrumar -->
        <a href=""></a>
        <p id="time"></p>
    </div>
    <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
</nav>

<h1>Bem vindo, 
    <?php
        echo $usuario;
    ?>!
</h1>

<button id="btn-modal">Criar Habilidade</button>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Escolha sua ação:</h2>
        <button id="btn-ataque" style="width: 100px;">Ataque</button>
        <button id="btn-defesa" style="width: 100px;">Defesa</button>
    </div>
</div>

<script src="script.js"></script>

        <!--TEM QUE JOGAR ESSA PORRA DESSE BOTAO PRO MEIO, NAO TENHO ESSA CAPACIDADE -->


<script>
    var timeDisplay = document.getElementById("time");

    function refreshTime() {
    var dateString = new Date().toLocaleString("pt-BR", {timeZone: "America/Sao_Paulo"});
    var formattedString = dateString.replace(", ", " - ");
    timeDisplay.innerHTML = formattedString;
    }

    setInterval(refreshTime, 1000);
</script>

<div class="m-5">
    <table class="table text-white table-bg">
    <thead>
        <tr>
        <th scope="col">Nivel Ref</th>
        <th scope="col">Nome</th>
        <th scope="col">Critico</th>
        <th scope="col">Atk/Def</th>
        <th scope="col">Preço</th>
        <th scope="col">...</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($userdata = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$userdata['nivel_ref']."</td>";
                echo "<td>".$userdata['nome']."</td>";
                if($userdata['critico'] == "1"){
                    echo "<td>"."Fogo"."</td>";
                }else if($userdata['critico'] == "2"){
                    echo "<td>"."Ar"."</td>";
                }else if($userdata['critico'] == "3"){
                    echo "<td>"."Agua"."</td>";
                }else if($userdata['critico'] == "4"){
                    echo "<td>"."Terra"."</td>";
                }else{
                    echo "<td>"."ND"."</td>";
                }
                // 1- fogo, 2 - ar, 3 - agua, 4 - terra
                if($userdata['atk_def'] == "1"){
                    echo "<td>"."Ataque"."</td>";
                }else{
                    echo "<td>"."Defesa"."</td>";
                }
                echo "<td>".$userdata['preco_hab']."</td>";
                echo "<td>
                <a class='btn btn-sm btn-primary' href='view/search.php?id=$userdata[ID]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-view-list' viewBox='0 0 16 16'>
                    <path d='M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2m0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2m0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14'/>
                    </svg>
                </a>
                <a class='btn btn-sm btn-danger' href='delete.php?id=$userdata[ID]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                </svg>
                </a>
                </td>";
                echo "</tr>";
            }
        ?>
    </tbody>
    </table>
</div>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event){
        if(event.key === "Enter"){
            searchdata();
        }
    });

    function searchdata(){
        window.location = 'dashboard.php?search='+search.value;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="script_2.js"></script>
</body>
</html>