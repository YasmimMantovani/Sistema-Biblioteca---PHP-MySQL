<?php 
include("conexao.php");

$mensagem = "";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/tabela2.css">
  <link rel="shortcut icon" href="../img/pngegg.png">
  <title>Resultado da Consulta</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <?php if (!empty($mensagem)): ?>
                <div class="mensagem"><?= $mensagem ?></div>
            <?php endif; ?>       
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $consulta = trim($_POST["titulo"]);

                    if($consulta == "") {
                        $mensagem = "⚠️ Campo de busca vazio. Por favor, insira um título para buscar.";
                    } else {
                        $sql = "select * from livros where titulo like '%$consulta%'";
                        $resultado = $conexao->query($sql);

                        if($resultado && $resultado->num_rows > 0) {
                            echo "<table border 1>
                                    <tr>
                                        <th>Id</th>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Ano de Publicação</th>
                                        <th>Gênero</th>
                                        <th>Ações</th>
                                    </tr>";
                            
                            while ($linha = $resultado->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $linha["id_livro"] . "</td>
                                        <td>" . $linha["titulo"] . "</td>
                                        <td>" . $linha["autor"] . "</td>
                                        <td>" . $linha["ano_publicacao"] . "</td>
                                        <td>" . $linha["genero"] . "</td>
                                        <td>
                                            <form method='post' action='excluir.php'>

                                                <input type='hidden' name='id_livro' value='" . $linha["id_livro"] . "'>
                                                <div class='botao'>
                                                    <button type='submit' class='btn'>Excluir</button>
                                                </div>
                                            
                                            </form>
                                            
                                            <form method='get' action='editar.php'>

                                                <input type='hidden' name='id_livro' value='" . $linha["id_livro"] . "'>
                                                <div class='botao'>
                                                    <button type='submit' class='btn'>Editar</button>
                                                </div>

                                            </form>
                                        </td>
                                    </tr>";
                            }

                            echo "</table>";

                        } else {
                            $mensagem = "❌ Nenhum livro encontrado com esse título.";
                        }
                    }
            }

            if (!empty($mensagem)){
                echo "<div class='mensagem'> $mensagem </div>";
            }
            ?>
            <div class="botao">
                <a href="../HTML/index.html" class="btn">Voltar</a>
            </div>
        </div>
    </div>
</body>
