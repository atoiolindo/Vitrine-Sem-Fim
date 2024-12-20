-- MySQL Script generated by MySQL Workbench
-- Mon Nov 11 09:51:45 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8mb4 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`autor` (
  `idautor` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `nacionalidade` VARCHAR(40) NULL DEFAULT NULL,
  `biografia` VARCHAR(1000) NULL DEFAULT NULL,
  PRIMARY KEY (`idautor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `mydb`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cliente` (
  `idcliente` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `telefone` VARCHAR(14) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `endereco` VARCHAR(100) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) VISIBLE,
  UNIQUE INDEX `telefone_UNIQUE` (`telefone` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `mydb`.`livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`livro` (
  `idlivro` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `genero` VARCHAR(35) NULL DEFAULT NULL,
  `autor_idautor` INT(11) NOT NULL,
  `isbn` VARCHAR(18) NOT NULL,
  `estado` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`idlivro`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) VISIBLE,
  INDEX `fk_livro_autor1_idx` (`autor_idautor` ASC) VISIBLE,
  CONSTRAINT `fk_livro_autor1`
    FOREIGN KEY (`autor_idautor`)
    REFERENCES `mydb`.`autor` (`idautor`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `mydb`.`vendedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`vendedor` (
  `idvendedor` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `telefone` VARCHAR(14) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `endereco` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idvendedor`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) VISIBLE,
  UNIQUE INDEX `telefone_UNIQUE` (`telefone` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `mydb`.`emprestimo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`emprestimo` (
  `idemprestimo` INT(11) NOT NULL AUTO_INCREMENT,
  `data_emprestimo` DATE NOT NULL,
  `data_entrega` DATE NOT NULL,
  `cliente_idcliente` INT(11) NOT NULL,
  `livro_idlivro` INT(11) NOT NULL,
  `vendedor_idvendedor` INT(11) NOT NULL,
  PRIMARY KEY (`idemprestimo`),
  INDEX `fk_emprestimo_cliente_idx` (`cliente_idcliente` ASC) VISIBLE,
  INDEX `fk_emprestimo_livro1_idx` (`livro_idlivro` ASC) VISIBLE,
  INDEX `fk_emprestimo_vendedor1_idx` (`vendedor_idvendedor` ASC) VISIBLE,
  CONSTRAINT `fk_emprestimo_cliente`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `mydb`.`cliente` (`idcliente`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_livro1`
    FOREIGN KEY (`livro_idlivro`)
    REFERENCES `mydb`.`livro` (`idlivro`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_vendedor1`
    FOREIGN KEY (`vendedor_idvendedor`)
    REFERENCES `mydb`.`vendedor` (`idvendedor`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `mydb`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pagamento` (
  `idpagamento` INT(11) NOT NULL AUTO_INCREMENT,
  `atraso` INT(11) NOT NULL,
  `multa` DECIMAL(10,2) NOT NULL,
  `valor_final` DECIMAL(10,2) NOT NULL,
  `vendedor_idvendedor` INT(11) NOT NULL,
  `emprestimo_idemprestimo` INT(11) NOT NULL,
  `valor_pago` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`idpagamento`),
  INDEX `fk_devolucao_vendedor1_idx` (`vendedor_idvendedor` ASC) VISIBLE,
  INDEX `fk_pagamento_emprestimo1_idx` (`emprestimo_idemprestimo` ASC) VISIBLE,
  CONSTRAINT `fk_devolucao_vendedor1`
    FOREIGN KEY (`vendedor_idvendedor`)
    REFERENCES `mydb`.`vendedor` (`idvendedor`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamento_emprestimo1`
    FOREIGN KEY (`emprestimo_idemprestimo`)
    REFERENCES `mydb`.`emprestimo` (`idemprestimo`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  UNIQUE INDEX `idusuario_UNIQUE` (`idusuario` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
-- SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('George R. R. Martin', 'Norte-americano', 'é um roteirista e escritor de ficção científica, terror e fantasia norte-americano');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Sara Shepard', 'Norte-americana', 'Ela é conhecida por escrever as séries literárias Pretty Little Liars e The Lying Game, as quais tornaram-se séries televisivas do canal Freeform.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Sylvia Plath', 'Norte-americana', 'Sylvia Plath foi uma poeta, romancista e contista norte-americana. Reconhecida principalmente por sua obra poética, Sylvia Plath escreveu também um romance semi-autobiográfico');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Cora Coralina', 'Brasileira', 'Cora Coralina, pseudônimo de Anna Lins dos Guimarães Peixoto Bretas, foi uma poetisa e contista brasileira.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('José Saramago', 'Português', 'O único escritor português que recebeu o Prêmio Nobel de Literatura foi José Saramago, filho e neto de camponeses da região da Azinhaga (Ribatejo, Portugal).'); 
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Clarice Lispector', 'Brasileira', 'A sua primeira obra, muito celebrada, foi Perto do coração selvagem, romance lançado em 1944.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Edgar Allan Poe', 'Norte-americano', 'Sem pestanejar, qualquer crítico irá dizer que Edgar Allan Poe é dos grandes nomes da literatura norte-americana.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Fiódor Dostoiévski', 'Russo', 'Fiódor Mikhailovitch Dostoiévski, esse é o nome completo de um dos maiores gênios da literatura russa.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('William Shakespeare', 'Britânico', 'O poeta e dramaturgo inglês é tido como um dos maiores nomes da literatura universal.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Marcel Proust', 'Francês', 'Filho de Adrien Proust e Jeanne Weil, uma família abastada, Proust foi criado com acesso as boas escolas francesas.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Miguel de Cervantes', 'Espanhol', 'O maior nome da literatura espanhola, Miguel de Cervantes é considerado como o precursor do realismo.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Gabriel García Márquez', 'Colombiano', 'Um dos maiores nomes do realismo fantástico, as obras do colombiano Gabriel García Márquez já foram traduzidas para mais de trinta línguas.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Fraz Kafka', 'Alemão', 'Kafka é um dos maiores nomes da literatura moderna.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Jorge Luis Borges', 'Argentino', 'Muito premiado em vida, o argentino ficou consagrado como uma das grandes vozes da literatura latino-americana.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Gregório de Matos', 'Brasileiro', 'Ele escreveu poesia lírico-filosófica, sacra e satírica.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Gonçalves Dias', 'Brasileiro', 'O autor foi o principal nome da primeira geração romântica.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Álvares de Azevedo', 'Brasileiro', 'O autor foi o mais famoso poeta da segunda geração romântica');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Castro Alves', 'Brasileiro', 'Foi o principal autor da terceira geração romântica, recebendo o epíteto de Poeta dos Escravos.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('José de Alencar', 'Brasileiro', 'O autor foi o principal nome da prosa romântica brasileira.');
INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('Bernardo Guimarães', 'Brasileiro', 'Publicado, pela primeira vez, em 1875, o romance regionalista A escrava Isaura, de sua autoria, é o mais famoso romance romântico brasileiro.');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Maldosas', 'Ficção e mistério', 2, '978-8579800252', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Inácreditaveis', 'Ficção e mistério', 2, '978-8579800740', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Impecáveis', 'Ficção e mistério', 2, '978-8579800269', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Perfeitas', 'Ficção e mistério', 2, '978-857800627', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Perigosas', 'Ficção e mistério', 2, '978-8579801235', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Perversas', 'Ficção e mistério', 2, '978-8579800818', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Destruidoras', 'Ficção e mistério', 2, '978-8579800948', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Impiedosas', 'Ficção e mistério', 2, '978-8579800962', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Traiçoeiras', 'Ficção e mistério', 2, '978-8579801266', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Implacáveis', 'Ficção e mistério', 2, '978-8579801815', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Estonteantes', 'Ficção e mistério', 2, '978-8579801952', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Devastadoras', 'Ficção e mistério', 2, '978-0062081933', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Arrasadoras', 'Ficção e mistério', 2, '978-85798002232', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Letais', 'Ficção e mistério', 2, '978-8579802560', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Venenosas', 'Ficção e mistério', 2, '978-0062287021', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('Pretty Little Liars Cruéis', 'Ficção e mistério', 2, '978-0062287052', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('As crônicas de gelo e fogo - a guerra dos tronos', 'Fantasia épica', 1, '978-0002245845', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('As crônicas de gelo e fogo - a fúria dos reis', 'Fantasia épica', 1, '978-0006479895', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('As crônicas de gelo e fogo - tormenta de espadas', 'Fantasia épica', 1, '978-8496208216', 'novo');
INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('As crônicas de gelo e fogo - festim dos corvos', 'Fantasia épica', 1, '978-0307961212', 'novo');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Jessica Arantes Silva de Souza', '111.222.333-05', '(62)99998-8967', '1980-06-25', 'Brasil, Goiás, Ceres, Sorriso', 'thegreatest12131415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Ana Silva de Souza', '111.222.334-05', '(62)99998-3467', '1990-06-11', 'Brasil, Goiás, Ceres, Sorriso', 'whereverstate415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Ana Arantes Silva de Souza', '111.242.333-05', '(62)99788-6767', '1981-06-15', 'Brasil, Goiás, Ceres, Vila Nova', 'ivebeen1115@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Maria Arantes Silva de Souza', '141.222.333-05', '(62)99098-6767', '1984-06-18', 'Brasil, Goiás, Ceres, Vila Nova', 'howalone415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Maria Clara Silva de Souza', '111.222.433-05', '(62)99998-6755', '1987-06-13', 'Brasil, Goiás, Ceres, Vila Nova', 'tomyself11115@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('José Silva de Souza', '111.222.733-05', '(62)99998-1167', '1982-06-07', 'Brasil, Goiás, Ceres, Vila Nova', 'soikeptit415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Juliano Silva de Souza', '111.272.333-05', '(62)99998-6097', '1989-06-03', 'Brasil, Goiás, Ceres, Vila Nova', 'medirt1115@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Juliana Silva de Souza', '111.222.763-05', '(62)99998-7787', '2000-06-04', 'Brasil, Goiás, Ceres, Sorriso', 'iknowyoudid15@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Lucas Silva de Souza', '111.272.313-05', '(62)99998-9547', '2000-06-06', 'Brasil, Goiás, Ceres, Sorriso', 'cryinginmyhotel15@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Luara Silva de Souza', '111.282.333-05', '(62)99998-6717', '2003-06-08', 'Brasil, Goiás, Ceres, Sorriso', 'valentinesday1415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Luana Silva de Souza', '111.228.333-05', '(62)99998-6067', '1960-06-06', 'Brasil, Goiás, Ceres, Sorriso', 'yousaynowiknow415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Paula Silva de Souza', '111.222.383-05', '(62)99998-6347', '1968-06-02', 'Brasil, Goiás, Ceres, Sorriso', 'paulmct415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Lena Silva de Souza', '111.222.393-05', '(62)99998-6785', '1985-06-07', 'Brasil, Goiás, Ceres, Sorriso', 'luarasilva5@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Gabriel Oliveira de Souza', '111.922.333-05', '(62)99998-6127', '1986-06-05', 'Brasil, Goiás, Ceres, Sorriso', 'podenaoeu1131415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Lucas Oliveira de Souza', '111.292.333-05', '(62)99998-6617', '1995-06-01', 'Brasil, Goiás, Ceres, Sorriso', 'elasimsim99415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Lena OLiveira de Souza', '711.222.333-05', '(62)99998-5367', '1993-06-09', 'Brasil, Goiás, Ceres, Sorriso', 'minhanao415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Priscilla Oliveira de Souza', '211.222.333-05', '(62)99900-6767', '1974-06-08', 'Brasil, Goiás, Ceres, Sorriso', 'selada777415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Maria Oliveira de Souza', '191.222.333-05', '(62)99998-6017', '1992-06-03', 'Brasil, Goiás, Ceres, Vila Nova', 'antolivea131415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Paula OLiveira de Souza', '101.222.333-05', '(62)99998-4067', '1994-06-03', 'Brasil, Goiás, Ceres, Nova Vila', 'marcosg131415@gmail.com');
INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Ana Oliveira de Souza', '181.222.333-05', '(62)99998-6307', '2004-06-03', 'Brasil, Goiás, Ceres, Nova Vila', 'tatiana131415@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Jessica Arantes Andrade', '879.376.200-24', '(62)99909-9000', '2000-10-27', 'Brasil, Ceres', 'jessica1234@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Carlota Alves', '834.277.200-57', '(62)93789-9890', '2004-11-07', 'Brasil, Ceres', 'carla1234@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Mauricio Wanderson da Silva', '593.256.270-44', '(62)93565-1234', '1999-10-01','Brasil, Ceres', 'mauricio1234@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Italo Augusto Santos', '125.216.788-04', '(62)91235-3790', '1981-01-01','Brasil, Ceres', 'italo1234@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Marcela Baratheon', '674.256.480-00', '(62)95005-2455', '1999-10-01','Brasil, Ceres', 'marcela98675@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Lavinia Lannister da Silva', '326.266.267-90', '(62)92682-2568', '1978-05-21','Brasil, Ceres', 'lavinia245@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Carlos Stark', '367.378.965-23', '(62)95895-3677', '2006-01-14','Brasil, Ceres', 'winter.is.coming131@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Larissa Strong Xavier', '267.278.600-08', '(62)93076-2689', '1994-10-01','Brasil, Ceres', 'werenotbastards245@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Pamela Lysena de Essos', '265.896.583-75', '(62)93267-3498', '1990-12-24','Brasil, Ceres', 'pamela252@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Sansa Stark Tully', '111.111.111-11', '(62)99999-9999', '2000-07-13','Brasil, Ceres', 'sansanorthenqueen300@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Arianny Martell', '256.789.087-01', '(62)93255-2568', '2004-09-30','Brasil, Ceres', 'arianny253@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Jannos Slynt da Silva', '125.145.489-26', '(62)93565-1225', '1999-10-11','Brasil, Ceres', 'jqnow259@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Camila Tully dos Santos', '267.695.375-79', '(62)93463-2675', '1995-08-01','Brasil, Ceres', 'camila53@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Marcelo Manderlly de Oliveira', '256.684.484-44', '(62)92678-2379', '2005-02-26','Brasil, Ceres', 'marcelo2523@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Julia Camila Westerling', '253.145.955-96', '(62)94343-2657', '1960-12-31','Brasil, Ceres', 'julia255@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Larissa Wanderson', '125.374.754-56', '(62)92637-3678', '1993-12-01','Brasil, Ceres', 'svsbnah23858@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Lino Limo Lana', '257.583.943-31', '(62)92653-1457', '1983-06-18','Brasil, Ceres', 'linolimo2365@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Caio Bolton', '235.759.806-03', '(62)92373-2577', '1999-10-01','Brasil, Ceres', 'mauricio1234@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Lysander Sandro', '666.666.666-66', '(62)96666-6666', '2006-06-06','Brasil, Ceres', 'lysandro356@gmail.com');
INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('Elliot Cosme', '743.627.736-77', '(62)97637-7373', '1977-07-07','Brasil, Ceres', 'elliot777@gmail.com');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2024-06-03', '2024-07-12', '1', '1', '1');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2024-01-01', '2024-03-12', '2', '2', '2');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2023-06-03', '2024-02-22', '3', '3', '3');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2024-04-21', '2023-05-21', '4', '4', '4');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2023-12-13', '2024-02-25', '5', '5', '5');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2024-01-02', '2024-07-12', '6', '6', '6');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2024-02-11', '2024-07-05', '7', '7', '7');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2024-06-04', '2024-05-28', '8', '8', '8');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2023-11-03', '2024-07-12', '9', '9', '9');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2024-02-26', '2024-04-26', '10', '10', '10');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2023-06-23', '2024-01-04', '11', '11', '11');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2024-07-01', '2024-07-13', '12', '12', '12');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2022-06-03', '2024-01-16', '13', '13', '13');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2024-02-22', '2024-12-14', '14', '14', '14');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2023-08-04', '2024-09-29', '15', '15', '15');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2024-06-03', '2024-07-12', '16', '16', '16');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2022-05-03', '2022-12-31', '17', '17', '17');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2024-03-03', '2024-08-19', '18', '18', '18');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2023-10-05', '2024-03-13', '19', '19', '19');
INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('2022-08-09', '2023-03-08', '20', '20', '20');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('5', '1', '11', '1', '1', '11');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('10', '1', '16', '2', '2', '16');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('2', '1', '8', '3', '3', '8');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('1', '1', '7', '4', '4', '7');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('7', '1', '13', '5', '5', '13');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('2', '1', '8', '6', '6', '8');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('4', '1', '10', '7', '7', '10');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('5', '1', '11', '8', '8', '11');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('9', '1', '15', '9', '9', '15');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('3', '1', '9', '10', '10', '9');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('1', '1', '7', '11', '11', '7');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('5', '1', '11', '12', '12', '11');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('3', '1', '9', '13', '13', '9');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('4', '1', '10', '14', '14', '10');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('8', '1', '14', '15', '15', '14');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('7', '1', '13', '16', '16', '15');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('9', '1', '15', '17', '17', '15');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('2', '1', '8', '18', '18', '8');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('4', '1', '10', '19', '19', '10');
INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('5', '1', '11', '20', '20', '11');
INSERT INTO usuario (email, senha) VALUES ('antonio1@gmail.com', '$2y$10$m.G6NMZn4oe0Y/WWYb1WauXYY0COo14gHENeYkCM4OvpqAekPkPlC');