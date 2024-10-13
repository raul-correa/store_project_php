-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2024 a las 06:26:28
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
-- Base de datos: `companydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(20) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `manager_id`) VALUES
(1, 'hr', NULL),
(2, 'it', NULL),
(3, 'marketing', NULL),
(4, 'sales', NULL),
(5, 'finance', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `hire_date` date NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `email`, `phone_number`, `hire_date`, `job_title`, `department_id`) VALUES
(1, 'jhon', 'doe', 'jhon.doe@example.com', '123456789', '2020-01-15', 'software engineer', 2),
(2, 'jane', 'smith', 'jane.smith@example.com', '987654321', '2019-07-22', 'marketing manager', 3),
(3, 'michael', 'johnson', 'michael.johnson@example.com', '555123456', '2018-03-10', 'sales representative', 4),
(4, 'emily', 'davis', 'emily.davis@example.com', '444987654', '2021-11-05', 'hr specialist', 1),
(5, 'david', 'martin', 'david.martin@example.com', '333654321', '2017-09-18', 'financial analyst', 5),
(6, 'sarah', 'brown', 'sarah.brown@example.com', '222321654', '2016-05-20', 'project manager', 2),
(7, 'anna', 'williams', 'anna.williams@example.com', '777456987', '2019-02-12', 'it support', 2),
(8, 'james', 'wilson', 'james.wilson@example.com', '999654123', '2020-08-30', 'marketing coordinator', 3),
(9, 'linda', 'roberts', 'linda.roberts@example.com', '111789456', '2022-01-03', 'hr assistant', 1),
(10, 'william', 'clark', 'william.clark@example.com', '666123789', '2019-04-15', 'it manager', 2),
(11, 'patricia', 'miller', 'patricia.miller@example.com', '888321987', '2017-12-22', 'sales manager', 4),
(12, 'richard', 'lewis', 'richard.lewis@example.com', '777987321', '2021-07-11', 'financial advisor', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `budget` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `start_date`, `end_date`, `budget`) VALUES
(1, 'website redesign', '2023-02-01', NULL, 50000),
(2, 'product launch', '2023-06-15', NULL, 30000),
(3, 'employee training program', '2023-01-10', NULL, 15000),
(4, 'new crm implementation', '2023-03-20', NULL, 75000),
(5, 'market research', '2023-04-25', NULL, 20000),
(6, 'social media campaign', '2023-05-30', NULL, 12000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
