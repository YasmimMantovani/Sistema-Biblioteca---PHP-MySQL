<?php
include("conexao.php");

$mensagem = "";

$consulta = $_POST["titulo"];
$sql = "select * from livros where titulo like '%$consulta%'";
$resultado = $conexao->query($sql);

if($consulta == "") {
    $mensagem = "Campo de busca vazio. Por favor, insira um título para buscar.";
} else {
    if($resultado->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ano de Publicação</th>
                    <th>Gênero</th>
                    <th>Ações</th>
                </tr>";
        while($linha = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>". $linha["id_livro"] . "</td>
                    <td>". $linha["titulo"] . "</td>
                    <td>". $linha["autor"] . "</td>
                    <td>". $linha["ano_publicacao"] . "</td>
                    <td>". $linha["genero"] . "</td>
                    <td>
                        <form method='post' action='excluir.php' style='display:inline;'>
                            <input type='hidden' name='id_livro' value='" . $linha["id_livro"] . "'>
                            <button type='submit'>Excluir</button>
                        </form>
                        
                        <form method='get' action='editar.php' style='display: inline; margin-left: 5px;'>
                            <input type='hidden' name='id_livro' value='" . $linha["id_livro"] . "'>
                            <button type='submit'>Editar</button>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</table>";
    }
}
?>