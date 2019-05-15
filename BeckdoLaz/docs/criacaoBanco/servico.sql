CREATE TABLE `smb_servicos` (
  `id` int(11) NOT NULL,
  `nome` char(50) COLLATE utf8_bin DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `tp_servico` int(11) DEFAULT NULL,
  `status` char(1) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;