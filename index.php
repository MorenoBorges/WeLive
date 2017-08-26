<!DOCTYPE html>
<?php
    require_once ("classes/usuario.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>WeLive</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    $user = new usuario();
    $mensagem = "";

    //Verifica se o botão postar foi ativado
    if (isset($_POST['logar'])):

        //Verifica se o usuario não deixou um dos campos vazios.
        if (empty($_POST['senhaL']) || empty($_POST['emailL'])){
            $mensagem = "Email ou senha não foram preenchidos, por favor insira todos os campos.";
            ECHO $mensagem;
        }else{
            //Recebe os dados
            $email = $_POST['emailL'];
            $senha = md5($_POST['senhaL']);

            //Salva os dados na classe usuario
            $user->setEmail($email);
            $user->setSenha($senha);

            //Tenta logar
            if($user->logarUsuario()==true){
                header ("location: welive/");
            }
            else{
                echo"<br>Não foi possivel logar";
            }
        }
    endif;

    //Verifica se o botão cadastrar foi ativado
    if(isset($_POST['btnCadastrar'])):
        //Recebe os dados
        $nome   = ucwords(strtolower($_POST['nome']));
        $idade = $_POST['idade'];
        $sexo  = substr($_POST['sexo'],0,1);
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $exercicios_semanais = $_POST['exercicios_semanais'];
        $email = $_POST['email'];
        $imc =substr($peso/($altura*$altura),0,5);
        $vet = $peso*$peso*($altura*$altura);

        //Criptografando a senha para impedir acesso ao dados do úsuario
        $senha = md5($_POST['senha']);


        //Salva os dados na classe usuario
        $user->setNome($nome);
        $user->setIdade($idade);
        $user->setSexo($sexo);
        $user->setPeso($peso);
        $user->setAltura($altura);
        $user->setExerciciosSemanais($exercicios_semanais);
        $user->setEmail($email);
        $user->setSenha($senha);
        $user->setImc($imc);
        $user->setVet($vet);

        //Tenta cadastrar
        if ($user->cadastrarUsuario()){
            echo "<script>alert('Agora que você está cadastrado, faça login')</script>";
        }
    endif;
?>

<div class="form">
    <ul class="tab-group">
        <center>
            <img src="img/logo.png" width="150" height="150">
        </center>
        <br><br>
        <li class="tab active"><a href="#signup">Cadastrar</a></li>
        <li class="tab"><a href="#login">Entrar</a></li><br><br>
    </ul>

    <div class="tab-content">
        <div id="signup">
            <h1>Cadastre-se</h1>

            <form action="index.php" method="post">

                <div class="top-row">
                    <div class="field-wrap">
                        <label>
                            Nome<span class="req">*</span>
                        </label>
                        <input name="nome" type="text" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Idade<span class="req">*</span>
                        </label>
                        <input name="idade" type="number" required autocomplete="off"/>
                    </div>
                </div>
                <div class="top-row">
                    <div class="field-wrap">
                        <label>
                            Peso<span class="req">*</span>
                        </label>
                        <input name="peso" type="text"required autocomplete="off"/>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Altura<span class="req">*</span>
                        </label>
                        <input name="altura" type="text" required autocomplete="off"/>
                    </div>
                </div>

                <div class="field-wrap">
                    <label>
                        Sexo<span class="req">*</span>
                    </label>
                    <input name="sexo" type="text"required autocomplete="off" ; placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ex: 'Feminino'"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Quantidade de exercicios por semana<span class="req">*</span>
                    </label>
                    <input name="exercicios_semanais" type="text"required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Email<span class="req">*</span>
                    </label>
                    <input name="email" type="email" required autocomplete="off"/>
                </div>
                <div class="field-wrap">
                    <label>
                        Senha<span class="req">*</span>
                    </label>
                    <input name="senha" type="password" required autocomplete="off"/>
                </div>

                <button name="btnCadastrar" type="submit" class="button button-block"/>Cadastrar!</button>
            </form>
        </div>

        <div id="login">
            <h1>Bem vindo de volta!</h1>

            <form action="index.php" method="post">

                <div class="field-wrap">
                    <label>
                        Email<span class="req">*</span>
                    </label>
                    <input name="emailL" type="email"required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Senha<span class="req">*</span>
                    </label>
                    <input name="senhaL" type="password"required autocomplete="off"/>
                </div>

                <p class="forgot"><a href="#">Esqueceu sua senha?</a></p>

                <button name="logar" class="button button-block"/>Entrar!</button>

            </form>
        </div>
    </div><!-- tab-content -->
</div> <!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>
