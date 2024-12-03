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
<body class="bg-dark bg-gradient text-white" style="height: 862px;">
<?php while ($userdata = mysqli_fetch_assoc($result)) : ?>
    <div class="container mt-5">
    <div class="d-flex align-items-center mb-4">
            <h2 class="me-2">Tela de Edição / Level 1</h2>
            <i class="bi bi-exclamation-circle-fill text-danger icon-large" 
               data-bs-toggle="tooltip" 
               data-bs-placement="right" 
               title="Utilizar a escala em porcentagem 0%-100%">
            </i>
        </div>
        <form action="salvar/level1.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" value="<?php echo $userdata['desc_1'];?>" class="form-control input-large" id="description" name="description" rows="4" placeholder="Digite a nova descrição" required>
            </div>
            <div class="mb-3">
                <label for="nivel_ref" class="form-label">Bençao em Fogo</label>
                <input type="number" step="1" value="<?php echo $userdata['v_1_1'];?>" class="form-control input-large" name="v_1_1" rows="4" placeholder="Digite a bençao em Fogo" required>
            </div>
            <div class="mb-3">
                <label for="nivel_ref" class="form-label">Bençao em Ar</label>
                <input type="number" step="1" value="<?php echo $userdata['v_1_2'];?>" class="form-control input-large" name="v_1_2" rows="4" placeholder="Digite a bençao em Ar" required>
            </div>
            <div class="mb-3">
                <label for="nivel_ref" class="form-label">Bençao em Agua</label>
                <input type="number" step="1" value="<?php echo $userdata['v_1_3'];?>" class="form-control input-large" name="v_1_3" rows="4" placeholder="Digite a bençao em Agua" required>
            </div>
            <div class="mb-3">
                <label for="nivel_ref" class="form-label">Bençao em Terra</label>
                <input type="number" step="1" value="<?php echo $userdata['v_1_4'];?>" class="form-control input-large" name="v_1_4" rows="4" placeholder="Digite a bençao em Terra" required>
            </div>
            <button type="submit" style="margin-left: 60vh;width: 200px;" class="btn btn-primary">Salvar</button>
        </form>
    </div>

<?php endwhile; ?>
<script>
    // Ativando tooltips
    document.addEventListener('DOMContentLoaded', function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>