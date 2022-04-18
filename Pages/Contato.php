<section class="banner-contato">
    <div class=" banner-contato-conteiner">
        <!-- Generator: Adobe Illustrator 26.0.3, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->

        <h1 id="title-contato">Entre em contato conosco!</h1>
    </div>
</section>
<section class="contato">
    <div class="center">
        <div class="conteiner-contato">
            <div>
                <h1 id="titulo">Formulário</h1>
                <p id="subtitulo">deseja falar comigo? envie sua mensagem e eu retornarei</p>
                <br>
            </div>
            <form action="" method="POST">
                <?php

                if (isset($_POST['acao'])) {
                    if (Painel::insert($_POST)) {
                        Painel::alert('sucesso', 'O cadastro do depoimento feito com sucesso!');
                    } else {
                        Painel::alert('erro', 'Não é permitido campos vazios!');
                    }
                }

                ?>
                <div class="nome-sobrenome">
                    <div class="campo">
                        <label for="nome"></label>
                        <input type="text" name="nome" placeholder="Nome *" required>
                    </div>
                    <div class="campo">
                        <label for="sobrenome"></label>
                        <input type="text" name="sobrenome" placeholder="Sobrenome *" required>
                    </div>
                </div>
                <div class="email-telefone">
                    <div class="campo">
                        <label for="email"></label>
                        <input type="email" name="email" placeholder="Email *" required>
                    </div>
                    <div class="campo">
                        <label for="Assunto"></label>
                        <input type="text" name="assunto" placeholder="Assunto *">
                    </div>
                </div>
                <div class="mensagem">
                    <textarea type="text" id="mensagem" name="mensagem" placeholder="Mensagem *" required></textarea>
                </div>
                <div class="botao">
                    <input type="hidden" name="nome_tabela" value="tb_mensagem">
                    <input type="submit" value="Enviar!" name="acao">
                </div>
                <div class="clear"></div>
            </form>
        </div>
    </div>
</section>
<!-- Section Contato --->