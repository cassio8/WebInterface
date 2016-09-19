<?php
include("results.php");

//include("conexaoBanco.php");

//require_once 'pages/conexaoBanco.php';
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

fechar($db);

?>

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
</div>
<!-- /.table-responsive -->
</div>

