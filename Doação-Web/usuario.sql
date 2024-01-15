CREATE DATABASE doador;

CREATE TABLE usuariodoador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    imagem VARCHAR(255) DEFAULT 'perfil_logado.png'
);

