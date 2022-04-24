<div class="box-content">
    <h2><i class="fa fa-pen"></i> Cadastrar Notícia</h2>




    <form action="" method="POST" enctype="multipart/form-data">
        <?php

        if (isset($_POST['acao'])) {
            $categoria_id = $_POST['categoria_id'];
            $titulo = $_POST['titulo'];
            $conteudo = $_POST['conteudo'];
            $capa = $_FILES['capa'];

            if ($titulo == '' || $conteudo == '') {
                Painel::alert('erro', 'Campos vazios não são permitidos!');
                $erro = true;
            } elseif ($capa['tmp_name'] == '') {
                Painel::alert('erro', 'Adicione uma capa!');
                $erro = true;
            } else {
                if (Painel::imagemValida($capa)) {
                    $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo = ?");
                    $verificar->execute(array($titulo));
                    if ($verificar->rowCount() == 0) {
                        $imagem = Painel::uploadFile($capa);
                        $slug = Painel::generateSlug($titulo);
                        $arr = [
                            'categoria_id' => $categoria_id, 'titulo' => $titulo, 'conteudo' => $conteudo, 'capa' => $imagem, 'slug' => $slug,
                            'order_id' => 0,
                            'nome_tabela' => 'tb_site.noticias'
                        ];
                        if (Painel::insert($arr)) {
                            Painel::alert('sucesso', 'O cadastro da noticia foi feito com sucesso!');
                            $erro = false;
                        } else {
                            Painel::alert('erro', 'Erro ao cadastrar a notícia!');
                            $erro = true;
                        }
                    } else {
                        Painel::alert('erro', 'Já existe uma noticia com esse titulo!');
                        $erro = true;
                    }
                } else {
                    Painel::alert('erro', 'Selecione uma imagem valida!');
                    $erro = true;
                }
            }
        }

        ?>

        <div class="form-group">
            <label for="">Categoria</label>
            <select name="categoria_id" id="">
                <?php
                $categorias = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` ORDER BY order_id");
                $categorias->execute();
                foreach ($categorias as $key => $value) {
                    # code...

                ?>

                <option <?php if ($erro) {
                                if ($value['id'] == @$_POST['categoria_id']) echo 'selected';
                            } ?> value="<?php echo $value['id']; ?>"><?php echo $value['nome'] ?></option>

                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Título: </label>
            <input type="text" name="titulo" value="<?php if ($erro) recoverPost('titulo'); ?>">
        </div>

        <div class="form-group">
            <label for="">Conteúdo</label>
            <textarea class="tinymce" name="conteudo" id="" cols="30"
                rows="10"><?php if ($erro) recoverPost('conteudo'); ?></textarea>
        </div>

        <div class="form-group">
            <label for="">Imagem: </label>
            <input type="file" name="capa">
        </div>
        <div class="form-group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="nome_tabela" value="tb_site.noticias">
            <input type="submit" value="Cadastrar" name="acao">
        </div>
    </form>

</div>

<?php ?>