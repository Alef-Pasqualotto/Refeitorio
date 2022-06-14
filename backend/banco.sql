CREATE DATABASE IF NOT EXISTS refeicoes;

USE refeicoes;

CREATE TABLE IF NOT EXISTS ingrediente (ingrediente_id INT NOT NULL AUTO_INCREMENT,
                                        nome VARCHAR(100) NOT NULL,
                                        calorias INT NOT NULL,
                                        inativo INT,
                                        PRIMARY KEY (ingrediente_id));

CREATE TABLE IF NOT EXISTS item (item_id INT NOT NULL AUTO_INCREMENT,
                                 descricao VARCHAR(100) NOT NULL,
                                 inativo INT,
                                 PRIMARY KEY (item_id));

CREATE TABLE IF NOT EXISTS ingrediente_item (ingrediente_item_id INT NOT NULL AUTO_INCREMENT,
                                             item_id INT NOT NULL,
                                             ingrediente_id INT NOT NULL,
                                             PRIMARY KEY (ingrediente_item_id),
                                             FOREIGN KEY (item_id) REFERENCES item(item_id),
                                             FOREIGN KEY (ingrediente_id) REFERENCES ingrediente(ingrediente_id));

CREATE TABLE IF NOT EXISTS usuario (usuario_id INT NOT NULL AUTO_INCREMENT,
                                    nome VARCHAR(100) NOT NULL,
                                    senha VARCHAR(40) NOT NULL,
                                    email VARCHAR(120) NOT NULL,
                                    crn INT,
                                    PRIMARY KEY (usuario_id));

CREATE TABLE IF NOT EXISTS cardapio (cardapio_id INT NOT NULL AUTO_INCREMENT,
                                     dt date NOT NULL,
                                     tipo INT NOT NULL,
                                     nutricionista_id INT NOT NULL,
                                     dt_exclusao datetime,
                                     PRIMARY KEY (cardapio_id),
                                     FOREIGN KEY (nutricionista_id) REFERENCES usuario(usuario_id));

CREATE TABLE IF NOT EXISTS cardapio_item (cardapio_item_id INT NOT NULL AUTO_INCREMENT,                                     
                                     cardapio_id INT NOT NULL,
                                     item_id INT NOT NULL,
                                     PRIMARY KEY (cardapio_item_id),
                                     FOREIGN KEY (cardapio_id) REFERENCES cardapio(cardapio_id),
                                     FOREIGN KEY (item_id) REFERENCES item(item_id));

INSERT INTO INGREDIENTE (nome,calorias,inativo) VALUES ('Cebola', 200, 0);
INSERT INTO INGREDIENTE (nome,calorias,inativo) VALUES ('Maminha', 600, 0);
INSERT INTO INGREDIENTE (nome,calorias,inativo) VALUES ('Pimentão', 300, 0);
INSERT INTO INGREDIENTE (nome,calorias,inativo) VALUES ('Cogumelo', 200, 0);
INSERT INTO INGREDIENTE (nome,calorias,inativo) VALUES ('Limão', 100, 0);

INSERT INTO ITEM (descricao, inativo) VALUES ('Cebola frita', 0);
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (1, 1);

INSERT INTO ITEM (descricao, inativo) VALUES ('Strogonnof com chanpignon', 0);
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (2, 4);
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (2, 2);

INSERT INTO ITEM (descricao, inativo) VALUES ('Espetinhos de carne', 0);
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (3, 2);

INSERT INTO USUARIO (nome, senha, email) VALUES ('Francisco Cleber', 'vrido', 'megafrancisco@gmail.com');
INSERT INTO USUARIO VALUES (2, 'Roberta Guimarães', 'tauba', 'roberta_mineira@hotmail.com', 4);