<div class="box-content">
    <h2><i class="fa fa-pen"></i> Adicionar Serviço</h2>




    <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($_POST['acao'])) {
            if (Painel::insert($_POST)) {
                Painel::alert('sucesso', 'O cadastro do serviço feito com sucesso!');
            } else {
                Painel::alert('erro', 'Não é permitido campos vazios!');
            }

            // echo Painel::insert($_POST);
        }



        ?>
        <div class="form-group">
            <label for="">Descreva o serviço: </label>
            <textarea name="servico" value=""></textarea>
        </div>


        <div class="form-group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="nome_tabela" value="tb_site.servicos">
            <input type="submit" value="Cadastrar" name="acao">
        </div>
    </form>

</div>

<?php ?>