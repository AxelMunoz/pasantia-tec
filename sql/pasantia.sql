SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

DROP TABLE IF EXISTS profesor;
DROP TABLE IF EXISTS usuario;
DROP TABLE IF EXISTS noticias;
CREATE TABLE profesor(id_profe INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (255) NOT NULL,
    turno VARCHAR(255) NOT NULL,
    Modulos VARCHAR(255) NOT NULL,
    Horario VARCHAR(255) NOT NULL,
    Materia VARCHAR(255) NOT NULL,
    Curso VARCHAR(255) NOT NULL,
    Grupo VARCHAR(255) NOT NULL,
    Dia VARCHAR(255) NOT NULL
    )DEFAULT CHARSET=utf8mb3;;
UPDATE `profesor` SET `Dia` = 'MIERCOLES' WHERE Dia='MIÉRCOLES'
CREATE TABLE usuario(id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    contrasenia VARCHAR(50),
    email VARCHAR(255),
    estado INT (1)
    )DEFAULT CHARSET=utf8mb3;
CREATE TABLE noticias(id_noticias INT AUTO_INCREMENT PRIMARY KEY, titulo VARCHAR(255),
descripcion VARCHAR(255), imagen VARCHAR(255));
CREATE TABLE archivos (id_archivo INT AUTO_INCREMENT PRIMARY KEY, nombre_archivo VARCHAR(255), tipo_archivo VARCHAR(255), ruta_archivo VARCHAR(255));
INSERT into usuario (nombre,contrasenia,estado) VALUES ('Gustavo Eiriz','tallertec',1);