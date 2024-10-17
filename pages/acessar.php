<?php

$id = intval($_GET['id']);

if(!isset($_SESSION))
    session_start();

$id_user = $_SESSION['usuario'];
$sql_query = $mysqli->query("SELECT * FROM cursos WHERE id = '$id' AND id IN (SELECT id_curso FROM relatorio WHERE id_usuario = '$id_user')") or die($mysqli->error);
$curso = $sql_query->fetch_assoc();

?>

<main class="content">  
        <div class="card">
            <div class="card-header">
                <h3><?php echo $curso['titulo']; ?></h3>
            </div>
            <div class="card-body text-center">
                <?php echo $curso['conteudo']; ?>          
            </div>
        </div> 
</main>
