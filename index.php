<?php
include "conexao.php";

$nome = "";
$email = "";
$area_atuacao = "";
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {       
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $area_atuacao = $_POST["area_atuacao"];
    if ($nome === "" || $email === "" || $area_atuacao === "") {
        $mensagem = "Preencha todos os campos.";
    } else {
        $sql = "INSERT INTO usuários (nome, email, area_atuacao) VALUES ('$nome', '$email', '$area_atuacao')";
        $conexao->query($sql);
        $mensagem = "Cadastro realizado com sucesso!";
        $nome = "";
        $email = "";
        $area_atuacao = "";
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
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .container { display: flex; width: 900px; background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden; }
        .left-panel { background-color: #3b9e7c; color: white; width: 40%; padding: 40px; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; }
        .left-panel h1 { font-size: 28px; margin-bottom: 15px; }
        .left-panel p { font-size: 14px; line-height: 1.5; opacity: 0.9; }
        .right-panel { width: 60%; padding: 50px 40px; }
        .right-panel h2 { color: #3b9e7c; font-size: 26px; margin-bottom: 5px; text-align: center; }
        .right-panel p { color: #7f8c8d; font-size: 14px; text-align: center; margin-bottom: 30px; }
        .form-group { margin-bottom: 15px; }
        .form-group input { width: 100%; padding: 12px 15px; border: 1px solid #e0e0e0; border-radius: 6px; background-color: #f8f9fa; font-size: 14px; outline: none; transition: border 0.3s; }
        .form-group input:focus { border-color: #3b9e7c; }
        .buttons { display: flex; justify-content: space-between; margin-top: 30px; gap: 15px; }
        button { flex: 1; padding: 12px; border-radius: 25px; font-weight: bold; cursor: pointer; transition: 0.3s; font-size: 14px; }
        .btn-limpar { background-color: white; color: #3b9e7c; border: 1px solid #3b9e7c; }
        .btn-limpar:hover { background-color: #f0fdf6; }
        .btn-cadastrar { background-color: #3b9e7c; color: white; border: none; }
        .btn-cadastrar:hover { background-color: #2c7a5f; }
    </style>
<body>
    <h1>Bem-vindo ao cadastro</h1>
    <?php if ($mensagem !== "") { ?>
        <p><?php echo $mensagem; ?></p>
    <?php } ?>
    <form action="index.php" method="POST">
        <input type="text" name="nome" placeholder="Nome" value="<?php echo $nome; ?>">
        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
        <input type="text" name="area_atuacao" placeholder="Area Atuação" value="<?php echo $area_atuacao; ?>">
        <button type="submit">Cadastrar</button>
    </form>
    
</body>
</html>