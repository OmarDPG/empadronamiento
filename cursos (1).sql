-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2024 a las 00:41:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edi` timestamp NULL DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_adm`, `usuario`, `password`, `fecha_alta`, `fecha_edi`, `activo`) VALUES
(1, 'aleBoni', '$2y$10$Rmi3gehkbF7zKxpNpDkM7OOxrHRIEVTYwVoA57UJSnkXpvFUO1pV6', '2024-01-03 19:58:01', '2024-01-03 19:58:01', 1),
(2, 'administrador', '$2y$10$ofxM0DQDgEBl1V6hJtNLg.vdgARQmqy9MqbGoUSu0y/XBxWlTLNpO', '2024-02-27 15:33:17', '2024-02-27 21:33:17', 1),
(3, 'omaradmin', '$2y$10$mvU1EsaeHJp56lzPwmD6TenfI8.IQITBl2epgzfkgDu9TDa7hPQiG', '2024-02-15 19:40:39', '2024-02-16 01:40:39', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bachillerato`
--

CREATE TABLE `bachillerato` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `inscrito` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bachillerato`
--

INSERT INTO `bachillerato` (`id_curso`, `nombre_curso`, `descripcion`, `tipo`, `modalidad`, `activo`, `inscrito`) VALUES
(1, 'Acondicionamiento de centros de acopio', 'Aprende a acondicionar centros de acopio para llevar a cabo una separación y almacenamiento correcto de los residuos recolectados.', 'Teórico', 'Presencial o Virtual', 1, 0),
(2, 'Calidad del agua “NOM-002-SEMARNAT-1996', 'Conoce los conceptos básicos de la NOM-002-SEMARNAT-1996, que establece los límites máximos permisibles de contaminantes en las descargas de aguas residuales a los sistemas de alcantarillado urbano o municipal.', 'Teórico', 'Presencial o Virtual', 1, 0),
(3, 'Consumo responsable', 'Conoce las implicaciones sociales y ambientales del modelo de consumo actual, a fin de generar conciencia que permita modificar patrones de consumo en la población.', 'Teórico', 'Presencial o Virtual', 1, 0),
(4, 'Contaminación por plásticos', 'Conoce la problemática ambiental que representan los plásticos y sus efectos, así como algunas prácticas deseables para reducir la contaminación por ellos.', 'Teórico', 'Presencial o Virtual', 1, 0),
(5, 'Desarrollo Sostenible', 'Conocer las características de un modelo sostenible de desarrollo y la transformación de paradigma que se requiere para alcanzarlo.', 'Teórico', 'Presencial o Virtual', 1, 0),
(6, 'Economía Circular', 'Conoce el concepto de la Economía circular y la relevancia de su implementación.', 'Teórico', 'Presencial o Virtual', 1, 0),
(7, 'Ecotecnias de Sustentabilidad Energética', 'La capacitación se da a modo de exposición. se presentan una por una las Ecotecnias de Sustentabilidad Energética con las que cuenta la Secretaría: Calentador solar, deshidratador solar y estufa eficiente de leña. Se explica su funcionamiento y a través de los Manuales de Adaptación al Cambio Climático se abordan los materiales, costo y paso a paso para su construcción y operación.', 'Teórico Practico', 'Presencial', 1, 0),
(8, 'Eficiencia y Transición Energética', 'Se presentan los conceptos básicos de eficiencia energética, se mencionan las acciones básicas de ahorro y control de la energía en los inmuebles, así como las estrategias y medidas de solución aplicables para cada sector.', 'Teórico', 'Virtual', 1, 0),
(9, 'El cambio climático en Puebla', 'Conoce la problemática del cambio climático, sus impactos y sus causas, así como recomendaciones sobre prácticas mediante las cuales se puede contribuir a su mitigación y adaptación a sus efectos.', 'Teórico', 'Presencial o Virtual', 1, 0),
(10, 'Fauna Urbana', 'Conoce las principales especies de fauna urbana y la importancia de su interacción con la población.', 'Teórico', 'Presencial o Virtual', 1, 0),
(11, 'Identificación y caracterización de Residuos Sólidos Urbanos, de Manejo Especial y Peligrosos', 'Conocer las características principales de los diferentes tipos de residuos, así como identificar a qué entidad gubernamental le compete cada uno de ellos, así como una introducción de la normatividad que los rige en México.', 'Teórico', 'Presencial o Virtual', 1, 0),
(12, 'Impacto ambiental de las fibras textiles', 'Conocer en términos generales el impacto ambiental causado por los materiales usados para la fabricación de fibras y telas en la industria textil.', 'Teórico', 'Presencial o Virtual', 1, 0),
(13, 'Importancia de la restauración de los ecosistemas', 'Conoce los ecosistemas del estado que presentan más degradación y sus principales causas, así como  prácticas para su restauración.', 'Teórico', 'Presencial o Virtual', 1, 0),
(14, 'La importancia de conservar la biodiversidad en las Áreas Naturales Protegidas en el Estado de Puebla', 'Conoce información sobre las Áreas Naturales Protegidas, los bienes y servicios que proveen y su relevancia, así como recomendaciones de prácticas para impulsar la conservación y el aprovechamiento de los rebachillerato naturales.', 'Teórico', 'Presencial o Virtual', 1, 0),
(15, 'Los zoológicos como áreas de conservación de vida silvestre', 'Conocer las funciones de los zoológicos y su relación con la conservación de vida silvestre.', 'Teórico', 'Presencial o Virtual', 1, 0),
(16, 'Manejo Integral y Caracterización de Residuos Sólidos Urbanos', 'Conoce la importancia de reducir la generación de desechos mediante el consumo responsable y aprender a realizar la identificación de los distintos tipos de residuos a fin de realizar una separación adecuada de manera previa a su disposición.', 'Teórico', 'Presencial ', 1, 0),
(17, 'Medio Ambiente y Deporte', 'Conoce las prácticas mediante las cuales se puede contribuir al medio ambiente a través del ejercicio de actividades deportivas.', 'Teórico', 'Presencial o Virtual', 1, 0),
(18, 'Recolección de agua de lluvia “SCALL”', 'Adquiere los conocimientos técnicos básicos para la implementación de sistemas de recolección de agua de lluvia.', 'Teórico', 'Presencial o Virtual', 1, 0),
(19, 'Call to a member function move() on null', '', 'Teorico - Practico', 'Presencial', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `nombre_director` varchar(50) NOT NULL,
  `correo_contacto` varchar(50) NOT NULL,
  `telefono_contacto` varchar(10) NOT NULL,
  `nombre_escuela_contacto` varchar(100) NOT NULL,
  `cct_contacto` varchar(25) NOT NULL,
  `direccion_contacto` varchar(250) NOT NULL,
  `n_alumnos_contacto` varchar(150) NOT NULL,
  `mensaje` text NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edi` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `nombre_director`, `correo_contacto`, `telefono_contacto`, `nombre_escuela_contacto`, `cct_contacto`, `direccion_contacto`, `n_alumnos_contacto`, `mensaje`, `activo`, `fecha_alta`, `fecha_edi`) VALUES
(3, 'omar carcamo hernandez', 'omar.ch0896@gmail.com', '2222587878', 'escuela de prueba', 'cd45c5e4f6', 'calle xochipilli #3 Azteca', '1550', 'Espero que este mensaje le encuentre bien. Me dirijo a usted con el propósito de expresar mi interés en la posible apertura de un nuevo curso en [nombre del curso o área de estudio] en nuestra institución.\r\n\r\nCreo firmemente que la incorporación de este curso sería beneficiosa tanto para los estudiantes como para el prestigio académico de nuestra escuela. Considero que existe una demanda significativa en nuestra comunidad educativa por un curso de esta naturaleza, y su implementación contribuiría a enriquecer nuestro plan de estudios y a ofrecer una educación más completa y relevante para nuestros estudiantes.', 1, '2024-02-13 21:28:58', NULL),
(4, 'omar carcamo hernandezsd', 'omar.ch0896@gmail.com', '2222587878', 'escuela de prueba', 'cd45c5e4f6', 'csssfsffrgrgtgrth', '', 'Espero que este mensaje le encuentre bien. Me dirijo a usted con el propósito de expresar mi interés en la posible apertura de un nuevo curso en [nombre del curso o área de estudio] en nuestra institución.\r\n\r\nCreo firmemente que la incorporación de este curso sería beneficiosa tanto para los estudiantes como para el prestigio académico de nuestra escuela. Considero que existe una demanda significativa en nuestra comunidad educativa por un curso de esta naturaleza, y su implementación contribuiría a enriquecer nuestro plan de estudios y a ofrecer una educación más completa y relevante para nuestros estudiantes.', 1, '2024-02-13 22:38:31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre_curso`, `descripcion`, `tipo`, `modalidad`, `activo`) VALUES
(1, 'Acondicionamiento de centros de acopio', 'Aprende a acondicionar centros de acopio para llevar a cabo una separación y almacenamiento correcto de los residuos recolectados.', 'Teórico', 'Presencial o Virtual', 1),
(2, 'Calidad del agua “NOM-002-SEMARNAT-1996', 'Conoce los conceptos básicos de la NOM-002-SEMARNAT-1996, que establece los límites máximos permisibles de contaminantes en las descargas de aguas residuales a los sistemas de alcantarillado urbano o municipal.', 'Teórico', 'Presencial o Virtual', 1),
(3, 'Consumo responsable', 'Conoce las implicaciones sociales y ambientales del modelo de consumo actual, a fin de generar conciencia que permita modificar patrones de consumo en la población.', 'Teórico', 'Presencial o Virtual', 1),
(4, 'Contaminación por plásticos', 'Conoce la problemática ambiental que representan los plásticos y sus efectos, así como algunas prácticas deseables para reducir la contaminación por ellos.', 'Teórico', 'Presencial o Virtual', 1),
(5, 'Desarrollo Sostenible', 'Conocer las características de un modelo sostenible de desarrollo y la transformación de paradigma que se requiere para alcanzarlo.', 'Teórico', 'Presencial o Virtual', 1),
(6, 'Economía Circular', 'Conoce el concepto de la Economía circular y la relevancia de su implementación.', 'Teórico', 'Presencial o Virtual', 1),
(7, 'Ecotecnias de Sustentabilidad Energética', 'La capacitación se da a modo de exposición. se presentan una por una las Ecotecnias de Sustentabilidad Energética con las que cuenta la Secretaría: Calentador solar, deshidratador solar y estufa eficiente de leña. Se explica su funcionamiento y a través de los Manuales de Adaptación al Cambio Climático se abordan los materiales, costo y paso a paso para su construcción y operación.', 'Teórico Practico', 'Presencial', 1),
(8, 'Eficiencia y Transición Energética', 'Se presentan los conceptos básicos de eficiencia energética, se mencionan las acciones básicas de ahorro y control de la energía en los inmuebles, así como las estrategias y medidas de solución aplicables para cada sector.', 'Teórico', 'Virtual', 1),
(9, 'El cambio climático en Puebla', 'Conoce la problemática del cambio climático, sus impactos y sus causas, así como recomendaciones sobre prácticas mediante las cuales se puede contribuir a su mitigación y adaptación a sus efectos.', 'Teórico', 'Presencial o Virtual', 1),
(10, 'Fauna Urbana', 'Conoce las principales especies de fauna urbana y la importancia de su interacción con la población.', 'Teórico', 'Presencial o Virtual', 1),
(11, 'Identificación y caracterización de Residuos Sólidos Urbanos, de Manejo Especial y Peligrosos', 'Conocer las características principales de los diferentes tipos de residuos, así como identificar a qué entidad gubernamental le compete cada uno de ellos, así como una introducción de la normatividad que los rige en México.', 'Teórico', 'Presencial o Virtual', 1),
(12, 'Impacto ambiental de las fibras textiles', 'Conocer en términos generales el impacto ambiental causado por los materiales usados para la fabricación de fibras y telas en la industria textil.', 'Teórico', 'Presencial o Virtual', 1),
(13, 'Importancia de la restauración de los ecosistemas', 'Conoce los ecosistemas del estado que presentan más degradación y sus principales causas, así como  prácticas para su restauración.', 'Teórico', 'Presencial o Virtual', 1),
(14, 'La importancia de conservar la biodiversidad en las Áreas Naturales Protegidas en el Estado de Puebla', 'Conoce información sobre las Áreas Naturales Protegidas, los bienes y servicios que proveen y su relevancia, así como recomendaciones de prácticas para impulsar la conservación y el aprovechamiento de los recursos naturales.', 'Teórico', 'Presencial o Virtual', 1),
(15, 'Los zoológicos como áreas de conservación de vida silvestre', 'Conocer las funciones de los zoológicos y su relación con la conservación de vida silvestre.', 'Teórico', 'Presencial o Virtual', 1),
(16, 'Manejo Integral y Caracterización de Residuos Sólidos Urbanos', 'Conoce la importancia de reducir la generación de desechos mediante el consumo responsable y aprender a realizar la identificación de los distintos tipos de residuos a fin de realizar una separación adecuada de manera previa a su disposición.', 'Teórico', 'Presencial ', 1),
(17, 'Medio Ambiente y Deporte', 'Conoce las prácticas mediante las cuales se puede contribuir al medio ambiente a través del ejercicio de actividades deportivas.', 'Teórico', 'Presencial o Virtual', 1),
(18, 'Recolección de agua de lluvia “SCALL”', 'Adquiere los conocimientos técnicos básicos para la implementación de sistemas de recolección de agua de lluvia.', 'Teórico', 'Presencial o Virtual', 1),
(19, 'curso de prueba', '', 'Teórico', 'Teórico', 1),
(20, 'curso de prueba', '', 'Teórico', 'Teórico', 1),
(21, 'fsdfdfdfdsf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra lorem at nulla fringilla elementum. Nulla ullamcorper arcu eu neque malesuada venenatis. Aenean eget magna arcu. Nulla nec augue nec.', 'Teórico', 'Practico', 1),
(22, 'dadsad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra lorem at nulla fringilla elementum. Nulla ullamcorper arcu eu neque malesuada venenatis. Aenean eget magna arcu. Nulla nec augue nec.', 'Practico', 'Teórico', 1),
(23, 'ouioiuoiouio', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra lorem at nulla fringilla elementum. Nulla ullamcorper arcu eu neque malesuada venenatis. Aenean eget magna arcu. Nulla nec augue nec.', 'Practico', 'Teórico', 1),
(24, 'fcbcbbcvb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra lorem at nulla fringilla elementum. Nulla ullamcorper arcu eu neque malesuada venenatis. Aenean eget magna arcu. Nulla nec augue nec.', 'Practico', 'Practico', 1),
(25, 'Call to a member function move() on null', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra lorem at nulla fringilla elementum. Nulla ullamcorper arcu eu neque malesuada venenatis. Aenean eget magna arcu. Nulla nec augue nec.', 'Teorico - Practico', 'Presencial', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelas`
--

CREATE TABLE `escuelas` (
  `id_escuela` int(11) NOT NULL,
  `nombreEscuela` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `n_alumnos` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `director` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `escuelas`
--

INSERT INTO `escuelas` (`id_escuela`, `nombreEscuela`, `clave`, `n_alumnos`, `direccion`, `director`, `telefono`, `correo`, `fecha_alta`, `fecha_edit`, `activo`) VALUES
(1, 'BENEMERITO INSTITUTO NORMAL DEL ESTADO GENERAL JUA', '21EBH0525C', 794, 'BOULEVARD HERMANOS SERDAN,203,VALLE DEL REY,72140', 'Carolina García Sánchez', '5557891234', 'carolina.garcia@example.com', '2024-01-25 22:01:16', NULL, 1),
(2, 'CAED CECATI 008', '21DER0010K', 166, 'CALLE 18 PONIENTE,0,JESÚS GARCÍA,72090', 'Andrés Martínez Castro', '2222423172', 'andres.martinez@example.com', '2024-01-25 22:02:20', NULL, 1),
(3, 'C.E. NIÑOS HEROES DE CHAPULTEPEC', '21EBH0028E', 1079, 'CALLE 10 SUR,1501,EL ÁNGEL,72533', 'Natalia López Miranda', '2222373552', 'natalia.lopez@example.com', '2024-01-25 22:02:20', NULL, 1),
(4, 'JUAN DE PALAFOX Y MENDOZA', '21EBH0210D', 423, 'AVENIDA EMILIANO ZAPATA,0,LOMAS DE SAN MIGUEL,0', 'Sebastián Ramírez Herrera', '-1776', 'sebastian.ramirez@example.com', '2024-01-25 22:02:20', NULL, 1),
(5, 'ELENA GARRO', '21EBH0754W', 276, 'CALLE VALLE DE TOLUCA,13508,SNTE,72499', 'Valentina González Mendoza', '-9234', 'valentina.gonzalez@example.com', '2024-01-25 22:02:20', NULL, 1),
(6, 'COLEGIO PANECLECTICO', '21PBH0064P', 21, 'CALLE INDEPENDENCIA,5954,EL PATRIMONIO,72450', 'Sergio Torres Gutiérrez', '2223014748', 'sergio.torres@example.com', '2024-01-25 22:02:21', NULL, 1),
(7, 'ESCUELA COMERCIAL INGLESA A.C.', '21PBH0067M', 7, 'CALLE 3 PONIENTE,726,CENTRO,72000', 'Paula Rodríguez Salazar', '2222423174', 'paula.rodriguez@example.com', '2024-01-25 22:02:21', NULL, 1),
(8, 'QUETZALCOATL', '21EBH0494Z', 353, 'PROLONGACIÓN DE LA 14 SUR,0,INFONAVIT SAN JORGE,72587', 'Daniel Soto Pérez', '2223688353', 'daniel.soto@example.com', '2024-01-25 22:02:21', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_grado` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_p` varchar(50) NOT NULL,
  `apellido_m` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `id_escuela`, `id_grado`, `nombre`, `apellido_p`, `apellido_m`, `edad`, `correo`, `telefono`, `fecha_alta`, `fecha_edit`, `activo`, `password`) VALUES
(1, 5, 3, 'OMARSD', 'CARCAMO', 'HERNANDEZ', 25, 'omar.ch0896@gmail.com', '2228072470', '2024-02-15 22:26:52', '2024-02-16 04:26:52', 1, '$2y$10$pVpA5m9FZBusW3Sbr8ZzPuERcH27q9ISCNsupZf7UrdI2MR5d/2qC'),
(2, 8, NULL, 'OMAR', 'Carcamo', 'Hernandez', 25, 'omar.ch0896@mail.com', '2228072470', '2024-02-15 23:21:00', NULL, 1, ''),
(3, 3, NULL, 'OMAR', 'CAARCAMO', 'GERNANDEZ', 26, 'omar.ch0896@kmail.com', '2123157854', '2024-02-26 20:19:30', NULL, 1, ''),
(4, 5, NULL, 'OMAR', 'CAMCSKJ', 'DJFHSDJFHDSJFH', 25, 'omar.chs0896@naul.com', '7895218725', '2024-02-26 20:32:24', '2024-02-27 02:32:24', 1, '$2y$10$kkSJORpFHBXEmBqFBtAyXO9p4FVKhiTTi8OecBGlDZKI7CdJuBj.6'),
(5, 1, 4, 'HASHJA', 'SJHSFJHDJSFH', 'SDHFJDSFHSDHF', 65, 'kdksjdd@gmail.com', '5481316784', '2024-02-26 20:30:04', NULL, 1, '$2y$10$K932fokbVfanuTxvbW8QB.9jweAv88kJetEbDtBLgRI10aZ5kp.Ie');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` int(11) NOT NULL,
  `tipo` tinyint(2) NOT NULL,
  `nombre_grado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `tipo`, `nombre_grado`) VALUES
(1, 0, 'Primaria'),
(2, 1, 'Secundaria'),
(3, 2, 'Bachillerato - Preparatoria'),
(4, 3, 'Universidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `id_maestro` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_p` varchar(50) NOT NULL,
  `apellido_m` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `primaria`
--

CREATE TABLE `primaria` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `inscrito` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `primaria`
--

INSERT INTO `primaria` (`id_curso`, `nombre_curso`, `descripcion`, `tipo`, `modalidad`, `activo`, `inscrito`) VALUES
(1, 'Acondicionamiento de centros de acopio', 'Aprende a acondicionar centros de acopio para llevar a cabo una separación y almacenamiento correcto de los residuos recolectados.', 'Teórico', 'Presencial o Virtual', 1, 0),
(2, 'Calidad del agua “NOM-002-SEMARNAT-1996', 'Conoce los conceptos básicos de la NOM-002-SEMARNAT-1996, que establece los límites máximos permisibles de contaminantes en las descargas de aguas residuales a los sistemas de alcantarillado urbano o municipal.', 'Teórico', 'Presencial o Virtual', 1, 0),
(3, 'Consumo responsable', 'Conoce las implicaciones sociales y ambientales del modelo de consumo actual, a fin de generar conciencia que permita modificar patrones de consumo en la población.', 'Teórico', 'Presencial o Virtual', 1, 0),
(4, 'Contaminación por plásticos', 'Conoce la problemática ambiental que representan los plásticos y sus efectos, así como algunas prácticas deseables para reducir la contaminación por ellos.', 'Teórico', 'Presencial o Virtual', 1, 0),
(5, 'Desarrollo Sostenible', 'Conocer las características de un modelo sostenible de desarrollo y la transformación de paradigma que se requiere para alcanzarlo.', 'Teórico', 'Presencial o Virtual', 1, 0),
(6, 'Economía Circular', 'Conoce el concepto de la Economía circular y la relevancia de su implementación.', 'Teórico', 'Presencial o Virtual', 1, 0),
(7, 'Ecotecnias de Sustentabilidad Energética', 'La capacitación se da a modo de exposición. se presentan una por una las Ecotecnias de Sustentabilidad Energética con las que cuenta la Secretaría: Calentador solar, deshidratador solar y estufa eficiente de leña. Se explica su funcionamiento y a través de los Manuales de Adaptación al Cambio Climático se abordan los materiales, costo y paso a paso para su construcción y operación.', 'Teórico Practico', 'Presencial', 1, 0),
(8, 'Eficiencia y Transición Energética', 'Se presentan los conceptos básicos de eficiencia energética, se mencionan las acciones básicas de ahorro y control de la energía en los inmuebles, así como las estrategias y medidas de solución aplicables para cada sector.', 'Teórico', 'Virtual', 1, 0),
(9, 'El cambio climático en Puebla', 'Conoce la problemática del cambio climático, sus impactos y sus causas, así como recomendaciones sobre prácticas mediante las cuales se puede contribuir a su mitigación y adaptación a sus efectos.', 'Teórico', 'Presencial o Virtual', 1, 0),
(10, 'Fauna Urbana', 'Conoce las principales especies de fauna urbana y la importancia de su interacción con la población.', 'Teórico', 'Presencial o Virtual', 1, 0),
(11, 'Identificación y caracterización de Residuos Sólidos Urbanos, de Manejo Especial y Peligrosos', 'Conocer las características principales de los diferentes tipos de residuos, así como identificar a qué entidad gubernamental le compete cada uno de ellos, así como una introducción de la normatividad que los rige en México.', 'Teórico', 'Presencial o Virtual', 1, 0),
(12, 'Impacto ambiental de las fibras textiles', 'Conocer en términos generales el impacto ambiental causado por los materiales usados para la fabricación de fibras y telas en la industria textil.', 'Teórico', 'Presencial o Virtual', 1, 1),
(13, 'Importancia de la restauración de los ecosistemas', 'Conoce los ecosistemas del estado que presentan más degradación y sus principales causas, así como  prácticas para su restauración.', 'Teórico', 'Presencial o Virtual', 1, 0),
(14, 'La importancia de conservar la biodiversidad en las Áreas Naturales Protegidas en el Estado de Puebla', 'Conoce información sobre las Áreas Naturales Protegidas, los bienes y servicios que proveen y su relevancia, así como recomendaciones de prácticas para impulsar la conservación y el aprovechamiento de los reprimaria naturales.', 'Teórico', 'Presencial o Virtual', 1, 0),
(15, 'Los zoológicos como áreas de conservación de vida silvestre', 'Conocer las funciones de los zoológicos y su relación con la conservación de vida silvestre.', 'Teórico', 'Presencial o Virtual', 1, 0),
(16, 'Manejo Integral y Caracterización de Residuos Sólidos Urbanos', 'Conoce la importancia de reducir la generación de desechos mediante el consumo responsable y aprender a realizar la identificación de los distintos tipos de residuos a fin de realizar una separación adecuada de manera previa a su disposición.', 'Teórico', 'Presencial ', 1, 0),
(17, 'Medio Ambiente y Deporte', 'Conoce las prácticas mediante las cuales se puede contribuir al medio ambiente a través del ejercicio de actividades deportivas.', 'Teórico', 'Presencial o Virtual', 1, 0),
(18, 'Recolección de agua de lluvia “SCALL”', 'Adquiere los conocimientos técnicos básicos para la implementación de sistemas de recolección de agua de lluvia.', 'Teórico', 'Presencial o Virtual', 1, 0),
(19, 'Call to a member function move() on null', '', 'Teorico - Practico', 'Presencial', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secundaria`
--

CREATE TABLE `secundaria` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `inscrito` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `secundaria`
--

INSERT INTO `secundaria` (`id_curso`, `nombre_curso`, `descripcion`, `tipo`, `modalidad`, `activo`, `inscrito`) VALUES
(1, 'Acondicionamiento de centros de acopio', 'Aprende a acondicionar centros de acopio para llevar a cabo una separación y almacenamiento correcto de los residuos recolectados.', 'Teórico', 'Presencial o Virtual', 1, 0),
(2, 'Calidad del agua “NOM-002-SEMARNAT-1996', 'Conoce los conceptos básicos de la NOM-002-SEMARNAT-1996, que establece los límites máximos permisibles de contaminantes en las descargas de aguas residuales a los sistemas de alcantarillado urbano o municipal.', 'Teórico', 'Presencial o Virtual', 1, 0),
(3, 'Consumo responsable', 'Conoce las implicaciones sociales y ambientales del modelo de consumo actual, a fin de generar conciencia que permita modificar patrones de consumo en la población.', 'Teórico', 'Presencial o Virtual', 1, 0),
(4, 'Contaminación por plásticos', 'Conoce la problemática ambiental que representan los plásticos y sus efectos, así como algunas prácticas deseables para reducir la contaminación por ellos.', 'Teórico', 'Presencial o Virtual', 1, 0),
(5, 'Desarrollo Sostenible', 'Conocer las características de un modelo sostenible de desarrollo y la transformación de paradigma que se requiere para alcanzarlo.', 'Teórico', 'Presencial o Virtual', 1, 0),
(6, 'Economía Circular', 'Conoce el concepto de la Economía circular y la relevancia de su implementación.', 'Teórico', 'Presencial o Virtual', 1, 0),
(7, 'Ecotecnias de Sustentabilidad Energética', 'La capacitación se da a modo de exposición. se presentan una por una las Ecotecnias de Sustentabilidad Energética con las que cuenta la Secretaría: Calentador solar, deshidratador solar y estufa eficiente de leña. Se explica su funcionamiento y a través de los Manuales de Adaptación al Cambio Climático se abordan los materiales, costo y paso a paso para su construcción y operación.', 'Teórico Practico', 'Presencial', 1, 0),
(8, 'Eficiencia y Transición Energética', 'Se presentan los conceptos básicos de eficiencia energética, se mencionan las acciones básicas de ahorro y control de la energía en los inmuebles, así como las estrategias y medidas de solución aplicables para cada sector.', 'Teórico', 'Virtual', 1, 0),
(9, 'El cambio climático en Puebla', 'Conoce la problemática del cambio climático, sus impactos y sus causas, así como recomendaciones sobre prácticas mediante las cuales se puede contribuir a su mitigación y adaptación a sus efectos.', 'Teórico', 'Presencial o Virtual', 1, 0),
(10, 'Fauna Urbana', 'Conoce las principales especies de fauna urbana y la importancia de su interacción con la población.', 'Teórico', 'Presencial o Virtual', 1, 0),
(11, 'Identificación y caracterización de Residuos Sólidos Urbanos, de Manejo Especial y Peligrosos', 'Conocer las características principales de los diferentes tipos de residuos, así como identificar a qué entidad gubernamental le compete cada uno de ellos, así como una introducción de la normatividad que los rige en México.', 'Teórico', 'Presencial o Virtual', 1, 0),
(12, 'Impacto ambiental de las fibras textiles', 'Conocer en términos generales el impacto ambiental causado por los materiales usados para la fabricación de fibras y telas en la industria textil.', 'Teórico', 'Presencial o Virtual', 1, 0),
(13, 'Importancia de la restauración de los ecosistemas', 'Conoce los ecosistemas del estado que presentan más degradación y sus principales causas, así como  prácticas para su restauración.', 'Teórico', 'Presencial o Virtual', 1, 0),
(14, 'La importancia de conservar la biodiversidad en las Áreas Naturales Protegidas en el Estado de Puebla', 'Conoce información sobre las Áreas Naturales Protegidas, los bienes y servicios que proveen y su relevancia, así como recomendaciones de prácticas para impulsar la conservación y el aprovechamiento de los resecundaria naturales.', 'Teórico', 'Presencial o Virtual', 1, 0),
(15, 'Los zoológicos como áreas de conservación de vida silvestre', 'Conocer las funciones de los zoológicos y su relación con la conservación de vida silvestre.', 'Teórico', 'Presencial o Virtual', 1, 0),
(16, 'Manejo Integral y Caracterización de Residuos Sólidos Urbanos', 'Conoce la importancia de reducir la generación de desechos mediante el consumo responsable y aprender a realizar la identificación de los distintos tipos de residuos a fin de realizar una separación adecuada de manera previa a su disposición.', 'Teórico', 'Presencial ', 1, 0),
(17, 'Medio Ambiente y Deporte', 'Conoce las prácticas mediante las cuales se puede contribuir al medio ambiente a través del ejercicio de actividades deportivas.', 'Teórico', 'Presencial o Virtual', 1, 0),
(18, 'Recolección de agua de lluvia “SCALL”', 'Adquiere los conocimientos técnicos básicos para la implementación de sistemas de recolección de agua de lluvia.', 'Teórico', 'Presencial o Virtual', 1, 0),
(19, 'Call to a member function move() on null', '', 'Teorico - Practico', 'Presencial', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `inscrito` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`id_curso`, `nombre_curso`, `descripcion`, `tipo`, `modalidad`, `activo`, `inscrito`) VALUES
(1, 'Acondicionamiento de centros de acopio', 'Aprende a acondicionar centros de acopio para llevar a cabo una separación y almacenamiento correcto de los residuos recolectados.', 'Teórico', 'Presencial o Virtual', 1, 0),
(2, 'Calidad del agua “NOM-002-SEMARNAT-1996', 'Conoce los conceptos básicos de la NOM-002-SEMARNAT-1996, que establece los límites máximos permisibles de contaminantes en las descargas de aguas residuales a los sistemas de alcantarillado urbano o municipal.', 'Teórico', 'Presencial o Virtual', 1, 0),
(3, 'Consumo responsable', 'Conoce las implicaciones sociales y ambientales del modelo de consumo actual, a fin de generar conciencia que permita modificar patrones de consumo en la población.', 'Teórico', 'Presencial o Virtual', 1, 0),
(4, 'Contaminación por plásticos', 'Conoce la problemática ambiental que representan los plásticos y sus efectos, así como algunas prácticas deseables para reducir la contaminación por ellos.', 'Teórico', 'Presencial o Virtual', 1, 0),
(5, 'Desarrollo Sostenible', 'Conocer las características de un modelo sostenible de desarrollo y la transformación de paradigma que se requiere para alcanzarlo.', 'Teórico', 'Presencial o Virtual', 1, 0),
(6, 'Economía Circular', 'Conoce el concepto de la Economía circular y la relevancia de su implementación.', 'Teórico', 'Presencial o Virtual', 1, 0),
(7, 'Ecotecnias de Sustentabilidad Energética', 'La capacitación se da a modo de exposición. se presentan una por una las Ecotecnias de Sustentabilidad Energética con las que cuenta la Secretaría: Calentador solar, deshidratador solar y estufa eficiente de leña. Se explica su funcionamiento y a través de los Manuales de Adaptación al Cambio Climático se abordan los materiales, costo y paso a paso para su construcción y operación.', 'Teórico Practico', 'Presencial', 1, 0),
(8, 'Eficiencia y Transición Energética', 'Se presentan los conceptos básicos de eficiencia energética, se mencionan las acciones básicas de ahorro y control de la energía en los inmuebles, así como las estrategias y medidas de solución aplicables para cada sector.', 'Teórico', 'Virtual', 1, 0),
(9, 'El cambio climático en Puebla', 'Conoce la problemática del cambio climático, sus impactos y sus causas, así como recomendaciones sobre prácticas mediante las cuales se puede contribuir a su mitigación y adaptación a sus efectos.', 'Teórico', 'Presencial o Virtual', 1, 0),
(10, 'Fauna Urbana', 'Conoce las principales especies de fauna urbana y la importancia de su interacción con la población.', 'Teórico', 'Presencial o Virtual', 1, 0),
(11, 'Identificación y caracterización de Residuos Sólidos Urbanos, de Manejo Especial y Peligrosos', 'Conocer las características principales de los diferentes tipos de residuos, así como identificar a qué entidad gubernamental le compete cada uno de ellos, así como una introducción de la normatividad que los rige en México.', 'Teórico', 'Presencial o Virtual', 1, 0),
(12, 'Impacto ambiental de las fibras textiles', 'Conocer en términos generales el impacto ambiental causado por los materiales usados para la fabricación de fibras y telas en la industria textil.', 'Teórico', 'Presencial o Virtual', 1, 0),
(13, 'Importancia de la restauración de los ecosistemas', 'Conoce los ecosistemas del estado que presentan más degradación y sus principales causas, así como  prácticas para su restauración.', 'Teórico', 'Presencial o Virtual', 1, 0),
(14, 'La importancia de conservar la biodiversidad en las Áreas Naturales Protegidas en el Estado de Puebla', 'Conoce información sobre las Áreas Naturales Protegidas, los bienes y servicios que proveen y su relevancia, así como recomendaciones de prácticas para impulsar la conservación y el aprovechamiento de los reuniversidad naturales.', 'Teórico', 'Presencial o Virtual', 1, 0),
(15, 'Los zoológicos como áreas de conservación de vida silvestre', 'Conocer las funciones de los zoológicos y su relación con la conservación de vida silvestre.', 'Teórico', 'Presencial o Virtual', 1, 0),
(16, 'Manejo Integral y Caracterización de Residuos Sólidos Urbanos', 'Conoce la importancia de reducir la generación de desechos mediante el consumo responsable y aprender a realizar la identificación de los distintos tipos de residuos a fin de realizar una separación adecuada de manera previa a su disposición.', 'Teórico', 'Presencial ', 1, 0),
(17, 'Medio Ambiente y Deporte', 'Conoce las prácticas mediante las cuales se puede contribuir al medio ambiente a través del ejercicio de actividades deportivas.', 'Teórico', 'Presencial o Virtual', 1, 0),
(18, 'Recolección de agua de lluvia “SCALL”', 'Adquiere los conocimientos técnicos básicos para la implementación de sistemas de recolección de agua de lluvia.', 'Teórico', 'Presencial o Virtual', 1, 0),
(19, 'Call to a member function move() on null', '', 'Teorico - Practico', 'Presencial', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indices de la tabla `bachillerato`
--
ALTER TABLE `bachillerato`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD PRIMARY KEY (`id_escuela`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `fk_escuelas` (`id_escuela`),
  ADD KEY `fk_grado` (`id_grado`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`id_maestro`);

--
-- Indices de la tabla `primaria`
--
ALTER TABLE `primaria`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `secundaria`
--
ALTER TABLE `secundaria`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`id_curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bachillerato`
--
ALTER TABLE `bachillerato`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id_maestro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `primaria`
--
ALTER TABLE `primaria`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `secundaria`
--
ALTER TABLE `secundaria`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`id_escuela`) REFERENCES `escuelas` (`id_escuela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
