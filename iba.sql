-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2024 a las 00:42:01
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
-- Base de datos: `iba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidoP` varchar(250) DEFAULT NULL,
  `apellidoM` varchar(250) DEFAULT NULL,
  `expediente` varchar(10) DEFAULT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_ultima` timestamp NULL DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `adm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_adm`, `usuario`, `password`, `nombre`, `apellidoP`, `apellidoM`, `expediente`, `fecha_alta`, `fecha_ultima`, `activo`, `adm`) VALUES
(1, 'aleBoni', '$2y$10$Rmi3gehkbF7zKxpNpDkM7OOxrHRIEVTYwVoA57UJSnkXpvFUO1pV6', 'ALEJANDRA', 'BONIFACIO', 'GARCAI', '119076', '2024-01-03 19:58:01', '2024-01-03 19:58:01', 1, 1),
(2, 'administrador', '$2y$10$ofxM0DQDgEBl1V6hJtNLg.vdgARQmqy9MqbGoUSu0y/XBxWlTLNpO', 'ADMINISTRADOR', 'ADMINISTRADOR', 'ADMINISTRADOR', '141855', '2024-03-01 20:29:59', '2024-03-01 20:29:59', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
--

CREATE TABLE `certificados` (
  `id_certificado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `folio` varchar(64) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_inicio` timestamp NULL DEFAULT NULL,
  `fecha_fin` timestamp NULL DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `certificados`
--

INSERT INTO `certificados` (`id_certificado`, `id_usuario`, `id_mascota`, `folio`, `fecha_alta`, `fecha_inicio`, `fecha_fin`, `activo`, `fecha_edit`) VALUES
(1, 2, 1, 'SMADSOT/IBA/EMP-21114/00001/2024', '2024-02-07 23:20:52', NULL, NULL, 1, NULL),
(2, 2, 2, 'SMADSOT/IBA/EMP-21114/00002/2024', '2024-01-23 20:08:38', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_contenido` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `contenido` mediumtext DEFAULT NULL,
  `extra` varchar(5012) DEFAULT NULL,
  `fecha_edi` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `id_entidad` int(11) NOT NULL,
  `nombre_entidad` text NOT NULL,
  `cve_entidad` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`id_entidad`, `nombre_entidad`, `cve_entidad`) VALUES
(1, 'Acajete', 21001),
(2, 'Acateno', 21002),
(3, 'Acatl', 21003),
(4, 'Acatzingo', 21004),
(5, 'Acteopan', 21005),
(6, 'Ahuacatlan', 21006),
(7, 'Ahuatltn', 21007),
(8, 'Ahuazotepec', 21008),
(9, 'Ahuehuetitla', 21009),
(10, 'Ajalpan', 21010),
(11, 'Albino Zertuche', 21011),
(12, 'Aljojuca', 21012),
(13, 'Altepexi', 21013),
(14, 'Amixtlcn', 21014),
(15, 'Amozoc', 21015),
(16, 'Aquixtla', 21016),
(17, 'Atempan', 21017),
(18, 'Atexcal', 21018),
(19, 'Atlixco', 21019),
(20, 'Atoyatempan', 21020),
(21, 'Atzala', 21021),
(22, 'Atzitzihuacjn', 21022),
(23, 'Atzitzintla', 21023),
(24, 'Axutla', 21024),
(25, 'Ayotoxco de Guerrero', 21025),
(26, 'Calpan', 21026),
(27, 'Caltepec', 21027),
(28, 'Camocuautla', 21028),
(29, 'Caxhuacan', 21029),
(30, 'Coatepec', 21030),
(31, 'Coatzingo', 21031),
(32, 'Cohetzala', 21032),
(33, 'Cohuecan', 21033),
(34, 'Coronango', 21034),
(35, 'Coxcatl n', 21035),
(36, 'Coyomeapan', 21036),
(37, 'Coyotepec', 21037),
(38, 'Cuapiaxtla de Madero', 21038),
(39, 'Cuautempan', 21039),
(40, 'Cuautinchnn', 21040),
(41, 'Cuautlancingo', 21041),
(42, 'Cuayuca de Andrade', 21042),
(43, 'Cuetzalan del Progreso', 21043),
(44, 'Cuyoaco', 21044),
(45, 'Chalchicomula de Sesma', 21045),
(46, 'Chapulco', 21046),
(47, 'Chiautla', 21047),
(48, 'Chiautzingo', 21048),
(49, 'Chiconcuautla', 21049),
(50, 'Chichiquila', 21050),
(51, 'Chietla', 21051),
(52, 'Chigmecatitlan', 21052),
(53, 'Chignahuapan', 21053),
(54, 'Chignautla', 21054),
(55, 'Chila', 21055),
(56, 'Chila de la Sal', 21056),
(57, 'Honey', 21057),
(58, 'Chilchotla', 21058),
(59, 'Chinantla', 21059),
(60, 'Domingo Arenas', 21060),
(61, 'Eloxochitlen', 21061),
(62, 'Epatl', 21062),
(63, 'Esperanza', 21063),
(64, 'Francisco Z. Mena', 21064),
(65, 'General Felipe nngeles', 21065),
(66, 'Guadalupe', 21066),
(67, 'Guadalupe Victoria', 21067),
(68, 'Hermenegildo Galeana', 21068),
(69, 'Huaquechula', 21069),
(70, 'Huatlatlauca', 21070),
(71, 'Huauchinango', 21071),
(72, 'Huehuetla', 21072),
(73, 'Huehuetlun el Chico', 21073),
(74, 'Huejotzingo', 21074),
(75, 'Hueyapan', 21075),
(76, 'Hueytamalco', 21076),
(77, 'Hueytlalpan', 21077),
(78, 'Huitzilan de Serdnn', 21078),
(79, 'Huitziltepec', 21079),
(80, 'Atlequizayan', 21080),
(81, 'Ixcamilpa de Guerrero', 21081),
(82, 'Ixcaquixtla', 21082),
(83, 'Ixtacamaxtitl n', 21083),
(84, 'Ixtepec', 21084),
(85, 'Iz5car de Matamoros', 21085),
(86, 'Jalpan', 21086),
(87, 'Jolalpan', 21087),
(88, 'Jonotla', 21088),
(89, 'Jopala', 21089),
(90, 'Juan C. Bonilla', 21090),
(91, 'Juan Galindo', 21091),
(92, 'Juan N. M ndez', 21092),
(93, 'Lafragua', 21093),
(94, 'Libres', 21094),
(95, 'La Magdalena Tlatlauquitepec', 21095),
(96, 'Mazapiltepec de Juerez', 21096),
(97, 'Mixtla', 21097),
(98, 'Molcaxac', 21098),
(99, 'Ca9ada Morelos', 21099),
(100, 'Naupan', 21100),
(101, 'Nauzontla', 21101),
(102, 'Nealtican', 21102),
(103, 'Nicol', 21103),
(104, 'Nopalucan', 21104),
(105, 'Ocotepec', 21105),
(106, 'Ocoyucan', 21106),
(107, 'Olintla', 21107),
(108, 'Oriental', 21108),
(109, 'Pahuatlcn', 21109),
(110, 'Palmar de Bravo', 21110),
(111, 'Pantepec', 21111),
(112, 'Petlalcingo', 21112),
(113, 'Piaxtla', 21113),
(114, 'Puebla', 21114),
(115, 'Quecholac', 21115),
(116, 'Quimixtlcn', 21116),
(117, 'Rafael Lara Grajales', 21117),
(118, 'Los Reyes de Jutrez', 21118),
(119, 'San Andr', 21119),
(120, 'San Antonio Calada', 21120),
(121, 'San Diego la Mesa Tochimiltzingo', 21121),
(122, 'San Felipe Teotlalcingo', 21122),
(123, 'San Felipe Tepatlln', 21123),
(124, 'San Gabriel Chilac', 21124),
(125, 'San Gregorio Atzompa', 21125),
(126, 'San Jerlnimo Tecuanipan', 21126),
(127, 'San Jer', 21127),
(128, 'San Josl Chiapa', 21128),
(129, 'San Josl Miahuatlan', 21129),
(130, 'San Juan Atenco', 21130),
(131, 'San Juan Atzompa', 21131),
(132, 'San Martin Texmelucan', 21132),
(133, 'San Martan Totoltepec', 21133),
(134, 'San Mataas Tlalancaleca', 21134),
(135, 'San Miguel Ixitlln', 21135),
(136, 'San Miguel Xoxtla', 21136),
(137, 'San Nicol s Buenos Aires', 21137),
(138, 'San NicolAs de los Ranchos', 21138),
(139, 'San Pablo Anicano', 21139),
(140, 'San Pedro Cholula', 21140),
(141, 'San Pedro Yeloixtlahuaca', 21141),
(142, 'San Salvador el Seco', 21142),
(143, 'San Salvador el Verde', 21143),
(144, 'San Salvador Huixcolotla', 21144),
(145, 'San Sebastien Tlacotepec', 21145),
(146, 'Santa Catarina Tlaltempan', 21146),
(147, 'Santa Inos Ahuatempan', 21147),
(148, 'Santa Isabel Cholula', 21148),
(149, 'Santiago Miahuatlan', 21149),
(150, 'Huehuetlan el Grande', 21150),
(151, 'Santo Tomls Hueyotlipan', 21151),
(152, 'Soltepec', 21152),
(153, 'Tecali de Herrera', 21153),
(154, 'Tecamachalco', 21154),
(155, 'Tecomatlcn', 21155),
(156, 'Tehuacln', 21156),
(157, 'Tehuitzingo', 21157),
(158, 'Tenampulco', 21158),
(159, 'Teopantl n', 21159),
(160, 'Teotlalco', 21160),
(161, 'Tepanco de L pez', 21161),
(162, 'Tepango de Rodrzguez', 21162),
(163, 'Tepatlaxco de Hidalgo', 21163),
(164, 'Tepeaca', 21164),
(165, 'Tepemaxalco', 21165),
(166, 'Tepeojuma', 21166),
(167, 'Tepetzintla', 21167),
(168, 'Tepexco', 21168),
(169, 'Tepexi de Rodroguez', 21169),
(170, 'Tepeyahualco', 21170),
(171, 'Tepeyahualco de Cuauhtemoc', 21171),
(172, 'Tetela de Ocampo', 21172),
(173, 'Teteles de Avila Castillo', 21173),
(174, 'Teziutl n', 21174),
(175, 'Tianguismanalco', 21175),
(176, 'Tilapa', 21176),
(177, 'Tlacotepec de Benito Julrez', 21177),
(178, 'Tlacuilotepec', 21178),
(179, 'Tlachichuca', 21179),
(180, 'Tlahuapan', 21180),
(181, 'Tlaltenango', 21181),
(182, 'Tlanepantla', 21182),
(183, 'Tlaola', 21183),
(184, 'Tlapacoya', 21184),
(185, 'Tlapanala', 21185),
(186, 'Tlatlauquitepec', 21186),
(187, 'Tlaxco', 21187),
(188, 'Tochimilco', 21188),
(189, 'Tochtepec', 21189),
(190, 'Totoltepec de Guerrero', 21190),
(191, 'Tulcingo', 21191),
(192, 'Tuzamapan de Galeana', 21192),
(193, 'Tzicatlacoyan', 21193),
(194, 'Venustiano Carranza', 21194),
(195, 'Vicente Guerrero', 21195),
(196, 'XayacatlGn de Bravo', 21196),
(197, 'Xicotepec', 21197),
(198, 'Xicotlpn', 21198),
(199, 'Xiutetelco', 21199),
(200, 'Xochiapulco', 21200),
(201, 'Xochiltepec', 21201),
(202, 'Xochitlen de Vicente Sumrez', 21202),
(203, 'Xochitlan Todos Santos', 21203),
(204, 'Yaon4huac', 21204),
(205, 'Yehualtepec', 21205),
(206, 'Zacapala', 21206),
(207, 'Zacapoaxtla', 21207),
(208, 'Zacatlan', 21208),
(209, 'ZapotitlGn', 21209),
(210, 'Zapotitlcn de Myndez', 21210),
(211, 'Zaragoza', 21211),
(212, 'Zautla', 21212),
(213, 'Zihuateutla', 21213),
(214, 'Zinacatepec', 21214),
(215, 'Zongozotla', 21215),
(216, 'Zoquiapan', 21216),
(217, 'Zoquitlon', 21217);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id_mascota` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `edad` varchar(10) DEFAULT NULL,
  `raza` varchar(50) DEFAULT NULL,
  `especie` varchar(10) DEFAULT NULL,
  `vacunado` varchar(10) DEFAULT NULL,
  `esterilizado` varchar(10) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_fin` timestamp NULL DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `caracteristicas` mediumtext DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id_mascota`, `id_usuario`, `nombre`, `edad`, `raza`, `especie`, `vacunado`, `esterilizado`, `fecha_alta`, `fecha_fin`, `activo`, `caracteristicas`, `sexo`) VALUES
(1, 2, ' BALU ', '15', 'MESTIZO', '', '', '', '2024-01-23 17:13:42', NULL, 1, 'CARATERISITIVCAAS', ''),
(2, 2, 'BEGONA', '15', 'GATO', 'Gato', 'Sí', 'Sí', '2024-01-23 20:07:48', NULL, 1, 'GATO BLACO', 'Hembra'),
(3, 2, 'PERRO', '12', 'PERRO', 'Perro', 'Sí', 'Sí', '2024-02-28 20:33:16', NULL, 1, 'PERRO AMARILLO', 'Macho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `id_temp` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'Proceso',
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `temporal`
--

INSERT INTO `temporal` (`id_temp`, `id_usuario`, `id_mascota`, `estado`, `activo`) VALUES
(1, 2, 1, 'Proceso', 0),
(2, 2, 2, 'Proceso', 0),
(3, 2, 3, 'Proceso', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_entidad` int(11) NOT NULL,
  `cve_entidad` int(11) DEFAULT NULL,
  `nombre` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `identificacion` varchar(15) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `nombre_entidad` text NOT NULL,
  `calle` text NOT NULL,
  `colonia` text NOT NULL,
  `numero` int(10) NOT NULL,
  `cp` int(5) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_ultima` timestamp NULL DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 0,
  `doc_identificacion` text NOT NULL,
  `doc_domicilio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_entidad`, `cve_entidad`, `nombre`, `password`, `correo`, `telefono`, `identificacion`, `curp`, `direccion`, `nombre_entidad`, `calle`, `colonia`, `numero`, `cp`, `fecha_alta`, `fecha_ultima`, `activo`, `doc_identificacion`, `doc_domicilio`) VALUES
(1, 156, 21156, 'JOSE MIGUEL PACHECO SERRANO', '$2y$10$w5ewGBfAvdgnvW5d/4OTq.dCaeErVj2DfaVpA6s3P82QK9c/xR8Nq', 'jmps.9723118@gmail.com', '2228572468', '1462104013108', 'PASM970808HPLCRG07', NULL, 'Tehuacln', 'PTO MAZATLAN', 'INFONAVIT EL RIEGO', 532, 75760, '2024-01-04 04:27:18', NULL, 1, '', ''),
(2, 114, 21114, 'OMAR CARCAMO HERNANDEZ', '$2y$10$MpVYIpo.W0R2zrErWAJC0eb4iF16kMUw3.oeENYnCBBmaTgFoBARO', 'omar.ch0896@gmail.com', '2228072470', '1234898546542', 'CAHO961008HPLRRM07', NULL, 'Puebla', 'XOCHIPILLI', 'AZTECA', 3, 72270, '2024-02-28 20:36:35', '2024-02-28 19:36:35', 1, '', ''),
(3, 17, 21017, 'DSADASSD', '$2y$10$WTPxwnYolvb8MSLvPyg36ODOzNofX9fPfZz9cmxXjGzuRGKg1Zxtq', 'omar.ch096@mail.com', '2255887722', '6456546456564', 'CAHO963636HPLRRM07', NULL, 'Atempan', 'SDSADASDS', 'SADSADSAD', 5, 72270, '2024-02-27 17:42:38', NULL, 0, '', ''),
(4, 5, 21005, 'OMAR CARCAMO FERNANDEZ', '$2y$10$x3p33hL8xrjelTESw1FqOuK.6o8a.FKNbEWLdmD8Z9wH8ZOkmHdYC', 'omar.ch0896@kmal.com', '2224545445', '4565465446556', 'CAHO961008HPLRMM56', NULL, 'Acteopan', 'CALLE', 'COLONIA', 12, 72220, '2024-02-28 20:48:10', NULL, 1, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id_certificado`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_contenido`);

--
-- Indices de la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`id_entidad`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `fk-usuario-mascotas` (`id_usuario`);

--
-- Indices de la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD PRIMARY KEY (`id_temp`),
  ADD KEY `fk_usuarios` (`id_usuario`),
  ADD KEY `fk_mascotas` (`id_mascota`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_entidad` (`id_entidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id_certificado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `id_entidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD CONSTRAINT `certificados_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascota`),
  ADD CONSTRAINT `certificados_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `fk-usuario-mascotas` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD CONSTRAINT `fk_mascotas` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_entidad` FOREIGN KEY (`id_entidad`) REFERENCES `entidades` (`id_entidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
