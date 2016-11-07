<?php include("menu.php");?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header" id="navbar"><a class="anchorjs-link " href="#navbar" aria-label="Anchor link for: navbar" data-anchorjs-icon="" style="font-family: anchorjs-icons; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; line-height: inherit; position: absolute; margin-left: -1em; padding-right: 0.5em;"></a>Resultados</h2>          
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

                                    $cod_prof = $_SESSION["cod_usuario"];
                                    
                                    $sql = "SELECT nome FROM paciente WHERE cod_profissional = '$cod_prof' ORDER BY nome";
                                    $result = mysql_query($sql, $db);
                                    ?>
                                    <form class="form-inline" action = "buscarResultados.php" method="post">
                                        
                                        <label>Selecione o paciente</label><br/>
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
                
                </body>

                </html>
