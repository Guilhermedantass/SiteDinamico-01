<section class="banner-conteiner">
    <div class="banner-single" style="background-image: url('<?php echo INCLUDE_PATH ?>images/bg-form.jpg');"></div>
    <div class="banner-single" style="background-image: url('<?php echo INCLUDE_PATH ?>images/bg-form2.jpg');"></div>
    <div class="banner-single" style="background-image: url('<?php echo INCLUDE_PATH ?>images/bg-form4.jpg');"></div>
    <div class="overlay"></div>
    <div class="center">

        <form action="" method="post">
            <h2 id='title-banner-conteiner'>Qual o seu melhor e-mail?</h2>
            <input type="email" name="email" required>
            <input type="submit" name="acao" value="Cadastrar!">
        </form>
    </div>
    <div class="bullets">
    </div>
</section>
<!--Banner principal-->

<section id="sobre" class="descricao-autor">
    <div class="center">
        <div class="w50 left">
            <h2>Guilherme Dantas</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos non recusandae accusantium,
                impedit libero aperiam vero expedita tempora omnis error asperiores explicabo necessitatibus
                eaque aliquam, ab, illum beatae nobis rem!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos non recusandae accusantium,
                impedit libero aperiam vero expedita tempora omnis error asperiores explicabo necessitatibus
                eaque aliquam, ab, illum beatae nobis rem!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos non recusandae accusantium,
                impedit libero aperiam vero expedita tempora omnis error asperiores explicabo necessitatibus
                eaque aliquam, ab, illum beatae nobis rem!</p>
        </div>
        <div class="w50 left">
            <img class="right" src="<?php echo INCLUDE_PATH ?>images/foto.jpg" alt="">
        </div>
        <div class="clear"></div>
    </div>
</section>
<!--Descriçao autor-->

<section class="especialidades">
    <div class="center">
        <h2 class="title">Especialidades</h2>
        <div class="w33 left box-especialidades">
            <h3><i class="fa-brands fa-css3"></i></h3>
            <h4>CSS3</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos non recusandae accusantium,
                impedit libero aperiam vero expedita tempora omnis error asperiores explicabo necessitatibus
                eaque aliquam, ab, illum beatae nobis rem!</p>
        </div>
        <!--box-especinalidade-->
        <div class="w33 left box-especialidades">
            <h3><i class="fa-brands fa-html5"></i></h3>
            <h4>HTML5</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos non recusandae accusantium,
                impedit libero aperiam vero expedita tempora omnis error asperiores explicabo necessitatibus
                eaque aliquam, ab, illum beatae nobis rem!</p>
        </div>
        <!--box-especinalidade-->
        <div class="w33 left box-especialidades">
            <h3><i class="fa-brands fa-js"></i></h3>
            <h4>JavaScript</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos non recusandae accusantium,
                impedit libero aperiam vero expedita tempora omnis error asperiores explicabo necessitatibus
                eaque aliquam, ab, illum beatae nobis rem!</p>
        </div>
        <!--box-especinalidade-->
    </div>
    <div class="clear"></div>
</section>
<!--Especialidades-->

<section class="extras">
    <div class="center">
        <div id="depoimentos" class="w50 left depoimento-conteiner">
            <h2 class="title">Depoimentos</h2>

            <?php

            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.dopoimentos` ORDER BY order_id ASC LIMIT 3 ");
            $sql->execute();
            $depoimento = $sql->fetchAll();
            foreach ($depoimento as $key => $value) {

            ?>
            <div class="depoimento-single">
                <p class="depoimento-descricao">"<?php echo $value['depoimento']; ?>"</p>
                <p class="nome-autor">-<?php echo $value['nome']; ?></p>
            </div>

            <?php
            }
            ?>

        </div>
        <!--depoimentos-->
        <div id="servicos" class="w50 left servicos-conteiner">
            <h2 class="title">Serviços</h2>
            <div class="servicos">
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos non recusandae accusantium,
                        impedit libero aperiam vero expedita tempora omnis error asperiores explicabo necessitatibus
                        eaque aliquam, ab, illum beatae nobis rem!</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos non recusandae accusantium,
                        impedit libero aperiam vero expedita tempora omnis error asperiores explicabo necessitatibus
                        eaque aliquam, ab, illum beatae nobis rem!</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos non recusandae accusantium,
                        impedit libero aperiam vero expedita tempora omnis error asperiores explicabo necessitatibus
                        eaque aliquam, ab, illum beatae nobis rem!</li>
                </ul>
            </div>
        </div>
        <!--serviços-->
        <div class="clear"></div>
    </div>
</section>
<!--Extras-->