create table evento_tbl(
cod_evento int,
local_evento varchar(50),
nome_evento varchar(50),
data_evento datetime,
nr_convidados double,
primary key(cod_evento)
);

create table convidado_tbl(
cod_convidado int,
telf_convidado double,
nome_convidado varchar(50),
email_convidado varchar(50),
evento_codigo int,
mesa_codigo int,
primary key(cod_convidado),
constraint fk_convidado1 foreign key (evento_codigo) references evento_tbl(cod_evento),
constraint fk_convidado2 foreign key(mesa_codigo) references mesa(cod_mesa)
);

create table mesa(
cod_mesa int,
nome_mesa varchar(30),
lotacao_mesa int, 
evento_codigo int,
primary key(cod_mesa),
constraint fk_mesa1 foreign key(evento_codigo) references evento_tbl(cod_evento)
);

create table acompahante_tbl(
cod_acompanhante int,
parentesco varchar(40),
convidado_codigo int,
primary key(cod_acompanhante),
constraint acompanhante  foreign key (convidado_codigo) references convidado_tbl(cod_convidado)
);

create table administrador_tbl(
cod_administrador int auto_increment,
nomme_administrador varchar(50),
morada_administrador varchar(50),
funcao_administrador varchar(50),
bi_administrador varchar(50),
primary key(cod_administrador)
);

alter table administrador_tbl
change nomme_administrador nome_administrador varchar(50);

alter table evento_tbl
modify cod_evento int auto_increment;

insert into administrador_tbl(nome_administrador, morada_administrador, funcao_administrador, bi_administrador, username, senha)
values("Milton Manhica", "Munuana", "densevolvedor frontend", "4252672427k", "miltonmanhica", "milton1234");



LOCK TABLES 
    evento_tbl WRITE,
    convidado_tbl WRITE,
    mesa WRITE,
    acompahante_tbl WRITE;

ALTER TABLE convidado_tbl
    DROP FOREIGN KEY fk_convidado1 ,
    MODIFY evento_codigo INT;
ALTER TABLE mesa
    DROP FOREIGN KEY fk_mesa1 ,
    MODIFY evento_codigo INT;

ALTER TABLE evento_tbl MODIFY cod_evento INT AUTO_INCREMENT;
desc evento_tbl;

ALTER TABLE convidado_tbl
    ADD CONSTRAINT fk_convidado1 FOREIGN KEY (evento_codigo)
          REFERENCES evento_tbl (cod_evento);
          
ALTER TABLE mesa
    ADD CONSTRAINT fk_mesa1 FOREIGN KEY (evento_codigo)
          REFERENCES evento_tbl (cod_evento);
          
ALTER TABLE acompahante_tbl
DROP FOREIGN KEY acompanhante,
MODIFY convidado_codigo INT;
          
ALTER TABLE convidado_tbl MODIFY cod_convidado INT AUTO_INCREMENT;

ALTER TABLE acompahante_tbl
    ADD CONSTRAINT fk_acompanhante1 FOREIGN KEY (convidado_codigo)
          REFERENCES convidado_tbl (cod_convidado);

desc mesa;
ALTER TABLE acompahante_tbl MODIFY cod_acompanhante INT AUTO_INCREMENT;
ALTER TABLE mesa MODIFY cod_mesa INT AUTO_INCREMENT;

ALTER TABLE convidado_tbl
    DROP FOREIGN KEY fk_convidado2 ,
    MODIFY mesa_codigo INT;
    
ALTER TABLE convidado_tbl
    ADD CONSTRAINT fk_convidado2 FOREIGN KEY (mesa_codigo)
          REFERENCES mesa (cod_mesa);
UNLOCK TABLES;
