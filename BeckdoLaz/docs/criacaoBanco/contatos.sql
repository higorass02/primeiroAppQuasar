CREATE TABLE IF NOT EXISTS `mydb`.`smb_contatos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `status` CHAR(1) NOT NULL DEFAULT '1',
  `dt_nasc` DATE NULL,
  `cpf` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;