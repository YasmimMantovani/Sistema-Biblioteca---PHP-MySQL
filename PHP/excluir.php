<?php 
include("conexao.php");

$mensagem = "";

$id_livro = $_POST["id_livro"];
$sql = "delete from livros where id_livro = $id_livro";

if ($conexao->query($sql) === TRUE) {
    echo "<script>
            alert('Livro excluído com sucesso!');
            window.location.href = '../HTML/index.html';
          </script>";
} else {
    echo "<script>
            alert('Erro ao excluir livro: " . addslashes($conexao->error) . "');
            window.location.href = '../HTML/index.html';
          </script>";
    
}
?>