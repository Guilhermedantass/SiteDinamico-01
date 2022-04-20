<?php

if (isset($_GET['excluir'])) {
    $idExluir = (int)$_GET['excluir'];
    Painel::deletar('tb_mensagem', $idExluir);
    Painel::redirect(INCLUDE_PATH_PAINEL . 'listar-mensagens');
}
if (isset($_GET['order'])) {
    Painel::orderItem('tb_mensagem', $_GET['order'], $_GET['id']);
}
if (isset($_GET['lida'])) {
    $sql = MySql::conectar()->prepare("UPDATE `tb_mensagem` SET lida=? WHERE id=?");
    $sql->execute(array(1, $_GET['id']));
    Painel::redirect(INCLUDE_PATH_PAINEL . 'listar-mensagens');
}



?>


<div class="box-content">
    <h2><i class="fa-solid fa-message"></i> Lista de mensagens não lidas</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td>Nome</td>
                <td>Email</td>
                <td>Assunto</td>
                <td>Mensagem</td>
                <td>Marca como lida</td>
                <td>Deletar</td>

            </tr>

            <?php
            $mensagens = Painel::selectQuery('tb_mensagem', 'lida=0 ORDER BY order_id');
            foreach ($mensagens as $key => $value) {
                # code..
            ?>
            <tr>
                <td><?php echo $value['nome']; ?>
                    <?php echo $value['sobrenome'] ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['telefone']; ?></td>
                <td><?php echo $value['mensagem']; ?></td>
                <td><a class="btn" 0
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-mensagens?lida=check&id=<?php echo $value['id']; ?>"><i
                            class="fa-solid fa-check"></i></a></td>

                <td><a actionBtn="delete"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-mensagens?excluir=<?php echo $value['id']  ?>"
                        class="btn"><i class="fa-solid fa-trash"></i> Excluir</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>

<div class="box-content">
    <h2><i class="fa-solid fa-message"></i> Lista de mensagens lidas</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td>Nome</td>
                <td>Email</td>
                <td>Assunto</td>
                <td>Mensagem</td>

                <td>Deletar</td>

            </tr>

            <?php
            $mensagensLidas = Painel::selectQuery('tb_mensagem', 'lida=1 ORDER BY order_id');

            foreach ($mensagensLidas as $key => $value) {
                # code..
            ?>
            <tr>
                <td><?php echo $value['nome']; ?>
                    <?php echo $value['sobrenome'] ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['telefone']; ?></td>
                <td><?php echo $value['mensagem']; ?></td>
                <td><a actionBtn="delete"
                        href="<?php echo INCLUDE_PATH_PAINEL ?>listar-mensagens?excluir=<?php echo $value['id']  ?>"
                        class="btn"><i class="fa-solid fa-trash"></i> Excluir</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>