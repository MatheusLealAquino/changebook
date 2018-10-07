CREATE DATABASE changebook;

CREATE TABLE usuario (
    id INT PRIMARY KEY,
    dataCriacao TIMESTAMP NOT NULL,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    fotoPerfil VARCHAR(255)
)engine = InnoDB;

CREATE TABLE livro (
    id INT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sinopse VARCHAR(255) NOT NULL
)engine = InnoDB;

CREATE TABLE localizacao (
    id INT PRIMARY KEY,
    cidade VARCHAR(255) NOT NULL,
    estado VARCHAR(255) NOT NULL
)engine = InnoDB;

CREATE TABLE anuncio (
    id INT PRIMARY KEY,
    idLivro INT NOT NULL,
    dataCriacao TIMESTAMP NOT NULL,
    preco FLOAT NOT NULL,
    status BOOLEAN NOT NULL,
    idLocalizacao INT NOT NULL,
    FOREIGN KEY (idLivro) REFERENCES livro(id),
    FOREIGN KEY (idLocalizacao) REFERENCES localizacao(id)
)engine = InnoDB;

CREATE TABLE foto (
    id INT PRIMARY KEY,
    idAnuncio INT NOT NULL,
    url VARCHAR(255) NOT NULL,
    FOREIGN KEY (idAnuncio) REFERENCES anuncio(id)
)engine = InnoDB;

CREATE TABLE tag (
    id INT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
)engine = InnoDB;

CREATE TABLE tagAnuncio (
    idTag INT,
    idAnuncio INT NOT NULL,
    PRIMARY KEY(idTag, idAnuncio),
    FOREIGN KEY (idTag) REFERENCES tag(id),
    FOREIGN KEY (idAnuncio) REFERENCES anuncio(id)
)engine = InnoDB;

CREATE TABLE comentario (
    id INT PRIMARY KEY,
    idAnuncio INT NOT NULL,
    comentario VARCHAR(255) NOT NULL,
    FOREIGN KEY (idAnuncio) REFERENCES anuncio(id)
)engine = InnoDB;

CREATE TABLE emprestimo (
    idUsuarioDono INT,
    idUsuarioAluguel INT,
    idAnuncio INT,
    data TIMESTAMP NOT NULL,
    valor FLOAT NOT NULL,
    idAnuncioTroca INT,
    PRIMARY KEY(idUsuarioDono, idUsuarioAluguel, idAnuncio),
    FOREIGN KEY (idUsuarioDono) REFERENCES usuario(id),
    FOREIGN KEY (idUsuarioAluguel) REFERENCES usuario(id),
    FOREIGN KEY (idAnuncio) REFERENCES anuncio(id),
    FOREIGN KEY (idAnuncioTroca) REFERENCES anuncio(id)
)engine = InnoDB;
