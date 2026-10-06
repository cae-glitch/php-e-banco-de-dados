<?php
include "conexao.php";
$resultado = $conexao->query("SELECT * FROM usuarios");
while ($linha = $resultado->fetch_assoc()) {
    echo $linha["id"] . " - " . $linha["nome"] . " - " . $linha["email"] . "<br>";
}