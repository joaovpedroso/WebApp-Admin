CREATE SCHEMA webapp;
USE webapp;

CREATE TABLE IF NOT EXISTS situacao (
    idsituacao  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao   VARCHAR(10) NOT NULL
);
INSERT INTO situacao ( idsituacao, descricao ) VALUES (1, 'Ativo');
INSERT INTO situacao ( idsituacao, descricao ) VALUES (2, 'Inativo');

CREATE TABLE IF NOT EXISTS tiposexo(
    idtiposexo  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao   VARCHAR(20) NOT NULL
);
INSERT INTO tiposexo (idtiposexo, descricao) VALUES (1, 'Masculino'); 
INSERT INTO tiposexo (idtiposexo, descricao) VALUES (2, 'Feminino'); 

CREATE TABLE IF NOT EXISTS pessoa (
    idcpf BIGINT(30) NOT NULL PRIMARY KEY,
    cpf   VARCHAR(20) NOT NULL,
    rg    VARCHAR(20) NOT NULL,
    nome  VARCHAR(80) NOT NULL,
    datadenascimento DATE NOT NULL,
    idtiposexo INT NOT NULL,
    idsituacao INT NOT NULL,
    created DATE NOT NULL,
    updated DATE
);

ALTER TABLE pessoa ADD FOREIGN KEY (idtiposexo) REFERENCES tiposexo (idtiposexo);
ALTER TABLE pessoa ADD FOREIGN KEY (idsituacao) REFERENCES situacao (idsituacao);

CREATE TABLE IF NOT EXISTS usuario(
    idcpf   BIGINT NOT NULL,
    email   VARCHAR(80) NOT NULL,
    senha   VARCHAR(80) NOT NULL,
    idsituacao INT NOT NULL,
    created DATE NOT NULL,
    updated DATE
);
ALTER TABLE usuario ADD FOREIGN KEY (idcpf) REFERENCES pessoa(idcpf);
ALTER TABLE usuario ADD FOREIGN KEY (idsituacao) REFERENCES situacao(idsituacao);

CREATE TABLE IF NOT EXISTS tipoendereco(
    idtipoendereco INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao      VARCHAR(30)  NOT NULL
);

CREATE TABLE IF NOT EXISTS estado(
    idestado INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    estado   VARCHAR(50) NOT NULL
);


CREATE TABLE IF NOT EXISTS cidade(
    idcidade INT NOT NULL PRIMARY KEY,
    cidade   VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS endereco(
    idendereco  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idcpf       BIGINT NOT NULL,
    cep         VARCHAR(20) NOT NULL,
    endereco    VARCHAR(80) NOT NULL,
    numero      VARCHAR(20) NOT NULL,
    complemento VARCHAR(80),
    idestado    INT NOT NULL,
    idcidade    INT NOT NULL,
    idtipoendereco INT NOT NULL,
    bairro       VARCHAR(80) NOT NULL
);
ALTER TABLE endereco ADD FOREIGN KEY (idcpf) REFERENCES pessoa(idcpf);
ALTER TABLE endereco ADD FOREIGN KEY (idestado) REFERENCES estado(idestado);
ALTER TABLE endereco ADD FOREIGN KEY (idcidade) REFERENCES cidade(idcidade);
ALTER TABLE endereco ADD FOREIGN KEY (idtipoendereco) REFERENCES tipoendereco(idtipoendereco);


CREATE TABLE IF NOT EXISTS tipotelefone(
    idtipotelefone INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao      VARCHAR(80) NOT NULL
);
INSERT INTO tipotelefone ( idtipotelefone, descricao ) VALUES (1 , 'Fixo');
INSERT INTO tipotelefone ( idtipotelefone, descricao ) VALUES (2 , 'Celular');

CREATE TABLE IF NOT EXISTS telefone(
    idtelefone INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idcpf      BIGINT NOT NULL,
    idtipotelefone INT NOT NULL,
    ddd        INT NOT NULL,
    telefone   VARCHAR(30) NOT NULL,
    ramal      INT
);
ALTER TABLE telefone ADD FOREIGN KEY (idcpf) REFERENCES pessoa(idcpf);
ALTER TABLE telefone ADD FOREIGN KEY (idtipotelefone) REFERENCES tipotelefone(idtipotelefone);