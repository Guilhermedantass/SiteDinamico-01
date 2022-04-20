<?php

if (isset($_GET['excluir'])) {
    $idExluir = (int)$_GET['excluir'];
    Painel::deletar('tb_site.servicos', $idExluir);
    Painel::redirect(INCLUDE_PATH_PAINEL . 'listar-servicos');
}
if (isset($_GET['order'])) {
    Painel::orderItem('tb_site.servicos', $_GET['order'], $_GET['id']);
}

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 10;

$servicos = Painel::selectAll('tb_site.servicos', ($paginaAtual - 1) * $porPagina, $porPagina);


?>


<div class="box-content">
    <h2><i class="fa-solid fa-rectangle-list"></i> Lista de Servicos</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td>Serviços</td>
                <td>Editar</td>
                <td>Deletar</td>
                <td>#</td>
                <td>#</td>
            </tr>

            <?php
            foreach ($servicos as $key => $value) {
                # code..
            ?>
            <tr>
                <td><?php echo $value['servicos']; ?></td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-servico?id=<?php echo $value['id']  ?>"
                        class="btn"><i class="fa fa-pencil"></i> Editar</a></td>
                <td><a actionBtn="delete"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?excluir=<?php echo $value['id']  ?>"
                        class="btn"><i class="fa-solid fa-trash"></i> Excluir</a>
                </td>
                <td><a class="btn order"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?order=up&id=<?php echo $value['id']; ?>"><i
                            class="fa-solid fa-chevron-up"></i></a></td>
                <td><a class="btn order"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?order=down&id=<?php echo $value['id']; ?>"><i
                            class="fa-solid fa-chevron-down"></i></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="paginacao">
        <?php
        $totalPagina = ceil(count(Painel::selectAll('tb_site.servicos')) / $porPagina);

        for ($i = 1; $i < $totalPagina + 1; $i++) {
            if ($i == $paginaAtual) {
                echo '<a class="pag-selected" href="' . INCLUDE_PATH_PAINEL . 'listar-servicos?pagina=' . $i . '">' . $i . '</a>';
            } else {
                echo '<a href="' . INCLUDE_PATH_PAINEL . 'listar-servicos?pagina=' . $i . '">' . $i  . '</a>';
            }
        }
        ?>
    </div>
</div>