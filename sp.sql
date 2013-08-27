CREATE DATABASE sanPedro;


USE sanPedro;

create table roles(
id int NOT NULL,
nombre varchar(25) NOT NULL,
--idforeign int NOT NULL
PRIMARY KEY (id)
--FOREIGN KEY (id) REFERENCES table(id_table) on delete cascade on update cascade
)engine innoDB;


create table profesores(
id int NOT NULL,
nombre varchar(25) NOT NULL,
apellido varchar(25) NOT NULL,
titulo varchar(25) NOT NULL,
seguro varchar(50) NOT NULL,
idRole int NOT NULL,
--idforeign int NOT NULL
PRIMARY KEY (id),
FOREIGN KEY (idRole) REFERENCES roles(id) ont delete cascade in update cascade 
--FOREIGN KEY (id) REFERENCES table(id_table) on delete cascade on update cascade
)engine innoDB;


create table planes(
id int NOT NULL,
nombre varchar(25) NOT NULL,
--idforeign int NOT NULL
PRIMARY KEY (id)
--FOREIGN KEY (id) REFERENCES table(id_table) on delete cascade on update cascade
)engine innoDB;



create table alumnos(
id int NOT NULL,
nombre varchar(25) NOT NULL,
apellido varchar(25) NOT NULL,
seguro varchar(50),
idRole int NOT NULL,
--idforeign int NOT NULL
PRIMARY KEY (id),
FOREIGN KEY (idRole) REFERENCES roles(id) ont delete cascade in update cascade
)engine innoDB;

create table materias(
id int NOT NULL,
nombre varchar(25) NOT NULL,
--idforeign int NOT NULL
PRIMARY KEY (id)
--FOREIGN KEY (id) REFERENCES table(id_table) on delete cascade on update cascade
)engine innoDB ;

create table materiasPlanes(
id int NOT NULL,
idMateria int NOT NULL,
idPlan int NOT NULL,
PRIMARY KEY (id)
FOREIGN KEY (idMateria) REFERENCES materias(id) on delete cascade on update cascade,
FOREIGN KEY (idPlan) REFERENCES planes(id) on delete cascade on update cascade,
)engine innoDB 




