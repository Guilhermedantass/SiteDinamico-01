<div class="box-content">
    <h2><i class="fa fa-pen"></i> Cadastrar Categoria</h2>




    <form action="" method="POST" enctype="multipart/form-data">
        <?php

        if (isset($_POST['acao'])) {
            $nome = $_POST['nome'];
            if ($nome == '') {
                Painel::alert('erro', 'ERRO! O campo está vazio!');
            } else {
                //Cadastrar
                $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ?");
                $verificar->execute(array($nome));
                if ($verificar->rowCount() == 0) {
                    $slug = Painel::generateSlug($nome);
                    $arr = ['nome' => $nome, 'slug' => $slug, 'order_id' => '0', 'nome_tabela' => 'tb_site.categorias'];
                    Painel::insert($arr);
                    Painel::alert('sucesso', 'O cadastro da categoria foi feito com sucesso!');
                } else {
                    Painel::alert('erro', 'Essa categoria já existe');
                }
            }
        }
        ?>
        <div class="form-group">
            <label for="">Nome da categoria: </label>
            <input type="text" name="nome" value="">
        </div>

        <div class="form-group">
            <input type="submit" value="Cadastrar" name="acao">
        </div>
    </form>

</div>

<?php ?>