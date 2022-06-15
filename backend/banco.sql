DROP DATABASE refeicoes;

CREATE DATABASE IF NOT EXISTS refeicoes;

USE refeicoes;

CREATE TABLE IF NOT EXISTS ingrediente (ingrediente_id INT NOT NULL AUTO_INCREMENT,
                                        nome VARCHAR(100) NOT NULL,
                                        calorias INT NOT NULL,
                                        dt_exclusao DATE,
                                        PRIMARY KEY (ingrediente_id));

CREATE TABLE IF NOT EXISTS item (item_id INT NOT NULL AUTO_INCREMENT,
                                 descricao VARCHAR(100) NOT NULL,
                                 dt_exclusao DATE,
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

INSERT INTO INGREDIENTE (nome,calorias) VALUES ('Cebola', 200);
INSERT INTO INGREDIENTE (nome,calorias) VALUES ('Maminha', 600);
INSERT INTO INGREDIENTE (nome,calorias) VALUES ('Pimenton', 300);
INSERT INTO INGREDIENTE (nome,calorias) VALUES ('Cogumelo', 200);
INSERT INTO INGREDIENTE (nome,calorias) VALUES ('Limon', 100);
INSERT INTO INGREDIENTE (nome,calorias) VALUES ('Carne de Frango', 300);
INSERT INTO INGREDIENTE (nome,calorias) VALUES ('Arroz', 300);
INSERT INTO INGREDIENTE (nome,calorias) VALUES ('Requeijon', 400);
INSERT INTO INGREDIENTE (nome,calorias) VALUES ('Carne de Gado', 300);
INSERT INTO INGREDIENTE (nome,calorias) VALUES ('Massa Penne', 500);

INSERT INTO ITEM (descricao) VALUES ('Cebola frita');
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (1, 1);

INSERT INTO ITEM (descricao) VALUES ('Strogonnof com chanpignon');
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (2, 4);
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (2, 2);

INSERT INTO ITEM (descricao) VALUES ('Espetinhos de carne');
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (3, 2);

INSERT INTO ITEM (descricao) VALUES ('Arroz com Frango');
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (4, 6);
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (4, 7);
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (4, 8);

INSERT INTO ITEM (descricao) VALUES ('Massa com Iscas de Gado');
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (5, 9);
INSERT INTO INGREDIENTE_ITEM (item_id, ingrediente_id) VALUES (5, 10);

INSERT INTO USUARIO (nome, senha, email) VALUES ('Francisco Cleber', 'vrido', 'megafrancisco@gmail.com');
INSERT INTO USUARIO VALUES (2, 'Roberta Guimaris', 'tauba', 'roberta_mineira@hotmail.com', 4);