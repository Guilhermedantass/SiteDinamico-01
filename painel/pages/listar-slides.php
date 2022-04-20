<?php

if (isset($_GET['excluir'])) {
    $idExluir = (int)$_GET['excluir'];
    $selectImagem = MySql::conectar()->prepare("SELECT slide FROM `tb_site.slides` WHERE id = ?");
    $selectImagem->execute(array($_GET['excluir']));
    $imagem = $selectImagem->fetch()['slide'];
    Painel::deleteFile($imagem);
    Painel::deletar('tb_site.slides', $idExluir);
    Painel::redirect(INCLUDE_PATH_PAINEL . 'listar-slides');
}
if (isset($_GET['order'])) {
    Painel::orderItem('tb_site.slides', $_GET['order'], $_GET['id']);
}

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 5;

$slides = Painel::selectAll('tb_site.slides', ($paginaAtual - 1) * $porPagina, $porPagina);


?>


<div class="box-content">
    <h2><i class="fa-solid fa-rectangle-list"></i> Lista de slides</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td>Nome</td>
                <td>slide</td>
                <td>Editar</td>
                <td>Deletar</td>
                <td>#</td>
                <td>#</td>
            </tr>

            <?php
            foreach ($slides as $key => $value) {
                # code..
            ?>
            <tr>
                <td><?php echo $value['nome']; ?></td>
                <td><img style="max-width:300px; max-height:200px;"
                        src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['slide']; ?>" alt=""></td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slide?id=<?php echo $value['id']  ?>"
                        class="btn"><i class="fa fa-pencil"></i> Editar</a></td>
                <td><a actionBtn="delete"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?excluir=<?php echo $value['id']  ?>"
                        class="btn"><i class="fa-solid fa-trash"></i> Excluir</a>
                </td>
                <td><a class="btn order"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=up&id=<?php echo $value['id']; ?>"><i
                            class="fa-solid fa-chevron-up"></i></a></td>
                <td><a class="btn order"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=down&id=<?php echo $value['id']; ?>"><i
                            class="fa-solid fa-chevron-down"></i></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="paginacao">
        <?php
        $totalPagina = ceil(count(Painel::selectAll('tb_site.slides')) / $porPagina);

        for ($i = 1; $i < $totalPagina + 1; $i++) {
            if ($i == $paginaAtual) {
                echo '<a class="pag-selected" href="' . INCLUDE_PATH_PAINEL . 'listar-slides?pagina=' . $i . '">' . $i . '</a>';
            } else {
                echo '<a href="' . INCLUDE_PATH_PAINEL . 'listar-slides?pagina=' . $i . '">' . $i  . '</a>';
            }
        }
        ?>
    </div>
</div>