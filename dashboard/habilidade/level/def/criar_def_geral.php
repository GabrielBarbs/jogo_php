<?php

session_start();

include '../../../dashboard/functions_1.php';
include '../../../../funcoes/db.php';

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
<body class="bg-dark bg-gradient text-white"  style="height:862px;">
    <div class="container mt-5">
        <h2 class="mb-4">Criar Habilidade</h2>
        <form action="criar_def_geral_Src.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label" >Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite nome"  required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Figurinha</label>
                <input type="file" class="form-control" name="photo_fig">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" class="form-control input-large" id="description" name="description" rows="4" placeholder="Digite a descrição" required>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Valor</label>
                <input type="number" step="1" class="form-control" id="value" name="value" placeholder="Digite o valor" required>
            </div>
            <div class="mb-3">
                <label for="nivel_ref" class="form-label">Nível Referente</label>
                <select class="form-select" id="nivel_ref" name="nivel_ref" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="classe" class="form-label">Bençao</label>
                <select class="form-select" id="classe" name="classe" required>
                    <option value="Fogo">Fogo</option>
                    <option value="Ar">Ar</option>
                    <option value="Agua">Água</option>
                    <option value="Terra">Terra</option>
                </select>
            </div>
            <div class="d-absolute mb-3">
                <a href="sair.php" class="btn btn-danger me-5">Sair</a>
            </div>
            <button style="margin-left: 60vh;width: 200px;"type="submit" class="btn btn-primary">Proximo (level 1)</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>