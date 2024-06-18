<?php
include "conexao.php";

$sqlContatosPorUsuario = "SELECT u.nome AS nome_usuario, COUNT(*) AS total_contatos FROM contatos c JOIN usuarios u ON c.usuario_id = u.id GROUP BY c.usuario_id";
$resultContatosPorUsuario = $conn->query($sqlContatosPorUsuario);

$sqlTotalContatos = "SELECT COUNT(*) AS total_contatos FROM contatos";
$resultTotalContatos = $conn->query($sqlTotalContatos);
$totalContatos = $resultTotalContatos->fetch_assoc()['total_contatos'];

$sqlContatosDuplicados = "SELECT c.nome AS nome_contato, GROUP_CONCAT(u.nome) AS usuarios, COUNT(*) AS total_duplicados 
                            FROM contatos c 
                            JOIN usuarios u ON c.usuario_id = u.id 
                            GROUP BY c.nome 
                            HAVING COUNT(*) > 1";
$resultContatosDuplicados = $conn->query($sqlContatosDuplicados);
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio de Contatos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Relatorio de Contatos</h2>

        <h4>Quantidade de contatatos de cada usuario:</h4>
        <ul>
            <?php
            if ($resultContatosPorUsuario->num_rows > 0) {
                while ($row = $resultContatosPorUsuario->fetch_assoc()) {
                    echo "<li>Usuário " . $row["nome_usuario"] . ": " . $row["total_contatos"] . " contatos</li>";
                }
            } else {
                echo "<li>Nenhum contato encontrado</li>";
            }
            ?>
        </ul>

        <h4>Total geral de contatos: <?php echo $totalContatos; ?></h4>

        <h4>Contatos duplicados:</h4>
        <ul>
            <?php
            if ($resultContatosDuplicados->num_rows > 0) {
                while ($row = $resultContatosDuplicados->fetch_assoc()) {
                    echo "<li>O contato '" . $row["nome_contato"] . "' aparece em " . $row["total_duplicados"] . " usuários diferentes: " . $row["usuarios"] . "</li>";
                }
            } else {
                echo "<li>Nenhum contato duplicado encontrado</li>";
            }
            ?>
        </ul>

        <a href="index.php" class="btn btn-secondary mt-3">Voltar para a página inicial</a>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
