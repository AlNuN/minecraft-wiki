-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2021 at 02:53 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `minecraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocos`
--

CREATE TABLE `blocos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_bloco` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `transparencia` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ferramenta` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empilhavel` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experiencia` float(8,2) DEFAULT NULL,
  `explosao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `item_1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_3` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resultado` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ordem` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocos`
--
ALTER TABLE `blocos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_bloco` (`nome_bloco`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocos`
--
ALTER TABLE `blocos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blocos`
--
ALTER TABLE `blocos`
  ADD CONSTRAINT `blocos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);