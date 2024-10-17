<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);

$sql_relatorios = "SELECT r.id, u.nome, c.titulo, r.data_compra, r.valor FROM relatorio r, usuarios u, cursos c WHERE u.id = r.id_usuario AND c.id = r.id_curso";
$sql_query = $mysqli->query($sql_relatorios) or die($mysqli->error);
$num_relatorios = $sql_query->num_rows;

?>
<main class="content">
    <div class="card">
        <div class="card-header">
            <h3>Relatórios</h3>
            <p class="mb-0">Visualize os gastos do usuário dentro do sistema</p>
        </div>
        <div class="card-body mt-4">
            <div class="table-responsive">
            <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuário</th>
                                    <th>Curso</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($num_relatorios == 0) { ?>
                                <tr>
                                    <td colspan="5">Nenhum relatório foi encontrado</td>
                                </tr>
                                <?php } else {
                                    
                                    while ($relatorio = $sql_query->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $relatorio['id']; ?></th>
                                            <td><?php echo $relatorio['nome']; ?></td>
                                            <td><?php echo $relatorio['titulo']; ?></td>
                                            <td><?php echo date("d/m/Y H:i", strtotime($relatorio['data_compra'])); ?></td>
                                            <td>R$ <?php echo number_format($relatorio['valor'], 2, ',', '.'); ?></td>
                                        </tr>
                                        <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
        </div>        
    </div>
</main>

