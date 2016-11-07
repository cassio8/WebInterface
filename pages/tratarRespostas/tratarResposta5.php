<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php

include("../controleEstado.php");
include("../conexaoBanco.php");
//include("../telaQuestoes.php");

$resp5 = $_POST["resposta5"];
$estado = $_POST["estado"];

$estadoSeguinte = estadoBanco(); //estado no banco

if($estado == $estadoSeguinte)  {
    
    while($estado != 6)  {
        
        $estado = estadoBanco();
    }
    
        ?>
        <label>Pergunta 6</label><br/>
                <input type="hidden" name="resposta1" value="sim" checked><br>
                <input type="hidden" name="resposta1" value="nao">
                <input type="hidden" name="estado" value="1">
                
         <?php    
        ?>
                <form action="tratarResposta6.php" method="POST">
                <label>O olhar da crianca permanece fixo nos objetos da tela?</label><br/>
                <input type="radio" name="resposta6" value="sim" checked> Sim<br>
                <input type="radio" name="resposta6" value="nao"> Nao<br>
                <input type="hidden" name="estado" value="6"><br>
                <input type="submit" class="btn btn-primary" value="Enviar"><br>
                </form>

        <?php 
    
}  else  {
    
        ?>
        <label>Pergunta 6</label><br/>
                <input type="hidden" name="resposta1" value="sim" checked><br>
                <input type="hidden" name="resposta1" value="nao">
                <input type="hidden" name="estado" value="1">
                
         <?php    
        ?>
                <form action="tratarResposta6.php" method="POST">
                <label>O olhar da crianca permanece fixo nos objetos da tela?</label><br/>
                <input type="radio" name="resposta6" value="sim" checked> Sim<br>
                <input type="radio" name="resposta6" value="nao"> Nao<br>
                <input type="hidden" name="estado" value="6"><br>
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
                                    
$inseriRespostas = "INSERT INTO monitoramento VALUES (NULL, '$cod_paciente', 5, '$resp5')"; 
$result = mysql_query($inseriRespostas);

if($result)  {

    echo("<br>Respostas salvas com sucesso!");

}  else  {

    echo("<br>ERRO ao realizar a incercao!!!");

}

fechar($db);

