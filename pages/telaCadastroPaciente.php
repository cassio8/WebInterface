<?php 

include("menu.php");
include("conexaoBanco.php");

//session_start();

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
                    <label id="com_cons_label"><font color="red" style="font-size: 15px">Você não tem permissão para cadastrar pois não é administrador!</font></label><br/>
                    
                <?php 

                    }  
                    fechar($db);

                ?>
                
                <form class="form-horizontal" method="POST" action="inserirPaciente.php">
                    <h2 class="page-header" id="navbar"><a class="anchorjs-link " href="#navbar" aria-label="Anchor link for: navbar" data-anchorjs-icon="" style="font-family: anchorjs-icons; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; line-height: inherit; position: absolute; margin-left: -1em; padding-right: 0.5em;"></a>Cadastrar Paciente <a href="telaAssociarPaciente.php" class="btn btn-default"><i class="fa fa-child"></i> Associar criança</a></h2>
                    
                    <p>*Apenas os administrados do sistema tem acesso a essa função</p>
                    <br><br>
                    
                    <div class="row">
                        
                            <div class="col-md-6">
                                    <label>Nome</label>
                                    <input name="nome"class="form-control" style="width: 95%">
                            </div>
                        
                            <div class="col-md-6">
                                    <label>Nome do responsável</label>
                                    <input name="nome_responsavel" class="form-control" style="width: 80%" type="text">
                            </div>
                        
                    </div>
                  
                    <div class="row">

                        <div class="col-md-6">
                            <label id="com_cons_label"><font style="font-size: 15px">Sexo</font></label><br/>
                                <select name="sexo" class="form-control" style="width: 80%">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>  
                            </div>
                        
                            <div class="col-md-6">
                                <label>Data de nascimento</label>
                                <input name="data_nasc" type="date" class="form-control" style="width: 80%">
                            </div>
                        
                            <div class="col-md-9"><br/>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>

                    </div>
                    
                </form>
            </div>
        </div>
</div>
     
    
