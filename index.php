<?php
    include_once("templetes/topo.php");
    include_once("templetes/menu.php");

    if (empty($_SERVER['QUERY_STRING'])) {
    $var = "conteudos/principal";
    include_once("$var.php");
    } else {
    $pg = $_GET['pg'];
    include_once("conteudos/$pg.php");
    }

    include_once("templetes/rodape.php");
?>