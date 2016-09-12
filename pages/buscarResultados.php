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

$sql2 = "SELECT pontuacao, resultado FROM resultado WHERE '$cod_paciente' = cod_paciente"; 
$result2 = mysql_query($sql2, $db); 


while($consulta2 = mysql_fetch_array($result2)) {
    
   $pontuacao = $consulta2[pontuacao];
   $resultado = $consulta2[resultado];
   
} 

fechar($db);

?>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Pontuação</th>
            <th>Resultado</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?=$cod_paciente?></td>
            <td><?=$nome?></td>
            <td><?=$pontuacao?></td>
            <td><?=$resultado?></td>
        </tr>
    
    </tbody>
</table>
</div>
<!-- /.table-responsive -->
</div>

