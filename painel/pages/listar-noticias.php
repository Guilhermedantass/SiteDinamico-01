<?php

if (isset($_GET['excluir'])) {
    $idExluir = (int)$_GET['excluir'];
    $selectImagem = MySql::conectar()->prepare("SELECT capa FROM `tb_site.noticias` WHERE id = ?");
    $selectImagem->execute(array($_GET['excluir']));
    $imagem = $selectImagem->fetch()['capa'];
    Painel::deleteFile($imagem);
    Painel::deletar('tb_site.noticias', $idExluir);
    Painel::redirect(INCLUDE_PATH_PAINEL . 'listar-noticias');
}
if (isset($_GET['order'])) {
    Painel::orderItem('tb_site.noticias', $_GET['order'], $_GET['id']);
}

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 5;

$noticias = Painel::selectAll('tb_site.noticias', ($paginaAtual - 1) * $porPagina, $porPagina);


?>


<div class="box-content">
    <h2><i class="fa-solid fa-rectangle-list"></i> Lista de noticias</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td>Titulo</td>
                <td>Categoria</td>
                <td>capa</td>
                <td>Editar</td>
                <td>Deletar</td>
                <td>#</td>
                <td>#</td>
            </tr>

            <?php
            foreach ($noticias as $key => $value) {
                $categoria_id = $value['categoria_id'];
                $nomeCategoria = Painel::select('tb_site.categorias', "id = ?", array($categoria_id));

            ?>
            <tr>
                <td><?php echo $value['titulo']; ?></td>
                <td><?php echo $nomeCategoria['nome']; ?></td>
                <td><img style="max-width:300px; max-height:200px;"
                        src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['capa']; ?>" alt=""></td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-noticia?id=<?php echo $value['id']  ?>"
                        class="btn"><i class="fa fa-pencil"></i> Editar</a></td>
                <td><a actionBtn="delete"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-noticias?excluir=<?php echo $value['id']  ?>"
                        class="btn"><i class="fa-solid fa-trash"></i> Excluir</a>
                </td>
                <td><a class="btn order"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-noticias?order=up&id=<?php echo $value['id']; ?>"><i
                            class="fa-solid fa-chevron-up"></i></a></td>
                <td><a class="btn order"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-noticias?order=down&id=<?php echo $value['id']; ?>"><i
                            class="fa-solid fa-chevron-down"></i></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="paginacao">
        <?php
        $totalPagina = ceil(count(Painel::selectAll('tb_site.noticias')) / $porPagina);

        for ($i = 1; $i < $totalPagina + 1; $i++) {
            if ($i == $paginaAtual) {
                echo '<a class="pag-selected" href="' . INCLUDE_PATH_PAINEL . 'listar-noticias?pagina=' . $i . '">' . $i . '</a>';
            } else {
                echo '<a href="' . INCLUDE_PATH_PAINEL . 'listar-noticias?pagina=' . $i . '">' . $i  . '</a>';
            }
        }
        ?>
    </div>
</div>