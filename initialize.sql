CREATE DATABASE changebook;

CREATE TABLE usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    dataCriacao TIMESTAMP NOT NULL,
    nomeUsuario VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    fotoPerfil VARCHAR(255)
)engine = InnoDB;

CREATE TABLE livro (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    sinopse VARCHAR(255) NOT NULL
)engine = InnoDB;

CREATE TABLE localizacao (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cidade VARCHAR(255) NOT NULL,
    estado VARCHAR(255) NOT NULL
)engine = InnoDB;

CREATE TABLE anuncio (
    idAnuncio INT PRIMARY KEY AUTO_INCREMENT,
    idUsuario INT NOT NULL,
    idLivro INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    urlCapa VARCHAR(255),
    dataCriacao TIMESTAMP NOT NULL,
    preco FLOAT NOT NULL,
    idLocalizacao INT NOT NULL,
    FOREIGN KEY (idLivro) REFERENCES livro(id),
    FOREIGN KEY (idUsuario) REFERENCES usuario(id),
    FOREIGN KEY (idLocalizacao) REFERENCES localizacao(id)
)engine = InnoDB;

CREATE TABLE tag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL
)engine = InnoDB;

CREATE TABLE tagAnuncio (
    idTag INT,
    idAnuncio INT NOT NULL,
    PRIMARY KEY(idTag, idAnuncio),
    FOREIGN KEY (idTag) REFERENCES tag(id),
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


INSERT INTO localizacao (cidade, estado)
VALUES ('Niterói', 'Rio de Janeiro');

INSERT INTO localizacao (cidade, estado)
VALUES ('São Gonçalo', 'Rio de Janeiro');

INSERT INTO localizacao (cidade, estado)
VALUES ('Rio de Janeiro', 'Rio de Janeiro');

INSERT INTO localizacao (cidade, estado)
VALUES ('Itaborai', 'Rio de Janeiro');

INSERT INTO localizacao (cidade, estado)
VALUES ('Fortaleza', 'Ceará');

INSERT INTO localizacao (cidade, estado)
VALUES ('Natal', 'Rio Grande do Norte');

INSERT INTO localizacao (cidade, estado)
VALUES ('Salvador', 'Bahia');

INSERT INTO tag(nome)
VALUES ('Ação');

INSERT INTO tag(nome)
VALUES ('Comédia');

INSERT INTO tag(nome)
VALUES ('Ficção');

INSERT INTO tag(nome)
VALUES ('Terror');

INSERT INTO tag(nome)
VALUES ('Administração');

INSERT INTO tag(nome)
VALUES ('História');