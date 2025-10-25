<?php
include("conexao.php");

$mensagem = "";
$livro = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_livro = $_POST['id_livro'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $genero = $_POST['genero'];

    $sql = "update livros
            set titulo = '$titulo',
            autor = '$autor',
            ano_publicacao = '$ano',
            genero = '$genero'
            where id_livro = '$id_livro'";
    
    if ($conexao->query($sql) == TRUE) {
        $mensagem = "✅ Livro atualizado com sucesso!";
    } else {
        $mensagem = "❌ Erro ao atualizar: " . $conexao->error;
    }

    $sql = "select * from livros where id_livro = $id_livro";
    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0) {
        $livro = $resultado->fetch_assoc();
    }
}

elseif (isset($_GET["id_livro"])) {
    $id_livro = $_GET["id_livro"];
    $sql = "select * from livros where id_livro = $id_livro";
    $resultado = $conexao->query($sql);

    if($resultado->num_rows > 0) {
        $livro = $resultado->fetch_assoc();
    } else {
        $mensagem = "❌ Livro não encontrado!";
    }
} else {
    $mensagem = "Código do livro não informado.";
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="shortcut icon" href="../img/pngegg.png">
    <title>Editar Livros</title>
</head>
<body>
    <div class="container">
        <div class="formulario">
            <?php if (!empty($mensagem)): ?>
                <div class="mensagem"><?= $mensagem ?></div>
            <?php endif; ?>
            <h2>Editar Livro</h2>
            <?php if (isset($livro)): ?>
            <form action="editar.php" method="post">
                <div class="labels">
                    <input type="hidden" name="id_livro" value="<?= $livro['id_livro']; ?>"><br><br>

                    <label>Título:</label><br>
                    <input type="text" name="titulo" value="<?= $livro['titulo']; ?>"><br><br>

                    <label>Autor:</label><br>
                    <input type="text" name="autor" value="<?= $livro['autor']; ?>"><br><br>

                    <label>Ano de Publicação:</label><br>
                    <input type="number" name="ano" value="<?= $livro['ano_publicacao']; ?>"><br><br>

                    <label>Gênero:</label><br>
                    <input type="text" name="genero" value="<?= $livro['genero']; ?>"><br><br>
                </div>

                <div class="botao">
                    <button type="submit" class="btn" value="Salvar Alterações">Salvar Alterações</button>
                    <a href="../HTML/index.html" class="btn">Voltar</a>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
