CREATE DATABASE justificauat;
USE justificauat;
CREATE TABLE usuarios(id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(100),correo VARCHAR(120),password VARCHAR(255),rol ENUM('Administrador','GestionEscolar','Alumno'));
CREATE TABLE justificantes(id INT AUTO_INCREMENT PRIMARY KEY,folio VARCHAR(30),matricula VARCHAR(20),materia VARCHAR(120),motivo TEXT,estado VARCHAR(30));
