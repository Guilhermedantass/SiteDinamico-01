<div class="box-content">
    <h2><i class="fa fa-pen"></i> Adicionar Depoimentos</h2>




    <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($_POST['acao'])) {
            if (Painel::insert($_POST)) {
                Painel::alert('sucesso', 'O cadastro do depoimento feito com sucesso!');
            } else {
                Painel::alert('erro', 'Não é permitido campos vazios!');
            }

            // echo Painel::insert($_POST);
        }



        ?>
        <div class="form-group">
            <label for="">Nome da pessoa: </label>
            <input type="text" name="nome" value="">
        </div>
        <div class="form-group">
            <label for="">depoimento: </label>
            <textarea name="depoimento" value=""></textarea>
        </div>


        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site.dopoimentos">
            <input type="submit" value="Cadastrar" name="acao">
        </div>
    </form>

</div>

<?php ?>