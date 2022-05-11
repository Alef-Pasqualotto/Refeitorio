CREATE DATABASE IF NOT EXISTS refeicoes;

USE refeicoes;

CREATE TABLE IF NOT EXISTS ingrediente (ingrediente_id INT NOT NULL,
                                        nome VARCHAR(100) NOT NULL,
                                        calorias INT NOT NULL,
                                        PRIMARY KEY (ingrediente_id));

CREATE TABLE IF NOT EXISTS item (item_id INT NOT NULL,
                                 descricao VARCHAR(100) NOT NULL,
                                 PRIMARY KEY (item_id));

CREATE TABLE IF NOT EXISTS ingrediente_item (ingrediente_item_id INT NOT NULL,
                                             item_id INT NOT NULL,
                                             ingrediente_id INT NOT NULL,
                                             PRIMARY KEY (ingrediente_item_id),
                                             FOREIGN KEY (item_id) REFERENCES item(item_id),
                                             FOREIGN KEY (ingrediente_id) REFERENCES ingrediente(ingrediente_id));

CREATE TABLE IF NOT EXISTS usuario (usuario_id INT NOT NULL,
                                    nome VARCHAR(100) NOT NULL,
                                    senha VARCHAR(40) NOT NULL,
                                    email VARCHAR(120) NOT NULL,
                                    crn INT,
                                    PRIMARY KEY (usuario_id));

CREATE TABLE IF NOT EXISTS cardapio (cardapio_id INT NOT NULL,
                                     dt date NOT NULL,
                                     tipo INT NOT NULL,
                                     nutricionista_id INT NOT NULL,
                                     PRIMARY KEY (cardapio_id),
                                     FOREIGN KEY (nutricionista_id) REFERENCES usuario(usuario_id));

CREATE TABLE IF NOT EXISTS cardapio_item (cardapio_item_id INT NOT NULL,                                     
                                     cardapio_id INT NOT NULL,
                                     item_id INT NOT NULL,
                                     PRIMARY KEY (cardapio_item_id)                        ,
                                     FOREIGN KEY (cardapio_id) REFERENCES cardapio(cardapio_id),
                                     FOREIGN KEY (item_id) REFERENCES item(item_id));