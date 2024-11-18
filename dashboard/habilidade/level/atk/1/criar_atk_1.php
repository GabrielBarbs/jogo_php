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
</head>
<body class="bg-dark bg-gradient text-white" style="height:862px;">
    <div class="container mt-5">
        <h2 class="mb-4">Nivel 1</h2>
        <form action="criar_atk_1_src.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" class="form-control input-large" id="desc_1" name="desc_1" rows="4" placeholder="Digite a nova descrição" required>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Dano em Fogo</label>
                <input type="number" step="1" class="form-control" id="v_1_1" name="v_1_1" placeholder="Digite o dano" required>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Dano em Ar</label>
                <input type="number" step="1" class="form-control" id="v_1_2" name="v_1_2" placeholder="Digite o dano" required>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Dano em Agua</label>
                <input type="number" step="1" class="form-control" id="v_1_3" name="v_1_3" placeholder="Digite o dano" required>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Dano em Terra</label>
                <input type="number" step="1" class="form-control" id="v_1_4" name="v_1_4" placeholder="Digite o dano" required>
            </div>
            <div class="d-absolute mb-3">
                <a href="../../sair.php" class="btn btn-danger me-5">Sair</a>
            </div>
            <button style="margin-left: 60vh;width: 200px;"type="submit" class="btn btn-primary">Proximo (level 2)</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>