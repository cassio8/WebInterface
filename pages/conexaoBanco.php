<?php

function conectar()  {
    
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

    $conexao = mysql_connect("localhost", "root", "");
    mysql_select_db("jogo", $conexao);
    
    return $conexao;
    
}

function fechar($conexao)  {
    
    mysql_close($conexao);
}




