<?php
$url = explode('/', $_GET['url']);
if (!isset($url[2])) {

    $categoria = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
    $categoria->execute(array($url[1]));
    $categoria = $categoria->fetch();

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
                <form action="" method="POST">
                    <input type="text" name="parametro" placeholder="O que deseja procurar?" require>
                    <input type="submit" value="pesquisar" name="buscar">

                </form>
            </div>
            <div class="box-content-sidebar">
                <h3> Selecione a categoria: <i class="fa-solid fa-bars"></i></h3>
                <form action="">
                    <select name="categoria" id="">
                        <option value="" selected>Todas as categorias</option>
                        <?php
                            $categorias = Painel::selectAll('tb_site.categorias');

                            foreach ($categorias as $key => $value) {
                                # code...

                            ?>
                        <option <?php if ($value['slug'] == $url[1]) echo 'selected' ?>
                            value="<?php echo $value['slug'] ?>">
                            <?php echo $value['nome'] ?></option>
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

                <?php
                    $porPagina = 6;
                    if (!isset($_POST['parametro'])) {
                        if ($categoria['nome'] == '') {
                            # code...
                            echo '<h2>Visualizando todos os posts</h2>';
                        } else {
                            echo '<h2>Visualizando posts em <span>' . $categoria['nome'] . '</span></h2>';
                        }
                    } else {
                        echo '<h2><i class="fa fa-check"></i> Busca realizada com sucesso!</h2>';
                    }


                    $query = "SELECT * FROM `tb_site.noticias` ";

                    if ($categoria['nome'] != '') {
                        $categoria['id'] = (int)$categoria['id'];
                        $query .= 'WHERE categoria_id = ' . $categoria['id'];
                    }
                    if (isset($_POST['parametro'])) {
                        if (strstr($query, 'WHERE') !== false) {
                            $busca = $_POST['parametro'];
                            $query .= " AND titulo LIKE '%$busca%' OR subtitulo LIKE '%$busca%'";
                        } else {
                            $busca = $_POST['parametro'];
                            $query .= " WHERE titulo LIKE '%$busca%' OR subtitulo LIKE '%$busca%'";
                        }
                    }
                    if (isset($_GET['pagina'])) {
                        if ($pagina > $totalPaginas) {
                            $pagina = 1;
                        }

                        $pagina = (int)$_GET['pagina'];
                        $queryPG = ($pagina - 1) * $porPagina;
                        $query .= " ORDER BY id DESC LIMIT $queryPG, $porPagina";
                    } else {
                        $pagina = 1;
                        $query .= " ORDER BY id DESC LIMIT 0, $porPagina";
                    }
                    $sql = MySql::conectar()->prepare($query);
                    $sql->execute();
                    $noticias = $sql->fetchAll();


                    ?>
                <!--  -->

            </div>
            <?php
                foreach ($noticias as $key => $value) {
                    # code...
                    $sql = MySql::conectar()->prepare("SELECT slug FROM `tb_site.categorias` WHERE id = ?");
                    $sql->execute(array($value['categoria_id']));
                    $categoriaNome = $sql->fetch()['slug'];


                ?>
            <div class="box-single-conteudo">
                <h2><?php echo date('d-m-Y', strtotime($value['data'])) ?> - <?php echo $value['titulo'] ?></h2>
                <h3><?php echo $value['subtitulo'] ?></h3>
                <p> <?php echo strip_tags(substr($value['conteudo'], 0, 800)); ?>...
                </p>
                <a href="<?php echo INCLUDE_PATH; ?>noticias/<?php echo $categoriaNome ?>/<?php echo $value['slug'] ?>">Leia
                    mais</a>
            </div>

            <?php }

                $query = "SELECT * FROM `tb_site.noticias` ";
                if ($categoria['nome'] != '') {
                    $categoria['id'] = (int)$categoria['id'];
                    $query .= 'WHERE categoria_id = ' . $categoria['id'];
                }
                if (isset($_POST['parametro'])) {
                    if (strstr($query, 'WHERE') !== false) {
                        $busca = $_POST['parametro'];
                        $query .= " AND titulo LIKE '%$busca%' OR subtitulo LIKE '%$busca%'";
                    } else {
                        $busca = $_POST['parametro'];
                        $query .= " WHERE titulo LIKE '%$busca%' OR subtitulo LIKE '%$busca%'";
                    }
                }
                $totalPaginas = MySql::conectar()->prepare($query);
                $totalPaginas->execute();
                $totalPaginas = ceil($totalPaginas->rowCount() / $porPagina);



                ?>


            <div class="paginator">
                <?php
                    for ($i = 1; $i <= $totalPaginas; $i++) {
                        $catStr = ($categoria['nome'] != '') ? '/' . $categoria['slug'] : '';
                        if ($i == $pagina) {
                            echo '<a class="active-page" href="' . INCLUDE_PATH . 'noticias' . $catStr . '?pagina=' . $i . '">' . $i . '</a>';
                        } else {
                            echo ' <a href="' . INCLUDE_PATH . 'noticias' . $catStr . '?pagina=' . $i . '">' . $i . '</a>';
                        }
                    }

                    ?>
            </div>

        </div>
        <div class="clear"></div>
    </div>
</section>

<?php } else {
    include("noticia_single.php");
} ?>