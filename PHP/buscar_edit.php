<?php
include("conexao.php");
// Se o formulário foi enviado:
if (isset($_GET["titulo"])) {
    $titulo = $_GET["titulo"];

    // Redireciona para a tela de edição
    header("Location: consulta.php?titulo=$titulo");
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
    <title>Buscar Livro</title>

</head>

<body>
    <div class="container">
        <div class="header"><h2>Buscar Livro</h2></div>
        <div class="content">
            <form action="editar.php" method="get">
                <label for="id_livro">Digite o código do livro:</label>
                <input type="number" id="id_livro" name="id_livro" required placeholder="Ex: 1">
                <br><br>

                <div class="botao">
                    <button type="submit" class="btn" value="Buscar">Buscar</button>
                    <a href="../HTML/index.html" class="btn">Voltar</a>
                </div>
            </form>              
        </div>
    </div>
</body>
</html>