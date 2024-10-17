<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);

$sql_usuarios = "SELECT * FROM usuarios";
$sql_query = $mysqli->query($sql_usuarios) or die($mysqli->error);
$num_usuarios = $sql_query->num_rows;

?>
<main class="content">
    <div class="card">
        <div class="card-header">
            <h3>Gerenciar Usuários</h3>
            <span><a href="index.php?p=cadastrar_usuario">Clique aqui</a> para cadastrar um usuário</span>
            <p class="mb-0">Administre os usuários cadastrados no sistema</p>
        </div>
        <div class="card-body mt-4">
            <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Créditos</th>
                                    <th>Data de Cadastro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($num_usuarios == 0) { ?>
                                <tr>
                                    <td colspan="5">Nenhum usuário foi cadastrado</td>
                                </tr>
                                <?php } else {
                                    
                                    while ($usuario = $sql_query->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $usuario['id']; ?></th>
                                            <td><?php echo $usuario['nome']; ?></td>
                                            <td><?php echo $usuario['email']; ?></td>
                                            <td>R$ <?php echo number_format($usuario['creditos'], 2, ',', '.'); ?></td>
                                            <td><a href="index.php?p=editar_usuario&id=<?php echo $usuario['id']; ?>">editar</a> | <a href="index.php?p=deletar_usuario&id=<?php echo $usuario['id']; ?>">deletar</a></td>
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
