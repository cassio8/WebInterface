<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                                    
$inseriRespostas = "INSERT INTO monitoramento VALUES (NULL, '$cod_paciente', 6, '$resp6')"; 
$result = mysql_query($inseriRespostas);

if($result)  {

    echo("<br>Todas as respostas foram inseridas com sucesso!");

}  else  {

    echo("<br>ERRO ao realizar a incercao!!!");

}

fechar($db);

