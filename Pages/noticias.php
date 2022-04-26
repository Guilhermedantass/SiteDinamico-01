<?php
$url = explode('/', $_GET['url']);
if (!isset($url[2])) {

?>

<section class="header-noticias">
    <div class="center">
        <h2 id='title-noticias-conteiner'><i class="fa-regular fa-newspaper"></i> Acompanhe as ultimas notícias do
            portal
        </h2>
    </div>

</section>

<section class="conteiner-portal">
    <div class="center">
        <div class="sidebar">
            <div class="box-content-sidebar">
                <h3> Realizar uma busca: <i class="fa-solid fa-magnifying-glass"></i></h3>
                <form action="">
                    <input type="text" name="busca" placeholder="O que deseja procurar?" require>
                    <input type="submit" value="pesquisar" name="acao">

                </form>
            </div>
            <div class="box-content-sidebar">
                <h3> Selecione a categoria: <i class="fa-solid fa-bars"></i></h3>
                <form action="">
                    <select name="categoria" id="">
                        <?php
                            $categorias = Painel::selectAll('tb_site.categorias');

                            foreach ($categorias as $key => $value) {
                                # code...

                            ?>
                        <option name="<?php echo $value['id'] ?>" id=""><?php echo $value['nome'] ?></option>
                        <?php } ?>
                    </select>

                </form>
            </div>
            <div class="box-content-sidebar">
                <h3> Sobre o autor: <i class="fa-solid fa-user"></i></h3>
                <div class="autor-box-portal">
                    <div class="box-img-autor"></div>
                    <div class="texto-autor-portal text-center">
                        <h3 class="">Guilherme Dantas</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="conteudo-portal">
            <div class="header-conteudo-portal">
                <!-- <h2>Visualizando todos os posts</h2> -->
                <h2>Visualizando posts em <span>Esportes </span></h2>
            </div>
            <?php
                for ($i = 0; $i < 5; $i++) {

                ?>
            <div class="box-single-conteudo">
                <h2>19/09/2019 - Conheça os eleitos para ga...</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In est libero, convallis et ex eget,
                    vulputate
                    tincidunt ante. Pellentesque consequat leo sit amet lectus bibendum varius. Aenean quis imperdiet
                    tellus. Pellentesque vitae justo sit amet dui pulvinar laoreet eu in tortor. Sed ornare magna porta
                    dui
                    cursus placerat. Morbi a ante ut leo malesuada vehicula. Fusce faucibus eu nibh vel fringilla.
                    Suspendisse et tortor vel felis cursus sagittis et in eros. In consequat quam eu fringilla molestie.
                    <a href="<?php echo INCLUDE_PATH; ?>noticias/esportes/nome-do-post">Leia mais</a>
            </div>

            <?php } ?>

            <div class="paginator">
                <a class="active-page" href="">1</a>
                <a href="">2</a>
                <a href="">3</a>
                <a href="">4</a>
            </div>

        </div>
        <div class="clear"></div>
    </div>
</section>

<?php } else {
    include("noticia_single.php");
} ?>