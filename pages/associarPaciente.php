<?php 

//inserir profissional no banco
include("telaAssociarPaciente.php");

$tipo = $_SESSION["tipo"];

if($tipo == 0)  {

    $db = conectar();

    $nome_profissional = $_POST["nome_profissional"];
    $nome_paciente = $_POST["nome_paciente"];

    //buscar codigo profissional na tabela usuario
    $buscarCodProf = "SELECT cod_usuario FROM usuario WHERE nome = '$nome_profissional' "; 
    $result1 = mysql_query($buscarCodProf);
    
    while($consulta = mysql_fetch_array($result1)) {

        $cod_usuario = $consulta[cod_usuario];

    }
    
    //fazer update na tabela paciente do cod_profissional daquela paciente
    $update = "UPDATE paciente SET cod_profissional = '$cod_usuario' WHERE nome = '$nome_paciente' "; 
    $result2 = mysql_query($update);
    
    
    if($result2)  {

        echo("<br>Associação realizada com sucesso!");

    }  else  {

        echo("<br>ERRO ao realizar a associação!!!");

    }

    fechar($db);
    
}  else  {
    
    echo("<br>Você não possui a função de administrador!");
}

?>   