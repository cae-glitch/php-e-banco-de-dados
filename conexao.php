<?php 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$conexao = new mysqli($servidor, $usuario, $senha, "cadastro");
$conexao->set_charset("utf8");
echo "Conectado com sucesso!";
?>