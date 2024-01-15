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
        <a class="navbar-brand" href="#">Página Inicial</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-link">
                    <a class="nav-link" href="#">Doação</a>
                </li>
                <?php
session_start();
require_once('conecta.php');
$start_time = time();
while (time() - $start_time < 1) {
}
if (isset($_SESSION['id'])) {
    $id_usuario = $_SESSION['id'];
    $consulta = "SELECT * FROM usuariodoador WHERE id = $id_usuario";
    $resultado = $conn->query($consulta);

    if ($resultado && $resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $imagem_path = $row['imagem'];


        if (!empty($imagem_path)) {
            echo '<li class="nav-item">
                    <a class="nav-link" href="perfil.php"><img class="perfil" src="'.$row['imagem'].'" alt="img" width="50px" height="50px"></a>
                </li>';
        } else {
            echo '<li class="nav-item">
                    <a class="nav-link" href="perfil.php"><img class="perfil" src="pefil.png" alt="img" width="50px" height="50px"></a>
                </li>';
        }
    }
} else {
    echo '<li class="nav-item">
            <a class="nav-link" href="login.html"><img src="perfil.png" alt="img" width="35px" height="35px"></a>
          </li>';
}
?>

            </ul>
        </div>
    </nav>

    <div class="container-G">
        <div class="row">
            <div class="col-md-12">
                <h1>Valores Das Doações</h1>
                <h4>1000</h4>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>
