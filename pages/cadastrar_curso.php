<?php
include("views/template/header.php");
include("views/template/left.php");

include("lib/conexao.php");
include("lib/enviarArquivo.php");
include('lib/protect.php');
protect(1);

if(isset($_POST['enviar'])) {

    $titulo = $mysqli->escape_string($_POST['titulo']);
    $descricao_curta = $mysqli->escape_string($_POST['descricao_curta']);
    $preco = $mysqli->escape_string($_POST['preco']);
    $conteudo = $mysqli->escape_string($_POST['conteudo']);
    
    $erro = array();
    if(empty($titulo))
        $erro[] = "Preencha o título";
    
    if(empty($descricao_curta))
        $erro[] = "Preencha a descrição curta";

    if(empty($preco))
        $erro[] = "Preencha o preço";

    if(empty($conteudo))
        $erro[] = "Preencha o conteúdo";

    if(!isset($_FILES) || !isset($_FILES['imagem']) || $_FILES['imagem']['size'] == 0)
        $erro[] = "Selecione uma imagem para o conteúdo";

    if(count($erro) == 0) {

        $deu_certo = enviarArquivo($_FILES['imagem']['error'], $_FILES['imagem']['size'], $_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']);
        if($deu_certo !== false) {

            $sql_code = "INSERT INTO cursos (titulo, descricao_curta, conteudo, data_cadastro, preco, imagem) VALUES(
                '$titulo',
                '$descricao_curta',
                '$conteudo',
                NOW(),
                '$preco',
                '$deu_certo'
            )";
            $inserido = $mysqli->query($sql_code);
            if(!$inserido)
                $erro[] = "Falha ao inserir no banco de dados: " . $mysqli->error;
            else {
                die("<script>location.href=\"index.php?p=gerenciar_cursos\";</script>");
            }

        } else 
            $erro[] = "Falha ao enviar a imagem";

    }
}

?>

<main class="content">
    <div class="card">
        <div class="card-header">
            <h3>Cadastrar Curso</h3>           
            <p class="mb-0 mt-0">Preencha as informações e clique em Salvar</p>
            <?php if(isset($erro) && count($erro) > 0) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach($erro as $e) { echo "$e<br>"; } ?>
                </div>
                <?php
            }
            ?>
        </div>
            <div class="card-block">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Título</label>
                                    <input type="text" name="titulo" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Descrição Curta</label>
                                    <input type="text" name="descricao_curta" class="form-control">
                                </div>  
                            </div>
                            
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Imagem</label>
                                    <input type="file" name="imagem" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Preço</label>
                                    <input type="text" name="preco" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Conteúdo</label>
                                    <textarea name="conteudo" rows="6" class="form-control"></textarea>
                                </div>  
                            </div>
                            <div class="col-lg-12">
                                <a href="index.php?p=gerenciar_cursos" class="btn btn-primary btn-round"><i class="ti-arrow-left"></i> Voltar</a>
                                <button type="submit" name="enviar" value="1" class="btn btn-success btn-round float-right"><i class="ti-save"></i> Salvar</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
        </div>        
    </div>
</main>
