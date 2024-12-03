<?php
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);

    header('Location: login/login_page.php');   
?>