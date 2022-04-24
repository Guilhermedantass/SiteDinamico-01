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
        <div class="clear"></div>
    </div>
</section>