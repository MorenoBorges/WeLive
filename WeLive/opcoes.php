<?php
require_once '../classes/usuario.php';
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WeLive - Opções</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php
$user = new usuario();
session_start();
if (isset($_POST['enviarImagem'])){
    $user->inserirImagem();
}
?>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">WeLive</a>
        </div>
        <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="#" class="btn btn-danger square-btn-adjust">Sair</a> </div>
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
                    <a  href="index.php"><i class="fa fa-home fa-2x"></i> HOME</a>
                </li>
                <li>
                    <a  href="alimentos.html"><i class="fa fa-lemon-o fa-2x"></i> ALIMENTOS</a>
                </li>
                <li>
                    <a  href="cardapio.html"><i class="fa fa-calendar fa-2x"></i>CARDÁPIO</a>
                </li>
                <li>
                    <a  class="active-menu" href="opcoes.html"><i class="fa fa-wrench fa-2x"></i> OPÇÕES</a>
                </li>
            </ul>
        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Opções
                    </div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Perfil</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <form action="opcoes.php" method="post" enctype="multipart/form-data" name="cadastro" >
                                            Foto de exibição:<br />
                                            <input type="file" name="foto" /><br /><br />
                                            <input type="submit" name="enviarImagem" value="Enviar" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Alimentos</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                    <div class="panel-body">

                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">Excluir conta</a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
