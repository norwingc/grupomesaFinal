-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2014 a las 01:07:43
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `grupomesa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'Koala.jpg', '2014-09-05 01:52:30', '2014-09-05 23:02:53'),
(2, 'Desert.jpg', '2014-09-05 22:47:59', '2014-09-05 22:47:59'),
(3, 'descarga (1).jpg', '2014-09-22 03:35:56', '2014-09-22 03:35:56'),
(4, 'descarga (2).jpg', '2014-09-22 03:36:02', '2014-09-22 03:36:02'),
(5, 'descarga (3).jpg', '2014-09-22 03:36:15', '2014-09-22 03:36:15'),
(6, 'descarga (4).jpg', '2014-09-22 03:36:25', '2014-09-22 03:36:25'),
(7, 'descarga (5).jpg', '2014-09-22 03:36:35', '2014-09-22 03:36:35'),
(8, 'descarga (6).jpg', '2014-09-22 03:37:10', '2014-09-22 03:37:10'),
(9, 'descarga (7).jpg', '2014-09-22 03:37:19', '2014-09-22 03:37:19'),
(10, 'descarga (8).jpg', '2014-09-22 03:37:28', '2014-09-22 03:37:28'),
(11, 'descarga (9).jpg', '2014-09-22 03:37:41', '2014-09-22 03:37:41'),
(12, 'descarga.jpg', '2014-09-22 03:37:50', '2014-09-22 03:37:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depto`
--

CREATE TABLE IF NOT EXISTS `depto` (
  `id` int(2) NOT NULL DEFAULT '0',
  `opcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `depto`
--

INSERT INTO `depto` (`id`, `opcion`) VALUES
(1, 'Atlantico Norte (RAAN)'),
(2, 'Atlantico Sur (RAAS)'),
(3, 'Boaco'),
(4, 'Carazo'),
(5, 'Chinandega'),
(6, 'Chontales'),
(7, 'Esteli'),
(8, 'Granada'),
(9, 'Jinotega'),
(10, 'Leon'),
(11, 'Madriz'),
(12, 'Managua'),
(13, 'Masaya'),
(14, 'Matagalpa'),
(15, 'Nueva Segovia'),
(16, 'Rio San Juan'),
(17, 'Rivas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_propiedad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `id` int(2) NOT NULL DEFAULT '0',
  `opcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `relacion` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `opcion`, `relacion`) VALUES
(1, 'Waslala', 1),
(2, 'Waspan', 1),
(3, 'Puerto Cabezas', 1),
(4, 'Prinzapolka', 1),
(5, 'Bonanza', 1),
(6, 'Siuna', 1),
(7, 'Rosita', 1),
(8, 'La Cruz de Río Grande', 2),
(9, 'Laguna de Perlas', 2),
(10, 'Muelle de los Bueyes', 2),
(11, 'Nueva Guinea', 2),
(12, 'Paiwas', 2),
(13, 'Bluefields', 2),
(14, 'Desembocadura de la Cruz de Río Grande', 2),
(15, 'El Ayote', 2),
(16, 'El Rama', 2),
(17, 'El Tortuguero', 2),
(18, 'Islas del Maíz', 2),
(19, 'Kukra Hill', 2),
(20, 'Teustepe', 3),
(21, 'San José de los Remates', 3),
(22, 'Santa Lucía', 3),
(23, 'Boaco', 3),
(24, 'Camoapa', 3),
(25, 'San Lorenzo', 3),
(26, 'San Marcos', 4),
(27, 'Diriamba', 4),
(28, 'Dolores', 4),
(29, 'Jinotepe', 4),
(30, 'El Rosario', 4),
(31, 'La Paz', 4),
(32, 'Santa Teresa', 4),
(33, 'La Conquista', 4),
(34, 'El Viejo', 5),
(35, 'Puerto Morazán', 5),
(36, 'Somotillo', 5),
(37, 'Santo Tomás del Norte', 5),
(38, 'Cinco Pinos', 5),
(39, 'San Pedro del Norte', 5),
(40, 'San Francisco del Norte', 5),
(41, 'Corinto', 5),
(42, 'Villanueva', 5),
(43, 'Chinandega', 5),
(44, 'Posoltega', 5),
(45, 'Chichigalpa', 5),
(46, 'El Realejo', 5),
(47, 'Comalapa', 6),
(48, 'Juigalpa', 6),
(49, 'La Libertad', 6),
(50, 'Santo Domingo', 6),
(51, 'San Pedro de Lovago', 6),
(52, 'Santo Tomás', 6),
(53, 'El Rama', 6),
(54, 'Villa Sandino', 6),
(55, 'Acoyapa', 6),
(56, 'Cuapa', 6),
(57, 'El Coral', 6),
(58, 'Mueye de los Bueyes', 6),
(59, 'Nueva Guinea', 6),
(60, 'El Ayote', 6),
(61, 'Pueblo Nuevo', 7),
(62, 'Condega', 7),
(63, 'San Juan de Limay', 7),
(64, 'Esteli', 7),
(65, 'La Trinidad', 7),
(66, 'San Nicolás', 7),
(67, 'Granada', 8),
(68, 'Diriomo', 8),
(69, 'Diriá', 8),
(70, 'Nandaime', 8),
(71, 'La Concordia', 9),
(72, 'San Sebastián de Yalí', 9),
(73, 'San Rafael del Norte', 9),
(74, 'Jinotega', 9),
(75, 'Santa María de Pantasma', 9),
(76, 'Cuá Bocay', 9),
(77, 'Wiwilí', 9),
(78, 'Achuapa', 10),
(79, 'El Sauce', 10),
(80, 'Santa Rosa del Peñón', 10),
(81, 'El Jicaral', 10),
(82, 'Larreynaga-Malpaisillo', 10),
(83, 'Telica', 10),
(84, 'Quezalguaque', 10),
(85, 'León', 10),
(86, 'La Paz Centro', 10),
(87, 'Nagarote', 10),
(88, 'San José de Cusmapa', 11),
(89, 'Las Sabanas', 11),
(90, 'San Lucas', 11),
(91, 'Somoto', 11),
(92, 'Totogalpa', 11),
(93, 'Yalaguina', 11),
(94, 'Palacaguina', 11),
(95, 'Telpaneca', 11),
(96, 'San Juan de Río Coco', 11),
(97, 'San Francisco Libre', 12),
(98, 'Tipitapa', 12),
(99, 'Managua', 12),
(100, 'San Rafael del Sur', 12),
(101, 'Villa Carlos Fonseca', 12),
(102, 'El Crucero', 12),
(103, 'Mateare', 12),
(104, 'Ciudad Sandino', 12),
(105, 'Ticuantepe', 12),
(106, 'Tisma', 13),
(107, 'Masaya', 13),
(108, 'Nindirí', 13),
(109, 'La Concepción', 13),
(110, 'Masatepe', 13),
(111, 'Nandasmo', 13),
(112, 'Niquinohomo', 13),
(113, 'Catarina', 13),
(114, 'San Juan de Oriente', 13),
(115, 'Matagalpa', 14),
(116, 'Sébaco', 14),
(117, 'San Isidro', 14),
(118, 'Ciudad Darío', 14),
(119, 'Terrabona', 14),
(120, 'San Dionisio', 14),
(121, 'Esquipulas', 14),
(122, 'Muy-Muy', 14),
(123, 'San Ramón', 14),
(124, 'Matiguás', 14),
(125, 'Río Blanco', 14),
(126, 'Rancho Grande', 14),
(127, 'Tuma La Dalia', 14),
(128, 'Santa María', 15),
(129, 'Macuelizo', 15),
(130, 'Dipilto', 15),
(131, 'Ocotal', 15),
(132, 'Mozonte', 15),
(133, 'San Fernando', 15),
(134, 'Jalapa', 15),
(135, 'Murra', 15),
(136, 'Wiwili', 15),
(137, 'El Jícaro', 15),
(138, 'Ciudad Antigua', 15),
(139, 'Quilali', 15),
(140, 'Morrito', 16),
(141, 'El Almendro', 16),
(142, 'San Miguelito', 16),
(143, 'San Carlos', 16),
(144, 'El Castillo', 16),
(145, 'San Juan del Norte', 16),
(146, 'Tola', 17),
(147, 'Belén', 17),
(148, 'Potosí', 17),
(149, 'Buenos Aires', 17),
(150, 'San Jorge', 17),
(151, 'Rivas', 17),
(152, 'San Juan del Sur', 17),
(153, 'Cardenas', 17),
(154, 'Moyogalpa', 17),
(155, 'Altagracia', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE IF NOT EXISTS `propiedades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `tipopropiedad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipoanuncio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precioventa` double DEFAULT NULL,
  `precioalquiler` double DEFAULT NULL,
  `tiempo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precioadmin` double NOT NULL,
  `moneda` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadofisico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anocontruccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `areautil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `areaterreno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cuartos` int(11) NOT NULL,
  `banos` int(11) NOT NULL,
  `garaje` int(11) NOT NULL,
  `estratos` int(11) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zona` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detallecasa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitud` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `longitud` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visitas` int(11) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_propietario` int(11) NOT NULL,
  `medidaterreno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medidaconstruccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id`, `titulo`, `estado`, `tipopropiedad`, `tipoanuncio`, `precioventa`, `precioalquiler`, `tiempo`, `precioadmin`, `moneda`, `estadofisico`, `anocontruccion`, `areautil`, `areaterreno`, `cuartos`, `banos`, `garaje`, `estratos`, `descripcion`, `pais`, `departamento`, `municipio`, `zona`, `direccion`, `detallecasa`, `latitud`, `longitud`, `created_at`, `updated_at`, `id_usuario`, `codigo`, `visitas`, `observaciones`, `url`, `id_propietario`, `medidaterreno`, `medidaconstruccion`) VALUES
(41, 'Alquiler y venta de una finca', 1, 'Finca', 'Venta y Alquiler', 500, 400, 'Diario', 600, 'Dólares', 'Usado', '1990', '40', '50', 2, 1, 4, 2, 'esto es una prueba', 'NI', '12', '99', 'Arlen Siu', 'Arlen Siu', 'Piscina,Aire acondicionado,Walk-in-closet,Frente al mar,Garaje,Estudio,Salón de fiestas,Vigilancia 24Hrs,Frente al rio,Vista a la montaña,Vista al lago,Vista al mar', '12.1224499', '-86.20759049999998', '2014-09-20 08:45:28', '2014-09-23 04:11:48', 'zaraki', 'zaraki-41', 3, 'en realidad estamos probando', 'video', 3, 'Varas²', ''),
(42, 'esta casa ya esta lista', 1, 'Almacen', 'Venta y Alquiler', 3323, 3333, 'Mensual', 32222, 'dolares', 'Nuevo', '220222', '2222', '2222', 2, 2, 2, 2, 'fasdf asdfasdfasdfasdfsaf safsadf', 'NI', '12', '99', 'Barrio Chico Pelón', 'Barrio Chico Pelón', 'Cocina,Estudio,Área social,Gimnasio', '12.1515666', '-86.25077779999998', '2014-09-20 10:49:48', '2014-09-22 07:55:19', 'admin', 'admin-42', 3, ' fasfasdf asf asfsafsaf sad f', '222222', 2, 'Varas²', 'Varas²'),
(43, 'Alquiler de casa en Bello Horizonte', 1, 'Casa de Habitaciòn', 'Alquiler', 45000, 300, 'Mensual', 50000, 'dolares', 'Nuevo', '1990', '120', '80', 2, 2, 1, 1, 'casa de alex', 'NI', '12', '99', 'Bello Horizonte', 'Managua Bello Horizonte', 'Sala y Comedor,Cocina,Patio,Aire acondicionado,Garaje,Garaje techado,Estudio,Otros', '12.1448974', '-86.23236409999998', '2014-09-20 23:49:02', '2014-09-22 07:55:11', 'admin', 'admin-43', 7, 'vive la mancha', 'Rf0MiJt9VJg', 3, 'Pies²', 'Pies²'),
(44, 'Alquiler de apartamentos residencial Santo Domingo', 1, 'Departamento', 'Alquiler', 0, 250, 'Mensual', 250, 'dolares', 'Nuevo', '2004', '200', '500', 3, 1, 1, 1, 'Se vende casa ubicada en el Ostional en calle principal (adoquinada) a 300 mts del mar, esta distribuida en 2 habitaciones, 1 baño, amplio corredor, servicio de agua potable y energía eléctrica, portón metálico.', 'NI', '12', '99', 'Lomas de Santo Domingo', 'Lomas de Santo Domingo', 'Cocina,Aire acondicionado central,Walk-in-closet,Cerca de escuelas,Terreno en esquina,Lavanderia interna,Vigilancia 24Hrs', '21.4269387', '-98.8683006', '2014-09-22 00:54:32', '2014-09-23 02:06:01', 'admin', 'admin-44', 60, 'Lugares cercanos playa El Coco o la reserva silvestre La Flor (desovadero de miles tortugas)', '-FizmhYk_Ig', 1, 'M²', 'M²');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades_img`
--

CREATE TABLE IF NOT EXISTS `propiedades_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_propiedad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `propiedades_img`
--

INSERT INTO `propiedades_img` (`id`, `ruta`, `id_propiedad`, `created_at`, `updated_at`) VALUES
(1, 'cat171.jpg', 1, '2014-09-20 10:38:56', '2014-09-20 10:38:56'),
(2, 'C17.jpg', 1, '2014-09-20 10:39:22', '2014-09-20 10:39:22'),
(3, 'CasoDeUso.png', 1, '2014-09-20 10:39:22', '2014-09-20 10:39:22'),
(6, 'aee.jpg', 41, '2014-09-20 10:48:00', '2014-09-20 10:48:00'),
(7, 'antisopa.jpg', 41, '2014-09-20 10:48:00', '2014-09-20 10:48:00'),
(8, 'DB6.jpg', 42, '2014-09-20 10:50:33', '2014-09-20 10:50:33'),
(9, 'cosplay.jpg', 42, '2014-09-20 10:50:33', '2014-09-20 10:50:33'),
(10, 'Dark-Evil-41164.jpg', 42, '2014-09-20 10:50:33', '2014-09-20 10:50:33'),
(11, 'darksiders2.jpg', 42, '2014-09-20 10:50:33', '2014-09-20 10:50:33'),
(12, 'alien-ship-with-tentacles-15892-1366x768.jpg', 43, '2014-09-20 23:50:13', '2014-09-20 23:50:13'),
(13, 'alucard-hellsing-15786-1366x768.jpg', 43, '2014-09-20 23:50:13', '2014-09-20 23:50:13'),
(14, 'avatar-the-last-airbender-13695-1366x768.jpg', 43, '2014-09-20 23:50:14', '2014-09-20 23:50:14'),
(15, 'avatar-the-legend-of-korra-13605-1366x768.jpg', 43, '2014-09-20 23:50:14', '2014-09-20 23:50:14'),
(16, 'avatar-the-legend-of-korra-13768-1366x768.jpg', 43, '2014-09-20 23:50:15', '2014-09-20 23:50:15'),
(17, 'Chrysanthemum.jpg', 44, '2014-09-22 00:55:38', '2014-09-22 00:55:38'),
(18, 'Desert.jpg', 44, '2014-09-22 00:55:39', '2014-09-22 00:55:39'),
(19, 'Jellyfish.jpg', 44, '2014-09-22 00:55:39', '2014-09-22 00:55:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE IF NOT EXISTS `propietarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `propietarios_usuario_id_foreign` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`id`, `nombre`, `apellido`, `email`, `telefono`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 'alex', 'fjfsdf', 'lsdflsndgf', 'ssdjfnsl', 1, '2014-09-05 00:18:03', '2014-09-05 00:18:03'),
(2, 'sdgf', 'sdfsdfs', 'alexjose9@msn.com', 'ssdjfnsl', 2, '2014-09-05 00:24:17', '2014-09-05 00:24:17'),
(3, 'concepcion alexander', 'concepcion alexander', 'werkljfnsldf@sjdfghdf.com', '22514157', 1, '2014-09-12 01:33:35', '2014-09-12 01:40:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serv`
--

CREATE TABLE IF NOT EXISTS `serv` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `servicios` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clasificacion` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `serv`
--

INSERT INTO `serv` (`id`, `servicios`, `clasificacion`, `created_at`, `updated_at`) VALUES
(1, 'Agentes de Call Center', 1, '0000-00-00 00:00:00', '2014-09-21 11:26:54'),
(2, 'Recepcionistas', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Conserjes', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Mensajeros', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Conductores', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Contadores Generales', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Auxiliares Contables', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Auxiliares de Bodega', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Personal de Mantenimiento', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Cobradores', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Repartidores', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Cardex', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Impulsadoras', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Promotores', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Agentes de Seguridad', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Otros', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Servicios de Call Center', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Tele-Ventas', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Cobranza Administrativa y Judicial', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Servicios Contables', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Cobertura de Eventos', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Servicios de Mensajeria', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Venta Directa', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Nomina', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Administración de Personal', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Recursos Humanos', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Seguridad Empresarial', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Reparacion y Mantenimientos de Oficinas', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Reparacion y Mantenimiento de Aires Acondicionados', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Reparacion e Instalacion de Sistemas Electricos', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Jardinería', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Fontanería', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Limpieza en General', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Servicios de Lavado de Flota Vehicular', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Otros', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int(11) NOT NULL DEFAULT '0',
  `servicios` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clasificacion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `servicios`, `clasificacion`) VALUES
(1, 'Agentes de Call Center.', 1),
(2, 'Recepcionistas.', 1),
(3, 'Conserjes.', 1),
(4, 'Mensajeros.', 1),
(5, 'Conductores.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `telefono`, `username`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `estado`) VALUES
(1, 'asdf', 'asasdjasdn', '2222222', 'admin', '$2y$10$fIo3Jv1bWvpUqdFWcMEC3e10B7uOZ4IBZeSnO.UEcqSpslK3A9iOW', 0, 'rIovgrSgYvbEoaKPJ96lM911fUTzvBgw0WgMs19UXuqJyFYTkGAM9XjK6uu8', '0000-00-00 00:00:00', '2014-09-22 05:58:30', 1),
(2, 'sean', 'whatever@fack.com', '8926489', 'zaraki', '$2y$10$sJz0DRycsBGt0VGkaaWB0O/IZhr4SfrRRw6xoRwt2vMJp50pH9f/i', 1, 'c1mOkI0IZRaeC1vQiIDJJUlEcLPHYNnDQqAJqbwCr9T10SQ55ORnExI2wpnV', '0000-00-00 00:00:00', '2014-09-11 22:21:22', 1),
(3, 'alex', 'alex@email.com', '63565656', 'alexxx', '$2y$10$aTQT92rt6FiUjWEPWMpW8uZD6ntOexadPvDLlB64KaBH1k48UnV0y', 0, '', '2014-09-11 22:01:19', '2014-09-12 02:34:11', 1),
(4, 'erick', 'erick@email.com', '12345678', 'erick', '$2y$10$pkaiYhhr7MhgnBEs/okDM.4dUIOyxayPUnck48VulY5DtCSVjB7eu', 1, 'P3P5Uieqw8T0sUolCcDDA6AV0sBKqGqV5SABEVnWQS4CiWLuEgkaquaBTC3S', '2014-09-11 22:01:50', '2014-09-18 23:22:29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE IF NOT EXISTS `zona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `relacion` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=205 ;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id`, `opcion`, `relacion`) VALUES
(1, 'Altagracia Norte', 99),
(2, 'Altamira del Este', 99),
(3, 'Altos de Nejapa', 99),
(4, 'Altos de Santo Domingo', 99),
(5, 'Américas 1', 99),
(6, 'Américas 2', 99),
(7, 'Américas 3', 99),
(8, 'Anexo Jose Benito', 99),
(9, 'Anexo Villa Libertad', 99),
(10, 'Anexo Villa Venezuela', 99),
(11, 'Arlen Siu', 99),
(12, 'Bajos de Acahualinca', 99),
(13, 'Barrio 8 de Marzo', 99),
(14, 'Barrio 18 de Mayo', 99),
(15, 'Barrio 19 de Julio', 99),
(16, 'Barrio Alamania Democrática', 99),
(17, 'Barrio Altagracia', 99),
(18, 'Barrio Andrés Castro', 99),
(19, 'Barrio Augusto Cesar Sandino', 99),
(20, 'Barrio Barricada', 99),
(21, 'Barrio Batahola Sur', 99),
(22, 'Barrio Benedicto Valverde', 99),
(23, 'Barrio Bertha Diaz', 99),
(24, 'Barrio Blanca Segovia', 99),
(25, 'Barrio Buenos Aires', 99),
(26, 'Barrio Camilo Chamorro', 99),
(27, 'Barrio Camilo Ortega', 99),
(28, 'Barrio Campo Bruce', 99),
(29, 'Barrio Carlos Marx', 99),
(30, 'Barrio Chico Pelón', 99),
(31, 'Barrio Concepcion de Maria', 99),
(32, 'Barrio Costa Rica', 99),
(33, 'Barrio Cristo Del Rosario', 99),
(34, 'Barrio Cuba', 99),
(35, 'Barrio Dinamarca', 99),
(36, 'Barrio Ducualí', 99),
(37, 'Barrio Edgar Lang', 99),
(38, 'Barrio Edmundo Matamoros', 99),
(39, 'Barrio El Boer', 99),
(40, 'Barrio El Cortijo', 99),
(41, 'Barrio El Edén', 99),
(42, 'Barrio El Paraísito', 99),
(43, 'Barrio el Pilar', 99),
(44, 'Barrio El Recreo', 99),
(45, 'Barrio El Seminario', 99),
(46, 'Barrio Enrique Bermudez', 99),
(47, 'Barrio Enrique Smith', 99),
(48, 'Barrio Georgino Andrade', 99),
(49, 'Barrio Germán Pomares', 99),
(50, 'Barrio Grenada', 99),
(51, 'Barrio Javier Cuadara', 99),
(52, 'Barrio Jonathan Gonzalez', 99),
(53, 'Barrio Jorge Casali', 99),
(54, 'Barrio Jorge Dimitrov', 99),
(55, 'Barrio Jorge Salazar', 99),
(56, 'Barrio Jose Dolores Estrada', 99),
(57, 'Barrio Julio Buitrago', 99),
(58, 'Barrio La Esperanza', 99),
(59, 'Barrio La Fuente', 99),
(60, 'Barrio La Primavera', 99),
(61, 'Barrio La Unión Soviética', 99),
(62, 'Barrio Lareynaga', 99),
(63, 'Barrio Largaespada', 99),
(64, 'Barrio Leningrado', 99),
(65, 'Barrio Liberia', 99),
(66, 'Barrio Loma Verde', 99),
(67, 'Barrio Los Ángeles', 99),
(68, 'Barrio Los Pescadores', 99),
(69, 'Barrio Manuel Olivares', 99),
(70, 'Barrio Maria Auxiliadora', 99),
(71, 'Barrio Meneses', 99),
(72, 'Barrio México', 99),
(73, 'Barrio Mombacho', 99),
(74, 'Barrio Monseñor Lezcano', 99),
(75, 'Barrio Nora Astorga', 99),
(76, 'Barrio Nueva Libia', 99),
(77, 'Barrio Omar Torrijos', 99),
(78, 'Barrio Oswaldo Manzanarez', 99),
(79, 'Barrio Pablo Ubeda', 99),
(80, 'Barrio Pantasma', 99),
(81, 'Barrio Rafael Ríos', 99),
(82, 'Barrio Rene Cisnero', 99),
(83, 'Barrio Rene Polanco', 99),
(84, 'Barrio Riguero', 99),
(85, 'Barrio Rubén Darío', 99),
(86, 'Barrio Salomón Moreno', 99),
(87, 'Barrio San Cristóbal', 99),
(88, 'Barrio San José Oriental', 99),
(89, 'Barrio San Judas', 99),
(90, 'Barrio San Luis', 99),
(91, 'Barrio San Luis Norte', 99),
(92, 'Barrio San Sebastián', 99),
(93, 'Barrio Santa Clara', 99),
(94, 'Barrio Santa Rosa', 99),
(95, 'Barrio Santo Domingo', 99),
(96, 'Barrio Santos López', 99),
(97, 'Barrio Sierra Maestra', 99),
(98, 'Barrio Tierra Prometida', 99),
(99, 'Barrio Tiscapa', 99),
(100, 'Barrio Urbina', 99),
(101, 'Barrio Villa Cuba libre', 99),
(102, 'Barrio Walter Ferreti', 99),
(103, 'Barrio Waspan Norte', 99),
(104, 'Barrio Waspan Sur', 99),
(105, 'Barrio Willian Diaz', 99),
(106, 'Barrrio Oscar Turcio', 99),
(107, 'Batahola Norte', 99),
(108, 'Bello Horizonte', 99),
(109, 'Bolonia', 99),
(110, 'Bosques de Altamira', 99),
(111, 'Bosques de Nejapa', 99),
(112, 'Carlos Fonseca', 99),
(113, 'Casa Real', 99),
(114, 'Casas del Pueblo 1', 99),
(115, 'Ciudad Jardín', 99),
(116, 'Colonia 14 de Septiembre', 99),
(117, 'Colonia Centroamérica', 99),
(118, 'Colonia Cristhian Perez', 99),
(119, 'Colonia Francisco Morazán', 99),
(120, 'Colonia Independencia', 99),
(121, 'Colonia Maestro Gabriel', 99),
(122, 'Colonia Managua', 99),
(123, 'Colonia Miguel Bonilla', 99),
(124, 'Colonia Molina', 99),
(125, 'Colonia Nicarao', 99),
(126, 'Colonia Primero de Mayo', 99),
(127, 'Colonia Proyecto Piloto', 99),
(128, 'Colonia Tenderí', 99),
(129, 'Colonia Unidad de Propósito', 99),
(130, 'Daniel Chavarria', 99),
(131, 'El Arroyo', 99),
(132, 'El Carmen', 99),
(133, 'El Chorizo', 99),
(134, 'El Zumen', 99),
(135, 'Farabundo Martí', 99),
(136, 'Hialeah', 99),
(137, 'Jardines De Santa Clara', 99),
(138, 'Jardines de Veracruz', 99),
(139, 'La Lomita', 99),
(140, 'Las Brisas', 99),
(141, 'Las Colinas', 99),
(142, 'Las Mercedes', 99),
(143, 'Las Torres', 99),
(144, 'Linda Vista Norte', 99),
(145, 'Llamas Del Bosque', 99),
(146, 'Lomas de Guadalupe', 99),
(147, 'Lomas de Guadalupe', 99),
(148, 'Lomas de Santo Domingo', 99),
(149, 'Lomas Del Valle', 99),
(150, 'Los Laureles Norte', 99),
(151, 'Los Laureles Sur', 99),
(152, 'Los Robles', 99),
(153, 'Mercado Ivan Montenegro', 99),
(154, 'Montoya', 99),
(155, 'Nueva Esperanza', 99),
(156, 'Planes Altamira No 3', 99),
(157, 'Planes de Altamira No.2', 99),
(158, 'Pradera del Doral', 99),
(159, 'Recreo Norte', 99),
(160, 'Reparto Las Palmas', 99),
(161, 'Reparto López', 99),
(162, 'Reparto Los Arcos', 99),
(163, 'Reparto Manuel Fernández', 99),
(164, 'Reparto Miraflores', 99),
(165, 'Reparto San Antonio', 99),
(166, 'Reparto San Juan', 99),
(167, 'Reparto San Patricio', 99),
(168, 'Reparto Santa Jilia', 99),
(169, 'Reparto Schick 1', 99),
(170, 'Reparto Schick 3 Etapa', 99),
(171, 'Reparto Segovia', 99),
(172, 'Reparto Serrano', 99),
(173, 'Residencial Casa Real 3 Etapa', 99),
(174, 'Residencial Colinas de Verona', 99),
(175, 'Residencial Las Cumbres', 99),
(176, 'Residencial Villas Italianas', 99),
(177, 'Riguero Norte', 99),
(178, 'Rubenia', 99),
(179, 'Santa Ana', 99),
(180, 'Socrate Sandino', 99),
(181, 'Sol de Libertad', 99),
(182, 'Urbanización Estancia de Santo Domingo Etapa 2', 99),
(183, 'Urbanización Madrid', 99),
(184, 'Urbanización Ríos de Aguas Vivas', 99),
(185, 'Villa 9 de Junio', 99),
(186, 'Villa Austria', 99),
(187, 'Villa Don Bosco', 99),
(188, 'Villa Flor Norte', 99),
(189, 'Villa Fontana', 99),
(190, 'Villa Fontana Este', 99),
(191, 'Villa Fontana Sur', 99),
(192, 'Villa Loreto', 99),
(193, 'Villa Miguel Gutierrez', 99),
(194, 'Villa Pedro Joaquin Chamorro', 99),
(195, 'Villa Progreso', 99),
(196, 'Villa Reconciliación', 99),
(197, 'Villa Roma', 99),
(198, 'Villa Rubén Darío', 99),
(199, 'Villa San Jacinto', 99),
(200, 'Villa Santa Fe', 99),
(201, 'Villa Tiscapa', 99),
(202, 'Villa Venezuela', 99),
(203, 'Muhan', 54),
(204, 'Reparto San Miguel', 107);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD CONSTRAINT `propietarios_usuario_id_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
