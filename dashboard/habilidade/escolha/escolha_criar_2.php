<?php
session_start();
include '../../dashboard/functions_1.php';
include '../../../funcoes/db.php';
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
dashboard($usuario, $senha);

if(isset($_POST['acao'])) {
    $acao = $_POST['acao'];

    if ($acao === 'Ataque') {
        header("Location: ../level/atk/criar_atk_geral.php");
    } else if ($acao === 'Defesa') {
        header("Location: ../level/def/criar_def_geral.php");
    }
} else {
    header("Location: ../../../error_404.html");
}
?>