-- Programacion Logica y funcional proyecto SGVO
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2020 a las 03:18:27
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zorro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `sucursal` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `no_venta` int(11) NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `nombre`, `telefono`, `sucursal`, `estado`, `no_venta`, `codigo`) VALUES
(18, 'Daniel Hinojosa Ramirez', '2147483647', 'sur', 'pendiente', 25, 252735),
(19, 'Daniel Hinojosa Ramirez', '2147483647', 'centro', 'entregado', 26, 264122);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `precio_u` decimal(10,2) NOT NULL,
  `precio_m` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `nombre`, `categoria`, `precio_u`, `precio_m`, `cantidad`, `img`) VALUES
(1, 'Coca Cola 3L', 'aguas', '39.00', '35.00', 100, '/img/aguas/cocacola3L.jpg'),
(2, 'Pepsi 3L', 'aguas', '30.00', '28.00', 100, '/img/aguas/pepsi3L.jpg'),
(3, '7up 3L', 'aguas', '28.00', '27.00', 100, '/img/aguas/7up3L.jpg'),
(4, 'Mirinda 3L', 'aguas', '28.00', '27.00', 100, '/img/aguas/mirinda3L.jpg'),
(5, 'Red Cola 3L', 'aguas', '25.00', '22.00', 100, '/img/aguas/redcola3L.jpg'),
(6, 'Arroz SOS 1kg Gruezo', 'semillas', '24.50', '22.50', 100, '/img/semillas/arrozSOS1Kg.jpg'),
(7, 'Arroz VV Entero 1kg', 'semillas', '22.50', '21.50', 100, '/img/semillas/arrozVV1Kg.jpg'),
(8, 'Frijol SOS 1kg Negro', 'semillas', '23.00', '21.50', 100, '/img/semillas/frijolSOSNegro1Kg.jpg'),
(9, 'Frijol VV 1kg Negro', 'semillas', '36.50', '34.00', 100, '/img/semillas/frijolVVNegro1Kg.jpg'),
(10, 'Lentejas VV 1kg ', 'semillas', '19.50', '17.00', 100, '/img/semillas/lentejasVV1Kg.jpg'),
(11, 'Atun Dolores 140g Agua', 'abarrotes', '17.90', '16.00', 100, '/img/abarrotes/atundolores150grAgua.jpg'),
(12, 'Aceite 123 1L', 'abarrotes', '29.00', '27.50', 100, '\\img\\abarrotes\\aceite1231L.jpg'),
(13, 'ketchup Heinz 397g', 'abarrotes', '17.00', '17.00', 100, '\\img\\abarrotes\\ketchupHeinz290g.jpg'),
(14, 'Spaguetti La moderna 200g', 'abarrotes', '6.75', '5.00', 100, '\\img\\abarrotes\\spaguettiModerna120g.jpg'),
(15, 'Nescafe 120g', 'abarrotes', '65.00', '63.00', 100, '\\img\\abarrotes\\nescafe120g.jpg'),
(16, 'mermelada mccormick fresa 450g', 'abarrotes', '33.90', '32.50', 100, '\\img\\abarrotes\\mermeladamccormickfresa450g.jpg'),
(19, 'Crema Alpura Entera 450ml', 'cremeria', '22.10', '20.10', 500, '/img/cremeria/alpuraEntera450ml.jpg'),
(20, 'LALA Original 450ml', 'cremeria', '24.20', '22.80', 500, '/img/cremeria/lalaOriginal450ml.jpg'),
(21, 'Santa Clara Premium 450ml', 'cremeria', '200.60', '199.99', 200, '/img/cremeria/santaClaraCrema450ml.jpg'),
(22, 'Q. Panela LV 500gr', 'cremeria', '40.00', '48.69', 100, '/img/cremeria/QuesoPanela.jpg'),
(23, 'Paleta Payaso Med. Caja ', 'dulceria', '120.00', '115.00', 50, '/img/dulceria/paletaPcaja10.jpg'),
(24, 'ZumbaGoma Sandia', 'dulceria', '50.00', '45.00', 100, '/img/dulceria/zumbaGoma20pza.jpg'),
(25, 'Vogue 400 Hojas', 'papel', '26.41', '24.00', 500, '/img/papel/vogue400hojas.jpg'),
(26, 'Big Roll450 Hojas', 'papel', '40.00', '38.00', 100, '/img/papel/bigroll.jpg'),
(27, 'Suavel 450 Hojas', 'papel', '149.99', '145.00', 200, '/img/papel/suavel.jpg'),
(28, 'Suavel 400 Servilletas ', 'papel', '26.50', '25.00', 200, '/img/papel/suavelServilletas.jpg'),
(31, 'Suavitel Complete 1L', 'quimicos', '22.00', '21.00', 100, '/img/quimicos/suavitelComplete1l.jpg'),
(32, 'Salvo Limon 500ml', 'quimicos', '21.00', '20.00', 500, '/img/quimicos/salvoLimon500ml.jfif'),
(33, 'Ariel Regular 4.5Kg', 'quimicos', '119.00', '117.50', 800, '/img/quimicos/arielRegular4kg.jfif'),
(34, 'Persil 3Kg', 'quimicos', '110.00', '118.50', 600, '/img/quimicos/persil3kg.jfif'),
(35, 'Fabuloso Morado 2L', 'quimicos', '27.90', '67.50', 200, '/img/quimicos/fabuloso2lMorado.jfif'),
(36, 'Mini Takis Mix 25za', 'oferta', '100.00', '95.00', 200, '/img/oferta/takisMix25pz.jpg'),
(37, 'Caja 24 Valle Frut 250ml', 'oferta', '100.00', '97.00', 100, '/img/oferta/valleFrutCuarto.jfif'),
(38, 'Caja 24 Frutsi 250ml', 'oferta', '100.00', '95.00', 150, '/img/oferta/mixFrutsi.jpg'),
(39, 'Azucar Zuramex 50Kg', 'oferta', '1205.00', '1100.00', 80, '/img/oferta/costaAzucar.jpg'),
(40, 'Harina de Trigo 1Kg', 'oferta', '17.66', '15.00', 500, '/img/oferta/harinaDeTrigo.jfif'),
(41, 'Salsa Buffalo 360gr', 'oferta', '35.00', '33.50', 200, '/img/oferta/salsaBuffalo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usr` int(11) NOT NULL,
  `usr` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `tipo_usr` varchar(100) NOT NULL,
  `usr_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usr`, `usr`, `pw`, `nombre`, `apellidos`, `telefono`, `correo`, `tipo_usr`, `usr_img`) VALUES
(1, 'adm', 'adm', 'Jose ', 'Ramirez Hinojosa', 2147483647, 'mxdestructive@gmail.com', 'adm', '/img/usr/destructive.jpg'),
(2, 'usr', 'usr', 'Daniel', 'Hinojosa Ramirez', 2147483647, 'osmaritur@gmail.com', 'usr', '/img/usr/especial-1.jpeg'),
(11, 'emp', 'emp', 'Jose Daniel', 'Ramirez Hinojosa', 456789, 'ejemplo@ejemplo', 'emp', '/img/usr/tipos-de-plataforma-de-trailers-710x350.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `no_venta` int(11) NOT NULL,
  `fecha` varchar(40) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`no_venta`, `fecha`, `id_usr`, `total`, `codigo`) VALUES
(25, '15/7/2020', 2, '2155.00', '253127'),
(26, '15/7/2020', 2, '200.00', '261141');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventadetalle`
--

CREATE TABLE `ventadetalle` (
  `id_vd` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(19,2) NOT NULL,
  `sub_total` decimal(19,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventadetalle`
--

INSERT INTO `ventadetalle` (`id_vd`, `id_prod`, `id_venta`, `nombre`, `cantidad`, `precio`, `sub_total`) VALUES
(59, 38, 25, 'Caja 24 Frutsi 250ml', 10, '95.00', '950.00'),
(60, 39, 25, 'Azucar Zuramex 50Kg', 1, '1205.00', '1205.00'),
(61, 38, 26, 'Caja 24 Frutsi 250ml', 1, '100.00', '100.00'),
(62, 37, 26, 'Caja 24 Valle Frut 250ml', 1, '100.00', '100.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `no_venta` (`no_venta`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usr`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`no_venta`),
  ADD KEY `id_usr` (`id_usr`);

--
-- Indices de la tabla `ventadetalle`
--
ALTER TABLE `ventadetalle`
  ADD PRIMARY KEY (`id_vd`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_venta` (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `no_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `ventadetalle`
--
ALTER TABLE `ventadetalle`
  MODIFY `id_vd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`no_venta`) REFERENCES `venta` (`no_venta`) ON DELETE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id_usr`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ventadetalle`
--
ALTER TABLE `ventadetalle`
  ADD CONSTRAINT `ventadetalle_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`id_prod`) ON DELETE CASCADE,
  ADD CONSTRAINT `ventadetalle_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`no_venta`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
