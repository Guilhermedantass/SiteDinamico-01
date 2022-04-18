<?php
$depoimentos = Painel::selectAll('tb_site.dopoimentos');


?>


<div class="box-content">
    <h2><i class="fa-solid fa-rectangle-list"></i> Lista de Depoimentos</h2>

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