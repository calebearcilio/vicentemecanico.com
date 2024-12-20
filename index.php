<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Timao.ico">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/account.css">
    <title>Vicente Mecânico</title>
</head>
<body>
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
</body>
</html>