-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2018 a las 17:50:52
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(15) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(15) NOT NULL,
  `precio` int(15) NOT NULL,
  `Nombre_clase` varchar(50) DEFAULT NULL,
  `id_instructor` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id_clase`, `precio`, `Nombre_clase`, `id_instructor`) VALUES
(1, 50, 'Maquinas', 3),
(2, 80, 'Zumba', 2),
(3, 80, 'Fight do', 6),
(4, 80, 'Baile', 5),
(5, 70, 'Yoga', 1),
(6, 80, 'Aerobicos', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(15) NOT NULL,
  `Nombre_cliente` varchar(50) COLLATE gb2312_bin DEFAULT NULL,
  `Apellido1_cliente` varchar(50) COLLATE gb2312_bin DEFAULT NULL,
  `Apellido2_cliente` varchar(50) COLLATE gb2312_bin DEFAULT NULL,
  `CI_cliente` int(200) NOT NULL,
  `Departamento_cliente` varchar(200) COLLATE gb2312_bin NOT NULL,
  `Telefono_cliente` int(15) DEFAULT NULL,
  `Direccion_cliente` varchar(50) COLLATE gb2312_bin DEFAULT NULL,
  `Email_cliente` varchar(50) COLLATE gb2312_bin DEFAULT NULL,
  `Usuario_cliente` varchar(50) COLLATE gb2312_bin NOT NULL,
  `Password_cliente` varchar(50) COLLATE gb2312_bin DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `Estado_cliente` varchar(50) COLLATE gb2312_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `Nombre_cliente`, `Apellido1_cliente`, `Apellido2_cliente`, `CI_cliente`, `Departamento_cliente`, `Telefono_cliente`, `Direccion_cliente`, `Email_cliente`, `Usuario_cliente`, `Password_cliente`, `fecha_inicio`, `fecha_fin`, `Estado_cliente`) VALUES
(1, 'Alexandra', 'Barroz', 'Urrutia', 6936456, 'La Paz', 68014959, 'Avenida Busch', 'alitabarrozu1@gmail.com', 'ABU6936456', 'face2d0abd8e98b6575d0f49d72b3212', '0000-00-00', '0000-00-00', 'Activo'),
(2, 'Gerson', 'Rhu', 'Botelho', 12578944, '', 68146005, '', 'gersonrhu@hotmail.com', 'GRB12578944', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '0000-00-00', 'Activo'),
(3, 'Jose', 'Martinez', 'Gomez', 14204520, 'Oruro', 75234489, 'Villa Fatima', 'bpf311@gmail.com', 'JMG14204520', '7af9f01dacba9538b7bef577ee745d8e', '0000-00-00', '0000-00-00', 'Activo'),
(4, 'Ariel', 'Flores', 'Cruz', 13547211, '', 75269484, '', 'adf@gmail.com', 'AFC13547211', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '0000-00-00', 'Activo'),
(5, 'Jose', 'Arias', 'Vasquez', 96478511, 'La Paz', 78415202, 'Landaeta #789', 'jos_vas@gmail.com', 'JAV96478511', '6a06db260614d08c935b978508c74c35', '0000-00-00', '0000-00-00', 'Inactivo'),
(6, 'Maria', 'Flores', 'Riveros', 78452699, 'Oruro', 75241849, 'Sopocachi #457', 'maria78@gmail.com', 'MFR78452699', '3c6386e8e3e1324f6faa760284e667e0', '0000-00-00', '0000-00-00', 'Activo'),
(7, 'Sarah', 'Rodriguez', 'Jaimes', 95478522, 'La Paz', 75412541, 'Landaeta #459', 'sarah_ro@gmail.com', 'SRJ95478522', 'ec26202651ed221cf8f993668c459d46', '2018-10-30', '2018-11-30', 'Activo'),
(8, 'Marisol', 'Vargas', 'Burgoa', 19240022, 'La Paz', 78845201, 'Landaeta', 'mari_va10@hotmail.com', 'MVB19240022', 'e8b129f85d154480f40cbb0ffe177766', '2018-11-16', '2018-12-16', NULL),
(9, 'Marisol', 'Vargas', 'Burgoa', 19240022, 'La Paz', 78845201, 'Landaeta', 'mari_va10@hotmail.com', 'MVB19240022', 'e8b129f85d154480f40cbb0ffe177766', '2018-11-16', '2018-12-16', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_detalle` int(15) NOT NULL,
  `id_cliente` int(15) NOT NULL,
  `id_usuario` int(15) NOT NULL,
  `id_factura` int(15) NOT NULL,
  `id_clase` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_detalle`, `id_cliente`, `id_usuario`, `id_factura`, `id_clase`) VALUES
(1, 1, 1, 0, 1),
(2, 1, 1, 0, 2),
(3, 1, 1, 0, 6),
(4, 6, 1, 0, 1),
(5, 6, 1, 0, 3),
(6, 6, 1, 0, 6),
(7, 1, 1, 0, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(15) NOT NULL,
  `id_clase` int(15) NOT NULL,
  `nombre_equipo` varchar(50) COLLATE gb2312_bin NOT NULL,
  `descripcion_equipo` varchar(200) COLLATE gb2312_bin NOT NULL,
  `cantidad_equipo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(15) NOT NULL,
  `fecha_factura` date NOT NULL,
  `monto_total` int(15) DEFAULT NULL,
  `porcentaje_descuento` varchar(15) COLLATE gb2312_bin DEFAULT NULL,
  `descuento` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(15) NOT NULL,
  `dia` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_bin DEFAULT NULL,
  `turno` varchar(255) CHARACTER SET gb2312 COLLATE gb2312_bin DEFAULT NULL,
  `asistencia_cliente` varchar(10) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `asistencia_instructor` varchar(10) CHARACTER SET gb2312 COLLATE gb2312_bin NOT NULL,
  `id_cliente` int(15) DEFAULT NULL,
  `id_instructor` int(15) NOT NULL,
  `id_clase` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `dia`, `turno`, `asistencia_cliente`, `asistencia_instructor`, `id_cliente`, `id_instructor`, `id_clase`) VALUES
(1, 'Lunes', 'Tarde', '', '', 1, 3, 1),
(2, 'Martes', 'Ma?ana', '', '', 1, 2, 2),
(3, 'Miercoles', 'Noche', '', '', 1, 4, 6),
(4, 'Lunes', 'Ma?ana', '', '', 6, 3, 1),
(5, 'Martes', 'Ma?ana', '', '', 6, 6, 3),
(6, 'Miercoles', 'Ma?ana', '', '', 6, 4, 6),
(7, 'Sabado', 'Ma?ana', '', '', 1, 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `id_instructor` int(15) NOT NULL,
  `nombre_ins` varchar(15) COLLATE gb2312_bin NOT NULL,
  `apellido1_ins` varchar(50) COLLATE gb2312_bin NOT NULL,
  `apellido2_ins` varchar(50) COLLATE gb2312_bin NOT NULL,
  `especialidad` varchar(50) COLLATE gb2312_bin NOT NULL,
  `ci_ins` int(15) NOT NULL,
  `telefono_ins` int(15) NOT NULL,
  `email_ins` varchar(50) COLLATE gb2312_bin NOT NULL,
  `usuario_ins` varchar(50) COLLATE gb2312_bin NOT NULL,
  `password_ins` varchar(50) COLLATE gb2312_bin NOT NULL,
  `estado_ins` varchar(50) COLLATE gb2312_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`id_instructor`, `nombre_ins`, `apellido1_ins`, `apellido2_ins`, `especialidad`, `ci_ins`, `telefono_ins`, `email_ins`, `usuario_ins`, `password_ins`, `estado_ins`) VALUES
(1, 'David', 'Alvarez', 'Burgoa', 'Yoga', 89521477, 78854124, 'dapbv@gmail.com', 'DAB89521477', 'david_85', 'Activo'),
(2, 'Jose', 'Lopez', 'Arequipa', 'Zumba', 78124599, 78854124, 'jose_l@gmail.com', '', '123456789', 'Activo'),
(3, 'Vicente', 'Bedregal', 'Espinoza', 'Fisicoculturimo', 95104788, 78532520, 'vico@gmail.com', '', '154789', 'Activo'),
(4, 'Luis', 'Catacora', 'Lopez', 'Aerobicos', 10542277, 75214230, 'lucho_10@hotmail.com', '', '10927111', 'Activo'),
(5, 'Veronica', 'Ramirez', 'Vasquez', 'Baile', 9510457, 75210497, 'vero_va@yahoo.com', '', '10927111', 'Activo'),
(6, 'Rodrigo', 'Segales', 'Flores', 'Fight Do', 10932144, 76925414, 'arp_se@gmail.com', '', '10927111', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(15) NOT NULL,
  `id_cargo` int(15) NOT NULL,
  `Nombre_usuario` varchar(50) NOT NULL,
  `Apellido1_usuario` varchar(50) NOT NULL,
  `Apellido2_usuario` varchar(50) NOT NULL,
  `Telefono_usuario` int(50) NOT NULL,
  `CI_usuario` int(50) NOT NULL,
  `Departamento_usuario` varchar(50) NOT NULL,
  `Nick_usuario` varchar(50) NOT NULL,
  `Password_usuario` varchar(50) NOT NULL,
  `Email_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_cargo`, `Nombre_usuario`, `Apellido1_usuario`, `Apellido2_usuario`, `Telefono_usuario`, `CI_usuario`, `Departamento_usuario`, `Nick_usuario`, `Password_usuario`, `Email_usuario`) VALUES
(1, 1, 'Alexandra', 'Barroz', 'Urrutia', 68014959, 6936456, 'La Paz', '', '013d59f42bc52ee8ffa8d6fc32d70b50', 'alitabarrozu@gmail.com'),
(2, 2, 'Juan', 'Torrez', 'Pinto', 75862495, 12479522, 'La Paz', '', 'juan123', 'j.torrez12@gmail.com'),
(3, 1, 'Ana', 'Flores', 'Blanco', 78835741, 10657422, 'Oruro', '', 'ana123', 'anfb1@gmail.com'),
(4, 1, 'Sebastian', 'Barroz', 'Urrutia', 75816425, 10245799, 'La Paz', 'SBU10245799', 'e10adc3949ba59abbe56e057f20f883e', 'sebas12@gmail.com'),
(5, 2, 'Carol', 'Alvarez', 'Flores', 78854124, 10937111, 'La Paz', 'CAF10937111', '13170ed0153d4bc4d2c8bd6016634aaf', 'carolaf@gmail.com'),
(6, 2, 'Mariel', 'Gutierrez', 'Moya', 78451245, 10948755, 'La Paz', 'MGM10948755', 'prueba123', 'm_g_m78@gmail.com'),
(7, 2, 'Martin', 'Ramos', 'Gonzales', 78459696, 96452477, 'Santa Cruz', 'MRG96452477', 'fa5a02c9cc183b3ff1bfcd4c2243f85c', 'm_ramos@gmail.com'),
(8, 2, 'Roberto', 'Bartalama', 'Maceda', 78854252, 78541255, 'La Paz', 'RBM78541255', 'c893bad68927b457dbed39460e6afd62', 'roberto@gmail.com'),
(9, 2, 'Gustavo', 'Monzon', 'Vilca', 788451424, 69547812, 'Tarija', 'GMV69547812', 'fa5a02c9cc183b3ff1bfcd4c2243f85c', 'gustavo12@gmail.com'),
(10, 2, 'Camila', 'Barroz', 'Urrutia', 68014959, 6936459, 'la paz', 'CBU6936459', 'e10adc3949ba59abbe56e057f20f883e', 'camu@gmail.com'),
(11, 1, 'jasan', 'rhu ', 'botelho', 2730008, 6945677, 'la paz', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`),
  ADD KEY `id_instructor` (`id_instructor`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_clase` (`id_clase`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_clase` (`id_clase`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `id_instructor` (`id_instructor`),
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `horarios_ibfk_1` (`id_cliente`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id_instructor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_clase` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id_detalle` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id_instructor` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `clase_ibfk_1` FOREIGN KEY (`id_instructor`) REFERENCES `instructor` (`id_instructor`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `detalle_factura_ibfk_5` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`);

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `horarios_ibfk_2` FOREIGN KEY (`id_instructor`) REFERENCES `instructor` (`id_instructor`),
  ADD CONSTRAINT `horarios_ibfk_3` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
