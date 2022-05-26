create database restaurante_bd;

use restaurante_bd;

/*drop table usuario;*/


create table usuario(
	codigo int auto_increment primary key,
    nome varchar(45),
    email varchar(45),
    senha varchar(150),
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP , 
    data_alteracao  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP , 
    situacao enum("Habilitado","Desabilitado") DEFAULT "HABILITADO"
);

INSERT INTO `restaurante_bd`.`usuario`
(`nome`,
`email`,
`senha`)
VALUES
("adrian",
"adrian@gmail.com",
MD5('123aksdmsd6'));

select * from usuario;

/*drop table item_pedido;*/

create table item_pedido(
    codigo int(11) auto_increment primary key,
    nome_produto varchar(100),
    quantidade int(11),
    cod_usuario int(11),
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    preco_produto decimal(6,2),
    observacao varchar(200)
);

select * from item_pedido;
INSERT into item_pedido (nome_produto,quantidade,cod_usuario,preco_produto) VALUES('teste',2,1,5.66);

/*drop table produto;*/
create table produto(
    codigo int(11) auto_increment primary key,
    nome varchar(100),
    categoria varchar(100),
    valor decimal(6,2),
    foto varchar(100),
    info_adicional varchar(200),
    codigo_usuario int(11),
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    situacao enum('HABILITADO','DESABILITADO') default 'HABILITADO'
);

INSERT into produto (nome,categoria,valor,foto,info_adicional,codigo_usuario,situacao) VALUES('teste','teste',2.66,'teste.js',null,null,'HABILITADO');
select * from produto;