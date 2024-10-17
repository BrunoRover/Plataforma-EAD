<?php

include('lib/conexao.php');


if(!isset($_SESSION)){
    session_start();
}
$pagina = "inicial.php";
if(isset($_GET['p'])) {
    $pagina = $_GET['p'] . ".php";
}

$id_usuario = $_SESSION['usuario'];
$sql_query_admin = $mysqli->query("SELECT * FROM usuarios WHERE id = '$id_usuario'") or die($mysqli->error);
$dados_usuario = $sql_query_admin->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/template.css">
    <title>In N' Out</title>
</head>
<body>
    <header class="header" style="color: white";>
        <div class="logo">
            
            <span class="font-weight-light">The </span>
            <span class="font-weight-bold mx-2">New'</span>
            <span class="font-weight-light">School</span>
            
        </div>
        <div class="menu-toggle mx-3">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="spacer"></div>
        <?php if(!isset($_SESSION['admin']) || !$_SESSION['admin']) { ?>
        <div class="font-weight-light mr-3">R$ <?php echo $dados_usuario['creditos']; ?></div>
        <?php }?>

        <a class="mr-3" style="color: white" href="index.php?p=perfil"><?php echo $dados_usuario['nome']; ?></a>
   
    </header>
