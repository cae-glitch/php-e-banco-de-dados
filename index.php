<?php
include "conexao.php";

$nome = "";
$email = "";
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {       
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    if ($nome === "" || $email === "") {
        $mensagem = "Preencha todos os campos.";
    } else {
        $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
        $conexao->query($sql);
        $mensagem = "Cadastro realizado com sucesso!";
        $nome = "";
        $email = "";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Bem-vindo ao cadastro</h1>
    <?php if ($mensagem !== "") { ?>
        <p><?php echo $mensagem; ?></p>
    <?php } ?>
    <form method="POST">
        <input name="nome" placeholder="Nome" value="<?php echo $nome; ?>">
        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
        <button>Cadastrar</button>
    </form>
</body>
</html>