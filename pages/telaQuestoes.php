<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php

//include("monitoramento.php");
include("controleEstado.php");
include("conexaoBanco.php");

error_reporting(0);
ini_set("display_errors", 0 );

$nome = $_POST["nome"];

if($nome == null)  {
    
    $nome = $_SESSION["nomeSessao"];
    
}

if($_SESSION["nomeSessao"] == null)  {
    
    $_SESSION["nomeSessao"] = $nome;
    
}  else if($_SESSION["nomeSessao"] == $nome)  {
    
    $nome = $_SESSION["nomeSessao"];    
}  else  {
    
    $_SESSION["nomeSessao"] = $nome; 
}

$conectaSessao = conectar();

//verificar inicio de sessao no jogo atraves do nome do paciente
$query = "SELECT nome FROM estado WHERE cod_estado = 1";
$consultaNome = mysql_query($query, $conectaSessao);

while($consulta = mysql_fetch_array($consultaNome)) {

    $nomeJogo = $consulta[nome];
}

fechar($conectaSessao);

if($nomeJogo == $nome)  {
   
    echo("<font color='green'>Sessao liberada!</font></br>");
    
    while($estado != 1)  {
        
        $estado = estadoBanco();
    }
        //item 89 ADI
        ?>
        <label>Pergunta 1</label><br/>
                <input type="hidden" name="resposta1" value="sim" checked><br>
                <input type="hidden" name="resposta1" value="nao">
                <input type="hidden" name="estado" value="1">
                
         <?php
        ?>  
            <form action="tratarRespostas/tratarResposta1.php" method="POST">
                <label>A crianca consegue coordenar bem dedos e maos para encaixar os objetos?</label><br/>
                <input type="radio" name="resposta1" value="sim" checked> Sim<br>
                <input type="radio" name="resposta1" value="nao"> Nao<br>
                <input type="hidden" name="estado" value="1"><br>
                <input type="submit" class="btn btn-primary" value="Enviar"><br>
            </form>    
            
        <?php  
    
} else  {
    
    echo("<font color='red'>Voce nao tem nenhuma sessao em andamento!</font>");
}

?>

