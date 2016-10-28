<?php

include("conexaoBanco.php");
session_start();
/* Se foi digitado um login e uma senha, realize as operações abaixo */
if (isset($_POST['senha']) && isset($_POST['login']) && $_POST['senha'] != "" && $_POST['login'] != "") {
   
    /* Cria um objeto da classe DbInteractions, voltado para o sisam 
     * e realiza a conexão */
    $db = conectar();
   
    //$login_criptografado = sha1($_POST['login']);
    //$senha_criptografada = sha1($_POST['senha']);
    
    $login_criptografado = $_POST['login'];
    $senha_criptografada = $_POST['senha'];
    
    /* Procuramos por usuários com o login e a senha digitados */
    $selectUsuario = "SELECT * FROM usuario WHERE nome_usuario='$login_criptografado' AND senha='$senha_criptografada'";
    $usuarios = mysql_query($selectUsuario, $db);

    /* Se não foi encontrado nenhum usuário com o login e senha procurados
     * exiba a mensagem abaixo */
    if (mysql_num_rows($usuarios) == 1) {
        /* Para cada usuario encontrado na lista usuarios faça as 
         * seguintes operações abaixo. Essas operações adicionam
         * a uma variável de sessão dados que serão utilizados posteriormente 
         */
        
        while($consulta = mysql_fetch_array($usuarios)) {

            $_SESSION["cod_usuario"] = $consulta[cod_usuario];
            $_SESSION["login"] = $consulta[nome_usuario];
            $_SESSION["senha"] = $consulta[senha];      
            $_SESSION["nome"] = $consulta[nome];
            $_SESSION["tipo"] = $consulta[tipo];
        }
        
    } else {
        
        die("<script> alert('Login ou senha incorreto(s)! Tente novamente!');
                       window.location.href = 'index.html';
                      </script>");
    }
    
    /* Encerra a conexão com o banco */
        fechar($db);
        ?>

<form name="dashMenu" method="post" class="validar" action="menu.php">
     
</form><script>
setTimeout("document.dashMenu.submit()");
  </script> 


    <?php
        
        
        
}
/* Caso o usuário não preencha o nome de usuário e/ou senha, exiba a mensagem abaixo e o encaminhe
 * para o index
 */ else {
    die("<script> alert('Voce nao pode acessar esta area pois nao esta logado. Realize o login e tente novamente! ');
			window.location.href = 'index.html';
	      </script>");
}
echo "</p></form>";
?>
