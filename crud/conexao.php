<?php

/* 
 HOST: Host de conexão com o banco de dados (o host alternativo deve ser utilizado quando você não aponta os 
DNSs para a KingHost);
 USUARIO: Usuário de acesso ao banco de dados da conexão;
 SENHA: Senha de acesso ao banco de dados especificado na conexão;
 BASE: Nome da base a qual você deseja fazer acesso.
*/

$server_name = "localhost";
$name_database = "sge";
$user_server = "root";
$password_server = "";

try{
    $conexao = new PDO ('mysql:host=localhost;dbname=sge', $user_server, $password_server);

    $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   /*  echo "Conectado com sucesso. <br>"; */

} catch(PDOException $e){

    echo "Conexão falhou. Erro ".$e->getMessage()." <br>";
    
}

?>