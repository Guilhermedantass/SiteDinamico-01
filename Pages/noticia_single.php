<?php
$url = explode('/', $_GET['url']);
$verifica_categoria = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
$verifica_categoria->execute(array($url[1]));
if ($verifica_categoria->rowCount() == 0) {
    Painel::redirect(INCLUDE_PATH . 'noticias');
}
$categoriaInfo = $verifica_categoria->fetch();
$post = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ? AND categoria_id = ?");
$post->execute(array($url[2], $categoriaInfo['id']));
if ($post->rowCount() == 0) {
    Painel::redirect(INCLUDE_PATH . 'noticias');
}
$post = $post->fetch();



?>


<section class="noticia-single">
    <div class="center">
        <header>
            <h1><?php echo $post['titulo']; ?></h1>
            <h2><i class="fa fa-calendar"></i> <?php echo $post['data']; ?></h2>
            <br>
            <h3><?php echo $post['subtitulo']; ?></h3>
            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $post['capa'] ?>" alt="">
        </header>

        <article>
            <?php echo $post['conteudo']; ?>


        </article>
    </div>
</section>