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
        <h2 class="mb-4">Tela de Edição / Level 4</h2>
        <form action="salvar/level5.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" value="<?php echo $userdata['desc_5'];?>" class="form-control input-large" id="description" name="description" rows="4" placeholder="Digite a nova descrição" required>
            </div>
            <div class="mb-3">
                <label for="nivel_ref" class="form-label">Valor Upgrade</label>
                <input type="number" step="1" value="<?php echo $userdata['preco_5'];?>" class="form-control input-large" name="value" rows="4" placeholder="Digite o valor do upgrade" required>
            </div>
            <div class="mb-3">
                <label for="nivel_ref" class="form-label">Dano em Fogo</label>
                <input type="number" step="1" value="<?php echo $userdata['v_5_1'];?>" class="form-control input-large" name="v_5_1" rows="4" placeholder="Digite o dano em Fogo" required>
            </div>
            <div class="mb-3">
                <label for="nivel_ref" class="form-label">Dano em Ar</label>
                <input type="number" step="1" value="<?php echo $userdata['v_5_2'];?>" class="form-control input-large" name="v_5_2" rows="4" placeholder="Digite o dano em Ar" required>
            </div>
            <div class="mb-3">
                <label for="nivel_ref" class="form-label">Dano em Agua</label>
                <input type="number" step="1" value="<?php echo $userdata['v_5_3'];?>" class="form-control input-large" name="v_5_3" rows="4" placeholder="Digite o dano em Agua" required>
            </div>
            <div class="mb-3">
                <label for="nivel_ref" class="form-label">Dano em Terra</label>
                <input type="number" step="1" value="<?php echo $userdata['v_5_4'];?>" class="form-control input-large" name="v_5_4" rows="4" placeholder="Digite o dano em Terra" required>
            </div>
            <button type="submit" style="margin-left: 60vh;width: 200px;" class="btn btn-primary">Salvar</button>
        </form>
    </div>

<?php endwhile; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>