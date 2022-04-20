<?php
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = (int)$_GET['id'];
    $depoimento = Painel::select('tb_site.dopoimentos', 'id=?', array($id));
} else {
    Painel::alert('erro', 'Você precisa passar o parametro ID.');
    die();
}

?>
<div class="box-content">
    <h2><i class="fa fa-pen"></i> Editar Depoimento</h2>




    <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($_POST['acao'])) {
            if (Painel::update($_POST)) {
                Painel::alert('sucesso', 'O depoimento foi editado com sucesso!');
                $depoimento = Painel::select('tb_site.dopoimentos', 'id=?', array($id));
            } else {
                Painel::alert('erro', 'Campos vazios não são permitidos!');
            }
        }



        ?>
        <div class="form-group">
            <label for="">Nome da pessoa: </label>
            <input type="text" name="nome" value="<?php echo $depoimento['nome']; ?>">
        </div>
        <div class="form-group">
            <label for="">depoimento: </label>
            <textarea name="depoimento" value=""><?php echo $depoimento['depoimento']; ?></textarea>
        </div>


        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nome_tabela" value="tb_site.dopoimentos">
            <input type="submit" value="Atualizar" name="acao">
        </div>
    </form>

</div>

<?php ?>