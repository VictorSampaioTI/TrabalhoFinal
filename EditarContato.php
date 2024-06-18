<?php
include "conexao.php";
$usuario_id = $_GET['usuario_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Contato</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Contato</h2>
        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT * FROM contatos WHERE id = $id AND usuario_id = $usuario_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $contato = $result->fetch_assoc();
                ?>
                <form action="SalvarEdicao.php?usuario_id=<?php echo $usuario_id; ?>" method="post">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $contato["nome"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $contato["email"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $contato["telefone"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $contato["endereco"]; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $contato["id"]; ?>">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
                <?php
            } else {
                echo '<div class="alert alert-danger" role="alert">Contato não encontrado.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">ID do contato não fornecido.</div>';
        }
        ?>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
