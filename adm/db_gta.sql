create database db_GTA;
use db_GTA;

create table tb_user(
cd_user int not null auto_increment primary key,
nm_user varchar(45) not null,
email_user varchar(60) not null,
senha_user varchar(45) not null,
type_user varchar(45) not null,
rg_user varchar(14),
cpf_user varchar(11),
cpnj_user varchar(14),
num_user int,
nm_recado tinytext
);

create table tb_servicos(
cd_servicos int not null auto_increment primary key,
nm_servicos varchar(45) not null,
desc_servicos text(1300) not null
);

create table tb_fotoPost(
cd_fotoPost int not null auto_increment primary key,
nm_fotoPost varchar(50) not null
);

create table tb_fotoUser(
cd_fotoUser int not null auto_increment primary key,
nm_fotoUser varchar(50) not null,
id_user int,
foreign key (id_user) references tb_user (cd_user)
);

create table tb_post(
cd_post int not null auto_increment primary key,
nm_post text(1300) not null,
date_post date not null,
tag_post varchar(45),
id_user int,
foreign key (id_user) references tb_user (cd_user)
);

create table tb_fotosPost(
id_post int,
foreign key (id_post) references tb_post (cd_post),
id_fotoPost varchar(50),
foreign key (id_fotoPost) references tb_fotoPost (cd_fotoPost)
);

create table tb_servicosUser(
id_user int,
foreign key (id_user) references tb_user (cd_user),
id_servicos int,
foreign key (id_servicos) references tb_servicos (cd_servicos)
);
