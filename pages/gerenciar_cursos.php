<?php
include('lib/conexao.php');
include('lib/protect.php');
protect(1);

$sql_cursos = "SELECT * FROM cursos";
$sql_query = $mysqli->query($sql_cursos) or die($mysqli->error);
$num_cursos = $sql_query->num_rows;


?>
<main class="content">
    <div class="card">
        <div class="card-header">
            <h3>Gerenciar Cursos</h3>           
                <span><a href="index.php?p=cadastrar_curso">Clique aqui</a> para cadastrar um curso</span>
                <p class="mb-0 mt-0">Administre os cursos cadastrados no sistema </p>
        </div>
        
            <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Imagem</th>
                                    <th>Título</th>
                                    <th>Preço</th>
                                    <th>Gerenciar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($num_cursos == 0) { ?>
                                <tr>
                                    <td colspan="5">Nenhum curso foi cadastrado</td>
                                </tr>
                                <?php } else {
                                    
                                    while ($curso = $sql_query->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $curso['id']; ?></th>
                                            <td><img src="<?php echo $curso['imagem']; ?>" height="50" alt=""></td>
                                            <td><?php echo $curso['titulo']; ?></td>
                                            <td>R$ <?php echo number_format($curso['preco'], 2, ',', '.'); ?></td>
                                            <td><a href="index.php?p=editar_curso&id=<?php echo $curso['id']; ?>">editar</a> | <a href="index.php?p=deletar_curso&id=<?php echo $curso['id']; ?>">deletar</a></td>
                                        </tr>
                                        <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
        </div>        
    </div>
</main>