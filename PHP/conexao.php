<?php
//Configuracoes de conexao com o MySQL
$servidor = "localhost"; //Geralmente localhost no xampp
$usuario = "root"; //Usuario padrao do mysql no xampp
$senha = ""; //Senha padrao eh vazia, a nao ser que voce tenha alterado
$banco = "biblioteca"; //Nome do seu banco de  dados
//Criando a conexao
$conexao = new mysqli($servidor, $usuario, $senha, $banco);
//Verificando conexao
if($conexao->connect_error){
    die("Erro na conexao: " . $conexao->connect_error);
}
?>