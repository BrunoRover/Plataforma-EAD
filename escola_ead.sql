-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Set-2024 às 22:38
-- Versão do servidor: 8.2.0
-- versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola_ead`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao_curta` varchar(100) NOT NULL,
  `conteudo` longtext NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `titulo`, `descricao_curta`, `conteudo`, `data_cadastro`, `preco`, `imagem`) VALUES
(9, 'PHP', 'Curso PHP 8.2', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JTt7MkT503M?si=jvHKeSW3wweUHhPx\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2024-03-13 16:59:02', 47.00, 'upload/66e4bea346d50.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

DROP TABLE IF EXISTS `relatorio`;
CREATE TABLE IF NOT EXISTS `relatorio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_curso` int NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `data_compra` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `relatorio`
--

INSERT INTO `relatorio` (`id`, `id_usuario`, `id_curso`, `valor`, `data_compra`) VALUES
(1, 3, 9, 47, '2024-03-13 17:42:37'),
(2, 5, 9, 47, '2024-03-14 20:16:43'),
(3, 2, 9, 47, '2024-08-23 19:44:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `creditos` decimal(10,2) DEFAULT '0.00',
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_cadastro`, `creditos`, `admin`) VALUES
(2, 'bruno', 'bruno01@hotmail.com', '$2y$10$5Oo99dB4RP78TCRh6DqWdelJdpqmozuw2WOQR0CkW6hmlEQSp2Bw6', '2024-03-12 18:20:29', 453.00, 1),
(6, 'joao', 'de547f4369@emailabox.pro', '$2y$10$F6LYudh8VxGkU0me/AWx/e5VoM8hdXr2Oq2V.zKA9iEp1aY7wn4cu', '2024-09-13 19:31:44', 500.00, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
