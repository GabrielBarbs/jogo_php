<?php

function checa_usuario_existe($db, $usuario) {
        $stmt = mysqli_prepare($db, "SELECT * FROM usuarios WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return mysqli_num_rows($result) > 0;
    }

?>