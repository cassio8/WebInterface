<?php

//include("conexaoBanco.php");

//retorna estado do banco
function estadoBanco()  {
    
    $db = conectar();
    //selecionar estado no banco a todo momento
    $query = "SELECT estado FROM estado WHERE cod_estado = 1";
    $est = mysql_query($query, $db);
    
    //extrair o valor e armazenar em uma variavel
    while($consulta = mysql_fetch_array($est)) {

        $estado = $consulta[estado];
    }
   
    fechar($db);
    
    return $estado;
}
  

