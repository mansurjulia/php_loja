create database if not exists loja;
use loja;

create or replace table cliente(
    id int primary key auto_increment,
    nome varchar(250) not null,
    email varchar (250) not null unique,
    cpf varchar(14) not null unique,
    contato varchar(14) not null unique,
    created_at timestamp not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create or replace table login(
    id int primary key auto_increment,
    email varchar(250) not null unique,
    senha varchar(255) not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into login(email, senha) values ('admin@senac.com.br', md5('admin@123'));

/* sha1 e md5 criptografam as senhas