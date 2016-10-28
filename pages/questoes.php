<?php

include("conexaoBanco.php");

$db = conectar();

//controle para que as questoes nao repitam infinitamente
$controle1 = true;
$controle2 = true;

//primeira leitura do banco
$estado = estadoBanco($db);

//rodar os estados no banco
while($estado != 3)  {
    
    $estado = estadoBanco($db);
    
    if($estado == 1 && $controle1 == true)  {
        $controle1 = false;
       
    ?>  
        <form action="questoes.php" method="POST">
            <label>A crianca consegue coordenar bem dedos e maos para encaixar os objetos?</label><br/>
            <input type="radio" name="resposta1" value="sim" checked> Sim<br>
            <input type="radio" name="resposta1" value="nao"> Nao<br>
            <input type="submit" value="Enviar"><br>
        </form>
    <?php }  else if($estado == 2 && $controle2 == true)  {
        
        $controle2 = false;
        
        ?>
        
        <form action="questoes.php" method="POST">
            <label>Ao acertar, a crianca sente necessidade de mostrar ao adulto?</label><br/>
            <input type="radio" name="resposta2" value="sim" checked> Sim<br>
            <input type="radio" name="resposta2" value="nao"> Nao<br>
        </form>
    <?php }
    
    tratarResposta();
}

function tratarResposta()  {
  
    //atualiza a pagina a todo momento
    echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=nome_do_arquivo.php'>";
    
    $resp1 = $_POST['resposta1'];
    $resp2 = $_POST['resposta2'];
    echo($resp1);
    echo($resp2);
  
}

function estadoBanco($db)  {
    
    //selecionar estado no banco a todo momento
    $query = "SELECT estado FROM estado WHERE cod_estado = 1";
    $est = mysql_query($query, $db);
    
    //extrair o valor e armazenar em uma variavel
    while($consulta = mysql_fetch_array($est)) {

        $estado = $consulta[estado];
    }
    
    return $estado;
}

fechar($db);

?>

