<?php 
    verificaPermissaoPagina(2);
?>
<div class="box-content">
    <h2><i class="fa fa-pen"></i> Adicionar Usuário</h2>




    <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($_POST['acao'])){
            $login = $_POST['login'];
            $nome = $_POST['nome'];
            $senha = $_POST['password'];
            $cargo = $_POST['cargo'];
            $imagem = $_FILES['imagem'];          


            if($login == ''){
                Painel::alert('erro', 'ERRO! O login está vazio!');
            }else if($nome == ''){
                Painel::alert('erro', 'ERRO! O nome está vazio!');
            }
            else if($senha == ''){
                Painel::alert('erro', 'ERRO! O senha está vazio!');
            }else if($cargo == ''){
                Painel::alert('erro', 'ERRO! O cargo precisa está selecionado!');
            }else{
                if($cargo >= $_SESSION['cargo']){
                    Painel::alert('erro', 'ERRO! Você precisa selecionar um cargo menor do que o seu!');
                }else if(Painel::imagemValida($imagem) == false && $imagem['name'] != ''){
                    Painel::alert('erro', 'ERRO! Formato de imagem não aceito!');
                }else if(Usuario::userExists($login)){
                    Painel::alert('erro', 'ERRO! O login já existe, selecione outro!');
                }else{
                    //Cadastrar
                    $usuario = new Usuario();
                    $imagem = Painel::uploadFile($imagem);
                    $usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);
                    Painel::alert('sucesso','O cadastro do usuário '.$login.' feito com sucesso!');
                }
            }

            
        }
        ?>
        <div class="form-group">
            <label for="">Login: </label>
            <input type="text" name="login" value="">
        </div>
        <div class="form-group">
            <label for="">Nome: </label>
            <input type="text" name="nome" value="">
        </div>
        <div class="form-group">
            <label for="">Senha: </label>
            <input type="password" name="password" value="">
        </div>
        <div class="form-group">
            <label for="">Cargo: </label>
            <select name="cargo" id="">
                <?php 
                    foreach (Painel::$cargos as $key => $value){
                        if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>'; 
                    }

                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Imagem: </label>
            <input type="file" name="imagem">
        </div>
        <div class="form-group">
            <input type="submit" value="Cadastrar" name="acao">
        </div>
    </form>

</div>

<?php ?>