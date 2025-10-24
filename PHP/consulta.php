<?php 
include("conexao.php");

$mensagem = "";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../CSS/tabela.css">
  <title>Resultado da Consulta</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //pega o titulo
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
                            <td>" . $linha["ano"] . "</td>
                            <td>" . $linha["genero"] . "</td>
                            <td>
                                <form method='post' action='excluir.php'>

                                    <input type='hidden' name='id_livro' value='" . $linha["id_livro"] . "'>
                                    <button type='submit' class='btn'>Excluir</button>
                                
                                </form>
                                
                                <form method='get' action='editar.php'>

                                    <input type='hidden' name='id_livro' value='" . $linha["id_livro"] . "'>
                                    <button type='submit' class='btn'>Editar</button>

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

?>