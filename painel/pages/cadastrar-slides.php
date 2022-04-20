<div class="box-content">
    <h2><i class="fa fa-pen"></i> Cadastrar Slides</h2>




    <form action="" method="POST" enctype="multipart/form-data">
        <?php

        if (isset($_POST['acao'])) {
            $nome = $_POST['nome'];
            $imagem = $_FILES['imagem'];


            if ($nome == '') {
                Painel::alert('erro', 'ERRO! O nome está vazio!');
            } else {
                if (Painel::imagemValida($imagem) == false && $imagem['name'] != '') {
                    Painel::alert('erro', 'ERRO! Formato de imagem não aceito!');
                } else {
                    //Cadastrar
                    //include('../classes/lib/WideImage.php');
                    $imagem = Painel::uploadFile($imagem);
                    //WideImage::load('uploads/' . $imagem)->resize(100)->saveToFile('uploads/' . $imagem);
                    $arr = ['nome' => $nome, 'slide' => $imagem, 'order_id' => '0', 'nome_tabela' => 'tb_site.slides'];
                    Painel::insert($arr);
                    Painel::alert('sucesso', 'O cadastro do slide feito com sucesso!');
                }
            }
        }
        ?>
        <div class="form-group">
            <label for="">Nome do Slide: </label>
            <input type="text" name="nome" value="">
        </div>
        <div class="form-group">
            <label for="">Imagem: </label>
            <input type="file" name="imagem">
        </div>
        <div class="form-group">
            <input type="submit" value="Cadastrar" name="acao">
        </div>
    </form>

</div>

<?php ?>