<?php


require_once('conecta.php');
session_start();


if(isset($_SESSION['id'])) {
    $idUsuario = $_SESSION['id'];


    if(isset($_FILES['nova_imagem']) && $_FILES['nova_imagem']['error'] == 0) {
 
        $uploadDir = '';

        $nomeUnico = uniqid('imagem_') . '_' . time();
        $nomeArquivo = $nomeUnico . '.' . pathinfo($_FILES['nova_imagem']['name'], PATHINFO_EXTENSION);


        $caminhoCompleto = $uploadDir . $nomeArquivo;

        move_uploaded_file($_FILES['nova_imagem']['tmp_name'], $caminhoCompleto);

        $sqlUpdate = "UPDATE usuariodoador SET imagem = '$caminhoCompleto' WHERE id = $idUsuario";

        if ($conn->query($sqlUpdate) === TRUE) {
            header("location:perfil.php");
        } else {
            header("location:perfil.php");
        }
    } else {
        header("location:perfil.php");
    }
} else {
    header("location:login.php");
}

$conn->close();
?>
