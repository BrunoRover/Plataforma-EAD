<?php

protect(0);

if(!isset($_SESSION))
    session_start();

$id_usuario = $_SESSION['usuario'];
$cursos_query = $mysqli->query("SELECT * FROM cursos WHERE id IN (SELECT id_curso FROM relatorio WHERE id_usuario = '$id_usuario')") or die($mysqli->error);

?>

<main class="content">
    
        <div class="card">
            <div class="card-header">
                <h3>Meus Cursos</h3>
                <p class="mb-0">Estes são os cursos que você já possui</p>
            </div>
            <div class="card-body">
            <?php while($curso = $cursos_query->fetch_assoc()) { ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo $curso['titulo']; ?></h5>
                </div>
                <div class="card-block">
                    <img src="<?php echo $curso['imagem']; ?>" class="img-fluid mb-3" alt="">
                    <p>
                    <?php echo $curso['descricao_curta']; ?>
                    </p>
                    <form action="index.php">
                        <input type="hidden" name="p" value="acessar">
                        <input type="hidden" name="id" value="<?php echo $curso['id']; ?>">
                        <button type="submit" class="btn form-control btn-out-dashed btn-primary btn-square">Acessar</button> 
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
            </div>
        </div> 
</main>
