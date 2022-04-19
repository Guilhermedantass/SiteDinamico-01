<?php

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 3;

$depoimentos = Painel::selectAll('tb_site.dopoimentos', ($paginaAtual - 1) * $porPagina, $porPagina);


?>


<div class="box-content">
    <h2><i class="fa-solid fa-rectangle-list"></i> Lista de Depoimentos</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td>Nome</td>
                <td>Depoimento</td>
                <td>Editar</td>
                <td>Deletar</td>
            </tr>

            <?php
            foreach ($depoimentos as $key => $value) {
                # code..
            ?>
            <tr>
                <td><?php echo $value['nome']; ?></td>
                <td><?php echo $value['depoimento']; ?></td>
                <td><a href="" class="btn"><i class="fa fa-pencil"></i> Editar</a></td>
                <td><a href="" class="btn"><i class="fa-solid fa-trash"></i> Excluir</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="paginacao">
        <?php
        $totalPagina = ceil(count(Painel::selectAll('tb_site.dopoimentos')) / $porPagina);

        for ($i = 1; $i < $totalPagina + 1; $i++) {
            if ($i == $paginaAtual) {
                echo '<a class="pag-selected" href="' . INCLUDE_PATH_PAINEL . 'listar-depoimentos?pagina=' . $i . '">' . $i . '</a>';
            } else {
                echo '<a href="' . INCLUDE_PATH_PAINEL . 'listar-depoimentos?pagina=' . $i . '">' . $i  . '</a>';
            }
        }
        ?>
    </div>
</div>