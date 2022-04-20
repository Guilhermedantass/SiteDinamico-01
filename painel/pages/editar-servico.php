<?php
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = (int)$_GET['id'];
    $servicos = Painel::select('tb_site.servicos', 'id=?', array($id));
} else {
    Painel::alert('erro', 'Você precisa passar o parametro ID.');
    die();
}

?>
<div class="box-content">
    <h2><i class="fa fa-pen"></i> Editar servicos</h2>




    <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($_POST['acao'])) {
            if (Painel::update($_POST)) {
                Painel::alert('sucesso', 'O servicos foi editado com sucesso!');
                $servicos = Painel::select('tb_site.servicos', 'id=?', array($id));
            } else {
                Painel::alert('erro', 'Campos vazios não são permitid   os!');
            }
        }



        ?>
        <div class="form-group">
            <label for="">servicos: </label>
            <textarea name="servicos" value=""><?php echo $servicos['servicos']; ?></textarea>
        </div>


        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nome_tabela" value="tb_site.servicos">
            <input type="submit" value="Atualizar" name="acao">
        </div>
    </form>

</div>

<?php ?>