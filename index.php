<?php
include("pages/template/header.php");
include("pages/template/left.php");

include('lib/conexao.php');
include('lib/protect.php');
protect(0);

if(!isset($_SESSION))
    session_start();

$pagina = "inicial.php";
if(isset($_GET['p'])) {
    $pagina = $_GET['p'] . ".php";
}

$id_usuario = $_SESSION['usuario'];
$sql_query_admin = $mysqli->query("SELECT * FROM usuarios WHERE id = '$id_usuario'") or die($mysqli->error);
$dados_usuario = $sql_query_admin->fetch_assoc();

?>

<main class="content">
    <?php if (!isset($_GET['p']) || !$_GET['p']): ?>
        <div class="card">
            <div class="card-header">
                <h3>Bem-vindo, <?php echo $dados_usuario['nome']; ?>!</h3>
                <p class="mb-0">Seja bem-vindo à THE NEW SCHOOL</p>
            </div>
            <div class="card-body">
                <div class="d-flex m-5 justify-content-around">
                    <p>Na THE NEW SCHOOL, ensinamos vários cursos muito interessantes para você de forma acessível, prática e simples.</p>
                </div>
                
            </div>
        </div>
    <?php endif; ?>

    <?php 
    if (file_exists('pages/' . $pagina)) {
        include('pages/' . $pagina); 
    } else {
        echo "<p>Página não encontrada.</p>";
    }
    ?>
</main>