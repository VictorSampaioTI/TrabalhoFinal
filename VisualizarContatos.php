<?php
include "conexao.php";
$usuario_id = $_GET['usuario_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contatos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-4">Contatos</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM contatos WHERE usuario_id = $usuario_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nome"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["telefone"] . "</td>";
                            echo "<td>" . $row["endereco"] . "</td>";
                            echo "<td>
                                    <a href='EditarContato.php?id=" . $row["id"] . "&usuario_id=$usuario_id' class='btn btn-primary'>Editar</a>
                                    <a href='ExcluirContato.php?id=" . $row["id"] . "&usuario_id=$usuario_id' class='btn btn-danger'>Excluir</a>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhum contato encontrado</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="AdicionarContato.php?usuario_id=<?php echo $usuario_id; ?>" class="btn btn-success mt-3">Adicionar Contato</a>
        <div>
        <a href="index.php" class="btn btn-secondary mt-3">Voltar para Usuarios</a>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
