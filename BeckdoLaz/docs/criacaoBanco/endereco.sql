CREATE TABLE IF NOT EXISTS `smb_enderecos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `telefone` VARCHAR(10) NULL,
  `celular` VARCHAR(11) NULL,
  `email` VARCHAR(50) NULL,
  `status` CHAR(1) NOT NULL DEFAULT '1',
  `smb_contatos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_CONTATOS_ENDERECOS`
    FOREIGN KEY (`smb_contatos_id`)
    REFERENCES `smb_contatos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;