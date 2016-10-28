<?php 

//inserir profissional no banco
include("telaCadastroUsuario.php");

$tipo = $_SESSION["tipo"];

if($tipo == 0)  {

    $db = conectar();

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $nome_usuario = $_POST["nome_usuario"];
    $tipo = $_POST["tipo"];

    $inserirUsuario = "INSERT INTO usuario VALUES (NULL, '$nome_usuario', '$senha', '$nome', '$email', '$tipo')"; 
    $result = mysql_query($inserirUsuario);

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