-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 31/12/2024 às 16:50
-- Versão do servidor: 8.0.37
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereço`
--

DROP TABLE IF EXISTS `endereço`;
CREATE TABLE IF NOT EXISTS `endereço` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero` int NOT NULL,
  `rua` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `bairro` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `pessoa` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `estrangeira_endereço` (`pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=362477 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Despejando dados para a tabela `endereço`
--

INSERT INTO `endereço` (`id`, `numero`, `rua`, `bairro`, `pessoa`) VALUES
(2, 471, 'travessa Manaus', 'Copacabana', 2),
(4, 116, 'travessa Vitória', 'Liberdade', 4),
(6, 202, 'travessa Rio de Janeiro', 'Vila Madalena', 6),
(8, 390, 'largo Teresina', 'Centro', 8),
(11, 916, 'travessa Salvador', 'Santa Cecília', 11),
(13, 946, 'alameda Porto Velho', 'Pinheiros', 13),
(15, 507, 'avenida Belém', 'Itaim Bibi', 15),
(16, 133, 'travessa Porto Alegre', 'Santa Cecília', 16),
(18, 430, 'avenida Belo Horizonte', 'Copacabana', 18),
(19, 450, 'alameda Cuiabá', 'Vila Progredior', 19),
(20, 4, 'avenida Aracaju', 'Centro', 20),
(21, 169, 'largo Rio de Janeiro', 'Santa Cecília', 21),
(23, 604, 'avenida Teresina', 'Moema', 23),
(24, 235, 'travessa Teresina', 'Centro', 24),
(27, 211, 'travessa Curitiba', 'Jardim Botânico', 27),
(28, 441, 'avenida São Luís', 'Jardim Paulista', 28),
(31, 69, 'alameda Campo Grande', 'Centro', 1),
(32, 581, 'largo Porto Velho', 'Pinheiros', 2),
(34, 309, 'alameda Porto Velho', 'Copacabana', 4),
(35, 2, 'alameda Aracaju', 'Moema', 4),
(38, 321, 'travessa Florianópolis', 'Tatuapé', 6),
(39, 213, 'alameda Porto Velho', 'Liberdade', 6),
(42, 515, 'alameda Belém', 'Pinheiros', 8),
(45, 122, 'rua Maceió', 'Itaim Bibi', 11),
(46, 423, 'travessa Natal', 'Vila Madalena', 13),
(47, 273, 'largo Boa Vista', 'Moema', 13),
(48, 964, 'rua Teresina', 'Jardim Paulista', 15),
(49, 781, 'largo Belém', 'Jardim Botânico', 16),
(52, 855, 'alameda São Paulo', 'Barra Funda', 18),
(53, 606, 'avenida Fortaleza', 'Santa Cecília', 18),
(54, 179, 'alameda São Paulo', 'Tatuapé', 18),
(55, 187, 'largo Vitória', 'Tatuapé', 19),
(56, 579, 'rua Boa Vista', 'Vila Progredior', 21),
(60, 438, 'travessa Campo Grande', 'Liberdade', 26),
(61, 59, 'rua Porto Alegre', 'Itaim Bibi', 26),
(62, 612, 'largo Macapá', 'Moema', 27),
(63, 883, 'largo Porto Velho', 'Centro', 27),
(65, 695, 'alameda Belém', 'Campo Belo', 28),
(66, 631, 'avenida João Pessoa', 'Copacabana', 28),
(362398, 975, 'alameda Cuiabá', 'Campo Belo', 40),
(362399, 719, 'rua Brasília', 'Campo Belo', 41),
(362400, 775, 'largo Maceió', 'Centro', 42),
(362401, 3, 'avenida São Paulo', 'Santa Cecília', 43),
(362402, 357, 'largo Boa Vista', 'Jardim Botânico', 44),
(362403, 141, 'alameda Belo Horizonte', 'Centro', 45),
(362404, 602, 'rua Vitória', 'Barra Funda', 46),
(362405, 604, 'alameda São Paulo', 'Vila Progredior', 47),
(362406, 383, 'largo Porto Velho', 'Jardim Botânico', 48),
(362407, 258, 'avenida Brasília', 'Santa Cecília', 49),
(362408, 196, 'rua Campo Grande', 'Campo Belo', 50),
(362409, 403, 'largo Macapá', 'Centro', 51),
(362410, 856, 'alameda São Luís', 'Santa Cecília', 52),
(362411, 113, 'alameda Salvador', 'Moema', 53),
(362412, 493, 'avenida Cuiabá', 'Copacabana', 54),
(362413, 717, 'rua Natal', 'Barra Funda', 55),
(362414, 455, 'travessa Porto Alegre', 'Vila Madalena', 56),
(362415, 628, 'largo Brasília', 'Centro', 57),
(362416, 537, 'largo Maceió', 'Vila Progredior', 58),
(362417, 384, 'largo Porto Alegre', 'Vila Progredior', 59),
(362418, 993, 'rua Vitória', 'Moema', 60),
(362420, 359, 'rua Recife', 'Jardim Paulista', 62),
(362421, 461, 'largo São Paulo', 'Campo Belo', 63),
(362424, 430, 'rua Natal', 'Moema', 66),
(362426, 194, 'travessa Natal', 'Barra Funda', 68),
(362428, 26, 'alameda Rio de Janeiro', 'Jardim Paulista', 40),
(362429, 907, 'avenida Goiânia', 'Centro', 41),
(362430, 727, 'travessa Vitória', 'Copacabana', 41),
(362431, 573, 'rua Florianópolis', 'Barra Funda', 41),
(362432, 982, 'alameda Recife', 'Santa Cecília', 42),
(362433, 278, 'alameda Teresina', 'Itaim Bibi', 42),
(362434, 659, 'alameda Brasília', 'Centro', 43),
(362435, 977, 'alameda Boa Vista', 'Vila Madalena', 43),
(362436, 631, 'rua Cuiabá', 'Campo Belo', 44),
(362437, 174, 'largo Porto Alegre', 'Moema', 48),
(362438, 149, 'avenida Salvador', 'Centro', 48),
(362439, 93, 'largo Macapá', 'Copacabana', 49),
(362440, 746, 'avenida São Paulo', 'Barra Funda', 51),
(362441, 732, 'travessa Manaus', 'Vila Progredior', 52),
(362442, 146, 'avenida Natal', 'Santa Cecília', 52),
(362443, 493, 'rua Campo Grande', 'Pinheiros', 52),
(362444, 273, 'avenida Natal', 'Jardim Botânico', 53),
(362445, 967, 'travessa Macapá', 'Itaim Bibi', 54),
(362446, 459, 'rua Recife', 'Leblon', 55),
(362447, 567, 'rua Belém', 'Vila Progredior', 55),
(362448, 764, 'travessa Campo Grande', 'Leblon', 55),
(362449, 269, 'alameda Salvador', 'Centro', 57),
(362450, 955, 'avenida Porto Alegre', 'Jardim Paulista', 57),
(362451, 822, 'travessa Natal', 'Liberdade', 57),
(362452, 804, 'alameda Belém', 'Moema', 58),
(362453, 536, 'avenida Manaus', 'Pinheiros', 59),
(362454, 757, 'largo Rio Branco', 'Vila Progredior', 60),
(362455, 894, 'avenida Natal', 'Barra Funda', 63),
(362456, 555, 'avenida Curitiba', 'Leblon', 63),
(362457, 314, 'rua Macapá', 'Campo Belo', 63),
(362463, 143, 'travessa Goiânia', 'Tatuapé', 68),
(362464, 654, 'travessa Belo Horizonte', 'Vila Madalena', 69);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `idade` int NOT NULL,
  `sexo` varchar(10) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `idade`, `sexo`) VALUES
(1, 'Maria Brito', 39, 'Feminino'),
(2, 'Maria Alves', 61, 'Feminino'),
(4, 'Maria de Sá', 24, 'Feminino'),
(6, 'Fernando Silva', 70, 'Masculino'),
(8, 'Jamile de Sousa', 77, 'Feminino'),
(11, 'Gabriel Santos', 43, 'Masculino'),
(13, 'Joaquim de Sá', 55, 'Masculino'),
(15, 'Joaquim Santos', 23, 'Masculino'),
(16, 'Jonas de Sousa', 62, 'Masculino'),
(18, 'Fernanda Marques', 56, 'Feminino'),
(19, 'Guilhermina Brito', 71, 'Feminino'),
(20, 'Jamile Farias', 45, 'Feminino'),
(21, 'Maria Santos', 73, 'Feminino'),
(23, 'Guilhermina Alves', 45, 'Feminino'),
(24, 'Fernando Santos', 45, 'Masculino'),
(26, 'Maria de Sousa', 35, 'Feminino'),
(27, 'João Brito', 78, 'Masculino'),
(28, 'Guilhermina Silva', 23, 'Feminino'),
(40, 'Maria Brito', 61, 'Feminino'),
(41, 'João Brito', 53, 'Masculino'),
(42, 'Jamile de Alencar', 71, 'Feminino'),
(43, 'Jonas Farias', 65, 'Masculino'),
(44, 'Joaquim Marques', 39, 'Masculino'),
(45, 'Maria de Alencar', 27, 'Feminino'),
(46, 'Joaquim de Sá', 53, 'Masculino'),
(47, 'Guilhermina Alves', 39, 'Feminino'),
(48, 'Joaquim Silva', 75, 'Masculino'),
(49, 'João Brito', 31, 'Masculino'),
(50, 'Joaquim Alves', 39, 'Masculino'),
(51, 'Maria Brito', 61, 'Feminino'),
(52, 'Guilhermina Alves', 59, 'Feminino'),
(53, 'Fernanda de Sousa', 18, 'Feminino'),
(54, 'Fernanda de Alencar', 34, 'Feminino'),
(55, 'João Silva', 60, 'Masculino'),
(56, 'João Brito', 64, 'Masculino'),
(57, 'Maria de Alencar', 34, 'Feminino'),
(58, 'Gabriela Gomes', 76, 'Feminino'),
(59, 'Gabriel Marques', 68, 'Masculino'),
(60, 'Fernanda Santos', 64, 'Feminino'),
(62, 'Gabriel de Sousa', 44, 'Masculino'),
(63, 'Maria Santos', 58, 'Feminino'),
(66, 'Fernando Farias', 29, 'Masculino'),
(68, 'João Silva', 80, 'Masculino'),
(69, 'João Marques', 28, 'Masculino');

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefone`
--

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE IF NOT EXISTS `telefone` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ddd` varchar(4) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefone` varchar(9) COLLATE utf8mb4_swedish_ci NOT NULL,
  `pessoa` int UNSIGNED NOT NULL,
  `tipo` char(1) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `estrangeira_telefone` (`pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Despejando dados para a tabela `telefone`
--

INSERT INTO `telefone` (`id`, `ddd`, `telefone`, `pessoa`, `tipo`) VALUES
(1, '634', '888898888', 1, 'C'),
(2, '16', '778518874', 2, 'F'),
(4, '60', '500303440', 4, 'C'),
(6, '18', '601765049', 6, 'C'),
(8, '41', '168503159', 8, 'F'),
(11, '8', '848822030', 11, 'C'),
(13, '9', '575489994', 13, 'C'),
(15, '55', '541191952', 15, 'F'),
(16, '2', '121937797', 16, 'F'),
(18, '5', '744232090', 18, 'C'),
(19, '40', '159182958', 19, 'C'),
(20, '13', '445820252', 20, 'C'),
(21, '24', '753590885', 21, 'C'),
(23, '4', '152226494', 23, 'F'),
(24, '85', '490100315', 24, 'C'),
(26, '8', '501452274', 26, 'C'),
(27, '5', '754077729', 27, 'F'),
(28, '33', '602180141', 28, 'C'),
(32, '90', '637119310', 2, 'F'),
(34, '62', '775159364', 4, 'F'),
(35, '66', '143971482', 4, 'F'),
(38, '45', '871130038', 6, 'C'),
(39, '58', '118516494', 6, 'F'),
(42, '44', '754209439', 8, 'F'),
(45, '41', '114154931', 11, 'C'),
(46, '97', '104537286', 13, 'C'),
(47, '12', '456461852', 13, 'F'),
(48, '72', '309837425', 15, 'C'),
(49, '96', '427396991', 16, 'C'),
(52, '47', '299427013', 18, 'F'),
(53, '14', '917223414', 18, 'C'),
(54, '90', '735981666', 18, 'F'),
(55, '77', '615551362', 19, 'C'),
(56, '44', '235226878', 21, 'F'),
(60, '8', '580500083', 26, 'F'),
(61, '86', '999390211', 26, 'F'),
(62, '0', '388721974', 27, 'F'),
(63, '35', '331792249', 27, 'C'),
(64, '88', '994734291', 28, 'F'),
(65, '47', '550130930', 28, 'F'),
(66, '10', '674573577', 28, 'F'),
(78, '17', '602140451', 40, 'F'),
(79, '6', '284917300', 41, 'F'),
(80, '93', '858033356', 42, 'C'),
(81, '15', '970047476', 43, 'F'),
(82, '95', '454640569', 44, 'F'),
(83, '81', '832856450', 45, 'C'),
(84, '37', '295402758', 46, 'C'),
(85, '1', '783838729', 47, 'C'),
(86, '94', '589782178', 48, 'F'),
(87, '78', '652440950', 49, 'F'),
(88, '70', '189460427', 50, 'F'),
(89, '27', '415444756', 51, 'C'),
(90, '65', '677726078', 52, 'C'),
(91, '87', '763421254', 53, 'F'),
(92, '78', '241525451', 54, 'F'),
(93, '86', '747495761', 55, 'C'),
(94, '68', '782847040', 56, 'F'),
(95, '1', '450322470', 57, 'F'),
(96, '71', '935419102', 58, 'F'),
(97, '48', '686452454', 59, 'C'),
(98, '22', '574109056', 60, 'F'),
(100, '36', '419657858', 62, 'F'),
(101, '8', '772836508', 63, 'C'),
(104, '90', '822976401', 66, 'C'),
(106, '90', '110703756', 68, 'C'),
(108, '78', '598564559', 40, 'F'),
(109, '29', '434541660', 41, 'F'),
(110, '10', '488108933', 41, 'F'),
(111, '38', '215044960', 41, 'F'),
(112, '25', '385461162', 42, 'C'),
(113, '6', '706211666', 42, 'F'),
(114, '63', '446301306', 43, 'F'),
(115, '97', '660121496', 43, 'C'),
(116, '46', '607534655', 44, 'C'),
(117, '76', '307711288', 48, 'C'),
(118, '23', '737573486', 48, 'C'),
(119, '46', '578864857', 49, 'F'),
(120, '90', '573253197', 51, 'F'),
(121, '91', '793279403', 52, 'C'),
(122, '0', '201461272', 52, 'C'),
(123, '22', '361178417', 52, 'C'),
(124, '36', '836478721', 53, 'C'),
(125, '29', '187519219', 54, 'F'),
(126, '44', '218770351', 55, 'C'),
(127, '6', '269962599', 55, 'F'),
(128, '72', '712029926', 55, 'C'),
(129, '84', '152535865', 57, 'C'),
(130, '86', '827152410', 57, 'F'),
(131, '63', '575968964', 57, 'C'),
(132, '68', '827159480', 58, 'C'),
(133, '64', '233431059', 59, 'C'),
(134, '95', '579521416', 60, 'F'),
(135, '4', '494439298', 63, 'C'),
(136, '47', '431807439', 63, 'C'),
(137, '6', '150033236', 63, 'C'),
(140, '37', '164096232', 66, 'F'),
(143, '16', '140901687', 68, 'C'),
(145, '14', '452595924', 69, 'C');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `endereço`
--
ALTER TABLE `endereço`
  ADD CONSTRAINT `estrangeira_endereço` FOREIGN KEY (`pessoa`) REFERENCES `pessoa` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `estrangeira_telefone` FOREIGN KEY (`pessoa`) REFERENCES `pessoa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
