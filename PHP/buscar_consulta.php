<?php 
include("conexao.php");

if(isset($_GET["titulo"])) {
    $titulo = $_GET["titulo"];

    header("Location: consulta.php?titulo = $titulo");
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/consulta.css">
    <title>Buscar livro para consulta</title>
</head>
<body>
    <div class="container">
        <div class="header"><h2>Consulta (individual)</h2></div>
        <div class="content">
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