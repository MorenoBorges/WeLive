<?php
require_once '../classes/usuario.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WeLive</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php
$user = new usuario();
session_start();

?>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"><h1>Pão de batata</h1></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">WeLive</a>
        </div>
        <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"><a href="#" class="btn btn-danger square-btn-adjust">SAIR</a> 
		</div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="assets/img/find_user.jpg" class="user-image img-responsive"/>
                    <h3 style="color: white; font-family: 'Bauhaus 93'; font-size: 20pt;"><?php echo $_SESSION['user_nome']; ?></h3>
                </li>
                <li>
                    <a class="active-menu" href="index.php"><i class="fa fa-home fa-2x"></i> HOME</a>
                </li>
                <li>
                    <a  href="alimentos.html"><i class="fa fa-lemon-o fa-2x"></i> ALIMENTOS</a>
                </li>
                <li>
                    <a  href="cardapio.html"><i class="fa fa-calendar fa-2x"></i>CARDÁPIO</a>
                </li>
                <li>
                    <a  href="opcoes.html"><i class="fa fa-wrench fa-2x"></i> OPÇÕES</a>
                </li>
            </ul>
        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sopa Detox
                </div>
                <div class="panel-body">
                    <center>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/OB1affOJDPc" frameborder="0" allowfullscreen></iframe>
                    </center>
                </div>
                <div class="panel-footer">
                    <p>Atualmente a maioria das pessoas se encontra com o organismo intoxicado e inflamado, o que acaba gerando aumento de peso com facilidade e dificuldade em responder às dietas para emagrecer. Para limpar o organismo e eliminar esses problemas, a alimentação desintoxicante tem sido uma alternativa. "O detox não é só uma dieta, é uma mudança no estilo de vida.</p>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-7 col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Entenda a pirâmide alimentar
                </div>
                <div class="panel-body">
                    <p>A PIRÂMIDE ALIMENTAR é uma guia da boa alimentação. Ela divide em oito grupos os alimentos existentes, criados para auxiliar as pessoas sobre o que elas devem comer. Mostra, então, de forma gráfica a quantidade de cada tipo de alimento que devemos consumir diariamente.</p>
                    <p>Ela tem como objetivo principal mostrar que uma alimentação saudável deve ser variada e moderada e a partir desse tipo de regime alimentar, conseguiremos diminuir doenças como a obesidade e a carência de nutrientes.<qp>
                    <p>A pirâmide tradicional é dividida em seis grupos alimentares, que estão repartidos em quatros degraus. Na base, se encontram os carboidratos, importantes fontes de energia; acima, estão os vegetais e frutas; logo depois, as proteínas de carnes e grãos, além dos laticínios e por último, estão os lipídeos e açúcares, que devem ser consumidos com moderação.</p>
                </div>
                <div class="panel-footer">
                    Fonte: <a href="http://piramide-alimentar.info/">http://piramide-alimentar.info/</a>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    #DicaDaSemana1
                </div>
                <div class="panel-body">
                    <p>Os alimentos do café da manhã fornecem energia, principalmente os carboidratos encontrados nos pães, nas frutas e nas geléias. Além disso, leite e derivados (queijo e iogurte) fornecem proteínas e cálcio (nutriente importante para a saúde dos ossos). As fibras, que trazem saciedade e melhoram o funcionamento do intestino, também são encontradas nos alimentos que fazem parte dessa refeição.</p>
                </div>
                <div class="panel-footer">
                    Escrito por: <a href="https://www.facebook.com/fmorenoborges">Felipe Moreno Borges</a>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Recomendação
                </div>
                <div class="panel-body">
                    <p>Faça exercicios pelo menos 2 vezes por semana, com certeza ajudará se o seu objetivo é emagrecer.</p>
                </div>
            </div>
        </div>

        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- MORRIS CHART SCRIPTS -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>
</html>
