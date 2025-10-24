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
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Buscar Livro</title>

</head>

<body>
    <div class="formulario">
        <h2>Buscar Livro para Edição</h2>
        <form action="editar.php" method="get">
            <label for="id_livro">Digite o código do livro:</label>
            <input type="number" id="id_livro" name="id_livro" required placeholder="Ex: 1">

            <button type="submit" class="btn" value="Buscar">Buscar</button>
            <a href="../HTML/index.html" class="btn">Voltar</a>
        </form>
    </div>
</body>
</html>