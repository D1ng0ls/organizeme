create database todolist;

use todolist;

create table usuarios (
	id int auto_increment primary key,
    nome varchar(100) not null,
    email varchar(150) not null unique,
    senha varchar(255) not null,
    data_criacao datetime not null default current_timestamp
);

create table status (
    id int auto_increment primary key,
    nome varchar(100) not null unique
);

create table tarefas (
	id int auto_increment primary key,
    usuario_id int not null,
    status_id int not null default 0,
    titulo varchar(200) not null,
    descricao text,
    prazo date,
    data_criacao datetime not null default current_timestamp,
	foreign key (usuario_id) references usuarios(id) on delete cascade,
    foreign key (status_id) references status(id)
);

insert into status (nome) values ("Pendente"), ("Em andamento"), ("Concluída")

select * from usuarios;
select * from status;
select * from tarefas;
