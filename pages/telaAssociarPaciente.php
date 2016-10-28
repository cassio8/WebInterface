<?php 

include("menu.php");
include("conexaoBanco.php");

$cod_usuario = $_SESSION["cod_usuario"];

$db = conectar();

//consultar se usuario e admin
$sql = "SELECT tipo FROM usuario WHERE cod_usuario = '$cod_usuario'";
$result = mysql_query($sql, $db);

while($consulta = mysql_fetch_array($result)) {

    $tipo = $consulta[tipo];
}

?>

<div id="page-wrapper">
<div class="row">
	<div class="box-body" style="background-color: white;">
            <div class="container-fluid">
                
                <?php
                    if($tipo == 0)  {


                    }  else  {

                ?>
                    <label id="com_cons_label"><font color="red" style="font-size: 15px">Você não tem permissão para fazer a associação pois não é administrador!</font></label><br/>
                    
                <?php 

                    }  
                    fechar($db);

                ?>
                
                <form class="form-horizontal" method="POST" action="associarPaciente.php">
                    <h2 class="page-header" id="navbar"><a class="anchorjs-link " href="#navbar" aria-label="Anchor link for: navbar" data-anchorjs-icon="" style="font-family: anchorjs-icons; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; line-height: inherit; position: absolute; margin-left: -1em; padding-right: 0.5em;"></a>Associar Paciente</h2>
                    
                    <p>*Apenas os administrados do sistema tem acesso a essa função</p>
                    <br><br>
                    
                    <div class="row">
                        
                            <?php
                            
                                //listar nome de profissionais cadastrados
                                $db2 = conectar();
                                
                                $users = "SELECT nome FROM usuario WHERE tipo = 1 ORDER BY nome";
                                $resultUsers = mysql_query($users, $db2);
                            
                            ?>
                        
                            <div class="col-md-6">
                                    <label>Nome do profissional</label>
                                    <select name="nome_profissional" class='form-control' style="width: 75%; size: 8px">
                                                <?php
                                                while($consulta = mysql_fetch_array($resultUsers)) {

                                                    $nome = $consulta[nome];
                                 
                                                ?>
                                            <option selected value="<?= $nome ?>"> <?= $nome ?> </option>

                                            <?php
                                            } //fecha foreach 
                                            fechar($db2);
                                            ?>
                                            
                                            <option selected value=""></option>
                                    </select>
                            </div>
                        
                            <?php
                            
                                //listar nome de profissionais cadastrados
                                $db3 = conectar();
                                
                                $patients = "SELECT nome FROM paciente ORDER BY nome";
                                $resultPatients = mysql_query($patients, $db3);
                            
                            ?>
                        
                            <div class="col-md-6">
                                    <label>Nome do paciente</label>
                                    <select name="nome_paciente" class='form-control' style="width: 75%; size: 8px">
                                                <?php
                                                while($consulta = mysql_fetch_array($resultPatients)) {

                                                    $nome = $consulta[nome];
                                 
                                                ?>
                                            <option selected value="<?= $nome ?>"> <?= $nome ?> </option>

                                            <?php
                                            } //fecha foreach 
                                            fechar($db3);
                                            ?>
                                            
                                            <option selected value=""></option>
                                    </select>
                            </div>
                        
                            <div class="col-md-9"><br/>
                                <button type="submit" class="btn btn-primary">Associar</button>
                            </div>
                        
                    </div>
                 
                            

                  
                    
                </form>
            </div>
        </div>
</div>
     
    
