<?php
include "conexao.php";
$usuario_id = $_GET['usuario_id'];

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM contatos WHERE id = $id AND usuario_id = $usuario_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: VisualizarContatos.php?usuario_id=$usuario_id");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao excluir contato: ' . $conn->error . '</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">ID do contato não fornecido.</div>';
}

$conn->close();
?>
