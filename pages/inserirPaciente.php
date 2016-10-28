<?php 

//inserir profissional no banco
include("telaCadastroPaciente.php");

$tipo = $_SESSION["tipo"];

if($tipo == 0)  {

    $db = conectar();

    $nome = $_POST["nome"];
    $nome_responsavel = $_POST["nome_responsavel"];
    $data = $_POST["data_nasc"];
    $sexo = $_POST["sexo"];
  
    $inserirPaciente = "INSERT INTO paciente VALUES (NULL, 0, '$nome', '$nome_responsavel', '$data', '$sexo')"; 
    $result = mysql_query($inserirPaciente);

    if($result)  {

        echo("<br>Insercao realizada com sucesso!");

    }  else  {

        echo("<br>ERRO ao realizar a incercao!!!");

    }

    fechar($db);
    
}  else  {
    
    echo("<br>Você não possui a função de administrador!");
}

?>   