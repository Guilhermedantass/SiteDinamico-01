<?php

if (isset($_GET['excluir'])) {
    $idExluir = (int)$_GET['excluir'];
    Painel::deletar('tb_site.categorias', $idExluir);
    $noticias = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE categoria_id = ?");
    $noticias->execute(array($idExluir));
    foreach ($noticias as $key => $value) {
        $imgDelete = $value['capa'];
        Painel::deleteFile($imgDelete);
    }
    $noticias = MySql::conectar()->prepare("DELETE FROM `tb_site.noticias` WHERE categoria_id = ?");
    $noticias->execute(array($idExluir));

    Painel::redirect(INCLUDE_PATH_PAINEL . 'listar-categorias');
}
if (isset($_GET['order'])) {
    Painel::orderItem('tb_site.categorias', $_GET['order'], $_GET['id']);
}

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 5;

$categorias = Painel::selectAll('tb_site.categorias', ($paginaAtual - 1) * $porPagina, $porPagina);


?>


<div class="box-content">
    <h2><i class="fa-solid fa-rectangle-list"></i> Lista de categorias</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td>Nome</td>
                <td>Editar</td>
                <td>Deletar</td>
                <td>#</td>
                <td>#</td>
            </tr>

            <?php
            foreach ($categorias as $key => $value) {
                # code..
            ?>
            <tr>
                <td><?php echo $value['nome']; ?></td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-categoria?id=<?php echo $value['id']  ?>"
                        class="btn"><i class="fa fa-pencil"></i> Editar</a></td>
                <td><a actionBtn="delete"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-categorias?excluir=<?php echo $value['id']  ?>"
                        class="btn"><i class="fa-solid fa-trash"></i> Excluir</a>
                </td>
                <td><a class="btn order"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-categorias?order=up&id=<?php echo $value['id']; ?>"><i
                            class="fa-solid fa-chevron-up"></i></a></td>
                <td><a class="btn order"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-categorias?order=down&id=<?php echo $value['id']; ?>"><i
                            class="fa-solid fa-chevron-down"></i></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="paginacao">
        <?php
        $totalPagina = ceil(count(Painel::selectAll('tb_site.categorias')) / $porPagina);

        for ($i = 1; $i < $totalPagina + 1; $i++) {
            if ($i == $paginaAtual) {
                echo '<a class="pag-selected" href="' . INCLUDE_PATH_PAINEL . 'listar-categorias?pagina=' . $i . '">' . $i . '</a>';
            } else {
                echo '<a href="' . INCLUDE_PATH_PAINEL . 'listar-categorias?pagina=' . $i . '">' . $i  . '</a>';
            }
        }
        ?>
    </div>
</div>