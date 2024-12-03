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
</head>
<body class="bg-dark bg-gradient text-white" style="height: 862px;">
<?php while ($userdata = mysqli_fetch_assoc($result)) : ?>
    <div class="container mt-5">
        <h2 class="mb-4">Tela de Edição / Geral</h2>
        <form action="salvar/geral.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" value="<?php echo $userdata['desc_geral'];?>" class="form-control input-large" id="description" name="description" rows="4" placeholder="Digite a nova descrição" required>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Valor</label>
                <input type="number" step="1" class="form-control" id="value" name="value" placeholder="Digite o valor" value="<?php echo $userdata['preco_hab'];?>" required>
            </div>
            <div class="mb-3">
                <label for="nivel_ref" class="form-label">Nível Referente</label>
                <select class="form-select" id="nivel_ref" name="nivel_ref" required>
                    <option value="1" <?php echo ($userdata['nivel_ref'] == '1') ? 'selected' : '' ?>>1</option>
                    <option value="2" <?php echo ($userdata['nivel_ref'] == '2') ? 'selected' : '' ?>>2</option>
                    <option value="3" <?php echo ($userdata['nivel_ref'] == '3') ? 'selected' : '' ?>>3</option>
                    <option value="4" <?php echo ($userdata['nivel_ref'] == '4') ? 'selected' : '' ?>>4</option>
                    <option value="5" <?php echo ($userdata['nivel_ref'] == '5') ? 'selected' : '' ?>>5</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="classe" class="form-label">Crítico</label>
                <select class="form-select" id="classe" name="classe" required>
                    <option value="Fogo" <?php echo ($userdata['critico'] == '1') ? 'selected' : '' ?>>Fogo</option>
                    <option value="Ar" <?php echo ($userdata['critico'] == '2') ? 'selected' : '' ?>>Ar</option>
                    <option value="Agua" <?php echo ($userdata['critico'] == '3') ? 'selected' : '' ?>>Água</option>
                    <option value="Terra" <?php echo ($userdata['critico'] == '4') ? 'selected' : '' ?>>Terra</option>
                </select>
            </div>
            <button type="submit" style="margin-left: 60vh;width: 200px;" class="btn btn-primary">Salvar</button>
        </form>
    </div>

<?php endwhile; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>