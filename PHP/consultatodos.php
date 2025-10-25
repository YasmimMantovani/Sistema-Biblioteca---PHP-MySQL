<?php
include("conexao.php");

$sql = "select * from livros";
$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/tabela.css">
    <link rel="shortcut icon" href="../img/pngegg.png">
    <title>Livros Cadastrados</title>
</head>
<body>
    <div class="container">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano de Publicação</th>
                <th>Gênero</th>
                <th>Ações</th>
            </tr>

            <?php
            while ($linha = $resultado->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $linha['id_livro'] . "</td>";
                echo "<td>" . $linha['titulo'] . "</td>";
                echo "<td>" . $linha['autor'] . "</td>";
                echo "<td>" . $linha['ano_publicacao'] . "</td>";
                echo "<td>" . $linha['genero'] . "</td>";
                echo "<td>
                        <form method='post' action='excluir.php'>
                        <input type='hidden' name='id_livro' value='" . $linha["id_livro"]. "'>
                        <div class='botao'>
                            <button type='submit' class='btn'>Excluir</button>
                        </div>
                        </form>
                        
                        <form method='get' action='editar.php'>
                        <input type='hidden' name='id_livro' value='" . $linha["id_livro"]. "'>
                        <div class='botao'>
                            <button type='submit' class='btn'>Editar</button>
                        </div>
                        </form>";
                echo "</tr>";
            }
            ?>
        </table>
        <div class="botao">
            <a href="../HTML/index.html" class="btn">Voltar</a>
        </div>
    </div>
</body>