<?php
    if(!empty($_GET['id'])){
        include '../dashboard/db_dash.php';

        $id = $_GET['id'];

        $result = $db->query("DELETE FROM habilidade WHERE ID=$id");
    }

    header('Location: dashboard_hab.php');


    ## precisa arrumar, caso nao exista ID e precisa colocar uma confirmçao de exclusao
?>