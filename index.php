<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
    <?php include "conexao.php"; ?>

<body>
    <div class="container mt-5">
        <h2>Usuários</h2>
        <ul class="list-group">
            <?php
            $sql = "SELECT * FROM usuarios";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li class="list-group-item"><a href="AdicionarContato.php?usuario_id=' . $row["id"] . '">' . $row["nome"] . '</a></li>';
                }
            } else {
                echo '<li class="list-group-item">Nenhum usuário encontrado</li>';
            }
            ?>
        </ul>
        
        <div>
            <a href="relatorio.php" class="btn btn-primary mt-3">Ver Relatório</a>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
