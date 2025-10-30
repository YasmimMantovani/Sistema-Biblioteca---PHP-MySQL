<?php 
include("conexao.php");

$mensagem = "";

if(isset($_GET["titulo"])) {
    $titulo = $_GET["titulo"];

    header("Location: consulta.php?titulo = $titulo");
    exit;
}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/consulta.css">
    <link rel="shortcut icon" href="../img/pngegg.png">
    <title>Buscar livro para consulta</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <?php if (!empty($mensagem)): ?>
                <div class="mensagem"><?= $mensagem ?></div>
            <?php endif; ?>
            <h2>Busque um livro para consultar</h2>
            <form action="consulta.php" method="post">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Insira o título" required>
                <br><br>

                <div class="botao">
                    <button type="submit" class="btn" name="consulta" value="Consultar">Consultar</button>
                    <a href="../HTML/index.html" class="btn">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>