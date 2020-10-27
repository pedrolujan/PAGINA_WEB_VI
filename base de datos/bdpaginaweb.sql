-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2020 a las 15:46:27
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdpaginaweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_car` int(11) NOT NULL,
  `ID_USUARIOS` int(11) NOT NULL,
  `ID_PRODUCTOS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(11) NOT NULL,
  `nombre_cat` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nombre_cat`) VALUES
(1, 'laptop'),
(2, 'celular'),
(3, 'mouse'),
(4, 'disco duro'),
(5, 'equipo de sonido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `mensaje_chat` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `fecha_chat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id_chat`, `mensaje_chat`, `ID_USUARIO`, `fecha_chat`) VALUES
(1, 'olaaa', 0, '0000-00-00 00:00:00'),
(2, 'holalal', 1, '0000-00-00 00:00:00'),
(3, 'hola', 3, '0000-00-00 00:00:00'),
(4, 'como estan todos', 1, '0000-00-00 00:00:00'),
(5, 'como estan gente', 2, '0000-00-00 00:00:00'),
(6, 'hola', 2, '0000-00-00 00:00:00'),
(7, 'ULLALA', 2, '0000-00-00 00:00:00'),
(8, 'que de nuevas', 2, '0000-00-00 00:00:00'),
(9, 'hola ', 0, '0000-00-00 00:00:00'),
(10, 'hola algien atiende', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_comp` int(11) NOT NULL,
  `ID_USUARIOS` int(11) NOT NULL,
  `ID_PRODUCTOS` int(11) NOT NULL,
  `ID_METODOPAGO` int(11) NOT NULL,
  `total_comp` decimal(10,3) NOT NULL,
  `fecha_comp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_dep` int(11) NOT NULL,
  `nombre_dep` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `PAIS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_dep`, `nombre_dep`, `PAIS`) VALUES
(1, 'peru', 0),
(2, 'bolivia', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_metpago` int(11) NOT NULL,
  `nombre_metpago` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nombre_pais`) VALUES
(1, 'peru'),
(2, 'bolivia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_pro` int(11) NOT NULL,
  `nombre_pro` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_pro` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `marca_pro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio_pro` decimal(10,3) NOT NULL,
  `ID_CATEGORIA` int(11) NOT NULL,
  `imagen_pro` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_pro`, `nombre_pro`, `descripcion_pro`, `marca_pro`, `precio_pro`, `ID_CATEGORIA`, `imagen_pro`) VALUES
(1, 'EQUIPO DE SONIDO  XBOOM CL87 2350W', 'XBOOM CL87 2350W\r\nSKU:CL87\r\nAlta calidad en sonido te brinda el equipo de sonido LG Xboom CL87', 'LG', '1049.000', 5, 'imagenes/productos/14102017215_86eqsonido.jpg'),
(2, 'PARLANTE BLUETOOTH PARTY', 'JBL 1100W PARTY BOX 1000 - NEGRO\r\nSKU:JBLPARTYBOX1000\r\n\r\nDéjate envolver por el un audio más nitido con Equipo de sonido JBL Bluetooth Party Box 1000 - negro ¡Adquiérelo en PEJATEC SERVIS!\r\n\r\n', 'JBL', '3199.000', 5, 'imagenes/productos/14102017245_47parlante1.jpg'),
(3, 'PARLANTE BLUETOOTH PARTYBOX', ' 160W PARTYBOX 100 - NEGRO\r\nSKU:JBLPARTYBOX1000\r\n\r\nDéjate envolver por el un audio más nitido con Equipo de sonido JBL Bluetooth Party Box 1000 - negro ¡Adquiérelo en PEJATEC SERVIS!\r\n\r\n', 'JBL', '999.000', 5, 'imagenes/productos/14102017265_51parlante.jpg'),
(4, 'LAPTOP HP 15.6\" ', 'CORE I3 1TB 4GB\r\nHP Laptop 15-dw0020la\r\nTamaño de pantalla:\r\n15.6\"\r\nTasa de refreso:\r\n60 Hz\r\nMarca de procesador:\r\nINTEL\r\nProcesador:\r\nIntel Core i3 8130U\r\nMemoria RAM:\r\n4 GB\r\n\r\n¡Adquiérelo en PEJATEC SERVIS!\r\n\r\n', 'hp', '2199.000', 1, 'imagenes/productos/14102017315_8115-DW0020LA_1o.jpg'),
(5, 'Laptop HP Ryzen 5 Radeon ', ' Laptop HP Ryzen 5 Radeon  Vega 8 256GB SSD 12GB\r\nLlévate tu Microsoft 365 Personal + S/189.\r\nAdquiere la Laptop HP 15.6 Ryzen 5 256GB SSD 12GB y disfruta de mayor productividad a donde vayas ¡Exclusivo pejatec servis!', 'hp', '2699.000', 1, 'imagenes/productos/14102017451_4415-GW0012LA_1.jpg'),
(6, 'SMARTPHONE LG Q60', '64GB 3GB OCTA CORE 6.26 HD+ - NEGRO\r\n\r\n Smartphone LG Q60 64gb 3gb octa core 6.26 HD+ - negro, triple cámara, capacidad de 64GB, Procesador octacore ¡Exclusivo PEJATEC SERVIS! ¡Cómpralo ya onlilne!', ' LG ', '799.000', 2, 'imagenes/productos/14102017572_64lg.jpg'),
(7, 'CELULAR SAMSUNG GALAXY A30 ', 'CELULAR SAMSUNG GALAXY A30  DS 64GB 4GB 6.4\" DESBLOQUEADO - NEGRO\r\nCelular Samsung Galaxy a30 DS 64gb 4gb 6.4\" desbloqueado - negro, procesador octacore, wifi, bluetooth, pantalla super AMOLED ¡Cómpralo en PEJATEC SERVIS!', 'SAMSUNG', '1199.000', 2, 'imagenes/productos/14102018042_74celular.jpg'),
(8, 'MOUSE INALÁMBRICO ENKORE BY MICRONICS', 'MOUSE INALÁMBRICO ENKORE BY MICRONICS + ANtivirus\r\nInalámbrico: 2.4Ghz | Hasta 10 Metros de Distancia | Desplazamiento: (Scroll) para ahorrar tiempo y evitar molestias en la muñeca | Compatible con Sistemas Operativos Windows | Alta Sensibilidad de: 1000DI', 'ENKORE', '29.000', 3, 'imagenes/productos/14102018083_14mouse.jpg'),
(9, 'MOUSE GAMER ENKORE ', 'MOUSE GAMER ENKORE 6 BOTONES LUZ LED + MOUSE PAD\r\nModelo:201913093\r\nAncho:14cm\r\nAlto:19cm\r\nProfundidad:7cm\r\nCantidad de botones:6', 'ENKORE', '34.000', 3, 'imagenes/productos/14102018123_31mouseg.jpg'),
(10, 'TV SAMSUNG 58\"', 'TV SAMSUNG 58\" CRYSTAL ULTRA HD SMART TV 58TU7000G\r\nAlto:87.5 cm\r\nAncho:144.8 cm\r\nProfundidad:17.2 cm\r\nPeso (kg):21.4 kg', 'SAMSUNG', '2099.000', 1, 'imagenes/productos/14102018161_18tv.jpg'),
(11, 'dfgjfhgfdsa', 'sdfghjgfdsa', 'dfghjhgfd', '456.000', 2, 'imagenes/productos/1610208292_50lg.jpg'),
(12, 'dfgjfhgfdsa', 'sdfghjgfdsa', 'dfghjhgfd', '456.000', 2, 'imagenes/productos/1610208292_33lg.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_prob` int(11) NOT NULL,
  `nombre_prob` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ID_PAIS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_prob`, `nombre_prob`, `ID_PAIS`) VALUES
(1, 'lima', 1),
(2, 'trujillo', 1),
(3, 'la paz', 2),
(4, 'santa cruz', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'cliente'),
(2, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nombre_usu` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_usu` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni_usu` int(8) NOT NULL,
  `telefono_usu` int(9) NOT NULL,
  `pais_usu` int(6) NOT NULL,
  `provincia_usu` int(6) NOT NULL,
  `correo_usu` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario_usu` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave_usu` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `confclave_usu` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ID_ROL` int(11) NOT NULL DEFAULT 1,
  `imagen_usu` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nombre_usu`, `apellido_usu`, `dni_usu`, `telefono_usu`, `pais_usu`, `provincia_usu`, `correo_usu`, `usuario_usu`, `clave_usu`, `confclave_usu`, `ID_ROL`, `imagen_usu`) VALUES
(1, 'fancisco', 'rojas', 1234567, 678764567, 1, 1, 'a2@e.e', 'pancho', '1234', '1234', 0, '0'),
(2, 'juan', 'lopes', 123456, 678764567, 1, 1, 'a2@e.e', 'juan', '1234', '1234', 0, '0'),
(3, 'fedrico', 'gonsales', 1234567, 678764567, 1, 1, 'a2@e.e', 'fedrico', '1234', '1234', 0, '0'),
(4, 'pedro javier', 'lujan', 1234567, 910210378, 1, 1, 'a2@e.e', 'pedro', '1234', '1234', 2, '0'),
(5, 'maria', 'lujan', 1234567, 910210378, 1, 2, 'a2@e.e', 'maria', '1234', '1234', 0, '0'),
(6, 'paola', 'reyes', 123456, 67663782, 1, 2, 'lujan@hk.com', 'pao', '1234', '1234', 0, '0'),
(7, 'juana', 'lujan', 1234567, 64663782, 2, 3, 'dkdkkd@gmail.com', 'juana', '1234', '1234', 0, '0'),
(8, 'pelo', 'reyes', 1234567, 67663782, 1, 1, 'ergh@gmail.com', 'pelo', '1234', '1234', 0, '0'),
(9, 'paty', 'leon', 1234567, 678764567, 2, 3, 'www@g.g', 'paty', '1234', '1234', 0, '0'),
(10, 'javier', 'lujan', 123456, 910210378, 1, 2, 'lujagmail.com', 'javier', '1234', '1234', 0, '0'),
(11, 'paola', 'reyes', 123456, 67663782, 1, 2, 'JJJJJ@gmail.com', 'aaa', '1234', '1234', 0, '0'),
(12, 'pejalu', 'lujan', 123456, 910210378, 1, 2, 'llujan@gmail.com', 'a@a.a', '1234', '1234', 0, 'foto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_car`),
  ADD KEY `ID_USUARIOS` (`ID_USUARIOS`),
  ADD KEY `ID_PRODUCTOS` (`ID_PRODUCTOS`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_comp`),
  ADD KEY `ID_USUARIOS` (`ID_USUARIOS`),
  ADD KEY `ID_PRODUCTOS` (`ID_PRODUCTOS`),
  ADD KEY `ID_METODOPAGO` (`ID_METODOPAGO`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_dep`),
  ADD KEY `PAIS` (`PAIS`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_metpago`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `ID_CATEGORIA` (`ID_CATEGORIA`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_prob`),
  ADD KEY `ID_PAIS` (`ID_PAIS`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_metpago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_prob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
