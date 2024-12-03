<?php

    session_start();

    include '../../../../dashboard/functions_1.php';
    include '../../../../../funcoes/db.php';

    $usuario = $_SESSION['usuario'];
    $senha = $_SESSION['senha'];

    dashboard($usuario, $senha);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Edição</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .text-danger:hover {
            cursor: pointer;
        }
        .icon-large {
            font-size: 2rem; /* Define o dobro do tamanho padrão */
        }
    </style>
</head>
<body class="bg-dark bg-gradient text-white" style="height:862px;">
    <div class="container mt-5">
    <div class="d-flex align-items-center mb-4">
            <h2 class="me-2">Nível 3</h2>
            <i class="bi bi-exclamation-circle-fill text-danger icon-large" 
               data-bs-toggle="tooltip" 
               data-bs-placement="right" 
               title="Utilizar a escala em porcentagem 0%-100%">
            </i>
        </div>
        <form action="criar_def_3_src.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" class="form-control input-large" id="desc_3" name="desc_3" rows="4" placeholder="Digite a nova descrição" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Valor Upgarde</label>
                <input type="number" step="1" class="form-control input-large" id="value" name="value" rows="4" placeholder="Digite o valor do upgrade" required>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Defesa em Fogo</label>
                <input type="number" step="1" class="form-control" id="v_3_1" name="v_3_1" placeholder="Digite a defesa" required>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Defesa em Ar</label>
                <input type="number" step="1" class="form-control" id="v_3_2" name="v_3_2" placeholder="Digite a defesa" required>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Defesa em Agua</label>
                <input type="number" step="1" class="form-control" id="v_3_3" name="v_3_3" placeholder="Digite a defesa" required>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Defesa em Terra</label>
                <input type="number" step="1" class="form-control" id="v_3_4" name="v_3_4" placeholder="Digite a defesa" required>
            </div>
            <div class="d-absolute mb-3">
                <a href="../../sair.php" class="btn btn-danger me-5">Sair</a>
            </div>
            <button style="margin-left: 60vh;width: 200px;"type="submit" class="btn btn-primary">Proximo (level 4)</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Ativando tooltips
    document.addEventListener('DOMContentLoaded', function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
</body>
</html>