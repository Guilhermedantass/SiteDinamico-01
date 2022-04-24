<?php
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = (int)$_GET['id'];
    $noticia = Painel::select('tb_site.noticias', 'id=?', array($id));
} else {
    Painel::alert('erro', 'Você precisa passar o parametro ID.');
    die();
}

?>

<div class="box-content">
    <h2><i class="fa fa-pen"></i> Editar noticia</h2>




    <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($_POST['acao'])) {


            $titulo = $_POST['titulo'];
            $conteudo = $_POST['conteudo'];
            $capa = $_FILES['capa'];
            $capa_atual = $_POST['capa_atual'];

            $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo = ? AND id != ?");
            $verificar->execute(array($_POST['titulo'], $id));
            if ($verificar->rowCount() == 0) {

                if ($capa['name'] != '') {
                    if (Painel::imagemValida($capa)) {
                        Painel::deleteFile($capa_atual);
                        $capa = Painel::uploadFile($capa);
                        $slug = Painel::generateSlug($titulo);
                        $arr = ['titulo' => $titulo, 'conteudo' => $conteudo, 'capa' => $capa, 'slug' => $slug, 'id' => $id, 'categoria_id' => $_POST['categoria_id'], 'nome_tabela' => 'tb_site.noticias'];
                        Painel::update($arr);
                        $noticia = Painel::select('tb_site.noticias', 'id=?', array($id));
                        Painel::alert('sucesso', 'Atualizado com sucesso junto com a capa ');
                    } else {
                        Painel::alert('erro', 'O formato nao é valido');
                    }
                } else {
                    $capa = $capa_atual;
                    $slug = Painel::generateSlug($titulo);
                    $arr = ['titulo' => $titulo,  'conteudo' => $conteudo, 'capa' => $capa, 'slug' => $slug, 'categoria_id' => $_POST['categoria_id'], 'id' => $id, 'nome_tabela' => 'tb_site.noticias'];
                    Painel::update($arr);
                    $noticia = Painel::select('tb_site.noticias', 'id=?', array($id));
                    Painel::alert('sucesso', 'Atualizado com sucesso');
                }
            } else {
                Painel::alert('erro', 'Esse titulo já existe, escolha outro!');
            }
        }
        ?>
        <div class="form-group">
            <label for="">titulo: </label>
            <input type="text" name="titulo" required value="<?php echo $noticia['titulo'] ?>">
        </div>
        <div class="form-group">
            <label for="">conteudo: </label>
            <textarea class="tinymce" name="conteudo" id="" cols="30"
                rows="10"><?php echo $noticia['conteudo'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Categoria</label>
            <select name="categoria_id" id="">
                <?php
                $categorias = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` ORDER BY order_id");
                $categorias->execute();

                foreach ($categorias as $key => $value) {
                ?>

                <option <?php
                            if ($value['id'] == @$noticia['categoria_id']) echo 'selected';
                            ?> value="<?php echo $value['id']; ?>"><?php echo $value['nome'] ?></option>

                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Capa: </label>
            <input type="file" name="capa">
            <input type="hidden" name="capa_atual" value="<?php echo $noticia['capa'] ?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Atualizar" name="acao">
        </div>
    </form>

</div>