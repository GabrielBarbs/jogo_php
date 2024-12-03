<?php
include '../login/db_usuarios.php';
include 'functions.php';
include '../dashboard/dashboard/functions_1.php';

if(!isset($_POST['submit'])){
    $usuario = $_POST['username'];
    $senha = $_POST['password'];
    $classe = $_POST['classe'];

    checa_usuario_existe($db, $usuario);

    if (checa_usuario_existe($db, $usuario)) {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);   
        echo "
        <script>
            var search = 'false';

            function searchdata(){
                window.location = 'register_page.php?existe='+search.value;
            }
        </script>
        ";

        echo"<script> searchdata(); </script>";
    } else {

        // 1- fogo, 2 - ar, 3 - agua, 4 - terra

        if($classe == "Fogo"){
            $classe = "1";
        }else if($classe == "Ar"){
            $classe = "2";
        }else if($classe == "Agua"){
            $classe = "3";
        }else{
            $classe = "4";
        }
        $result = mysqli_query($db, "INSERT INTO usuarios (username,password,classe,poder,xp,admin) VALUES ('$usuario', '$senha', '$classe','100','0', '0')");
        if ($result){

            $result2 = $db->query("SELECT * FROM usuarios WHERE username = '$usuario'"); 

            while ($userdata = mysqli_fetch_assoc($result2)){
                $userId = $userdata['ID'];
            }

            initializeSlots($userId);

            // tem q colocar alguma coisa falando q deu certo criar a conta!
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location: ../login/login_page.php');
        } else {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location ../error_404.html');
        }
    }
}