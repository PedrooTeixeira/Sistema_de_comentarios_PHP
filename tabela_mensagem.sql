/*Tabela para ser criada no banco de dados*/

CREATE table mensagens(
  id int AUTO_INCREMENT primary key,
  nome varchar(100),
  msg text,
  data_msg date
);