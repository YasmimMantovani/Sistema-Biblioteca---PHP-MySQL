<?php
include("conexao.php");

$mensagem = ""; // Variável para armazenar a mensagem

// Recebendo dados do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $genero = $_POST['genero'];

    // Preparando comando SQL
    $sql = "INSERT INTO livros (titulo, autor, ano_publicacao, genero)
            VALUES (?, ?, ?, ?)";

    // Usando prepared statement para segurança
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssis", $titulo, $autor, $ano, $genero);

    if ($stmt->execute()) {
        $mensagem = "✅ Livro cadastrado com sucesso!";
    } else {
        $mensagem = "❌ Erro: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="shortcut icon" href="../img/pngegg.png">
    <title>Cadastro de Livros</title>
</head>
<body>
    <div class="container">
        <div class="formulario">
            <?php if (!empty($mensagem)): ?>
                <div class="mensagem"><?= $mensagem ?></div>
            <?php endif; ?>
            <h2>Cadastre um livro</h2>
            <form action="inserir_livro.php" method="post">
                <div class="labels">
                    <label>Título:</label><br>
                    <input type="text" name="titulo" required><br><br>

                    <label>Autor:</label><br>
                    <input type="text" name="autor" required><br><br>

                    <label>Ano de Publicação:</label><br>
                    <input type="number" name="ano" required><br><br>

                    <label>Gênero:</label><br>
                    <input type="text" name="genero" required><br><br>
                </div>

                <div class="botao">
                    <button type="submit" class="btn" value="Cadastrar">Cadastrar</button>
                    <a href="../HTML/index.html" class="btn">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

