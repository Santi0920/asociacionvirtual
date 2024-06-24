-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 03:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asociacion_virtual`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencias`
--

CREATE TABLE `agencias` (
  `ID` int(11) NOT NULL,
  `NameAgencia` varchar(200) DEFAULT NULL,
  `NumAgencia` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `agencias`
--

INSERT INTO `agencias` (`ID`, `NameAgencia`, `NumAgencia`) VALUES
(1, 'Bogotá Elemento', '13'),
(2, 'CaliBC', '30'),
(3, 'Cali', '31'),
(4, 'Palmira', '32'),
(5, 'Buenaventura', '33'),
(6, 'Buga', '34'),
(7, 'Tuluá', '35'),
(8, 'Sevilla', '36'),
(9, 'La Unión', '37'),
(10, 'Roldanillo', '38'),
(11, 'Cartago', '39'),
(12, 'Zarzal', '40'),
(13, 'Caicedonia', '41'),
(14, 'S Quilichao', '42'),
(15, 'Yumbo', '43'),
(16, 'Jamundí', '44'),
(17, 'Pasto', '45'),
(18, 'Popayán', '46'),
(19, 'Ipiales', '47'),
(20, 'Leticia', '48'),
(21, 'Puerto Asis', '49'),
(22, 'Soacha', '68'),
(23, 'Manizales', '70'),
(24, 'Zipaquirá', '73'),
(25, 'Facatativá', '75'),
(26, 'Pereira', '74'),
(27, 'Girardot', '76'),
(28, 'San Andrés', '77'),
(29, 'Armenia', '78'),
(30, 'Medellín', '80'),
(31, 'Monteria', '81'),
(32, 'Sincelejo', '82'),
(33, 'Yopal', '83'),
(34, 'Riohacha', '84'),
(35, 'Valledupar', '85'),
(36, 'Cartagena', '86'),
(37, 'Santa Marta', '88'),
(38, 'Duitama', '89'),
(39, 'Bogotá Centro', '90'),
(40, 'Bogotá TC', '91'),
(41, 'Bogotá Norte', '92'),
(42, 'Villavicencio', '93'),
(43, 'Tunja', '94'),
(44, 'Ibagué', '95'),
(45, 'Neiva', '96'),
(46, 'Bucaramanga', '97'),
(47, 'Cúcuta', '98'),
(48, 'Barranquilla', '87');

-- --------------------------------------------------------

--
-- Table structure for table `asociacion`
--

CREATE TABLE `asociacion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fechaAccion` varchar(255) DEFAULT NULL,
  `vinculado` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `lnacimiento` varchar(255) DEFAULT NULL,
  `tidentificacion` varchar(255) DEFAULT NULL,
  `noidentificacion` varchar(255) DEFAULT NULL,
  `fechaexpedicion` varchar(255) DEFAULT NULL,
  `lexpedicion` varchar(255) DEFAULT NULL,
  `dcorrespondencia` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `fnacimiento` varchar(255) DEFAULT NULL,
  `dresidencia` varchar(255) DEFAULT NULL,
  `empresatrabaja` varchar(255) DEFAULT NULL,
  `dtrabajo` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `ciudadempresa` varchar(255) DEFAULT NULL,
  `tiempocargo` varchar(255) DEFAULT NULL,
  `celular1` varchar(255) DEFAULT NULL,
  `whatsapp1` varchar(255) DEFAULT NULL,
  `celular2` varchar(255) DEFAULT NULL,
  `whatsapp2` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `autoriza` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asociacion`
--

INSERT INTO `asociacion` (`id`, `fechaAccion`, `vinculado`, `nombre`, `apellidos`, `lnacimiento`, `tidentificacion`, `noidentificacion`, `fechaexpedicion`, `lexpedicion`, `dcorrespondencia`, `genero`, `ciudad`, `fnacimiento`, `dresidencia`, `empresatrabaja`, `dtrabajo`, `cargo`, `ciudadempresa`, `tiempocargo`, `celular1`, `whatsapp1`, `celular2`, `whatsapp2`, `correo`, `autoriza`) VALUES
(1, 'Junio 21 2024, 4:13:44 p. m.', 'NO', 'Illum quia tempor e', 'Eaque magna culpa co', 'Marulanda', 'C.C', '36', 'Marzo/8/1976', 'Somondoco', 'Rerum rem laborum S', 'M', 'Bogotá Norte', 'Agosto/21/1938', 'Ut mollitia nisi rer', 'Nam libero rerum opt', 'Pariatur In Nam cum', 'Numquam qui in quibu', 'Magüi', 'Reprehenderit amet', '+269 6', '+84 69', '+964 6', '+245 44', '@', 'SI'),
(2, 'Junio 21 2024, 4:14:58 p. m.', 'NO', 'Amet elit cupidita', 'Sed illum placeat', 'Ayapel', 'T.I', '45', 'Enero/27/1989', 'Acacías', 'Totam in voluptatem', 'M', 'Yumbo', 'Octubre/4/1982', 'At ipsum reiciendis', 'Odio ratione maxime', 'Optio eu ea aute hi', 'Nemo reiciendis occa', 'El Piñon', 'Repellendus Consequ', '+249 44', '+378 92', '+84 44', '+686 43', 'Explicabo Asperiore@Fugit quia totam ve', 'NO'),
(3, 'Junio 21 2024, 5:28:18 p. m.', 'NO', 'Santiago', 'Castaño Henao', 'Cali', 'C.C', '1006051717', 'Septiembre/25/2006', 'Cali', 'Cra 85 #45 58', 'M', 'Cali', 'Septiembre/20/2002', 'Cra 85 #45 58', 'Coopserp', 'Cra 8 #87 45', 'A. Sistemas', 'Cali', '6 meses', '+57 3218712282', '+57 3218712282', '+33 3218712282', '+57 5454548741', 'santicashe@gmail.com', 'SI'),
(4, 'Junio 21 2024, 5:40:01 p. m.', 'SI', 'Jesus Hermes', 'BOLAÑOS CRUZ', 'Cali', 'C.C', '16645889', 'Marzo/17/1979', 'Cali', 'Avenida 6ta Oeste #5 Oeste-60', 'M', 'Cali', 'Septiembre/13/1960', 'Avenida 6ta Oeste #5 Oeste-60', 'Coopserp', 'Carrera 8 #10 - 47', 'Director', 'Cali', '27 años y 10 meses', '+57 3208888888', '+57 0', '+57 3208888888', '+57 0', 'director@coopserp.com', 'SI'),
(5, 'Junio 22 2024, 8:27:24 a. m.', 'NO', 'Sit facere ipsa mol', 'Corrupti ea maxime', 'Usiacurí', 'C.E', '1', 'Agosto/28/1962', 'Sucre', 'Labore officia illo', 'F', 'Manizales', 'Junio/17/1966', 'Et quis vel dolor eu', 'Quis debitis veniam', 'Do soluta eum sit be', 'Anim esse voluptatum', 'Gachetá', '44 años y 44meses.', '+1649 47', '+250 87', '+43 47', '+966 86', 'Quia veritatis proid@Inventore recusandae', 'SI');

-- --------------------------------------------------------

--
-- Table structure for table `auditoria`
--

CREATE TABLE `auditoria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Hora_login` timestamp NULL DEFAULT NULL,
  `Usuario_nombre` varchar(255) NOT NULL,
  `Usuario_Rol` varchar(255) NOT NULL,
  `AgenciaU` varchar(255) NOT NULL,
  `Accion_realizada` varchar(255) DEFAULT NULL,
  `Hora_Accion` timestamp NULL DEFAULT NULL,
  `Cedula_Registrada` varchar(255) DEFAULT NULL,
  `cerro_sesion` timestamp NULL DEFAULT NULL,
  `IP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auditoria`
--

INSERT INTO `auditoria` (`id`, `Hora_login`, `Usuario_nombre`, `Usuario_Rol`, `AgenciaU`, `Accion_realizada`, `Hora_Accion`, `Cedula_Registrada`, `cerro_sesion`, `IP`) VALUES
(1, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-13 21:43:45', NULL, NULL, '::1'),
(2, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-14 16:55:08', NULL, NULL, '::1'),
(3, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'CerrosesionAutorizacion', '2024-06-14 19:02:45', NULL, '2024-06-14 19:02:45', '::1'),
(4, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-14 19:03:16', NULL, NULL, '::1'),
(5, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'CerrosesionAutorizacion', '2024-06-14 19:04:05', NULL, '2024-06-14 19:04:05', '::1'),
(6, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-14 19:04:10', NULL, NULL, '::1'),
(7, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'CerrosesionAutorizacion', '2024-06-14 19:05:54', NULL, '2024-06-14 19:05:54', '::1'),
(8, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-14 19:06:00', NULL, NULL, '::1'),
(9, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'CerrosesionAutorizacion', '2024-06-14 19:07:34', NULL, '2024-06-14 19:07:34', '::1'),
(10, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-14 19:07:58', NULL, NULL, '::1'),
(11, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'CerrosesionAutorizacion', '2024-06-14 19:31:45', NULL, '2024-06-14 19:31:45', '::1'),
(12, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-14 19:32:28', NULL, NULL, '::1'),
(13, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-14 20:28:13', NULL, NULL, '::1'),
(14, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-17 13:19:35', NULL, NULL, '::1'),
(15, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-17 14:49:20', NULL, NULL, '::1'),
(16, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-17 14:54:06', NULL, NULL, '::1'),
(17, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-17 16:02:56', NULL, NULL, '::1'),
(18, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-17 18:59:57', NULL, NULL, '::1'),
(19, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-18 13:07:05', NULL, NULL, '::1'),
(20, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'CerrosesionAutorizacion', '2024-06-18 16:07:35', NULL, '2024-06-18 16:07:35', '::1'),
(21, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-18 16:07:58', NULL, NULL, '::1'),
(22, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-18 20:25:28', NULL, NULL, '::1'),
(23, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-19 20:26:49', NULL, NULL, '::1'),
(24, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-21 16:21:42', NULL, NULL, '::1'),
(25, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'CerrosesionAutorizacion', '2024-06-21 16:23:49', NULL, '2024-06-21 16:23:49', '::1'),
(26, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-21 16:40:54', NULL, NULL, '::1'),
(27, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-21 21:35:22', NULL, NULL, '::1'),
(28, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-21 22:32:30', NULL, NULL, '::1'),
(29, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-21 22:41:50', NULL, NULL, '::1'),
(30, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'CerrosesionAutorizacion', '2024-06-21 22:46:45', NULL, '2024-06-21 22:46:45', '::1'),
(31, NULL, 'Walter CRUZ', 'Consultante', 'Cali', 'IngresoaAutorizaciones', '2024-06-22 13:30:33', NULL, NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `activo` varchar(255) NOT NULL DEFAULT '0',
  `agenciau` varchar(40) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rol`, `activo`, `agenciau`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'Jesus H BOLAÑOS', 'coor.9@coopserp.com', NULL, '$2a$12$DTVszJ4qGg/jNp8v1c1aA.FAsmXGIPqhYjhi4CtDqLxtJ9iBCZHCCxsa', 'Coordinacion', '1', 'Coordinacion 9', NULL, '2023-05-10 04:36:21', '2023-05-10 04:36:21'),
(48, 'Jesus H BOLAÑOS', 'gerencia@coopserp.com', NULL, '$2y$10$uQ2pUOcVLAwQkobkeKB6J.ULWT13UmhZ/gTWJzoD3AJQfz9uC68t6', 'Gerencia', '1', 'Gerencia General', NULL, '2023-06-29 19:02:53', '2023-06-29 19:02:53'),
(49, 'Juliana', 'oficial@coopserp.com', NULL, '$2y$10$wRa/Bz0juga2VlyGFHY/Jew9UrM7QeFBUWlfUY367tOHPqAM32jem', 'ControlMasivo', '1', 'Oficial de Cumplimiento', NULL, '2023-06-29 19:03:55', '2023-06-29 19:03:55'),
(50, 'Cumplimiento', '2803-axl@coopserp.com', NULL, '$2a$12$Xac7O0jEC/8tzB5x24v/e.9Ks2gwLRHaVzBptYg95gstBrS4ekzue', 'Asociacion', '1', NULL, NULL, '2023-06-29 19:20:40', '2023-06-29 19:20:40'),
(53, 'Farley YANEZ', 'calibc@coopserp.com', NULL, '$2y$10$gfM09XiKykYEPuLHGoiDdu/RuP1.mnuCnO6l7o3td.SmYT4Q7KRcO', 'Consultante', '1', 'CaliBC', NULL, '2023-06-30 00:07:55', '2023-06-30 00:07:55'),
(54, 'Walter CRUZ', 'cali@coopserp.com', NULL, '$2y$10$Ku0dh35yhXjFpfcH4YXwauxzEVmlVPva/txFUgVLpQ.M793pQTNj.', 'Consultante', '1', 'Cali', NULL, '2023-06-30 00:09:50', '2023-06-30 00:09:50'),
(55, 'Sandra GONZALEZ', 'palmira@coopserp.com', NULL, '$2y$10$IaK3czrtRuefIYha7/rufuiGAYUVuvALKWCpvkAeSiL/54yTbkkyq', 'Consultante', '1', 'Palmira', NULL, '2023-06-30 00:11:25', '2023-06-30 00:11:25'),
(57, 'Luis LERMA', 'buga@coopserp.com', NULL, '$2y$10$EWO.lHrQMBCdPWyLxj58aeVenqLshNcqNSUHs4WNqp10DgxNz0Gvq', 'Consultante', '1', 'Buga', NULL, '2023-06-30 00:14:12', '2023-06-30 00:14:12'),
(58, 'Augusto SANTA DAVILA', 'tulua@coopserp.com', NULL, '$2y$10$bX8E/za3ezoo23.hlp/upeW0EQrGexTl1oc0BWZPmbUymQ9ujCM.6', 'Consultante', '1', 'Tuluá', NULL, '2023-06-30 00:16:05', '2023-06-30 00:16:05'),
(59, 'Alejandra OBANDO MEDINA', 'yumbo@coopserp.com', NULL, '$2y$10$QSb1dOMK.AnLcUONCNs8.eJNbteZzCBRDxxxbclxdtWC2VfVy7ODq', 'Consultante', '1', 'Yumbo', NULL, '2023-06-30 00:17:55', '2023-06-30 00:17:55'),
(60, 'Ginna PALADINES', 'jamundi@coopserp.com', NULL, '$2y$10$Hb.gVxCoJuOnikM97.atM.mh1blbqcBrm7JOsBsH8NXO32kQlmzSK', 'Consultante', '1', 'Jamundí', NULL, '2023-06-30 00:18:54', '2023-06-30 00:18:54'),
(64, 'Isabel RAMOS', 'launion@coopserp.com', NULL, '$2y$10$zCshaCM4rUp2xNdT54MQJ.GrrUUE16BjPBmf7tqnPCU0f3Ub0KwDy', 'Consultante', '1', 'La Unión', NULL, '2023-06-30 03:42:23', '2023-06-30 03:42:23'),
(65, 'Andrea POTOSI', 'sevilla@coopserp.com', NULL, '$2y$10$Sv9GhG/mT1nPqHUxVvj6muoupDb6xaxFcDgOgkEaGfWmJSZlHMqXC', 'Consultante', '1', 'Sevilla', NULL, '2023-06-30 03:46:47', '2023-06-30 03:46:47'),
(66, 'Derly GRISALES', 'roldanillo@coopserp.com', NULL, '$2y$10$NP.QDU/K4CecvAtZH0fdjuz.OQuzw9Ti5toCbSUpWhWwq3G5HUMB6', 'Consultante', '1', 'Roldanillo', NULL, '2023-06-30 03:52:19', '2023-06-30 03:52:19'),
(67, 'Maria AGUDELO', 'cartago@coopserp.com', NULL, '$2y$10$325SPWS/kyKbRj7LoJoVruomF12jDyN49bQo7DDSK3ww6arxIi5UK', 'Consultante', '1', 'Cartago', NULL, '2023-06-30 03:53:12', '2023-06-30 03:53:12'),
(68, 'Sandra ESPINOSA', 'zarzal@coopserp.com', NULL, '$2y$10$/mGeIAC.LsyjHuaVZLpDW.kgclQGXGGSoAWXOqWw0iQs4eOSXCx0i', 'Consultante', '1', 'Zarzal', NULL, '2023-06-30 03:53:34', '2023-06-30 03:53:34'),
(69, 'Diana OVALLE', 'caicedonia@coopserp.com', NULL, '$2y$10$juHMYB/1kHiM1.wPxTVbs.ozBylFQMIBj9Lk8JrokBuXfgaAvy2d2', 'Consultante', '1', 'Caicedonia', NULL, '2023-06-30 03:54:10', '2023-06-30 03:54:10'),
(70, 'Yina HERRERA', 'buenaventura@coopserp.com', NULL, '$2y$10$GklaCzBVTkDc4LsAx3YtB.Ds4BVO.mSMl4VpV0.jfedKYdJsgp2Da', 'Consultante', '1', 'Buenaventura', NULL, '2023-06-30 18:11:27', '2023-06-30 18:11:27'),
(71, 'Karina AHUANARI', 'leticia@coopserp.com', NULL, '$2y$10$.mlXxj.KSEY/BeRcdfko.Op8j/TIy3wpZPyTjcD78evLBSL9N0twq', 'Consultante', '1', 'Leticia', NULL, '2023-06-30 21:18:20', '2023-06-30 21:18:20'),
(72, 'Angie DE LA ROSA', 'sanandres@coopserp.com', NULL, '$2a$12$uvB1nsp2FbChwvJj/j2yYedCoMfJE5mS5d19GpCv5ky39BJI2658C', 'Consultante', '1', 'San Andrés', NULL, '2023-07-01 01:25:05', '2023-07-01 01:25:05'),
(73, 'Ruth GUZMAN', 'pasto@coopserp.com', NULL, '$2y$10$Lx4AyZW.g.kuZMBBfQEF3.wI3EE6GWseDySMW0vzwbZML9.cwLYsW', 'Consultante', '1', 'Pasto', NULL, '2023-07-01 01:52:26', '2023-07-01 01:52:26'),
(76, 'THumano', '1003-tah@coopserp.com', NULL, '$2y$10$JBut5QPxXfL.Xk9lI5naR.S0CZD7dbL8TriDmu7i69S/eozHP1LMe', 'Thumano', '1', NULL, NULL, '2023-07-01 18:57:07', '2023-07-01 18:57:07'),
(77, 'Edna ALVAREZ', 'elemento@coopserp.com', NULL, '$2y$10$yeF6KjJm5fY4krSvhEJ4ZO9sBsNbwdP2qjpNoNh4CFJ70BlMS3cFO', 'Consultante', '1', 'Bogotá Elemento', NULL, '2023-07-01 19:09:46', '2023-07-01 19:09:46'),
(78, 'Monica RIVERA', 'santanderdequilichao@coopserp.com', NULL, '$2y$10$XPyGyMZ7RrVCupq/6USxru00Zk/4iE72KsCceY4TgfINYMmpmyAAq', 'Consultante', '1', 'S Quilichao', NULL, '2023-07-01 19:10:50', '2023-07-01 19:10:50'),
(79, 'Susan BORREGO', 'riohacha@coopserp.com', NULL, '$2y$10$nwFycywmw9h5oYpUbBgQWela3XCLBtNS1XBvQ4OKvbowD/ovHALOK', 'Consultante', '1', 'Riohacha', NULL, '2023-07-01 19:13:41', '2023-07-01 19:13:41'),
(80, 'Luisa LARA', 'popayan@coopserp.com', NULL, '$2y$10$eeZ8p5XRnz2dYggzfhjLFOLKScV80aihmFwxKVFv7OJfXZauYs3Zq', 'Consultante', '1', 'Popayán', NULL, '2023-07-01 19:15:08', '2023-07-01 19:15:08'),
(81, 'Paola BASTIDAS', 'ipiales@coopserp.com', NULL, '$2y$10$6hH0bXIr5ub2kTuwtURlhupH2mok5DgCxPLtM8NORSt7rzwrNWnUu', 'Consultante', '1', 'Ipiales', NULL, '2023-07-01 19:16:14', '2023-07-01 19:16:14'),
(82, 'Maria BAIZ', 'cartagena@coopserp.com', NULL, '$2y$10$6.EnoEObmYrTRFDbsiAZOO7FfwBXlsb7sPC3nsrCsy4ns4tlfRrFe', 'Consultante', '1', 'Cartagena', NULL, '2023-07-01 19:16:16', '2023-07-01 19:16:16'),
(83, 'Loraine LAGARES', 'barranquilla@coopserp.com', NULL, '$2y$10$MCvCFPPRh/bi9dUvXijS/.iQi3hCp3lskaGU7wB7GGfxaQXVQIP7m', 'Consultante', '1', 'Barranquilla', NULL, '2023-07-01 19:17:34', '2023-07-01 19:17:34'),
(84, 'Asleydi DE ARMAS', 'santamarta@coopserp.com', NULL, '$2y$10$PjDBF6f79mYcKzi8RiwExe45F6T4.5YQD4zd4zw.VJB3z2G9zV5g6', 'Consultante', '1', 'Santa Marta', NULL, '2023-07-01 19:20:03', '2023-07-01 19:20:03'),
(85, 'Joseph VARGAS', 'duitama@coopserp.com', NULL, '$2y$10$VN0IxOtf0PdNrIjPC9MnI.O9W95KEEedSCaax4ZIZTmpjtrO1ye.q', 'Consultante', '1', 'Duitama', NULL, '2023-07-01 19:20:56', '2023-07-01 19:20:56'),
(86, 'Gloria BARRERO', 'soacha@coopserp.com', NULL, '$2y$10$4mc4bAEIQ/l1brQ.oW8aj.s6.RdfAeKUJ/zhAUZBD1Fc2sUg2E18K', 'Consultante', '1', 'Soacha', NULL, '2023-07-01 19:21:16', '2023-07-01 19:21:16'),
(87, 'Laura GERENA', 'bogotacentro@coopserp.com', NULL, '$2y$10$8irV6DJ0YGgrbhpwCG5yreA9fwzgib32p0E00qGG4UJlpyaW/g5mq', 'Consultante', '1', 'Bogotá Centro', NULL, '2023-07-01 19:21:57', '2023-07-01 19:21:57'),
(88, 'Paola AYALA', 'bogotatc@coopserp.com', NULL, '$2y$10$OXlfUchVmUprjdkyOLJPK.ydJbPB6dwY2tUpK70qn91pqGljdm3hK', 'Consultante', '1', 'Bogotá TC', NULL, '2023-07-01 19:22:38', '2023-07-01 19:22:38'),
(89, 'Yenny NARANJO', 'manizales@coopserp.com', NULL, '$2y$10$9T8K0OkZc5tzy3jDoqTS5e8aZVDz1E5l5Neyrjhk8oEUy0SiXVuNS', 'Consultante', '1', 'Manizales', NULL, '2023-07-01 19:22:57', '2023-07-01 19:22:57'),
(90, 'Karen FORERO', 'bogotanorte@coopserp.com', NULL, '$2y$10$PkCrpVLnWdHvz.cJopG9Fe2fheKlpQnmEHVLdZK2LjHjSyzXaFbiS', 'Consultante', '1', 'Bogotá Norte', NULL, '2023-07-01 19:23:34', '2023-07-01 19:23:34'),
(91, 'Lizeth CASTILLO', 'zipaquira@coopserp.com', NULL, '$2y$10$4OtFVtvL.5W2Y/FEIrgkEOZepJj8.0NufGoJ57r2S9XCu73vJdCk6', 'Consultante', '1', 'Zipaquirá', NULL, '2023-07-01 19:23:58', '2023-07-01 19:23:58'),
(92, 'Yina PARRA', 'villavicencio@coopserp.com', NULL, '$2y$10$JDa6Q8pr4UAOKWgG2wFrSe/y8a2tUIuJPUA7DjfktAqU2bXzQnY9C', 'Consultante', '1', 'Villavicencio', NULL, '2023-07-01 19:24:18', '2023-07-01 19:24:18'),
(93, 'Paula GUEVARA', 'pereira@coopserp.com', NULL, '$2y$10$wvnZpVW6a36uKCeYbnTIH.boUgbwVLprZx0sJS45j5hxvOUyAkGmy', 'Consultante', '1', 'Pereira', NULL, '2023-07-01 19:25:20', '2023-07-01 19:25:20'),
(94, 'Arelix CARO', 'tunja@coopserp.com', NULL, '$2y$10$d8lb5YmY4Xki1WmLSO0DJeVdilMEgTkVMmZqroJs9eqbiOW2.0p7q', 'Consultante', '1', 'Tunja', NULL, '2023-07-01 19:41:29', '2023-07-01 19:41:29'),
(95, 'Ines ECHEVERRY', 'ibague@coopserp.com', NULL, '$2y$10$EwEHiaM0.KWw5dTycVYArOZRlZcOYL2p/pC7IxTbPdJlRv1zvHa.C', 'Consultante', '1', 'Ibagué', NULL, '2023-07-01 19:42:55', '2023-07-01 19:42:55'),
(96, 'Deisy RAMIREZ', 'girardot@coopserp.com', NULL, '$2y$10$JmVQ.dmPPR64o.51n8lFoechNPTCPv4KBknZEJBkg5/OGpsb8mMLS', 'Consultante', '1', 'Girardot', NULL, '2023-07-01 19:43:33', '2023-07-01 19:43:33'),
(97, 'Erika MUÑOZ', 'neiva@coopserp.com', NULL, '$2y$10$tMgb5U9nxshWNR5m/jWj6eTukvdrP33kIPqNAEaddSODJIctL/YE2', 'Consultante', '1', 'Neiva', NULL, '2023-07-01 19:43:36', '2023-07-01 19:43:36'),
(98, 'Yuly GUTIERREZ', 'bucaramanga@coopserp.com', NULL, '$2y$10$kPm.jo1u9XWExLzGVh9tI.F6CJuhfFEEL7OCc8tnO9eLrShCmNvXW', 'Consultante', '1', 'Bucaramanga', NULL, '2023-07-01 19:44:32', '2023-07-01 19:44:32'),
(99, 'Nancy ESPINOZA', 'armenia@coopserp.com', NULL, '$2y$10$DihXX3L6syhca0kuR.mT1O2ip/kSaWXM.LxRwnjvMhRPczojWIdNm', 'Consultante', '1', 'Armenia', NULL, '2023-07-01 19:44:48', '2023-07-01 19:44:48'),
(100, 'Jessica Perez', 'cucuta@coopserp.com', NULL, '$2y$10$8t6pbeFH8Kwy0ibAicd4juzYP3wlMoR31Z/iXGATzVAH8kJpTzfAi', 'Consultante', '1', 'Cúcuta', NULL, '2023-07-01 19:45:06', '2023-07-01 19:45:06'),
(101, 'Derly ROJAS', 'medellin@coopserp.com', NULL, '$2y$10$QK1YJrmZzqeLw81MpPTcVOzOsTu7HJpECGjGWQPuiol80Hk6iawla', 'Consultante', '1', 'Medellín', NULL, '2023-07-01 19:46:15', '2023-07-01 19:46:15'),
(102, 'Adriana CARABALLO', 'sincelejo@coopserp.com', NULL, '$2y$10$idXuAbaur9.Ogl4b7W8v7uc/R/uIcB2njD2ZkHa6Yv3e1HQB6.5sK', 'Consultante', '1', 'Sincelejo', NULL, '2023-07-01 19:46:51', '2023-07-01 19:46:51'),
(103, 'Katerine DIAZ', 'monteria@coopserp.com', NULL, '$2y$10$RHWz2v4wKdD2rEwysjHsMuTjt1PzIcBgtGbXLSU0QdDkPEG5EUKXu', 'Consultante', '1', 'Monteria', NULL, '2023-07-01 19:47:20', '2023-07-01 19:47:20'),
(104, 'Angela VELANDIA', 'yopal@coopserp.com', NULL, '$2y$10$wGf5e7n7SmVWyDimHZD/5.uK8tBYBlsnnPqjkyfS/c/hQrk2bZ62S', 'Consultante', '1', 'Yopal', NULL, '2023-07-01 19:48:13', '2023-07-01 19:48:13'),
(105, 'Shirley MARTINEZ', 'valledupar@coopserp.com', NULL, '$2y$10$zc1HpydnCKYUaNQm2/O.suSn1lyxusv/Syxvp3qocHaCygNVIvz8O', 'Consultante', '1', 'Valledupar', NULL, '2023-07-01 19:49:02', '2023-07-01 19:49:02'),
(106, 'Sebastian Diaz', 'jdseba1224@gmail.com', NULL, '$2y$10$FwZUPDRb9czhPglmya3j7uVJ3JeqDvP4TZA1yGAYav/eeFvllQM1a', 'Admin', '1', NULL, NULL, '2023-07-04 21:34:48', '2023-07-04 21:34:48'),
(107, 'Mauren Piedrahita', '1001-tah@coopserp.com', NULL, '$2y$10$AahZh8u/caXRUBDheroWjO87D5MGzPPnuRzgcoMTpPMBOCzWyy5g.', 'NuevoEmpleado', '1', 'Cali', NULL, '2023-07-08 00:29:36', '2023-07-08 00:29:36'),
(108, 'Elvis GUERRERO', 'reportes.bogota@coopserp.com', NULL, '$2y$10$AzvEU8bwiYbfZ7vQhjI8/.A6.8maqUPPodUlh/q.hD4zVvQ6.1I.K', 'Jefatura', '1', 'Reporte Bogota', NULL, '2023-07-10 22:45:01', '2023-07-10 22:45:01'),
(109, 'Ingrid POLANCO', 'juridico.bogota@coopserp.com', NULL, '$2y$10$gZZDbvbALpN2uteCVWLUo.mhhlVWMDNDna8VyVJWzL7EBcr9CFC0O', 'Jefatura', '1', 'Juridico Zona Centro', NULL, '2023-07-10 22:46:15', '2023-07-10 22:46:15'),
(110, 'Juan Pablo MARTINEZ', 'juridico.barranquilla@coopserp.com', NULL, '$2y$10$/akfhyJfUmvLk373I8weOuCQjUF6krdYT0/XYSME75HlyXh83IG0.', 'Jefatura', '1', 'Juridico Zona Norte', NULL, '2023-07-10 22:47:18', '2023-07-10 22:47:18'),
(111, 'Lady ORTEGA', 'juridico.cali@coopserp.com', NULL, '$2y$10$bEd8NAuM8vl.Wn/X7Fy3GeLB3GnR6a6fpVU08eCnkfIH9z/9YAS9y', 'Jefatura', '1', 'Juridico Zona Sur', NULL, '2023-07-10 22:48:04', '2023-07-10 22:48:04'),
(113, 'Ana M SANCHEZ', '2805-ger@coopserp.com', NULL, '$2y$10$yFPh4fJxHRKxP5vYp0fUPuJChm5/dCvt./9l1BfG8JZGDS5bVeynu', 'Jefatura', '1', 'Gerencia General', NULL, '2023-07-10 22:53:05', '2023-07-10 22:53:05'),
(114, 'Jury Andrea SALAZAR', 'monitoreo@coopserp.com', NULL, '$2y$10$2rFzT2u2qCSxf6qCXiAJIuWl8FIOtvYy9SwrAFidmw./SiCmSMsxW', 'Jefatura', '1', 'Monitoreo', NULL, '2023-07-10 22:54:53', '2023-07-10 22:54:53'),
(115, 'Giovanna HENAO', 'tesoreria@coopserp.com', NULL, '$2y$10$pB8mOAmWjD1t40P9DIDfLOQelvGQ5ZCHw3BmH0IsmEOFRnun69AbW', 'Jefatura', '1', 'Tesoreria', NULL, '2023-07-10 22:55:40', '2023-07-10 22:55:40'),
(116, 'Gustavo APARICIO', 'contabilidad@coopserp.com', NULL, '$2y$10$kdw26fIRwUiKc2iqjaRD7OGV2uXZU/tXIu6O/JGKnjk/tJRDtrlL2', 'Jefatura', '1', 'Contabilidad', NULL, '2023-07-10 22:56:22', '2023-07-10 22:56:22'),
(117, 'Fabian GARCIA', 'sistemas@coopserp.com', NULL, '$2y$10$0m194cYE6XWdKdj9E2pI6.cBRaC1rybA9wFKucyAbkI9FS05YwCD6', 'Jefatura', '1', 'Sistemas', NULL, '2023-07-10 22:57:04', '2023-07-10 22:57:04'),
(118, 'Maurem Piedrahita', 'talento_humano@coopserp.com', NULL, '$2y$10$yKvHfgJMDk.u6PAaIqDSr.2Yh3igdIqWQ5aIPi4MFO4sykBgTYm/C', 'Jefatura', '1', 'Talento Humano', NULL, '2023-07-10 22:59:57', '2023-07-10 22:59:57'),
(119, 'Stephany JARAMILLO', '1008-tah@coopserp.com', NULL, '$2y$10$48.a.oSf93nNyiLlurakAew1CM/1ijKKnXihEU5XAQIoDXxSQId6O', 'Jefatura', '1', 'Talento Humano', NULL, '2023-07-10 23:00:40', '2023-07-10 23:00:40'),
(120, 'Paola Galarza', 'auditoria@coopserp.com', NULL, '$2y$10$JEkmfcgHYw49WpAq8IVvn.3M5S/6M61cZ7ySf.4LafVcIz4KNvwbq', 'Jefatura', '1', 'Auditoria Interna', NULL, '2023-07-11 00:00:58', '2023-07-11 00:00:58'),
(121, 'Marilyn DIAZ', 'reportes.cali@coopserp.com', NULL, '$2y$10$xYo24vkhR3jMhfst5Gk0Sutj19Yw4BHsGQAS1zl5VIJ545cmqVuz2', 'Jefatura', '1', 'Reporte Cali', NULL, '2023-07-11 00:03:11', '2023-07-11 00:03:11'),
(122, 'Kevin POSSO', 'coor.1@coopserp.com', NULL, '$2y$10$hBJnHLKhbaYN3TA824jegObh/6qgN4UXhbT494.I4Gf735jG5xgB.', 'Coordinacion', '1', 'Coordinacion 1', NULL, '2023-07-11 00:04:40', '2023-07-11 00:04:40'),
(123, 'Laura PEREA', 'coor.2@coopserp.com', NULL, '$2y$10$53XE0iaZLGEemxyx3Rm67.C8byXbwY4qEYXMP1dDzVSdd7tdSEpEC', 'Coordinacion', '1', 'Coordinacion 2', NULL, '2023-07-11 00:05:20', '2023-07-11 00:05:20'),
(124, 'Carolina GONZALEZ', 'coor.3@coopserp.com', NULL, '$2y$10$I1zK.kahGeO0CdT9K854re466gz05AIYYHEieOUJ2JC5HiTKb8Lfy', 'Coordinacion', '1', 'Coordinacion 3', NULL, '2023-07-11 00:06:05', '2023-07-11 00:06:05'),
(125, 'Elvia CEPEDA', 'coor.4@coopserp.com', NULL, '$2y$10$aJ9E3eoND81dRHX4S43S2OAZzohWFLZjtYGfvnbnoprQBs5o76fX.', 'Coordinacion', '1', 'Coordinacion 4', NULL, '2023-07-11 00:06:49', '2023-07-11 00:06:49'),
(126, 'Alejandra OBANDO', 'coor.5@coopserp.com', NULL, '$2y$10$yflciCsKNi/hBM4ui9pSVOnOMNt/js8nOnPOllQ5s4mF4hRvCeyWy', 'Coordinacion', '1', 'Coordinacion 5', NULL, '2023-07-11 00:07:37', '2023-07-11 00:07:37'),
(127, 'Maurio Cifuentes', '1903-sis@coopserp.com', NULL, '$2y$10$l201l3cEloor/c.XhcZUMeh0FvTQHoxLg5uyv0I16vdtdvYJ94n0e', 'Jefatura', '1', 'Sistemas', NULL, '2023-09-02 19:54:23', '2023-09-02 19:54:23'),
(128, 'Valentina CALLE', '2804-ger@coopserp.com', NULL, '$2y$10$uA9EbblEpPnkZWG/08qZtuPZZsnUnzKKhHbhwqxYMYQzhQJH12QHy', 'Jefatura', '1', 'Gerencia General', NULL, '2023-09-08 21:02:10', '2023-09-08 21:02:10'),
(129, 'Santiago Henao', 'santicashe0920@gmail.com', NULL, '$2y$10$11XQSJz1OIyiEjdRIvcTnet0UyPP1d10lfLIAYQl.bwffEl5dqKhC', 'Jefatura', '1', 'Gerencia General', NULL, '2023-11-07 18:52:05', '2023-11-07 18:52:05'),
(130, 'Lizeth Ochoa', 'director@meridian76.com', NULL, '$2y$10$5608FXlw5/RB6q5zrkRhQeevnDaGP9jyCkCp.oZ01j0n1ei4ZLZ7y', 'Jefatura', '1', 'Meridian', NULL, '2023-11-18 21:02:07', '2023-11-18 21:02:07'),
(131, 'Edwin Andres Gomez', '1132-AUX@coopserp.com', NULL, '$2y$10$dfOmGw4D7QhoV96BB6aQmOkA6Rn3zYpjz/R1kp1fExuC41iAm2eP.', 'Coordinacion', '1', 'Coordinacion 6', NULL, '2024-01-03 21:00:07', '2024-01-03 21:00:07'),
(133, 'Oscar Marín', 'chutata18@gmail.com', NULL, '$2a$12$0zZOQYOb5UWb9CDkWLtp/ukNjf4fVhEolXtFS4xL4w9E2Edx7eVJW', 'Admin', '1', NULL, NULL, '2023-07-04 21:34:48', '2023-07-04 21:34:48'),
(134, 'Juan Sebastián Soto', 'cooraux.3@coopserp.com', NULL, '$2a$12$XKsBvtop1vH5gqXUp6x0zOmVysOwwCY.F6BtJzWWalbRM7cDO276a', 'Coordinacion', '1', 'Coordinacion 3', NULL, '2023-07-11 00:06:05', '2023-07-11 00:06:05'),
(135, 'Yolima CEPEDA', 'yolimacor5@coopserp.com', NULL, '$2a$12$mERPCUnegDDzHW1Vzpxab.Ni.HLv34GJBUFX49aYve1fS.6bK9I/e', 'Coordinacion', '1', 'Coordinacion 5', NULL, '2023-07-11 00:07:37', '2023-07-11 00:07:37'),
(136, 'Kevin POSSO', 'kevincor5@coopserp.com', NULL, '$2a$12$hazt0jg4nVKeo9kdYtP7KuM/xDAcRu/Iu0KZl345dWvQ3LiVozQBK', 'Coordinacion', '1', 'Coordinacion 5', NULL, '2023-07-11 00:07:37', '2023-07-11 00:07:37'),
(137, 'Laura Perea', 'lauracor5@coopserp.com', NULL, '$2a$12$gmavKGLx0wG6Bcge7e6ouOfTKEzm.5cVWTHkHuHHDk85ypOjGjxoi', 'Coordinacion', '1', 'Coordinacion 5', NULL, '2023-07-11 00:07:37', '2023-07-11 00:07:37'),
(138, 'Carolina GONZALEZ', 'carocor5@coopserp.com', NULL, '$2a$12$yE4PNRflk0Pz0N0UF6XP8ehcCy1esYGZyJHkW2VwLj0nc..9Pr982', 'Coordinacion', '1', 'Coordinacion 5', NULL, '2023-07-11 00:07:37', '2023-07-11 00:07:37'),
(139, 'Katherine Valencia', 'director@seguroscoopserp.com', NULL, '$2a$12$lYEIHdqoDadM/tJkKeW1hO5StGXEsNc6sdCIpATifPJ.tyrVzcPEO', 'Jefatura', '1', 'Seguros', NULL, '2023-11-18 21:02:07', '2023-11-18 21:02:07'),
(140, 'Stefania Martinez Arias', 'comercialdeventas4@meridian76.com', NULL, '$2a$12$KlWRZVY6tkNGtMSeLZ6S6eRzlzyri6lJirnXFZULh0l9mRl5MPIBO', 'Jefatura', '1', 'Asesora M-76', NULL, '2023-11-18 21:02:07', '2023-11-18 21:02:07'),
(141, 'Maria Isabel Giraldo', 'porrita@coopserp.com', NULL, '$2a$12$MfOSUE7bNgfKbMQPiUdat.sjXz4I6p8U4OUDS7vmYMukh1G2RMPXK', 'Jefatura', '1', 'Fondo Solidaridad', NULL, '2023-11-18 21:02:07', '2023-11-18 21:02:07'),
(142, 'Juliana SANCHEZ DIAZ', 'oficial2@coopserp.com', NULL, '$2y$10$wRa/Bz0juga2VlyGFHY/Jew9UrM7QeFBUWlfUY367tOHPqAM32jem', 'Jefatura', '1', 'Oficial de Cumplimiento', NULL, '2023-06-29 19:03:55', '2023-06-29 19:03:55'),
(143, 'Jacqueline Contreras', 'valledupar2@coopserp.com', NULL, '$2y$10$zc1HpydnCKYUaNQm2/O.suSn1lyxusv/Syxvp3qocHaCygNVIvz8O', 'Consultante', '1', 'Valledupar', NULL, '2023-07-01 19:49:02', '2023-07-01 19:49:02'),
(144, 'Monica REYES', 'cartago2@coopserp.com', NULL, '$2y$10$325SPWS/kyKbRj7LoJoVruomF12jDyN49bQo7DDSK3ww6arxIi5UK', 'Consultante', '1', 'Cartago', NULL, '2023-06-30 03:53:12', '2023-06-30 03:53:12'),
(145, 'Laura GERENA', 'bogotacentro2@coopserp.com', NULL, '$2y$10$8irV6DJ0YGgrbhpwCG5yreA9fwzgib32p0E00qGG4UJlpyaW/g5mq', 'Consultante', '1', 'Bogotá Centro', NULL, '2023-07-01 19:21:57', '2023-07-01 19:21:57'),
(146, 'Maria GALAN', 'yopal2@coopserp.com', NULL, '$2y$10$wGf5e7n7SmVWyDimHZD/5.uK8tBYBlsnnPqjkyfS/c/hQrk2bZ62S', 'Consultante', '1', 'Yopal', NULL, '2023-07-01 19:48:13', '2023-07-01 19:48:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencias`
--
ALTER TABLE `agencias`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `asociacion`
--
ALTER TABLE `asociacion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencias`
--
ALTER TABLE `agencias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `asociacion`
--
ALTER TABLE `asociacion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
