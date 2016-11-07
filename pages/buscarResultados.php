<?php
include("results.php");

$db = conectar();

$nome = $_POST["nome"];

$sql = "SELECT cod_paciente FROM paciente WHERE '$nome' = nome"; 
$result = mysql_query($sql, $db); 
 
//obter o cod para pesquisa em outra tabela
while($consulta = mysql_fetch_array($result)) {
    
   $cod_paciente = $consulta[cod_paciente];
   
} 

$sql2 = "SELECT erros, omissoes, tempo_resposta FROM resultado WHERE '$cod_paciente' = cod_paciente"; 
$result2 = mysql_query($sql2, $db); 

while($consulta2 = mysql_fetch_array($result2)) {
    
   $erros = $consulta2[erros];
   $omissoes = $consulta2[omissoes];
   $tempo = $consulta2[tempo_resposta];
   
} 

$sql3 = "SELECT nome, nome_responsavel, data_nasc, sexo FROM paciente WHERE '$cod_paciente' = cod_paciente"; 
$result3 = mysql_query($sql3, $db); 

while($consulta3 = mysql_fetch_array($result3)) {
    
   $nome = $consulta3[nome];
   $nome_responsavel = $consulta3[nome_responsavel];
   $data_nasc = $consulta3[data_nasc];
   $sexo = $consulta3[sexo];
   
} 

$questao1 = "SELECT resposta FROM monitoramento WHERE '$cod_paciente' = cod_paciente AND questao = 1"; 
$quest1 = mysql_query($questao1, $db); 

while($consultaQ1 = mysql_fetch_array($quest1)) {
   $resp1 = $consultaQ1[resposta];
} 

$questao2 = "SELECT resposta FROM monitoramento WHERE '$cod_paciente' = cod_paciente AND questao = 2"; 
$quest2 = mysql_query($questao2, $db); 

while($consultaQ2 = mysql_fetch_array($quest2)) {
   $resp2 = $consultaQ2[resposta];
}

$questao3 = "SELECT resposta FROM monitoramento WHERE '$cod_paciente' = cod_paciente AND questao = 3"; 
$quest3 = mysql_query($questao3, $db); 

while($consultaQ3 = mysql_fetch_array($quest3)) {
   $resp3 = $consultaQ3[resposta];
} 

$questao4 = "SELECT resposta FROM monitoramento WHERE '$cod_paciente' = cod_paciente AND questao = 4"; 
$quest4 = mysql_query($questao4, $db); 

while($consultaQ4 = mysql_fetch_array($quest4)) {
   $resp4 = $consultaQ4[resposta];
} 

$questao5 = "SELECT resposta FROM monitoramento WHERE '$cod_paciente' = cod_paciente AND questao = 5"; 
$quest5 = mysql_query($questao5, $db); 

while($consultaQ5 = mysql_fetch_array($quest5)) {
   $resp5 = $consultaQ5[resposta];
} 

$questao6 = "SELECT resposta FROM monitoramento WHERE '$cod_paciente' = cod_paciente AND questao = 6"; 
$quest6 = mysql_query($questao6, $db); 

while($consultaQ6 = mysql_fetch_array($quest6)) {
   $resp6 = $consultaQ6[resposta];
} 

fechar($db);

?>

<div class="row">
    
    <h3>Ficha</h3>
        
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="primary">
                <th>Codigo</th>
                <th>Nome</th>
                <th>Nome do Responsável</th>
                <th>Data de Nascimento</th>
                <th>Sexo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$cod_paciente?></td>
                <td><?=$nome?></td>
                <td><?=$nome_responsavel?></td>
                <td><?= date('d/m/Y', strtotime($data_nasc));?></td>
                <td><?=$sexo?></td>
            </tr>

        </tbody>
    </table>
        

    <h3>Estatísticas do Jogo</h3>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="danger">
                <th>Codigo</th>
                <th>Nome</th>
                <th>Erros</th>
                <th>Omissões</th>
                <th>Tempo de resposta</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$cod_paciente?></td>
                <td><?=$nome?></td>
                <td><?=$erros?></td>
                <td><?=$omissoes?></td>
                <td><?=$tempo?></td>
            </tr>

        </tbody>
    </table>
    
    <h3>Estatísticas do Questionário</h3>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="danger">
                <th>Resposta 1</th>
                <th>Resposta 2</th>
                <th>Resposta 3</th>
                <th>Resposta 4</th>
                <th>Resposta 5</th>
                <th>Resposta 6</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$resp1?></td>
                <td><?=$resp2?></td>
                <td><?=$resp3?></td>
                <td><?=$resp4?></td>
                <td><?=$resp5?></td>
                <td><?=$resp6?></td>
            </tr>

        </tbody>
    </table>
    <h3>Diagnóstico</h3>
    <font color="red"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> A criança possui sinais de autismo!</font>
    <font color="green"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> A criança NÃO possui sinais de autismo!</font>
</div>


