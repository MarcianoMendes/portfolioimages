-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 30/06/2015 às 18:13
-- Versão do servidor: 5.5.43-0ubuntu0.14.10.1
-- Versão do PHP: 5.5.12-2ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `xvants`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
`id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `foto` blob,
  `coordenada_x` varchar(10) NOT NULL,
  `coordenada_y` varchar(10) NOT NULL,
  `data_hora` datetime NOT NULL,
  `id_portifolio` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `imagens`
--

INSERT INTO `imagens` (`id`, `nome`, `descricao`, `foto`, `coordenada_x`, `coordenada_y`, `data_hora`, `id_portifolio`) VALUES
(1, 'teste1', 'teste1', 0x696d6167656d2e706e67, '12121212', '323232323', '2015-06-19 00:00:00', 1),
(2, 'teste2', 'teste2', 0x696d6167656d2e706e67, '232893293', '3329323929', '2015-06-19 00:00:00', 2),
(3, 'teste3', 'teste3', 0x696d6167656d2e706e67, '39393939', '212121069', '2015-06-14 00:00:00', 1),
(4, 'teste4', 'teste4', 0x696d6167656d2e706e67, '32832839', '3239829392', '2015-06-14 00:00:00', 1),
(5, 'teste5', 'teste5', 0x696d6167656d2e706e67, '05847458', '950559500', '2015-06-19 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfis`
--

CREATE TABLE IF NOT EXISTS `perfis` (
`id` int(11) NOT NULL,
  `identificacao` varchar(20) NOT NULL,
  `nivel_acesso` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `perfis`
--

INSERT INTO `perfis` (`id`, `identificacao`, `nivel_acesso`) VALUES
(1, 'Admin', 1),
(2, 'NÃ­vel 2', 2),
(3, 'nivel3', 3),
(4, 'Perfil novo', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `portfolios`
--

CREATE TABLE IF NOT EXISTS `portfolios` (
`id` int(11) NOT NULL,
  `local` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `data_inicio` date NOT NULL,
  `estado` char(2) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Fazendo dump de dados para tabela `portfolios`
--

INSERT INTO `portfolios` (`id`, `local`, `nome`, `descricao`, `data_inicio`, `estado`, `cidade`, `id_usuario`) VALUES
(1, 'teste1', 'teste1', 'teste1', '2015-06-11', 'SC', 'XANXERE', 6),
(2, 'teste2', 'teste2', 'teste2', '2015-06-11', 'SC', 'XANXERE', 4),
(3, 'teste3', 'teste3', 'teste3', '2015-06-14', 'SC', 'XANXERE', 4),
(4, 'teste4', 'teste4', 'teste4', '2015-06-14', 'SC', 'XANXERE', 8),
(5, 'teste5', 'teste5', 'teste5', '2015-06-14', 'SC', 'XANXERE', 4),
(6, 'teste6', 'teste6', 'teste6', '2015-06-14', 'SC', 'XANXERE', 6),
(8, 'teste7', 'teste7', 'teste7', '2015-06-14', 'SC', 'XANXERE', 4),
(9, 'teste7', 'teste8', 'teste8', '2015-06-09', 'SC', 'XANXERE', 4),
(10, 'teste9', 'teste9', 'teste9', '2015-06-14', 'SC', 'XANXERE', 8),
(17, 'teste10', 'teste10', 'teste10', '2015-06-14', 'SC', 'XANXERE', 4),
(19, 'teste11', 'teste11', 'teste11', '2015-06-08', 'SC', 'XANXERE', 4),
(28, 'teste12', 'teste12', 'teste12', '2015-06-20', 'SC', 'XANXERE', 4),
(29, 'teste13', 'teste13', 'teste13', '2015-06-20', 'SC', 'XANXERE', 4),
(30, 'teste14', 'teste14', 'teste14', '2015-06-21', 'SC', 'XANXERE', 4),
(31, 'teste15', 'teste15', 'teste15', '2015-06-26', 'SC', 'XANXERE', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `pwd`, `nome`, `data_cadastro`, `id_perfil`) VALUES
(4, 'MARCIANO', 'senha', 'MARCIANO', '2015-06-04 20:32:26', 1),
(6, 'JOVIANO', 'senha', 'JOVIANO', '2015-06-05 00:33:39', 2),
(7, 'usuario1', 'senha', 'usuario1', '2015-06-05 00:46:19', 1),
(8, 'usuario2', 'senha', 'usuario2', '2015-06-09 01:54:41', 1),
(9, 'usuario3', 'senha', 'usuario3', '2015-06-12 01:48:08', 1),
(10, 'usuario4', 'senha', 'usuario4', '2015-06-13 01:30:34', 1),
(12, 'usuario5', 'senha', 'usuario5', '2015-06-14 20:52:54', 2),
(14, 'usuario6', 'senha', 'usuario6', '2015-06-14 22:36:54', 2),
(15, 'usuario7', 'senha', 'usuario7', '2015-06-15 00:01:57', 3);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
 ADD PRIMARY KEY (`id`), ADD KEY `id_portifolio` (`id_portifolio`);

--
-- Índices de tabela `perfis`
--
ALTER TABLE `perfis`
 ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `portfolios`
--
ALTER TABLE `portfolios`
 ADD PRIMARY KEY (`id`), ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `perfis`
--
ALTER TABLE `perfis`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `portfolios`
--
ALTER TABLE `portfolios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `imagens`
--
ALTER TABLE `imagens`
ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`id_portifolio`) REFERENCES `portfolios` (`id`);

--
-- Restrições para tabelas `portfolios`
--
ALTER TABLE `portfolios`
ADD CONSTRAINT `portfolios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfis` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
