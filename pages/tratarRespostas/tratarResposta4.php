<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php

include("../controleEstado.php");
include("../conexaoBanco.php");
//include("../telaQuestoes.php");

$resp4 = $_POST["resposta4"];
$estado = $_POST["estado"];

$estadoSeguinte = estadoBanco(); //estado no banco

if($estado == $estadoSeguinte)  {
    
    while($estado != 5)  {
        
        $estado = estadoBanco();
    }
        //item 62 ADI
        ?>
        <label>Pergunta 5</label><br/>
                <input type="hidden" name="resposta1" value="sim" checked><br>
                <input type="hidden" name="resposta1" value="nao">
                <input type="hidden" name="estado" value="1">
                
         <?php    
        ?>
                <form action="tratarResposta5.php" method="POST"> 
                <label>A crianca se sente empolgada, atraida, intrigada pelos objetos na tela?</label><br/>
                <input type="radio" name="resposta5" value="sim" checked> Sim<br>
                <input type="radio" name="resposta5" value="nao"> Nao<br>
                <input type="hidden" name="estado" value="5"><br>
                <input type="submit" class="btn btn-primary" value="Enviar"><br>
                </form>
        <?php   
    
}  else  {
    
        ?>
        <label>Pergunta 5</label><br/>
                <input type="hidden" name="resposta1" value="sim" checked><br>
                <input type="hidden" name="resposta1" value="nao">
                <input type="hidden" name="estado" value="1">
                
         <?php    
        ?>
                <form action="tratarResposta5.php" method="POST"> 
                <label>A crianca se sente empolgada, atraida, intrigada pelos objetos na tela?</label><br/>
                <input type="radio" name="resposta5" value="sim" checked> Sim<br>
                <input type="radio" name="resposta5" value="nao"> Nao<br>
                <input type="hidden" name="estado" value="5"><br>
                <input type="submit" class="btn btn-primary" value="Enviar"><br>
                </form>
        <?php         
}

$db = conectar();

//selecionar nome paciente na sessao
$query = "SELECT nome FROM estado WHERE cod_estado = 1";
$paciente = mysql_query($query, $db);
    
//extrair o valor e armazenar em uma variavel
while($consulta = mysql_fetch_array($paciente)) {

    $nomePaciente = $consulta[nome];
}

$query = "SELECT cod_paciente FROM paciente WHERE nome = '$nomePaciente'";
$consultaCod = mysql_query($query, $db);

while($consulta = mysql_fetch_array($consultaCod)) {

    $cod_paciente = $consulta[cod_paciente];
}

if($resp4 == "sim")  {
    
    $score = 1;
    
}  else  {
    
    $score = 0;
}
                                    
$inseriRespostas = "INSERT INTO monitoramento VALUES (NULL, '$cod_paciente', 4, '$score', '$resp4')"; 
$result = mysql_query($inseriRespostas);

if($result)  {

    echo("<br>Resposta 4 salva com sucesso!");

}  else  {

    echo("<br>ERRO ao realizar a incercao!!!");

}

fechar($db);

