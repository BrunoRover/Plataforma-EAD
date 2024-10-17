<?php

include('lib/protect.php');
protect(0);

if(!isset($_SESSION))
    session_start();

$erro = false;
if(isset($_POST['adquirir'])) {

    // verificar se o usuario possui creditos para compra-lo
    $id_user = $_SESSION['usuario'];
    $sql_query_creditos = $mysqli->query("SELECT creditos FROM usuarios WHERE id = '$id_user'") or die($mysqli->error);
    $usuario = $sql_query_creditos->fetch_assoc();

    $creditos_do_usuario = $usuario['creditos'];

    $id_curso = intval($_POST['adquirir']);
    $sql_query_curso = $mysqli->query("SELECT preco FROM cursos WHERE id = '$id_curso'") or die($mysqli->error);
    $curso = $sql_query_curso->fetch_assoc();

    $preco_do_curso = $curso['preco'];

    if($preco_do_curso > $creditos_do_usuario) {
        $erro = "Você não possui créditos para adquirir este curso.";
    } else {
        $mysqli->query("INSERT INTO relatorio (id_usuario, id_curso, valor, data_compra) VALUES(
            '$id_user',
            '$id_curso',
            '$preco_do_curso',
            NOW()
        )") or die($mysqli->error);
        $novo_credito = $creditos_do_usuario - $preco_do_curso;
        $mysqli->query("UPDATE usuarios SET creditos = '$novo_credito' WHERE id = '$id_user'") or die($mysqli->error);
        die("<script>location.href='index.php?p=meus_cursos';</script>");
    }

}


$id_usuario = $_SESSION['usuario'];
$cursos_query = $mysqli->query("SELECT * FROM cursos WHERE id NOT IN (SELECT id_curso FROM relatorio WHERE id_usuario = '$id_usuario')") or die($mysqli->error);

?>
<main class="content">
    
        <div class="card">
            <div class="card-header">
                <h3>Loja de Cursos</h3>
                <p class="mb-0">Adquira nossos cursos usando o seu crédito</p>
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
                    <form action="" method="post">
                        <button type="submit" name="adquirir" value="<?php echo $curso['id']; ?>" class="btn form-control btn-out-dashed btn-success btn-square">Adquirir por R$ <?php echo number_format($curso['preco'], 2, ',', '.'); ?></button>   
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
            </div>
        </div>
   
</main>
