<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php

include("../controleEstado.php");
include("../conexaoBanco.php");
//include("../telaQuestoes.php");

$resp6 = $_POST["resposta6"];
$estado = $_POST["estado"];

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

if($resp6 == "sim")  {
    
    $score = 1;
    
}  else  {
    
    $score = 0;
}
                                    
$inseriRespostas = "INSERT INTO monitoramento VALUES (NULL, '$cod_paciente', 6, '$score', '$resp6')"; 
$result = mysql_query($inseriRespostas);

if($result)  {

    echo("<font color='green'>Todas as respostas foram inseridas com sucesso!</font><br>");
    echo("<a href='../menu.php'><input type='button' class='btn btn-primary' value='Voltar'></a>");
}  else  {

    echo("<br>ERRO ao realizar a incercao!!!");

}

fechar($db);

