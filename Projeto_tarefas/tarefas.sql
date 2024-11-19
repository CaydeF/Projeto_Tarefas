CREATE DATABASE tarefas;
USE tarefas;

CREATE TABLE usuarios (
       usu_codigo int primary key AUTO_INCREMENT,
       usu_nome varchar(255),
       usu_email varchar(255)
);

CREATE TABLE tarefas  (
       tar_codigo int primary key auto_increment,
       tar_setor varchar(255),
       tar_prioridade varchar(255),
       tar_status varchar(255)
);

ALTER TABLE tarefas ADD COLUMN usu_codigo INT,
ADD CONSTRAINT fk_usu_codigo FOREIGN KEY (usu_codigo) REFERENCES usuarios(usu_codigo);