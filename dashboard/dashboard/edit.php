<?php
    if(!empty($_GET['id'])){
        include "db_dash.php";

        $id = $_GET['id'];

        $result = $db->query("SELECT * FROM usuarios WHERE ID=$id");

        while($userdata = mysqli_fetch_assoc($result)){
            $usuario = $userdata['username'];
            $senha = $userdata['password'];
            $poder = $userdata['poder'];
            $classe = $userdata['classe'];
            $xp = $userdata['xp'];
            $admin = $userdata['admin'];
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style_edit.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <form action="saveEdit.php" method="POST">
                <h2>Editar Login</h2>
                
                <?php
                    if($admin == "0"){
                        echo "
                        <label for='admintype'>Admin Mode: </label>
                        <INPUT TYPE='RADIO' NAME='OPCAO' VALUE='1' style='width: 10px; height: 10px; margin-left: 10px;'> Sim
                        <INPUT TYPE='RADIO' NAME='OPCAO' VALUE='0' style='width: 10px; height: 10px; margin-left: 10px;' checked> Nao
                        ";
                    }else{
                        echo "
                        <label for='admintype'>Admin Mode: </label>
                        <INPUT TYPE='RADIO' NAME='OPCAO' VALUE='1' style='width: 10px; height: 10px;' checked> Sim
                        <INPUT TYPE='RADIO' NAME='OPCAO' VALUE='0' style='width: 10px; height: 10px;'> Nao";
                    }
                ?>

                <label for="id">Id:</label>
                <input type="text" id="id" name="id" placeholder="ID" value="<?php echo $id ?>" required style="height=10px;">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" placeholder="Insira novo usuario" value="<?php echo $usuario ?>" required>
                <br>
                <label for="password">Senha:</label>
                <input type="text" id="password" name="password" placeholder="Insira nova senha" value="<?php echo $senha ?>" required>
                <br>
                <label for="poder">Poder:</label>
                <input type="text" id="poder" name="poder" placeholder="Insira poder" value="<?php echo $poder ?>" required>
                <br>
                <label for="xp">XP:</label>
                <input type="text" id="xp" name="xp" placeholder="Insira novo xp" value="<?php echo $xp ?>" required>
                <br>
                <label for="classe">Classe:</label>
                <input type="text" id="classe" name="classe" placeholder="Insira nova classe" value="<?php echo $classe ?>" required>
                <br>
                <button type="submit" name="submit" style="margin-top: 10px">Editar</button>
                <br>
            </form>
        </div>
    </div>
</body>
</html>