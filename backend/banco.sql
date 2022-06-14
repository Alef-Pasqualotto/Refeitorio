CREATE DATABASE IF NOT EXISTS refeicoes;

USE refeicoes;

CREATE TABLE IF NOT EXISTS ingrediente (ingrediente_id INT NOT NULL AUTO_INCREMENT,
                                        nome VARCHAR(100) NOT NULL,
                                        calorias INT NOT NULL,
                                        PRIMARY KEY (ingrediente_id));

CREATE TABLE IF NOT EXISTS item (item_id INT NOT NULL AUTO_INCREMENT,
                                 descricao VARCHAR(100) NOT NULL,
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

INSERT INTO INGREDIENTE VALUES (1, 'Cebola', 200);
INSERT INTO INGREDIENTE VALUES (2, 'Maminha', 600);
INSERT INTO INGREDIENTE VALUES (3, 'Pimentão', 300);
INSERT INTO INGREDIENTE VALUES (4, 'Cogumelo', 200);
INSERT INTO INGREDIENTE VALUES (5, 'Limão', 100);

INSERT INTO ITEM VALUES (1, 'Cebola frita');
INSERT INTO INGREDIENTE_ITEM VALUES (1, 1, 1);

INSERT INTO ITEM VALUES (2, 'Strogonnof com chanpignon');
INSERT INTO INGREDIENTE_ITEM VALUES (2, 2, 4);
INSERT INTO INGREDIENTE_ITEM VALUES (3, 2, 2);

INSERT INTO ITEM VALUES (3, 'Espetinhos de carne');
INSERT INTO INGREDIENTE_ITEM VALUES (4, 3, 2);

INSERT INTO USUARIO (nome, senha, email) VALUES ('Francisco Cleber', 'vrido', 'megafrancisco@gmail.com');
INSERT INTO USUARIO VALUES (2, 'Roberta Guimarães', 'tauba', 'roberta_mineira@hotmail.com', 4);

INSERT INTO cardapio(dt, tipo, nutricionista_id) VALUES ('1994-05-12', '3','2');

INSERT INTO cardapio_item(cardapio_id, item_id) VALUES ('1','2');