/* Lógico_1.3.1: */

CREATE TABLE Equipamento (
    id_equipamento INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    tipo VARCHAR(255),
    nome_equipamento VARCHAR(255),
    patrimonio INTEGER(255),
    fk_fabricante_id INTEGER,
    fk_usuario_id INTEGER
);

CREATE TABLE Fabricante (
    id_fabricante INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome_fabricante VARCHAR(255)
);

CREATE TABLE Local (
    id_local INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome_local VARCHAR(255)
);

CREATE TABLE Emprestimo (
    id_emprestimo INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data_inicio DATE,
    data_fim DATE,
    situacao VARCHAR(255),
    quantidade INTEGER,
    fk_setor_id INTEGER,
    fk_usuario_id INTEGER,
    fk_equipamento_id INTEGER
);

CREATE TABLE Setor (
    id_setor INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome_setor VARCHAR(255),
    responsavel VARCHAR(255)
);

CREATE TABLE Usuario (
    id_usuario INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(255),
    nome_usuario VARCHAR(255),
    senha VARCHAR(255)
);

CREATE TABLE Estoque_gerencia (
    id_estoque INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    quantidade INTEGER,
    fk_equipamento_id INTEGER,
    fk_local_id INTEGER
);
 
ALTER TABLE Equipamento ADD CONSTRAINT FK_Equipamento_ID_Fabricante
    FOREIGN KEY (fk_fabricante_id)
    REFERENCES Fabricante (id_fabricante)
    ON DELETE RESTRICT ON UPDATE RESTRICT;
 
ALTER TABLE Equipamento ADD CONSTRAINT FK_Equipamento_ID_Usuario
    FOREIGN KEY (fk_usuario_id)
    REFERENCES Usuario (id_usuario)
    ON DELETE CASCADE ON UPDATE CASCADE;
 
ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_ID_Setor
    FOREIGN KEY (fk_setor_id)
    REFERENCES Setor (id_setor)
    ON DELETE RESTRICT ON UPDATE RESTRICT;
 
ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_ID_Usuario
    FOREIGN KEY (fk_usuario_id)
    REFERENCES Usuario (id_usuario)
    ON DELETE RESTRICT ON UPDATE RESTRICT;
 
ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_ID_Equipamento
    FOREIGN KEY (fk_equipamento_id)
    REFERENCES Equipamento (id_equipamento)
    ON DELETE CASCADE ON UPDATE CASCADE;
 
ALTER TABLE Estoque_gerencia ADD CONSTRAINT FK_Estoque_gerencia_ID_Equipamento
    FOREIGN KEY (fk_equipamento_id)
    REFERENCES Equipamento (id_equipamento)
    ON DELETE CASCADE ON UPDATE CASCADE;
 
ALTER TABLE Estoque_gerencia ADD CONSTRAINT FK_Estoque_gerencia_ID_Local
    FOREIGN KEY (fk_local_id)
    REFERENCES Local (id_local)
    ON DELETE CASCADE ON UPDATE CASCADE;