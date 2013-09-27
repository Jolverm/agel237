-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-09-2013 a las 22:59:45
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `agel237`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_atributos_ag`
--

CREATE TABLE IF NOT EXISTS `tbl_atributos_ag` (
  `id_atributo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_atributo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_atributo` enum('TELEFONO','AUTOMOVIL') COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `tbl_usuarios_ag_id_usuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_atributo`),
  UNIQUE KEY `id_atributo_UNIQUE` (`id_atributo`),
  KEY `fk_tbl_atributos_ag_tbl_usuarios_ag1_idx` (`tbl_usuarios_ag_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=122 ;

--
-- Volcado de datos para la tabla `tbl_atributos_ag`
--

INSERT INTO `tbl_atributos_ag` (`id_atributo`, `nombre_atributo`, `tipo_atributo`, `fecha`, `tbl_usuarios_ag_id_usuario`) VALUES
(116, 'hola', 'AUTOMOVIL', '2013-09-25', 1),
(117, 'nokia', 'TELEFONO', '2013-09-25', 1),
(118, 'hola', 'AUTOMOVIL', '2013-09-28', 2),
(119, 'nokia', 'TELEFONO', '2013-09-28', 2),
(120, 'tsuru', 'AUTOMOVIL', '2013-09-28', 3),
(121, 'nokia', 'TELEFONO', '2013-09-28', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registro_ag`
--

CREATE TABLE IF NOT EXISTS `tbl_registro_ag` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_accion` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_hora` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tbl_usuarios_ag_id_usuario` int(10) unsigned NOT NULL,
  `tbl_tareas_ag_id_tarea` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `fk_tbl_registro_ag_tbl_usuarios_ag1_idx` (`tbl_usuarios_ag_id_usuario`),
  KEY `fk_tbl_registro_ag_tbl_tareas_ag1_idx` (`tbl_tareas_ag_id_tarea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles_ag`
--

CREATE TABLE IF NOT EXISTS `tbl_roles_ag` (
  `id_rol` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `id_rol_UNIQUE` (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_roles_ag`
--

INSERT INTO `tbl_roles_ag` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tareas_ag`
--

CREATE TABLE IF NOT EXISTS `tbl_tareas_ag` (
  `id_tarea` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_tarea` tinyint(1) NOT NULL COMMENT '1= firmas\\n0= tramites',
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `calle` tinyint(1) NOT NULL COMMENT '0= NO\\n1= SI',
  `institucion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `operacion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `rpp` enum('DF','ESTADO') COLLATE latin1_spanish_ci NOT NULL,
  `numeros` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `cliente` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `domicilio` varchar(400) COLLATE latin1_spanish_ci DEFAULT NULL,
  `actividad` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `horario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `observaciones` varchar(500) COLLATE latin1_spanish_ci DEFAULT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1= activo\\n0=inactivo',
  `id_usuario_responsable` varchar(11) COLLATE latin1_spanish_ci NOT NULL,
  `tbl_usuarios_ag_id_usuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_tarea`),
  UNIQUE KEY `id_tarea_UNIQUE` (`id_tarea`),
  KEY `fk_tbl_tareas_ag_tbl_usuarios_ag_idx` (`tbl_usuarios_ag_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `tbl_tareas_ag`
--

INSERT INTO `tbl_tareas_ag` (`id_tarea`, `id_tipo_tarea`, `hora`, `fecha`, `calle`, `institucion`, `operacion`, `rpp`, `numeros`, `cliente`, `domicilio`, `actividad`, `horario`, `observaciones`, `estatus`, `id_usuario_responsable`, `tbl_usuarios_ag_id_usuario`) VALUES
(22, 1, '01:00:00', '2013-09-27', 0, 'PEMEX', 'CV', '', '35008', 'BANCO DEL BAJIO', '', '', '', 'LIC. PEDRAZA, AVENIDA DE LOS PACHES ESTADO DE MEXICO 1213215 ', 1, '1', 2),
(23, 0, '01:00:00', '2013-09-27', 1, '', '', '', '', 'PEMEX', 'Insurgentes', 'entregar recibos', '10-12', 'LIC. PEDRAZA, AVENIDA DE LOS PACHES ESTADO DE MEXICO 1213215 ', 1, '1,2,3', 1),
(24, 1, '01:00:00', '2013-09-27', 1, '', '', 'DF', '', 'BANCO DEL BAJIO', 'INSURGENTES SUR 4122 FUENTES DEL PEDREGAL', 'entregar recibos', '10-12', 'LIC. PEDRAZA, AVENIDA DE LOS PACHES ESTADO DE MEXICO 1213215 ', 1, '1', 1),
(25, 1, '17:59:00', '2013-09-27', 0, 'PEMEX', 'CV', 'DF', '35008', 'asdasdasd', '', '', '', 'LIC. PEDRAZA, AVENIDA DE LOS PACHES ESTADO DE MEXICO 1213215 ', 1, '1', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios_ag`
--

CREATE TABLE IF NOT EXISTS `tbl_usuarios_ag` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_real` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `apellido_paterno` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellido_materno` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tbl_roles_ag_id_rol` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  KEY `fk_tbl_usuarios_ag_tbl_roles_ag1_idx` (`tbl_roles_ag_id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_usuarios_ag`
--

INSERT INTO `tbl_usuarios_ag` (`id_usuario`, `nombre_usuario`, `contrasena`, `nombre_real`, `apellido_paterno`, `apellido_materno`, `tbl_roles_ag_id_rol`) VALUES
(1, 'Notario', 'Not#237dfmx13', 'Alfredo', 'Ayala', 'Herrera', 1),
(2, 'jorge', '54321', 'jorge', 'Olvera', 'Mejia', 1),
(3, 'MARCO POLO', 'mpolo', 'Marco Polo', 'ALvarez', 'Ceron', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_visitantes`
--

CREATE TABLE IF NOT EXISTS `tbl_visitantes` (
  `fecha` date NOT NULL,
  `nombre_cliente` varchar(20) NOT NULL,
  `asunto` varchar(30) NOT NULL,
  `abogado` int(1) NOT NULL,
  `hora` date NOT NULL,
  `1aviso` varchar(10) NOT NULL,
  `2aviso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_visitantes`
--

INSERT INTO `tbl_visitantes` (`fecha`, `nombre_cliente`, `asunto`, `abogado`, `hora`, `1aviso`, `2aviso`) VALUES
('2013-12-31', 'JORGE', 'asdadad', 3, '0000-00-00', 'sss', 'sss');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_atributos_ag`
--
ALTER TABLE `tbl_atributos_ag`
  ADD CONSTRAINT `fk_tbl_atributos_ag_tbl_usuarios_ag1` FOREIGN KEY (`tbl_usuarios_ag_id_usuario`) REFERENCES `tbl_usuarios_ag` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_registro_ag`
--
ALTER TABLE `tbl_registro_ag`
  ADD CONSTRAINT `fk_tbl_registro_ag_tbl_tareas_ag1` FOREIGN KEY (`tbl_tareas_ag_id_tarea`) REFERENCES `tbl_tareas_ag` (`id_tarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_registro_ag_tbl_usuarios_ag1` FOREIGN KEY (`tbl_usuarios_ag_id_usuario`) REFERENCES `tbl_usuarios_ag` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_tareas_ag`
--
ALTER TABLE `tbl_tareas_ag`
  ADD CONSTRAINT `fk_tbl_tareas_ag_tbl_usuarios_ag` FOREIGN KEY (`tbl_usuarios_ag_id_usuario`) REFERENCES `tbl_usuarios_ag` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_usuarios_ag`
--
ALTER TABLE `tbl_usuarios_ag`
  ADD CONSTRAINT `fk_tbl_usuarios_ag_tbl_roles_ag1` FOREIGN KEY (`tbl_roles_ag_id_rol`) REFERENCES `tbl_roles_ag` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
