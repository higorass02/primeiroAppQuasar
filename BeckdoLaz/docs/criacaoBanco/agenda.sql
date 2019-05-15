create table smb_agenda (
id int primary key AUTO_INCREMENT,
data_agenda date,
data_criacao date,
hora char(10),
status char(1),
id_contato int,
id_servico int,
CONSTRAINT FK_Contatos_Agenda FOREIGN KEY (id_contato)
    REFERENCES smb_contatos(id),
CONSTRAINT FK_Servicos_Agenda FOREIGN KEY (id_servico)
    REFERENCES smb_servicos(id)
    
)