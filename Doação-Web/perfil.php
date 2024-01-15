<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="stylepadrao.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">Página Inicial</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Doação</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php
            require_once('conecta.php');
                session_start();
                $start_time = time();
                while (time() - $start_time < 1) {
                }
                if(isset($_SESSION['id'])) {

                    if ($conn->connect_error) {
                        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
                    }

                    $idUsuario = $_SESSION['id'];

                    $sql = "SELECT * FROM usuariodoador WHERE id = $idUsuario";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $nome = $row['nome'];
                        $email = $row['email'];
                        $imagem = $row['imagem'];

                        echo '<img class="perfil" src="'.$row['imagem'].'" alt="img" width="100px" height="100px">
                             <h2>'.$nome.'</h2>
                             <p>Email: '.$email.'</p>
                             <form action="logout.php" method="post">
                                <button type="submit" class="logout">Logout</button>
                             </form>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                            <h3>Alterar a Imagem</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                    <center><form action="upload_imagem.php" method="post" enctype="multipart/form-data">
                                        <input type="file" name="nova_imagem" accept="image/*">
                                        <button type="submit" class="btn btn-primary">Alterar Imagem</button>
                                    </form><center>';
                    } else {
                        echo "Erro ao obter informações do usuário.</div>
                        </div>
                    </div>";
                    }

                    $conn->close();
                } else {
                    header("Location: Login.html");
                }
            ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>


// <form action="upload_imagem.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="nova_imagem" accept="image/*">
                        <button type="submit" class="btn btn-primary">Alterar Imagem</button>
</form>