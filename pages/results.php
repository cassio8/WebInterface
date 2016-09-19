<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Autism</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Autism</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="index.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="menu.html"><i class="fa fa-file-text-o"></i> Resultados</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-gamepad"></i> Jogo</a>
                            </li>

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Resultados do jogo</h1>          
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <br><br>
                <!-- Usar para mostrar resultados -->
                <div class="row">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="table-responsive">

                                    <?php
                                    include("conexaoBanco.php");

                                    $db = conectar();

                                    $sql = "SELECT nome FROM paciente ORDER BY nome";
                                    $result = mysql_query($sql, $db);
                                    ?>
                                    <form class="form-inline" action = "buscarResultados.php" method="post">

                                        <label>Nome: </label><br/>
                                        <select name="nome" class='form-control' style="width: 75%; size: 8px">
                                                <?php
                                                while($consulta = mysql_fetch_array($result)) {

                                                    $nome = $consulta[nome];
                                 
                                                ?>
                                            <option selected value="<?= $nome ?>"> <?= $nome ?> </option>

                                            <?php
                                            } //fecha foreach 
                                            fechar($db);
                                            ?>
                                            
                                            <option selected value=""></option>
                                        </select>

                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </form>

                                    <br>

                                    <!-- /.col-lg-4 (nested) -->
                                    <div class="col-lg-8">
                                        <div id="morris-bar-chart"></div>
                                    </div>
                                    <!-- /.col-lg-8 (nested) -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel-footer -->

                        <!-- /.row -->
                    </div>
                    <!-- /#page-wrapper -->

                </div>
                <!-- /#wrapper -->

                <!-- jQuery -->
                <script src="../vendor/jquery/jquery.min.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

                <!-- Metis Menu Plugin JavaScript -->
                <script src="../vendor/metisMenu/metisMenu.min.js"></script>

                <!-- Morris Charts JavaScript -->
                <script src="../vendor/raphael/raphael.min.js"></script>
                <script src="../vendor/morrisjs/morris.min.js"></script>
                <script src="../data/morris-data.js"></script>

                <!-- Custom Theme JavaScript -->
                <script src="../dist/js/sb-admin-2.js"></script>

                </body>

                </html>
