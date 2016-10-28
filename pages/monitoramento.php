<?php include("menu.php"); ?>

<div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Monitoramento</h1> 
                        Nesta sessão o jogo deverá estar em execução e perguntas aparecerão para o profissional responder em paralelo ao jogo.
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
                                    <form class="form-inline" action = "questoes.php" method="post">

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

                                        <br><br>
                                        <button type="submit" class="btn btn-primary">Iniciar Observação</button>
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
