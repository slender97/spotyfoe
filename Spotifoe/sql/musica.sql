-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2016 a las 19:42:46
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `musica`
--
CREATE DATABASE IF NOT EXISTS `musica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `musica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `Cod_album` int(11) NOT NULL,
  `Nro_canciones` int(4) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Ano` int(4) NOT NULL,
  `Duracion` varchar(8) NOT NULL,
  `Fecha_lan` date NOT NULL,
  `Imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`Cod_album`, `Nro_canciones`, `Nombre`, `Ano`, `Duracion`, `Fecha_lan`, `Imagen`) VALUES
(1, 16, 'X', 2014, '65:27', '2014-06-20', 'https://images-na.ssl-images-amazon.com/images/I/81iAXmZi7CL._SL1500_.jpg'),
(2, 14, '25', 2015, '48:25', '2015-11-20', 'http://www.billboard.com/files/media/adele-25-album-cover-2015-billboard-1000x1000.jpg'),
(3, 13, 'Nevermind', 1992, '46:69', '1991-09-24', 'http://www.lollapalosoradio.com/wp-content/uploads/2015/09/nirvana-nevermind-cover.jpeg'),
(4, 13, 'The open door', 2006, '51:29', '2005-09-25', 'https://s3.amazonaws.com/images.mypraize.com/uploads/Legacy/Gallery/ev_opendoor.jpg'),
(5, 10, 'Amar sin Mentiras', 2004, '43:16', '2004-06-08', 'http://www.caratulas.com/caratulas/M/Marc_Anthony/Marc_Anthony-Amar_Sin_Mentiras-Frontal.jpg'),
(7, 17, 'Contraste', 2007, '71:32', '2007-07-24', 'http://www.music-bazaar.com/album-images/vol3/268/268835/2093000-big/Contraste-Disc-1-cover.jpg'),
(8, 11, 'Ciclos', 2009, '46:09', '2009-05-19', 'https://upload.wikimedia.org/wikipedia/en/c/cf/Luis-enrique-ciclos.jpg'),
(9, 14, 'The Gray Chapter', 2014, '63:51', '2014-10-21', 'http://www.5thegraychapter.com/images/5thegraychapter.jpg'),
(10, 11, 'Caraluna', 2002, '64:23', '2002-06-25', 'http://media.jukebox.es/a9449/articles/ib110011.jpg'),
(11, 12, 'Whats the Story Morning Glory?', 1995, '60:45', '1995-10-02', 'http://ecx.images-amazon.com/images/I/81XAuWZWyqL._SL1425_.jpg'),
(12, 10, 'Doo-Wops & Hooligans', 2010, '53:40', '2010-05-28', 'http://3.bp.blogspot.com/-6dVcJb3vBrE/UOC4XgFQPaI/AAAAAAAAB0c/oHpJuB7STxk/s1600/bruno-mars-caratula.jpg'),
(13, 13, '1989', 2014, '55:15', '2014-02-12', 'http://1.bp.blogspot.com/-I8J4PSAj2FM/VFjTVG50baI/AAAAAAAADbY/Zs08PNxQNwA/s1600/Taylor%2BSwift%2B-%2B1989%2BDeluxe.png'),
(14, 12, 'Appetite for Destruction', 1987, '53:55', '1987-07-12', 'https://www.homeofretro.com/wp-content/uploads/2015/09/Appetite-For-Destruction3.jpg'),
(15, 11, 'A Head Full of Dreams', 2015, '55:15', '2015-02-11', 'https://s3-eu-west-1.amazonaws.com/okdiario-uploads/wp-content/uploads/2015/12/coldplay-head-full-of-dreams.jpg'),
(16, 14, 'Infinity on High', 2007, '47:50', '2007-02-06', 'https://images-na.ssl-images-amazon.com/images/I/51J4kFyx4CL.jpg'),
(17, 10, 'Bacilos', 2000, '50:34', '2000-05-23', 'http://ecx.images-amazon.com/images/I/41KXBEBNFYL.jpg'),
(18, 12, '+', 2011, '61:25', '2016-09-09', 'http://ecx.images-amazon.com/images/I/91Fu9FD9fYL._SL1425_.jpg'),
(19, 14, 'Regional At Best', 2011, '55:09', '2011-07-08', 'https://i.ytimg.com/vi/X7xffw33ay4/maxresdefault.jpg'),
(20, 11, 'La Vida Insospechada', 2016, '45:03', '2016-02-27', 'https://i.ytimg.com/vi/KZXy3RhAyBw/maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumartista`
--

CREATE TABLE `albumartista` (
  `Cod_album` int(11) NOT NULL,
  `Cod_artista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `albumartista`
--

INSERT INTO `albumartista` (`Cod_album`, `Cod_artista`) VALUES
(1, 2),
(2, 1),
(3, 7),
(4, 8),
(9, 11),
(10, 12),
(11, 13),
(12, 14),
(13, 15),
(14, 16),
(15, 17),
(16, 20),
(17, 12),
(18, 2),
(19, 18),
(20, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `Cod_artista` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`Cod_artista`, `Nombre`) VALUES
(1, 'Adele'),
(2, 'Ed Sheeran'),
(3, 'Shakira'),
(4, 'Enrique Iglesias'),
(5, 'Michael Jackson'),
(6, 'Jason Mraz'),
(7, 'Nirvana'),
(8, 'Evanescence'),
(9, 'Marc Anthony'),
(10, 'Gilberto Santa Rosa'),
(11, 'Slipknot'),
(12, 'Bacilos'),
(13, 'Oasis'),
(14, 'Bruno Mars'),
(15, 'Taylor Swift'),
(16, 'Guns N Roses'),
(17, 'Coldplay'),
(18, 'Twenty one Pilots'),
(19, 'Karloz de la Torre'),
(20, 'Fall Out Boy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistacancion`
--

CREATE TABLE `artistacancion` (
  `Cod_artista` int(11) NOT NULL,
  `Cod_cancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artistacancion`
--

INSERT INTO `artistacancion` (`Cod_artista`, `Cod_cancion`) VALUES
(1, 1),
(2, 2),
(2, 17),
(2, 18),
(7, 3),
(8, 4),
(9, 6),
(10, 7),
(11, 8),
(11, 19),
(12, 9),
(12, 16),
(13, 10),
(14, 11),
(15, 12),
(16, 13),
(17, 14),
(18, 20),
(18, 21),
(19, 22),
(20, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacioncancion`
--

CREATE TABLE `calificacioncancion` (
  `Cod_usuario` int(10) NOT NULL,
  `Cod_cancion` int(11) NOT NULL,
  `Calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacioncancion`
--

INSERT INTO `calificacioncancion` (`Cod_usuario`, `Cod_cancion`, `Calificacion`) VALUES
(1, 2, 5),
(2, 1, 4),
(2, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `Cod_cancion` int(11) NOT NULL,
  `CalidadA` varchar(80) NOT NULL,
  `CalidadB` varchar(80) NOT NULL,
  `Duracion` varchar(7) NOT NULL,
  `Fecha_lan` date NOT NULL,
  `Veces_escuch` int(15) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Cod_genero` int(11) NOT NULL,
  `Cod_album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`Cod_cancion`, `CalidadA`, `CalidadB`, `Duracion`, `Fecha_lan`, `Veces_escuch`, `Nombre`, `Cod_genero`, `Cod_album`) VALUES
(1, 'C:/xampp/htdocs/canciones/Hello.mp3', '', '4:55', '2015-10-23', 1, 'Hello', 3, 2),
(2, 'C:/xampp/htdocs/canciones/Thinking Out Loud.mp3', '', '4:40', '2014-08-14', 1, 'Thinking out loud', 4, 1),
(3, 'C:/xampp/htdocs/canciones/Lithium.mp3', '', '4:15', '1991-09-24', 0, 'Lithium', 6, 3),
(4, 'C:/xampp/htdocs/canciones/LithiumE.mp3', '', '3:48', '2007-02-06', 0, 'Lithium', 7, 4),
(6, 'C:/xampp/htdocs/canciones/Ahora Quien.mp3', '', '05:11', '2001-04-04', 7, 'Ahora Quien', 8, 5),
(7, 'C:/xampp/htdocs/canciones/Conteo Regresivo.mp3', '', '4:25', '2003-06-17', 1, 'Conteo Regresivo', 8, 7),
(8, 'C:/xampp/htdocs/canciones/Killpop.mp3', '', '3:45', '2014-11-01', 0, 'Killpop', 7, 9),
(9, 'C:/xampp/htdocs/canciones/CaraLuna.mp3', '', '4:21', '2002-06-25', 0, 'CaraLuna', 2, 10),
(10, 'C:/xampp/htdocs/canciones/Wonderwall.mp3', '', '4:00', '1995-10-02', 0, 'Wonderwall', 4, 11),
(11, 'C:/xampp/htdocs/canciones/Runaway Baby.mp3', '', '2:28', '2010-05-28', 0, 'Runaway Baby', 2, 12),
(12, 'C:/xampp/htdocs/canciones/Shake it Off.mp3', '', '3:39', '2014-02-12', 0, 'Shake it Off', 2, 13),
(13, 'C:/xampp/htdocs/canciones/Welcome to the Jungle.mp3', '', '4:34', '1987-07-12', 0, 'Welcome To The Jungle', 9, 14),
(14, 'C:/xampp/htdocs/canciones/Adventure of a Lifetime.mp3', '', '4:45', '2015-02-11', 0, 'Adventure Of A Lifetime', 2, 15),
(15, 'C:/xampp/htdocs/canciones/Thnks fr th Mmrs.mp3', '', '3:23', '2007-03-27', 0, 'Thnks fr th Mmrs', 1, 16),
(16, 'C:/xampp/htdocs/canciones/Tabaco y Chanel.mp3', '', '5:11', '2000-09-13', 0, 'Tabaco y Chanel', 2, 17),
(17, 'C:/xampp/htdocs/canciones/Photograph.mp3', '', '4:18', '2014-02-14', 0, 'Photograph', 2, 1),
(18, 'C:/xampp/htdocs/canciones/Give Me Love.mp3', '', '8:46', '2011-03-15', 0, 'Give Me Love', 2, 18),
(19, 'C:/xampp/htdocs/canciones/The Devil in I.mp3', '', '5:43', '0000-00-00', 0, 'The Devil in I', 7, 9),
(20, 'C:/xampp/htdocs/canciones/Guns for Hands.mp3', '', '4:37', '2011-09-09', 0, 'Guns for Hands', 2, 19),
(21, 'C:/xampp/htdocs/canciones/Holding on to You.mp3', '', '4:26', '2011-09-15', 0, 'Holding On To You', 2, 19),
(22, 'C:/xampp/htdocs/canciones/Canciones Todavia.mp3', '', '3:56', '2016-02-27', 0, 'Canciones Todavia', 1, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `Cod_genero` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`Cod_genero`, `Nombre`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Soul'),
(4, 'Soft rock'),
(5, 'Blue-eyed soul'),
(6, 'Grunge'),
(7, 'Metal Alternativo'),
(8, 'Salsa'),
(9, 'Hard Rock');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listarep`
--

CREATE TABLE `listarep` (
  `Cod_cancion` int(11) NOT NULL,
  `Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `listarep`
--

INSERT INTO `listarep` (`Cod_cancion`, `Usuario`) VALUES
(6, 2),
(4, 2),
(1, 2),
(1, 3),
(7, 3),
(4, 3),
(2, 3),
(7, 2),
(6, 1),
(3, 4),
(1, 1),
(9, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`Cod_album`);

--
-- Indices de la tabla `albumartista`
--
ALTER TABLE `albumartista`
  ADD PRIMARY KEY (`Cod_album`,`Cod_artista`),
  ADD KEY `Cod_artista` (`Cod_artista`);

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`Cod_artista`);

--
-- Indices de la tabla `artistacancion`
--
ALTER TABLE `artistacancion`
  ADD PRIMARY KEY (`Cod_artista`,`Cod_cancion`),
  ADD KEY `Cod_cancion` (`Cod_cancion`);

--
-- Indices de la tabla `calificacioncancion`
--
ALTER TABLE `calificacioncancion`
  ADD PRIMARY KEY (`Cod_usuario`,`Cod_cancion`);

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`Cod_cancion`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`Cod_genero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `Cod_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `Cod_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `Cod_cancion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `Cod_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albumartista`
--
ALTER TABLE `albumartista`
  ADD CONSTRAINT `albumartista_ibfk_1` FOREIGN KEY (`Cod_album`) REFERENCES `album` (`Cod_album`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `albumartista_ibfk_2` FOREIGN KEY (`Cod_artista`) REFERENCES `artista` (`Cod_artista`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `artistacancion`
--
ALTER TABLE `artistacancion`
  ADD CONSTRAINT `artistacancion_ibfk_1` FOREIGN KEY (`Cod_cancion`) REFERENCES `cancion` (`Cod_cancion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artistacancion_ibfk_2` FOREIGN KEY (`Cod_artista`) REFERENCES `artista` (`Cod_artista`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
