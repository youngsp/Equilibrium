<?php

include "include/bd.php";

//Recupera variaveis do post
$cnome = trim(strip_tags($_POST["nome"]));
$csobrenome = trim(strip_tags($_POST["sobrenome"]));
$cemail = trim(strip_tags($_POST['email']));
$csenha = trim(strip_tags($_POST['senha']));
$encrypted_pass = md5($csenha);
$key=substr(md5(time()*rand()), 6, 12);

// Se email veio em branco redireciona para página de cadastro
if ($cemail == "") {
header("Location: signup.html");
exit;
}




error_reporting(E_ALL);
ini_set('display_errors', '1');

$conn = AbreConexao();
//Cria objeto $conn do tipo conexao de banco de dados.

$sql = "INSERT INTO  `alianca`.`associado`
(`id` ,`key` ,`email` ,`senha` ,`nome` ,`sobrenome` ,`sexo` ,`data_nascimento` ,`rg` ,`cpf` ,`estado_civil`)
VALUES 
(NULL ,  '".$key."',  '".$cemail."',  '".$encrypted_pass."',  '".$cnome."',  '".$csobrenome."', NULL , NULL , NULL , NULL , NULL
)";

//echo $sql;

//"INSERÇAO OK";
if(mysqli_query($conn, $sql))
	$mensagem = $cnome."</br><small>Agradecemos seu cadastro</small>";
else
	$mensagem = "Erro no cadastro.</br><small><a href='signup.html'>Tente novamente</a></small>";
	//echo mysqli_error($conn);
	
	
FechaConexao($conn);
//exit;

?>

<!DOCTYPE html>
<!--[if lt IE 7]>        <html class="no-js lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>            <html class="no-js lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>            <html class="no-js lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->  
<html class="no-js">                        
<!--<![endif]-->
    <head>
        <meta charset="iso-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Cadastro Equilibrium</title>
        <meta name="description" content="Metis: Bootstrap Responsive Admin Theme">
        <meta name="viewport" content="width=device-width">
        <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="assets/css/bootstrap-responsive.min.css">
        <link type="text/css" rel="stylesheet" href="assets/Font-awesome/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/layout2.css"/>
        <link type="text/css" rel="stylesheet" href="assets/css/calendar.css"/>
        <link type="text/css" rel="stylesheet" href="assets/chosen/chosen/chosen.css"/>
        <link type="text/css" rel="stylesheet" href="assets/css/css-customed.css"/>
        <script type="text/javascript" src="assets/holder-master/holder.js"></script>
          <script type="text/javascript" src="assets/pagedown-bootstrap/demo/browser/bootstrap/js/bootstrap-carousel.js"></script>

        <link rel="stylesheet" href="assets/css/theme.css">

        <script type="text/javascript" src="assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if IE 7]>
    
        <link type="text/css" rel="stylesheet" href="assets/Font-awesome/css/font-awesome-ie7.min.css"/>
        <![endif]-->
        
        
        <script type="text/javascript" src="ajax/funcs.js"></script>
        
    </head>
    <body>
        <!-- BEGIN WRAP -->
        <div id="wrap">

            <!-- BEGIN TOP BAR -->
            <div id="top">
                <!-- .navbar -->
                <div class="navbar navbar-inverse navbar-fixed-top">
                    <div class="navbar-inner" >
                        <div class="container-fluid">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <a class="brand" href="index.html">
                            <span class="nav" style="background: url(assets/img/logo.png) no-repeat left center; height: 20px; width: 90px;"></span></a>
                            <!-- .topnav -->
                            <div class="btn-toolbar topnav"></div>
                            <!-- /.topnav -->


                            <div class="nav-collapse collapse">
                                <!-- .nav -->
                                <div class="search-bar input-append" style="height: 30px; display: table-cell !important; position: absolute; top: 50%; margin: 4px 0 0 100px; ">
                                <form class="main-search">
                                    <input class="span7" type="text" placeholder="Quero saber mais sobre...">
                                    <button id="searchBtn" type="submit" class="btn"><i class="icon-search"></i>
                                    </button>
                                </form>
                        </div>
                                <ul class="nav pull-right">
                                    <li class="dropdown active">
                                        <a rel="tooltip" data-original-title="Explore" data-placement="bottom" data-toggle="dropdown" class="dropdown-toggle" href="#">
                                            <i class="icon-reorder"></i> <!--<b class="caret"></b> -->
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="form-wizard.html">Sobre nos</a></li>
                                             <li><a href="form-validation.html">Participe</a></li>
                                            <li><a href="form-general.html">Sistemas</a></li>
                                            <li><a href="form-wysiwyg.html">Departamentos</a></li>
                                            <li><a href="form-wizard.html">Projetos</a></li>
                                            <li><a href="form-wizard.html">Contato</a></li>


                                        </ul>
                                    </li>



                                      <li><a rel="tooltip" data-original-title="Tarefas" data-placement="bottom" href="file.html"><i class="icon-calendar"></i><span class="label label-important">5</span></a></li>
                                         <li><a rel="tooltip" data-original-title="Notificacoes" data-placement="bottom" href="file.html"><i class="icon-envelope"></i><span class="label label-warning">5</span></a></li>
                                       <li><a rel="tooltip" data-original-title="Perfil" data-placement="bottom" href="file.html"><i class="icon-user"></i></a></li>

                                     
                                    <li class="dropdown">
                                        <a rel="tooltip" data-original-title="Config" data-placement="bottom" data-toggle="dropdown" class="dropdown-toggle" href="#">
                                            <i class="icon-cog"></i> <!--<b class="caret"></b> -->
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="form-general.html">Login</a></li>
                                            <li><a href="form-validation.html">Registrar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- /.nav -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.navbar -->
            </div>
            <!-- END TOP BAR -->






            <!-- BEGIN MAIN CONTENT -->

                <!-- .outer -->

                <div class="container-fluid">
                
                 <div class="row-fluid">

                 <div class="span12 inner">
					 <!--
                    <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Warning!</strong> Best check yo self, you're not looking too good.
                            </div>
                            
                     -->
                    </div>
                    </div>

                    <div class="row-fluid">
                        <!-- .inner -->

                            <!--        aLERT      -->

                                <!-- <div class="alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Warning!</strong> Best check yo self, you're not looking too good.
                            </div>               -->
                             <!--        aLERT      -->


                               <div class="span12 inner">
                                    <div class="span3"></div>
                                   <div class="span6">

                                   <div class="row-fluid">
                                             <div class="span3"></div>
                                              <div class="span6"><img src="assets/img/logo-large.png" border="0"></div>
                                             <div class="span3"></div>
                                       </div>

                                      <!--        Crie conta      -->
                                        <div class="row-fluid">
                                             <div class="span4"></div>
                                             <div class="span1"><h1 class="text-info"><i class="icon-user"></i> </h1></div>
                                             <div class="span4"><h4><?php echo $mensagem; ?></h4></div>
                                             <div class="span3"></div>
                                       </div>
                                     
                                       <div class="row-fluid">
                                             <div class="span2"></div>
                                             <div class="span8"><h4>Em breve novidades</h4></div>
                                             <div class="span2"></div>
                                       </div>


                                   <div class="span3"></div>


                         </div>
                        <!-- /.inner -->

                    </div>
                    <!-- /.row-fluid -->

                </div>
                <!-- /.outer -->

            <!-- END CONTENT -->

            <!-- #push do not remove -->
            <div id="push"></div>
            <!-- /#push -->
        </div>
        <!-- END WRAP -->

        <div class="clearfix"></div>

        <!-- BEGIN FOOTER -->
        <div id="footer">
            <p>2013 © Associacao Alianca Luz - Paradigma Equilibrium</p>
        </div>
        <!-- END FOOTER -->

        <!-- #helpModal -->
        <div id="helpModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
                <h3 id="helpModalLabel"><i class="icon-external-link"></i> Help</h3>
            </div>
            <div class="modal-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="modal-footer">

                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
        <!-- /#helpModal -->
                                   <script src="assets/js/vendor/jquery-1.10.1.min.js"></script>
                                   <script src="assets/js/vendor/jquery-ui-1.10.0.custom.min.js"></script>
       <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>



        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>window.jQuery.ui || document.write('<script src="assets/js/vendor/jquery-ui-1.10.0.custom.min.js"><\/script>')</script> -->


        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/lib/jquery.mousewheel.js"></script>

        <script src="assets/js/lib/jquery.sparkline.min.js"></script>

        <script src="assets/flot/jquery.flot.js"></script>
        <script src="assets/flot/jquery.flot.pie.js"></script>
        <script src="assets/flot/jquery.flot.selection.js"></script>
        <script src="assets/flot/jquery.flot.resize.js"></script>

        <script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
        <script src="assets/js/lib/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="assets/chosen/chosen/chosen.jquery.min.js"></script>



        <script src="assets/js/main.js"></script>

                            <script type="text/javascript">
            $(function() {
                dashboard();
            });
            

        </script>



    </body>
</html>
