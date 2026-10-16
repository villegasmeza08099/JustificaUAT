/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - justificauat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`justificauat` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `justificauat`;

/*Table structure for table `alumnos` */

DROP TABLE IF EXISTS `alumnos`;

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `fk_alumno_carrera` (`carrera_id`),
  KEY `fk_alumno_usuario` (`usuario_id`),
  CONSTRAINT `fk_alumno_carrera` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  CONSTRAINT `fk_alumno_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `alumnos` */

insert  into `alumnos`(`id`,`matricula`,`nombre`,`carrera_id`,`correo`,`telefono`,`activo`,`created_at`,`usuario_id`) values 
(2,'a21210015','José Manuel Alarcón Dorantes',1,NULL,NULL,1,'2026-10-12 15:55:45',NULL),
(3,'a21210016','Alfredo López Piña',2,NULL,NULL,1,'2026-10-12 17:11:31',NULL),
(4,'a21210017','Ángel Gabriel García',1,'angel@uat.edu.mx',NULL,1,'2026-10-15 11:54:41',4);

/*Table structure for table `bitacora` */

DROP TABLE IF EXISTS `bitacora`;

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `accion` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `modulo` varchar(100) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_bitacora_usuario` (`usuario_id`),
  CONSTRAINT `fk_bitacora_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bitacora` */

insert  into `bitacora`(`id`,`usuario_id`,`accion`,`descripcion`,`ip`,`modulo`,`fecha`) values 
(1,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 12:13:45'),
(2,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 12:17:35'),
(3,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 13:15:16'),
(4,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 13:39:59'),
(5,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 13:44:06'),
(6,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 13:45:37'),
(7,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 17:06:35'),
(8,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 17:09:27'),
(9,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 17:49:51'),
(10,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 18:00:37'),
(11,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 18:02:40'),
(12,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 18:03:29'),
(13,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 18:04:47'),
(14,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 18:05:05'),
(15,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 18:09:32'),
(16,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 18:09:47'),
(17,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 18:16:26'),
(18,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 18:19:04'),
(19,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 18:22:06'),
(20,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-13 18:25:10'),
(21,2,'Actualizar Usuario','ID: 2','::1','Sistema','2026-10-14 10:29:59'),
(22,2,'Actualizar Usuario','ID: 2','::1','Sistema','2026-10-14 10:30:06'),
(23,2,'Actualizar Usuario','ID: 2','::1','Sistema','2026-10-14 10:41:41'),
(24,2,'Actualizar Usuario','ID: 2','::1','Sistema','2026-10-14 10:41:48'),
(25,2,'Actualizar Usuario','ID: 2','::1','Sistema','2026-10-14 10:41:57'),
(26,2,'Crear Usuario','villegas.meza.08099@itsmante.edu.mx','::1','Sistema','2026-10-14 10:59:01'),
(27,2,'Alta de usuario','villegas.meza.08099@itsmante.edu.mx','::1','Sistema','2026-10-14 10:59:01'),
(28,2,'Actualizar Usuario','ID: 3','::1','Sistema','2026-10-14 10:59:19'),
(29,2,'Registro de justificante','Nuevo justificante registrado','::1','Sistema','2026-10-14 12:05:25'),
(30,2,'Evaluación automática de justificante','Justificante #2 => Aprobado','::1','Sistema','2026-10-14 12:53:01'),
(31,2,'Evaluación','Resultado: Aprobado','::1','Sistema','2026-10-14 12:53:01'),
(32,2,'Evaluación automática de justificante','Justificante #2 => Aprobado','::1','Sistema','2026-10-14 12:53:07'),
(33,2,'Evaluación','Resultado: Aprobado','::1','Sistema','2026-10-14 12:53:07'),
(34,2,'Evaluación automática de justificante','Justificante #2 => Aprobado','::1','Sistema','2026-10-14 15:28:43'),
(35,2,'Evaluación','Resultado: Aprobado','::1','Sistema','2026-10-14 15:28:43'),
(36,2,'Evaluación automática de justificante','Justificante #2 => Aprobado','::1','Sistema','2026-10-14 16:07:25'),
(37,2,'Evaluación','Resultado: Aprobado','::1','Sistema','2026-10-14 16:07:25'),
(38,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-14 16:15:14'),
(39,2,'Evaluación DSS','Resultado: Rechazado','::1','Sistema','2026-10-14 16:33:50'),
(40,2,'Evaluación DSS','Resultado: Aprobado','::1','Sistema','2026-10-14 16:34:12'),
(41,2,'Evaluación DSS','Resultado: Rechazado','::1','Sistema','2026-10-14 16:34:44'),
(42,2,'Evaluación DSS','Resultado: RevisionEspecial','::1','Sistema','2026-10-14 16:36:30'),
(43,2,'Evaluación DSS','Resultado: Correccion','::1','Sistema','2026-10-14 16:36:47'),
(44,2,'Registro de justificante','Nuevo justificante registrado','::1','Sistema','2026-10-14 16:39:02'),
(45,2,'Crear Usuario','angel@uat.edu.mx','::1','Sistema','2026-10-15 10:20:50'),
(46,2,'Alta de usuario','angel@uat.edu.mx','::1','Sistema','2026-10-15 10:20:50'),
(47,4,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-15 10:24:20'),
(48,4,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-15 10:31:06'),
(49,4,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-15 10:39:42'),
(50,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-15 12:06:50'),
(51,2,'Registro de justificante','Nuevo justificante registrado','::1','Sistema','2026-10-15 12:22:58'),
(52,2,'Evaluación DSS','Resultado: Aprobado','::1','Sistema','2026-10-15 12:23:30'),
(53,4,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-15 12:53:44'),
(54,2,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-15 14:33:09'),
(55,3,'Inicio de sesión','Acceso al sistema','::1','Sistema','2026-10-15 16:32:49');

/*Table structure for table `carreras` */

DROP TABLE IF EXISTS `carreras`;

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `clave` (`clave`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carreras` */

insert  into `carreras`(`id`,`nombre`,`clave`,`created_at`) values 
(1,'Arquitectura','001','2026-10-12 15:54:11'),
(2,'Diseño Gráfico','002','2026-10-12 15:54:58'),
(3,'Arquitectura de Interiores','003','2026-10-12 15:55:02');

/*Table structure for table `configuracion` */

DROP TABLE IF EXISTS `configuracion`;

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(100) DEFAULT NULL,
  `valor` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clave` (`clave`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `configuracion` */

insert  into `configuracion`(`id`,`clave`,`valor`) values 
(1,'dias_maximos_justificante','5'),
(2,'tamano_maximo_archivo_mb','10'),
(3,'formatos_permitidos','pdf,jpg,jpeg,png');

/*Table structure for table `criterios_decision` */

DROP TABLE IF EXISTS `criterios_decision`;

CREATE TABLE `criterios_decision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `criterios_decision` */

insert  into `criterios_decision`(`id`,`nombre`,`descripcion`,`activo`,`created_at`) values 
(1,'Documento presentado','Verifica que exista evidencia',1,'2026-10-08 09:05:02'),
(2,'Documento válido','Verifica autenticidad del documento',1,'2026-10-08 09:05:02'),
(3,'Entrega en tiempo','Valida que el documento fue entregado dentro del plazo',1,'2026-10-08 09:05:02'),
(4,'Información completa','Todos los campos obligatorios capturados',1,'2026-10-08 09:05:02');

/*Table structure for table `decisiones` */

DROP TABLE IF EXISTS `decisiones`;

CREATE TABLE `decisiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `justificante_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `documento_presentado` tinyint(1) DEFAULT NULL,
  `documento_valido` tinyint(1) DEFAULT NULL,
  `entregado_tiempo` tinyint(1) DEFAULT NULL,
  `informacion_completa` tinyint(1) DEFAULT NULL,
  `resultado` enum('Aprobado','Rechazado','Correccion','RevisionEspecial') DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `fecha_decision` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_decision_justificante` (`justificante_id`),
  KEY `fk_decision_usuario` (`usuario_id`),
  CONSTRAINT `fk_decision_justificante` FOREIGN KEY (`justificante_id`) REFERENCES `justificantes` (`id`),
  CONSTRAINT `fk_decision_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `decisiones` */

insert  into `decisiones`(`id`,`justificante_id`,`usuario_id`,`documento_presentado`,`documento_valido`,`entregado_tiempo`,`informacion_completa`,`resultado`,`observaciones`,`fecha_decision`) values 
(1,2,2,1,1,1,1,'Aprobado',NULL,'2026-10-14 12:53:01'),
(2,2,2,1,1,1,1,'Aprobado',NULL,'2026-10-14 12:53:07'),
(3,2,2,1,1,1,1,'Aprobado',NULL,'2026-10-14 15:28:42'),
(4,2,2,1,1,1,1,'Aprobado',NULL,'2026-10-14 16:07:25');

/*Table structure for table `historial_estados` */

DROP TABLE IF EXISTS `historial_estados`;

CREATE TABLE `historial_estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `justificante_id` int(11) NOT NULL,
  `estado_anterior` varchar(50) DEFAULT NULL,
  `estado_nuevo` varchar(50) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_historial_justificante` (`justificante_id`),
  KEY `fk_historial_usuario` (`usuario_id`),
  CONSTRAINT `fk_historial_justificante` FOREIGN KEY (`justificante_id`) REFERENCES `justificantes` (`id`),
  CONSTRAINT `fk_historial_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `historial_estados` */

/*Table structure for table `justificantes` */

DROP TABLE IF EXISTS `justificantes`;

CREATE TABLE `justificantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(50) DEFAULT NULL,
  `alumno_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `fecha_ausencia` date NOT NULL,
  `motivo` text NOT NULL,
  `archivo_evidencia` varchar(255) DEFAULT NULL,
  `estado` enum('Pendiente','Aprobado','Rechazado','Correccion','RevisionEspecial') DEFAULT 'Pendiente',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_resolucion` datetime DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `folio` (`folio`),
  KEY `fk_justificante_alumno` (`alumno_id`),
  KEY `fk_justificante_materia` (`materia_id`),
  CONSTRAINT `fk_justificante_alumno` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`),
  CONSTRAINT `fk_justificante_materia` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `justificantes` */

insert  into `justificantes`(`id`,`folio`,`alumno_id`,`materia_id`,`fecha_ausencia`,`motivo`,`archivo_evidencia`,`estado`,`fecha_registro`,`fecha_resolucion`,`observaciones`) values 
(2,'JUS-20261014120525',2,1,'2026-10-15','Enfermedad','1792015605_abs.pdf','Correccion','2026-10-14 12:05:25',NULL,NULL),
(3,'JUS-20261014163902',2,2,'2026-10-13','Enfermedad','1792017542_abs.pdf','Pendiente','2026-10-14 16:39:02',NULL,NULL),
(4,'JUS-20261015122258',4,1,'2026-10-15','Enfermedad','1792088578_abs.pdf','Aprobado','2026-10-15 12:22:58',NULL,NULL);

/*Table structure for table `materias` */

DROP TABLE IF EXISTS `materias`;

CREATE TABLE `materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `clave` varchar(30) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_materia_carrera` (`carrera_id`),
  CONSTRAINT `fk_materia_carrera` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `materias` */

insert  into `materias`(`id`,`nombre`,`clave`,`carrera_id`,`created_at`) values 
(1,'Matemáticas Aplicadas a la Arquitectura','mate01',1,'2026-10-12 15:58:46'),
(2,'Dibujo Industrial','dibu02',1,'2026-10-12 15:59:10'),
(3,'Matemáticas Descriptivas para Proyectos de Diseño Gráfico','Mate02',2,'2026-10-12 17:10:52');

/*Table structure for table `reportes` */

DROP TABLE IF EXISTS `reportes`;

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `fecha_generacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_reporte_usuario` (`usuario_id`),
  CONSTRAINT `fk_reporte_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reportes` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`nombre`,`descripcion`,`created_at`) values 
(1,'Administrador','Administración general del sistema','2026-10-08 09:05:02'),
(2,'GestionEscolar','Validación y autorización de justificantes','2026-10-08 09:05:02'),
(3,'Alumno','Registro y consulta de justificantes','2026-10-08 09:05:02');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `apellido_paterno` varchar(100) DEFAULT NULL,
  `apellido_materno` varchar(100) DEFAULT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `ultimo_acceso` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`),
  KEY `fk_usuario_rol` (`rol_id`),
  CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombre`,`apellido_paterno`,`apellido_materno`,`correo`,`password`,`rol_id`,`activo`,`ultimo_acceso`,`created_at`,`updated_at`) values 
(2,'Administrador','General',NULL,'admin@justificauat.mx','$2y$10$jMLaTT7vM1KnOOmTKD5QrO0joYLXNE/IQfUfvXdJgaDxb6qUrHZFm',1,1,'2026-10-15 14:33:09','2026-10-08 11:04:14','2026-10-15 14:33:09'),
(3,'Gabriela Berenice Villegas Meza',NULL,NULL,'villegas.meza.08099@itsmante.edu.mx','$2y$10$B77tESPD2b3tY7ZKF5bglOGloi8AGfKFLVuu8PV5TRapk1NXZfmaG',2,1,'2026-10-15 16:32:49','2026-10-14 10:59:01','2026-10-15 16:32:49'),
(4,'Ángel Gabriel',NULL,NULL,'angel@uat.edu.mx','$2y$10$Y7/ataHaChpu6hkLmFVinOf8B7n6YjuxDCJnFqlri7FamgAoLZpcW',3,1,'2026-10-15 12:53:44','2026-10-15 10:20:50','2026-10-15 12:53:44');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
