<?php
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = (int)$_GET['id'];
    $categorias = Painel::select('tb_site.categorias', 'id=?', array($id));
} else {
    Painel::alert('erro', 'Você precisa passar o parametro ID.');
    die();
}

?>
<div class="box-content">
    <h2><i class="fa fa-pen"></i> Editar categorias</h2>




    <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($_POST['acao'])) {
            $slug = Painel::generateSlug($_POST['nome']);
            $arr = array_merge($_POST, array('slug' => $slug));
            $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ? AND id != ?");
            $verificar->execute(array($_POST['nome'], $id));
            if ($verificar->rowCount() == 1) {
                Painel::alert('erro', 'Essa categoria já existe!');
            } else {
                if (Painel::update($arr)) {
                    Painel::alert('sucesso', 'A categorias foi editada com sucesso!');
                    $categorias = Painel::select('tb_site.categorias', 'id=?', array($id));
                } else {
                    Painel::alert('erro', 'Campos vazios não são permitidos!');
                }
            }
        }



        ?>
        <div class="form-group">
            <label for="">categorias: </label>
            <input type="text" name="nome" value="<?php echo $categorias['nome']; ?>">
        </div>


        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nome_tabela" value="tb_site.categorias">
            <input type="submit" value="Atualizar" name="acao">
        </div>
    </form>

</div>

<?php ?>