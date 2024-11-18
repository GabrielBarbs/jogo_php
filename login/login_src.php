<?php

include 'db_usuarios.php';

    if (!isset($_POST['submit'])) {
        $usuario = $_POST['username'];
        $senha = $_POST['password'];

        $stmt = $db->prepare("SELECT * FROM usuarios WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $usuario, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha'] = $senha;
                header('Location: ../index.php');
        } else {
            echo "<script>
                    var search = 'false';

                    function searchdata() {
                        window.location = 'login_page.php?condition=' + search.value;
                    }
                </script>";

                echo "<script> searchdata(); </script>";
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
        }
    } else {
        header('Location: ../error_404.html');
    }

?>