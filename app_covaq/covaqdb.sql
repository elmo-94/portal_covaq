-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Fev-2022 às 00:07
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covaqdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `baptismos`
--

CREATE TABLE `baptismos` (
  `id_bap` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `pastor` varchar(50) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campos`
--

CREATE TABLE `campos` (
  `id_campo` int(11) NOT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `data_fund` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campo_missionarios`
--

CREATE TABLE `campo_missionarios` (
  `id_camp` int(11) NOT NULL,
  `data_fund` date DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campo_missionarios`
--

INSERT INTO `campo_missionarios` (`id_camp`, `data_fund`, `localidade`) VALUES
(1, '2016-04-04', 'Quihinga'),
(3, '2017-02-05', 'Quitita'),
(4, '2018-03-02', 'Mucaba'),
(5, '0000-00-00', 'Centralidade do Quilumosso'),
(6, '0000-00-00', 'Sonangol'),
(7, '0000-00-00', 'Cassumba'),
(8, '0000-00-00', 'Cahuanga');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id_conta` int(11) NOT NULL,
  `data_reg` datetime DEFAULT NULL,
  `conta` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `data_venc` date DEFAULT NULL,
  `id_tipopag` int(11) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `discipuladores`
--

CREATE TABLE `discipuladores` (
  `id_discip` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `fase` varchar(50) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `discipuladores`
--

INSERT INTO `discipuladores` (`id_discip`, `data_reg`, `localidade`, `fase`, `id_mem`, `estado`) VALUES
(1, NULL, 'Igreja local', '1ª Fase', 1, 'Regular'),
(2, NULL, 'Igreja local', '3ª Fase', 2, 'Regular'),
(3, NULL, 'Igreja local', '3ª Fase', 3, ''),
(4, NULL, 'Igreja local', '2ª Fase', 5, 'Irregular'),
(5, NULL, 'Igreja local', '4ª Fase', 7, 'Reentegrado'),
(6, NULL, 'Igreja local', '1ª Fase', 18, 'Regular'),
(7, NULL, 'Igreja local', '1ª Fase', 20, 'Regular'),
(8, NULL, 'Igreja local', '2ª Fase', 21, 'Regular'),
(9, NULL, 'Igreja local', '', 22, 'Regular'),
(10, NULL, 'Igreja local', '4ª Fase', 24, 'Regular'),
(11, NULL, 'Igreja local', '2ª Fase', 25, 'Regular'),
(12, NULL, 'Igreja local', '1ª Fase', 26, 'Regular'),
(13, NULL, 'Igreja local', '1ª Fase', 27, 'Irregular'),
(14, NULL, 'Igreja local', '', 28, ''),
(15, NULL, 'Igreja local', '', 34, ''),
(16, NULL, NULL, '', 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dizimos`
--

CREATE TABLE `dizimos` (
  `id_diz` int(11) NOT NULL,
  `data_reg` datetime DEFAULT NULL,
  `mes` varchar(30) DEFAULT NULL,
  `id_tipopag` int(11) DEFAULT NULL,
  `semana` varchar(30) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_end` int(11) NOT NULL,
  `id_mem` int(11) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `zona` varchar(50) DEFAULT NULL,
  `quarteirao` varchar(50) DEFAULT NULL,
  `casa` varchar(50) DEFAULT NULL,
  `ponto_ref` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_end`, `id_mem`, `bairro`, `rua`, `zona`, `quarteirao`, `casa`, `ponto_ref`) VALUES
(1, 1, 'Papelão', 'Satélite', '3', '7', '87', 'Ana Paula'),
(2, 2, 'Centralidade do Quilumosso', '', '0', '6', '1.1', 'Complexo escolar '),
(3, 3, 'Mbemba Ngando', 'D', '0', '0', 's/n39', 'Cancum'),
(4, 4, 'Popular nº1', 'A', '0', '0', 's/n', 'Escola 323'),
(5, 5, 'Centralidade do Kilomosso', '', '0', '5', '3.2', 'Complexo Escolar do Kilomosso'),
(6, 6, 'Centralidade/Zango', '', '5', '6', '021', 'Edifício J 103'),
(7, 7, 'Mbemba Ngango', 'D', '1', '1', '43', 'Jardim do ponto Final '),
(8, 13, 'Bairro Novo Catapa ', '', '', '0', 's/n', 'Zona do SIAC, Primor Club'),
(9, 14, 'Popular', '', '0', '0', 's/n', ''),
(10, 15, 'Pedreira', 'Direita', '01', '01', '194 A', 'Comarca'),
(11, 17, 'Popular', 'D', '1', '0', 's/n', 'Comando provincial'),
(12, 18, 'Quixicongo', '', '1', '0', 's/n', 'Nosso Super'),
(13, 19, 'Quilomosso ', '', '0', '5', '3.2', 'Complexo Escolar do Quilomosso '),
(14, 20, 'INCA', '', '07', '0', 's/n', 'Escola Foguetão '),
(15, 21, 'Quixicongo ', '', '03', '04', 's/n', 'Nosso Super'),
(16, 22, 'Popular', 'C', '02', '3', 's/n', 'Reitoria da UNIKIVI'),
(17, 23, 'Popular', '', '0', '0', 's/n', 'Nosso Super'),
(18, 24, 'Tange', '', '', '08', 's/n', 'Por frente rua da Igreja mundial '),
(19, 25, 'Tange', '', '0', '0', 's/n', ''),
(20, 26, 'Tange', 'Rua principal', '06', '04', 's/n', 'Escola Foguetão'),
(21, 27, 'Quindenuco', '', '', '0', 's/n', 'Siac'),
(22, 28, 'Pedreira', '1 do Beco 3', '01', '01', 's/n', 'Chafariz'),
(23, 29, 'Mbemba Ngango', 'A', '1', '0', 'S/N', 'Túmulo do Mbemba Ngango'),
(24, 30, 'Popular', 'D', '30', '03', 's/n', 'Comando Provincial do Uige'),
(25, 31, 'PEDREIRA', 'Do Hospital do Bairro', '1', '1', 's/n', 'Mangueira Maçã'),
(26, 32, 'Centro da Cidade', 'Do Comércio', '0', '0', 's/n34/50D', 'Manuel Gonçalves'),
(27, 33, 'Pedreira', '', '01', '02', 's/n', 'BPC'),
(28, 34, 'Quixicongo', '', '02', '02', 's/n', 'Covaq'),
(29, 35, 'Tanje', '', '6', '6', 's/n', 'Escola Primária 17'),
(30, 36, 'KILAMBA KIAXI', 'S/N', '03', '0', 's/n', 'CNE DO BAIRRO POPULAR'),
(31, 37, 'Dunga', '', '0', '0', 's/n', ''),
(32, 38, 'Dunga', '', '0', '0', 's/n', ''),
(33, 39, 'Dunga', '', '0', '0', 's/n', ''),
(34, 40, 'Pedreira', '', '0', '0', 's/n', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entradas`
--

CREATE TABLE `entradas` (
  `id_ent` int(11) NOT NULL,
  `data_reg` datetime DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `doador` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacoes`
--

CREATE TABLE `formacoes` (
  `id_form` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `nivel` varchar(50) DEFAULT NULL,
  `instituicao` varchar(50) DEFAULT NULL,
  `especialidade` varchar(50) DEFAULT NULL,
  `outra_instituicao` varchar(50) NOT NULL,
  `id_mem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formacoes`
--

INSERT INTO `formacoes` (`id_form`, `tipo`, `nivel`, `instituicao`, `especialidade`, `outra_instituicao`, `id_mem`) VALUES
(1, 'Acadêmica', 'Técnico Superior', 'Univeridade KimpaVita', 'Engenharia Informática', '', 1),
(2, 'Teológica', 'Médio', 'CTIC', 'Discipulado', '', 1),
(3, 'Acadêmica', 'Técnico Superior', 'Univeridade KimpaVita', 'Contabilidade e Gestão', '', 2),
(4, 'Teológica', 'Superior', 'CTIC', 'Discipulado', '', 2),
(5, 'Acadêmica', 'Técnico Superior', 'ISCED e KIMPA VITA (Direito)', 'Psicologia e Direito', 'ITBU', 3),
(6, 'Teológica', 'Avançado', 'CTIC', 'Teologia Filosófica ', 'ITBU', 3),
(7, 'Acadêmica', 'Técnico Médio', 'Liceu Uíge', 'Ciências Económicas Jurídicas', '', 4),
(8, 'Teológica', 'Médio', 'CTIC', 'Discipulado', '', 4),
(9, 'Acadêmica', 'Técnico Superior', 'ISCED-Uíge', 'Ensino', '', 5),
(10, 'Teológica', 'Avançado', 'CTIC', 'Discipulado Avançado', '', 5),
(11, 'Acadêmica', 'Técnico Médio', 'Complexo escolar Namputo da Damba', 'Energias ', '', 6),
(12, 'Acadêmica', 'Técnico Superior', 'ESPU-UIGE', 'Contabilidade e gestão', '', 7),
(13, 'Teológica', 'Médio', 'ITBU', 'Médio', '', 7),
(14, 'Acadêmica', 'Técnico Superior', 'Unipiaget Angola', 'Direito', '', 13),
(15, 'Acadêmica', 'Técnico Superior', 'KimpaVita', 'Eng. Informática', '', 14),
(16, 'Acadêmica', 'Técnico Superior', 'ISCED', 'Ciência da Educação ', '', 15),
(17, 'Acadêmica', 'Técnico Médio', 'Instituto Técnico Privado de saúde Mandogex', 'Enfermagem geral', '', 17),
(18, 'Acadêmica', 'Técnico Superior', 'Instituto Superior Politécnico Metropolitano de An', 'Licenciatura em Arquitectura', 'ITBL', 18),
(19, 'Teológica', 'Básico', 'Outra', 'Teologia Básica', 'ITBL', 18),
(20, 'Acadêmica', 'Técnico Superior', 'ISCED-Uíge', 'Educação ', '', 19),
(21, 'Acadêmica', 'Técnico Superior', 'ISCED do UÍJE', 'Geografia ', '', 20),
(22, 'Teológica', 'Avançado', 'CTIC', 'Teologia Filosófica ', '', 20),
(23, 'Acadêmica', 'Técnico Superior', 'Kimpa Vita', 'Agronomia', 'ITEBU', 21),
(24, 'Teológica', 'Avançado', 'CTIC', 'Teologia Filosófica ', 'ITEBU', 21),
(25, 'Acadêmica', 'Técnico Superior', 'Universidade Kimpa Vita', 'Agronomia', '', 22),
(26, 'Acadêmica', 'Técnico Médio', 'ISCED-UIGE', 'Biologia', '', 23),
(27, 'Acadêmica', 'Técnico Superior', 'Universidade Kimpa Vita', 'Contabilidade e Gestão', '', 24),
(28, 'Teológica', 'Básico', 'ITBU', 'Basico ITBU', '', 24),
(29, 'Acadêmica', 'Técnico Básico', 'Liceu Teta Lando', 'Ciências Físicas e Biológicas', '', 25),
(30, 'Teológica', 'Médio', 'CTIC', 'Discipulado', '', 25),
(31, 'Acadêmica', 'Técnico Superior', 'Kimpa Vita - UNIKIVI', 'Informatica', '', 26),
(32, 'Acadêmica', 'Técnico Superior', 'UNIKIVI', 'Contabilidade e Gestão', '', 27),
(33, 'Teológica', 'Avançado', 'CTIC', 'Discipulado', '', 27),
(34, 'Acadêmica', 'Técnico Médio', 'Instituto Médio de Administração e Gestão do Uíge', 'Contabilidade e Gestão', '', 28),
(35, 'Teológica', '', '', 'Nenhuma', '', 28),
(36, 'Acadêmica', 'Técnico Médio', 'Líceu do Quióngua - Núcleo ITBU ', 'Ciências Económicas e Jurídicas', '', 29),
(37, 'Acadêmica', 'Técnico Superior', 'Universidade Kimpa Vita', 'Direito ', '', 30),
(38, 'Acadêmica', 'Técnico Superior', 'Universidade Kimpa Vita', 'Direito', '', 31),
(39, 'Acadêmica', 'Técnico Médio', 'Liceu Teta Lando', 'Ciências Económicas Jurídica', '', 32),
(40, 'Teológica', 'Médio', 'CTIC', 'Discipulado', '', 32),
(41, 'Acadêmica', 'Técnico Superior', 'ISCED-UÍJE', 'Língua Portuguesa', '', 33),
(42, 'Teológica', 'Médio', 'CTIC', 'Discipulado', '', 33),
(43, 'Acadêmica', 'Técnico Médio', 'Liceu  do Quiongua', 'Ciência Físicas e Biológicas', '', 34),
(44, 'Teológica', 'Médio', 'CTIC', 'Discipulado', '', 34),
(45, 'Acadêmica', 'Técnico Médio', 'Liceu do Quióngua ', 'Ciências Físicas e Biológicas', '', 35),
(46, 'Acadêmica', 'Técnico Superior', 'ISPPU', 'CIENCIAS FARMACETICAS ', '', 36),
(47, 'Acadêmica', 'Técnico Superior', 'Universidade Kimpa Vita', 'Contabilidade e Gestão', '', 37),
(48, 'Acadêmica', 'Técnico Superior', 'Universidade Kimpa Vita', 'Contabilidade e Gestão', '', 38),
(49, 'Acadêmica', 'Técnico Básico', 'INEFOP', 'Eletrecidade', '', 39),
(50, 'Acadêmica', 'Técnico Médio', 'Liceu Uíge', 'Ciências Humanas', '', 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes`
--

CREATE TABLE `informacoes` (
  `id_info` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `local_info` varchar(50) DEFAULT NULL,
  `duracao` varchar(50) DEFAULT NULL,
  `destino` varchar(50) NOT NULL,
  `realizacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `informacoes`
--

INSERT INTO `informacoes` (`id_info`, `descricao`, `data_inicio`, `data_fim`, `local_info`, `duracao`, `destino`, `realizacao`) VALUES
(1, 'Acampamento da Juventude', '2022-07-27', '2022-07-30', 'Damba', '5 dias', 'Jovens', 'Juventude'),
(2, 'Gala da juventude', '2022-12-17', '0000-00-00', 'Covaq', '1 dia', 'Jovens', 'Juventude');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matrimonios`
--

CREATE TABLE `matrimonios` (
  `id_mat` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `num_reg` varchar(10) DEFAULT NULL,
  `localidade` varchar(50) NOT NULL,
  `ministro` varchar(50) DEFAULT NULL,
  `id_noivo` int(11) DEFAULT NULL,
  `id_noiva` int(11) DEFAULT NULL,
  `padrinho` varchar(50) NOT NULL,
  `madrinha` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membrasias`
--

CREATE TABLE `membrasias` (
  `id_membrasia` int(11) NOT NULL,
  `tipo_memb` varchar(50) DEFAULT NULL,
  `data_bap` date DEFAULT NULL,
  `ministro` varchar(50) DEFAULT NULL,
  `local_bap` varchar(50) DEFAULT NULL,
  `tempo` int(11) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  `proven` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membrasias`
--

INSERT INTO `membrasias` (`id_membrasia`, `tipo_memb`, `data_bap`, `ministro`, `local_bap`, `tempo`, `id_mem`, `proven`) VALUES
(1, 'Baptismo', '2013-09-13', 'Felgas Teófilo Lucas', 'Igreja local', 9, 1, ''),
(2, 'Transferência', '2004-12-09', 'Felgas Teófilo Lucas', 'Igreja local', 18, 2, 'Igreja Baptista do Rocha Pinto'),
(3, 'Baptismo', '2013-09-15', 'Pastor Felgas Teófilo Lucas', 'Igreja local', 9, 3, 'Uige'),
(4, 'Aclamação', '2013-07-12', 'Desconhecido', 'Igreja local', 9, 4, 'Tocoista'),
(5, 'Baptismo', '2006-05-06', 'Guilherme Monique', 'Igreja local', 16, 5, ''),
(6, 'Baptismo', '2015-12-20', 'Felgas Teófilo Lucas', 'Igreja local', 7, 6, ''),
(7, 'Transferência', '2007-01-05', 'Valentino Afonso', 'Outro', 15, 7, 'Igreja Batista do Quimbunga Muzombo'),
(8, 'Baptismo', '2007-01-08', 'Felgas Teófilo Lucas', 'Igreja local', 15, 13, 'Anglicana Unida '),
(9, 'Transferência', '2011-08-07', 'José Julungo Nassenga Feliciano', '', 11, 14, 'Igreja Baptista Nacional'),
(10, 'Aclamação', '1993-03-06', 'Alfredo Panzo', 'Outro', 29, 15, 'Nova Galileia Calumbo'),
(11, 'Baptismo', '2019-08-24', 'Felgas Teófelo', 'Igreja local', 3, 17, 'Baptista'),
(12, 'Baptismo', '2006-08-20', 'Guilherme ', 'Igreja local', 16, 18, 'Bungo'),
(13, 'Baptismo', '2022-10-12', 'Felgas Teófilo Lucas', 'Igreja local', 0, 19, ''),
(14, 'Baptismo', '2006-05-07', 'Guilherme Monique ', 'Igreja local', 16, 20, ''),
(15, 'Baptismo', '2015-08-16', 'Felgas Teófilo Lucas', 'Igreja local', 7, 21, ''),
(16, 'Baptismo', '2015-08-08', 'Felgas Teófilo Lucas', 'Igreja local', 7, 22, ''),
(17, 'Baptismo', '2013-06-16', 'Felgas Teófilo Lucas', 'Igreja local', 9, 23, ''),
(18, 'Transferência', '1994-01-09', 'Teixeira Matunga', 'Outro', 28, 24, 'Igreja Baptista de Quiquinguila Bungo'),
(19, 'Baptismo', '2017-05-07', 'Felgas Teófilo Lucas', 'Igreja local', 5, 25, ''),
(20, 'Aclamação', '2005-02-06', '', 'Outro', 17, 26, 'Universal '),
(21, 'Baptismo', '2012-01-07', 'Felgas ', 'Igreja local', 10, 27, ''),
(22, 'Baptismo', '2020-10-11', 'Felgas Teófilo Lucas', 'Igreja local', 2, 28, ''),
(23, 'Baptismo', '2014-06-01', 'Felgas Teófilo Lucas', 'Igreja local', 8, 29, ''),
(24, 'Baptismo', '2006-08-20', 'Guilherme Moniqui', 'Igreja local', 16, 30, ''),
(25, 'Baptismo', '2014-01-12', 'Felgas Teófilo Lucas', 'Igreja local', 8, 31, ''),
(26, 'Baptismo', '2014-01-12', '', 'Igreja local', 8, 32, ''),
(27, 'Aclamação', '1997-05-18', 'Joaquim Santos', 'Outro', 25, 33, 'Quarta Igreja'),
(28, 'Baptismo', '2014-12-28', 'Felgas Teófilo Lucas', 'Igreja local', 8, 34, ''),
(29, 'Transferência', '2008-10-31', 'Jaime Gonçalves Malungo', 'Igreja local', 14, 35, 'Kilamba Kiaxi'),
(30, 'Baptismo', '2017-12-24', 'Felgas Teófilo Lucas', 'Igreja local', 5, 36, ''),
(31, 'Baptismo', '2022-02-10', '', 'Igreja local', 0, 37, ''),
(32, 'Baptismo', '2022-02-10', '', 'Igreja local', 0, 38, NULL),
(33, 'Baptismo', '2022-02-14', '', 'Igreja local', 0, 39, NULL),
(34, 'Baptismo', '2022-02-22', '', 'Igreja local', 0, 40, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `id_mem` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `ident` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  `identidade` varchar(20) DEFAULT NULL,
  `data_val` date DEFAULT NULL,
  `genero` varchar(15) DEFAULT NULL,
  `esta_civil` varchar(15) DEFAULT NULL,
  `ponto_ref` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `naturalidade` varchar(50) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `residencia` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `tel_emerg` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pai` varchar(50) DEFAULT NULL,
  `mae` varchar(50) DEFAULT NULL,
  `grupo_sang` varchar(15) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`id_mem`, `nome`, `ident`, `tipo`, `identidade`, `data_val`, `genero`, `esta_civil`, `ponto_ref`, `provincia`, `naturalidade`, `data_nasc`, `idade`, `residencia`, `telefone`, `tel_emerg`, `email`, `pai`, `mae`, `grupo_sang`, `estado`, `foto`) VALUES
(1, 'Manuel Congo Sudiau', '00ICBVQ04', 'Campo missionário', '005472632UE045', '2022-12-03', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Uíge', '1994-12-10', 28, NULL, '947357333', '', 'sudiau94@gmail.com', 'João Manuel Tomás', 'Margarida Alberto', 'BRH+', 'Comunhão', 'f5826df0ea647a4885a8cdae5aea9bf7.jpg'),
(2, 'Guilherme Fernando Gonçalves', '001ICBVQ02', 'Igreja local', '001156727LA034', '2026-07-13', 'Masculino', 'Casado', NULL, 'Luanda', 'Ingombota', '1988-12-19', 34, NULL, '921100720', '921100720', 'guilherme1960@live.com', 'Simão Gonçalves', 'Carlota Fernando', 'B+', 'Comunhão', 'ea5c040385bde8001d5e5513c24e5d50'),
(3, 'Esteves Eduardo Fernando', '002ICBVQ04', 'Igreja local', '002536790UE032', '2022-02-02', 'Masculino', 'Solteiro', NULL, 'Uige', 'Uige', '2022-03-22', 0, NULL, '943206876', '992478762', 'fernandoeduardoeduardo@gmail.c', 'Fernando Xavier Eduardo', 'Fineza Maria Henriques', '', 'Comunhão', '577092ddf59597199443c67d1808fc65'),
(4, 'Eduardo Haka Massala', '003ICBVQ04', 'Igreja local', '006209865LA041', '2023-09-06', 'Masculino', 'Solteiro', NULL, 'Luanda', 'Samba', '1994-12-26', 28, NULL, '927797105', '', 'hakamassala1994@gmail.com', 'Ernesto Massala', 'Teresa Eduardo', 'OHR+', 'Comunhão', 'b7af2aec1d5467cfce0c630cbfb8b2fc'),
(5, 'Adriano Alberto Guido', '004ICBVQ02', 'Igreja local', '003950778UE033', '2025-05-31', 'Masculino', 'Casado', NULL, 'Uíge', 'Negage', '1990-07-29', 32, NULL, '(+244)925 022 1', '', '', 'Nascimento Augusto Guido', 'Antónia Alberto Vazia', 'B RH+', 'Comunhão', 'fe83daced9fc8e6b3ffc3ed730ce9578'),
(6, 'Ediberto Xavier Jorge Panzo', '005ICBVQ04', 'Igreja local', '006299660UE045', '2024-07-18', 'Masculino', 'Solteiro', NULL, 'Uíge ', 'Uíge ', '2001-10-10', 21, NULL, '944234422', '', 'edibertoxavier28@gmail.com', 'Manuel Manuel', 'Isabel Kikeka Lourenço Manuel', '', 'Comunhão', '72abf78c2ab610bb63edebe0a8627904jpeg'),
(7, 'Victor Daniel Miguel Vila', '006ICBVQ02', '', '003770545UE036', '2024-05-17', 'Masculino', 'Amaritado', NULL, 'Uige', 'Alto caule ', '1989-05-06', 33, NULL, '+244927285420', '+244927285420', 'victordanielmiguelvila@gmail.c', 'Daniel Vila', 'Beatriz Miguel', '', 'Disciplina', '3042c9faafbb419cd4435c2685c20ad9.jpg'),
(13, 'Albertino Luís Bento Mário Sadrack', '0012ICBVQ02', 'Igreja local', '002153609UE034', '2022-09-06', 'Masculino', 'Casado', NULL, 'Uíge', 'Bairro Candombe Velho', '1989-06-16', 33, NULL, '937175461', '994823458', 'albertino.mario@minjusdh.co.ao', 'Alexandre Mário', 'Adelina Luís Bento Mário', 'ARH +', 'Comunhão', '94e08c4fd71b368915ccffa1cbe1feeb'),
(14, 'Garcia Narciso Alfredo', '0013ICBVQ03', 'Igreja local', '001902977UE037', '2023-03-02', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Uíge', '1995-02-01', 27, NULL, '926978531', '', 'garciakakloy@gmail.com', 'Manuel Afredo', 'Alice Narciso', '', 'Transferido', 'dd5367e9c279dd0d233258a260c0234c.jpg'),
(15, 'Ermelindo Mardocar Albino João ', '0014ICBVQ', 'Igreja local', '004824141UE044', '2029-02-07', 'Masculino', 'Casado', NULL, 'Uíge', 'Uíge', '1979-10-08', 43, NULL, '925761358', '925463542', 'ermelindo.albino.joao@bancobic', 'Pinto João ', 'Antonica Albino Joao', 'ORH+', 'Comunhão', '41cf5a3f4712f22e006a0a9906b1b613'),
(16, 'António de Oliveira Fino', '0015ICBVQ01', 'Igreja local', '008943464UE040', '0000-00-00', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Culo', '0000-00-00', 22, NULL, '', '', '', 'José Fino Nani', 'Isabel Oliveira', '', 'Comunhão', 'd703f7f7c0771bbf91fa6e36e3ebc90d'),
(17, 'Joana Africano Wola João cacama', '0016ICBVQ05', 'Igreja local', '006766574UE041', '2019-08-16', 'Feminino', 'Solteiro', NULL, 'Uíge', 'Uíge', '2024-08-15', -2, NULL, '929778866', '923409304', 'joanaafricano344@gmail.com', 'Bento Adolfo Pongo Cacama', 'Nkumba Graciosa Francisco Wola', '', 'Comunhão', 'df8e3772b36b5a99b613ce19f2d72824'),
(18, 'Nelson Gonçalves', '0017ICBVQ02', '', '001156735LA034', '2025-02-10', 'Masculino', 'Casado', NULL, 'Luanda', 'Luanda', '1990-11-09', 32, NULL, '933262791', '911343312', 'gonnelson49@gmail.com', 'Simeão Gonçalves Tiago', 'Carlota Fernando Gonçalves', 'A+', 'Transferido', 'b472e39092103b0539872a32ff241a65.jpg'),
(19, 'Teresa Nicolau Congo Guido', '0018ICBVQ05', '', '003964146UE038', '2025-12-21', 'Feminino', 'Casado', NULL, 'Uíge ', 'Uíge ', '1990-12-12', 32, NULL, '941585668', '998585668', 'Aterrsanicol21@gmail.com', 'Carlos Augusto ', 'Constância Nicolau', 'O RH+', 'Comunhão', '42eae8f7962753ec930a4b03e78d4d7ajpeg'),
(20, 'Dumilde Salaquiaco da Silva Dito', '0019ICBVQ02', 'Igreja local', '004804524UE045', '2022-01-19', 'Masculino', 'Casado', NULL, 'Uíje', 'Uíje', '1990-08-14', 32, NULL, '934620706', '994473030', '', 'João Dito', 'Esperança da Silva João ', 'BRH+', 'Comunhão', '993dbaf0ac302d4c44a96c08f07c4b49'),
(21, 'Mário Teta Alberto', '0020ICBVQ04', 'Igreja local', '003810548UE035', '2025-06-19', 'Masculino', 'Solteiro', NULL, 'Uige', 'Uige', '1990-08-28', 32, NULL, '926655644', '', 'matioteta@28gmil.com', 'Victor Alberto', 'Paulina Alfredo', 'BRH+', 'Comunhão', '986ee03c52f8f69f5c98ad1a5bac094e'),
(22, 'Fundo Panzo Maindo Daniel', '0021ICBVQ04', 'Igreja local', '005233653UE045', '2021-10-31', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Damba', '1989-09-15', 33, NULL, '925227993', '998500120', 'fundopanzo@gmail.com', 'Alberto Panzo', 'Antónica Daniel', 'O+', 'Comunhão', '6494468ef83402b0e49c82d4f0f85163'),
(23, 'Celso Octávio José Tuaca', '0022ICBVQ04', 'Igreja local', '005356413UE049', '2022-08-03', 'Masculino', 'Amaritado', NULL, 'Uige', 'Uige', '1992-03-23', 30, NULL, '931785596', '922054425', '', 'Pedro Tuaca', 'Filisbina José', 'OHr+', 'Comunhão', '32fafcf1e362acc773c7716675f5daf1'),
(24, 'Gasto Conceição A. Faustino', '0023ICBVQ01', 'Igreja local', '002904425UE035', '2027-03-01', 'Masculino', 'Casado', NULL, 'Uige', 'Bungo', '1976-03-01', 46, NULL, '922287570  9185', '938150406', 'gastoconceição@gmail.com', 'Conceição Dala', 'Joaquina António', 'Bhr+', 'Comunhão', 'd7bbad3fe9bd1b84fd6edab0465cb580'),
(25, 'Carlos Dunda Alfredo', '0024ICBVQ04', 'Igreja local', '0091363594B042', '2023-07-02', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Uíge', '1999-12-04', 23, NULL, '924329776', '', '', 'Francisco Alfredo', 'Feliciana Carlos', '', 'Comunhão', '6bc1dcbd0083abd2830672fe6329d980'),
(26, 'Júnior Francisco Marques Kudihingana', '0025ICBVQ02', 'Igreja local', '001787383UE035', '2025-11-11', 'Masculino', 'Casado', NULL, 'Uige', 'Uige', '1988-09-04', 34, NULL, '924187601', '934181883', 'kudijunior@hotmail.com ', 'Paciencia Marques Kudihingana', 'Moneza Francisco', 'O+', 'Comunhão', 'a056173dcdcd01a6438a7b67c00292b9'),
(27, 'Duarte Inocêncio V.Sebastião', '0026ICBVQ03', 'Igreja local', '004757171UE041', '2023-02-07', 'Masculino', 'Casado', NULL, 'Uíge', 'Songo', '1987-04-30', 35, NULL, '927756207', '996756207', 'duarteivsebastiao@gmail.com', 'João Sebastião', 'Igraça Vieira', 'ARH+', 'Comunhão', 'ba69c14e8eb125656a311469715ff1d1'),
(28, 'Dominique da Rosa Paiva', '0027ICBVQ05', '', '008108758UE043', '2026-06-17', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Uíge', '2002-11-09', 20, NULL, '938930478', '935933085', '', 'Nicodemos Paiva', 'Joana Pinto', '', 'Comunhão', '28fd5d0fcb574068f5301669e3b9b368'),
(29, 'Ildo Ferreira Massala', '0028ICBVQ04', 'Igreja local', '006270100UE042', '2023-11-22', 'Masculino', 'Amaritado', NULL, 'Uíge', 'Alto Cauale', '1992-12-06', 30, NULL, '925728925', '', '', 'Carlos Inácio Ferreira', 'Mariana Sebastião Massala', 'B RH+', 'Disciplina', '37217e2d0ec88583e6b01b475b4b1d5f'),
(30, 'Anacleto dos Santos Mateus Lunguila', '0029ICBVQ02', 'Igreja local', '004722455UE045', '2026-02-18', 'Masculino', 'Solteiro', NULL, 'Uige', 'Uige', '1991-06-30', 31, NULL, '928473528', '915929638', 'anacletodossantoslunguila@hotm', 'Santos Beirão', 'Catarina Mateus', 'BRH+', 'Comunhão', '0daa6046fca91d190c00dcd5600443b1'),
(31, 'Eduardo Lucas Lopes', '0030ICBVQ04', 'Igreja local', '002441153UE038', '2021-11-17', 'Masculino', 'Solteiro', NULL, 'Uige', 'Puri', '1989-04-09', 33, NULL, '926382379', '914344222', 'stenayedu@gmail.com', 'Fonseca Lopes', 'Janeta Alberto', 'ARH+', 'Comunhão', 'edfa2ee5c3af03e1d64ca616fb6b6dcc'),
(32, 'Alberto Baltazar da Costa Coxe', '0031ICBVQ04', 'Igreja local', '006820750UE041', '2024-06-20', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Alto Cauele', '1995-04-08', 27, NULL, '942380650', '923212999', 'albertobaltazardaco@gmail.com', 'Diniz Rodrigues', 'Malta Alberto', '', 'Comunhão', 'ab5256871e9012fef68514fc24a8ac2c'),
(33, 'Alcina Beatriz F. M. João', '0032ICBVQ', 'Igreja local', '003529569UE035', '2029-02-07', 'Feminino', 'Casado', NULL, 'Uíje', 'Uíje', '1982-12-22', 40, NULL, '925463542', '', 'alcinabeatriz8@gmail.com', 'Pena Cakila Messo', 'Beatriz Mavo Messo', '', 'Comunhão', '09e9990a01398435724759c9aa617b40'),
(34, 'Filipe Monteiro Bernardo', '0033ICBVQ04', 'Igreja local', '008138307UE045', '2026-02-17', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Uíge', '1997-08-22', 25, NULL, '921595770', '', 'filpealbert1@gmail.com', 'Alberto Bernardo', 'Albertina Monteiro', '', 'Comunhão', '9bd224d5ef12cdaff3c1314b5f319669'),
(35, 'Fineza Albino', '0034ICBVQ03', '', '006253344UE042', '2024-09-22', 'Feminino', 'Solteiro', NULL, 'Uíge', 'Alto Cauale', '1992-02-02', 30, NULL, '933202713', '', '', 'Albino Gaspar Dala', 'Celestina Gomes', '', 'Disciplina', '801d75c0c28c786f54addf2d4bea667e'),
(36, 'GILSON TIMOTEO SABI', '0035ICBVQ04', 'Igreja local', '008010068UE041', '2026-02-23', 'Masculino', 'Solteiro', NULL, 'UIGE', 'UIGE', '2000-04-03', 22, NULL, '940415256', '', '', 'GOMES SABI', 'ADELINA BERNARDO SAMEUL ', '0+', 'Comunhão', 'e89b53809dbff1b4f58dcf3546166bbf'),
(37, 'Ambrosia João', '0036ICBVQ05', 'Campo missionário', '004377645UE048', '2022-02-08', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Uíge', '2022-02-19', 0, NULL, '', '', '', 'A', 'b', '', 'Comunhão', '2703554b073c44acdf9cbe8a4b13446d.jpg'),
(38, 'Pedro Simão', '0037ICBVQ05', 'Igreja local', '004376545UE048', '2022-02-08', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Uíge', '2022-02-19', 0, NULL, '', '', '', 'A', 'b', '', 'Comunhão', '520e351717591605d0dc98559113ae89.jpg'),
(39, 'Zilmar Jose', '0038ICBVQ05', 'Igreja local', '004576362UE044', '2022-02-17', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Uíge', '2022-02-18', 0, NULL, '', '', '', 'A', 'b', '', 'Comunhão', 'db85b2db900f0b0118e130f95ddffc12.jpg'),
(40, 'Mateus Pinto José', '0039ICBVQ05', 'Igreja local', '003456543UE034', '2022-02-24', 'Masculino', 'Solteiro', NULL, 'Uíge', 'Uíge', '2022-02-16', 0, NULL, '', '', '', 'Manuel Pedro', 'Maria Pedro', '', 'Comunhão', 'f9b4b8bc0a861e4c91792e87f6e73df2'),
(41, NULL, '0040ICBVQ01', 'Campo missionário', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros_campos`
--

CREATE TABLE `membros_campos` (
  `id_mc` int(11) NOT NULL,
  `id_camp` int(11) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros_campos`
--

INSERT INTO `membros_campos` (`id_mc`, `id_camp`, `id_mem`) VALUES
(1, 3, 35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros_detalhes`
--

CREATE TABLE `membros_detalhes` (
  `id_det` int(11) NOT NULL,
  `id_mem` int(11) DEFAULT NULL,
  `agregado` int(11) DEFAULT NULL,
  `num_filhos` int(11) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `conjuge` varchar(50) DEFAULT NULL,
  `tipo_cas` varchar(50) DEFAULT NULL,
  `data_cas` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros_detalhes`
--

INSERT INTO `membros_detalhes` (`id_det`, `id_mem`, `agregado`, `num_filhos`, `estatus`, `conjuge`, `tipo_cas`, `data_cas`) VALUES
(1, 1, 4, 0, 'Filho', NULL, NULL, NULL),
(2, 2, 5, 2, 'Pai', 'Carlota Fernando', 'Ambos', '2015-12-19'),
(3, 4, 7, 0, 'Sobrinho (a)', '', '', NULL),
(4, 5, 4, 2, 'Pai', 'Teresa Nicolau Congo Guido', 'Ambos', '2015-01-30'),
(5, 6, 2, 0, 'Sobrinho (a)', '', '', NULL),
(6, 7, 3, 1, 'Pai', 'Ciana Vasco de Menezes ', '', '2000-07-02'),
(7, 13, 4, 3, 'Pai', 'Idalina Isabel Neves Pedro Mário', 'Ambos', '2018-06-08'),
(8, 15, 6, 5, 'Pai', 'Alcina Beatriz Ferreira Manuel João ', 'Ambos', '2019-02-01'),
(9, 17, 0, 0, 'Filho', '', '', NULL),
(10, 18, 0, 0, 'Pai', 'Olívia Gonçalves', 'Ambos', '2021-08-14'),
(11, 19, 4, 2, 'Mãe', 'Adriano Alberto Guido', 'Ambos', '2015-07-30'),
(12, 20, 2, 0, 'Pai', 'Benvinda Teresa Lopes Zua Dito', 'Ambos', '2016-07-30'),
(13, 21, 2, 1, 'Irmão (a)', '', '', NULL),
(14, 22, 1, 0, 'Pai', '', '', NULL),
(15, 23, 3, 4, 'Pai', 'Lucrécia Joaquim', '', NULL),
(16, 24, 9, 5, 'Pai', 'Teresa da Silva Pedro', 'Religioso', '2002-08-20'),
(17, 25, 6, 0, '', '', '', NULL),
(18, 26, 7, 4, 'Pai', 'Massaca S.N. Kudihingana', 'Ambos', '2019-07-19'),
(19, 27, 8, 5, 'Pai', 'Luísa Afonso V. Sebastião', 'Ambos', '2017-11-17'),
(20, 28, 9, 0, 'Filho', '', '', NULL),
(21, 29, 3, 1, 'Pai', 'Morança Gonsalves Pinto', '', NULL),
(22, 30, 9, 0, 'Irmão (a)', '', '', NULL),
(23, 31, 4, 2, 'Pai', '', '', NULL),
(24, 32, 6, 0, 'Filho', '', '', NULL),
(25, 33, 7, 5, 'Mãe', 'Ermelindo Mardocar A. João', 'Ambos', '2019-02-01'),
(26, 34, 7, 0, 'Filho', '', '', NULL),
(27, 35, 4, 0, 'Mãe', '', '', NULL),
(28, 36, 3, 0, 'Filho', '', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros_discipulo`
--

CREATE TABLE `membros_discipulo` (
  `id_disc` int(11) NOT NULL,
  `fase` varchar(50) DEFAULT NULL,
  `consagracao` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `id_prof` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros_discipulo`
--

INSERT INTO `membros_discipulo` (`id_disc`, `fase`, `consagracao`, `estado`, `id_prof`, `id_aluno`) VALUES
(1, '1ª Fase', 'Não', 'Regular', 1, 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros_financas`
--

CREATE TABLE `membros_financas` (
  `id_mf` int(11) NOT NULL,
  `id_mem` int(11) DEFAULT NULL,
  `profissao` varchar(50) DEFAULT NULL,
  `sector` varchar(50) DEFAULT NULL,
  `ramo_activ` varchar(100) DEFAULT NULL,
  `dizimo` decimal(10,0) DEFAULT NULL,
  `local_servico` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros_financas`
--

INSERT INTO `membros_financas` (`id_mf`, `id_mem`, `profissao`, `sector`, `ramo_activ`, `dizimo`, `local_servico`) VALUES
(1, 1, 'Professor', 'Privado', 'Educação', '6500', 'Uíge'),
(2, 2, 'Professor', 'Público', 'Educação', '23000', 'Uíge'),
(3, 3, 'Professor', 'Privado', 'Aulas', '3000', 'Uige'),
(4, 4, 'Pintor', 'Independente', '', '500', 'Uíge'),
(5, 5, 'Professor', 'Público', 'Ensino', '15000', 'Uíge'),
(6, 7, 'Professor e Contabilista ', 'Público', 'Prestação de serviços', '14', 'Cangola e Uige'),
(7, 19, 'Professora ', 'Público', 'Saúde ', '5500', 'Uíge '),
(8, 20, 'Professor ', 'Público', '', '23000', 'Negage'),
(9, 21, 'Agrônomo ', 'Público', 'Agricultura', '12000', 'Negage'),
(10, 22, 'Engenheiro Agrônomo', 'Público', 'Prestação de serviços', '10', 'Negage/Quitexe'),
(11, 23, 'Pedreiro', 'Independente', 'Pedreira', '1500', 'Uige'),
(12, 24, 'Professor', 'Público', '', '30', 'Colegio da IERA  C. V. Velho'),
(13, 26, 'Electrecista', 'Público', 'Transporte de electrcidade', '51400', 'Uíge'),
(14, 27, 'Professor', 'Independente', 'Docência', '10000', 'Uíge'),
(15, 28, '', '', '', '0', ''),
(16, 29, 'Carpinteiro Marceneiro', 'Independente', 'Marcenaria', '1000', 'Uíge'),
(17, 33, 'Professora', 'Público', '', '30000', 'Uíje'),
(18, 34, '', 'Privado', '', '0', 'Uíge'),
(19, 35, '', 'Público', 'Auxiliar de limpeza ', '2000', 'Uige'),
(20, 36, 'FARMACEURTICO', 'Privado', 'FARMACIA ', '1000', 'Uíge');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros_min`
--

CREATE TABLE `membros_min` (
  `id_mem_min` int(11) NOT NULL,
  `id_min` int(11) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  `funcao` varchar(50) DEFAULT NULL,
  `outra_funcao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros_min`
--

INSERT INTO `membros_min` (`id_mem_min`, `id_min`, `id_mem`, `funcao`, `outra_funcao`) VALUES
(1, 3, 1, 'Membro', 'Baixista'),
(2, 3, 2, 'Membro', 'Professor'),
(3, 3, 2, 'Membro', 'Professor'),
(4, 2, 3, 'Membro', 'Secretario'),
(5, 3, 3, 'Líder', 'Membro'),
(6, 6, 4, 'Membro', 'Professor missionário'),
(7, 12, 4, 'Membro', 'missionário'),
(8, 2, 5, 'Outra', 'Admin. p/ área Social e Administrativa'),
(9, 5, 5, 'Outra', 'Comunicação e Imprensa'),
(10, 3, 6, 'Membro', 'Pianista '),
(11, 2, 7, 'Líder', 'Patrimonio'),
(12, 1, 7, 'Outra', 'Covaq solidário '),
(13, 2, 7, 'Líder', 'Discipulado '),
(15, 4, 14, 'Membro', ''),
(16, 11, 15, 'Outra', ''),
(17, 11, 15, 'Outra', ''),
(18, 3, 18, 'Membro', ''),
(19, 5, 19, 'Membro', ''),
(20, 5, 20, 'Líder', ''),
(21, 1, 20, 'Outra', 'Responsável pelos discipuladores'),
(22, 5, 21, 'Membro', 'Tesouraria e protocolo'),
(23, 2, 21, 'Outra', 'Líder de Protocolo '),
(24, 6, 22, 'Membro', ''),
(25, 7, 24, 'Membro', ''),
(26, 1, 25, 'Membro', 'Professor'),
(27, 13, 25, 'Membro', 'Envangelista'),
(28, 13, 26, 'Outra', 'Responsável pelas Finanças'),
(29, 8, 26, 'Outra', 'Responsável pela Moderação'),
(30, 2, 27, 'Outra', 'Responsável pelas Finanças '),
(31, 1, 28, 'Membro', ''),
(32, 1, 30, 'Membro', ''),
(33, 5, 30, 'Membro', ''),
(34, 3, 30, 'Membro', ''),
(35, 3, 31, 'Membro', ''),
(36, 3, 32, 'Membro', 'Instrumentalista'),
(37, 10, 33, 'Membro', ''),
(38, 3, 34, 'Líder', ''),
(39, 3, 35, 'Membro', ''),
(40, 3, 36, 'Membro', ''),
(41, 3, 2, 'Membro', 'Professor'),
(42, 3, 2, 'Membro', 'Professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ministerios`
--

CREATE TABLE `ministerios` (
  `id_min` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `lider` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ministerios`
--

INSERT INTO `ministerios` (`id_min`, `nome`, `descricao`, `lider`) VALUES
(1, 'Discipulado', 'Ensino', 'Anacleto Gilberto'),
(2, 'Administractivo', '', 'Filipe Ferreira Pongo'),
(3, 'Louvor e Adoração', '', ''),
(4, 'MIC', '', ''),
(5, 'Juventude', '', ''),
(6, 'Etário', '', ''),
(7, 'Diaconal', '', ''),
(8, 'Pastoral', '', ''),
(9, 'Adolescente', '', ''),
(10, 'Mulheres', '', ''),
(11, 'Homens', '', ''),
(12, 'Missão', '', ''),
(13, 'Colectores da graça', 'Evangelizar', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `missionarios`
--

CREATE TABLE `missionarios` (
  `id_miss` int(11) NOT NULL,
  `data_consag` date DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  `id_camp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `missionarios`
--

INSERT INTO `missionarios` (`id_miss`, `data_consag`, `id_mem`, `id_camp`) VALUES
(1, NULL, 4, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id_mov` int(11) NOT NULL,
  `data_reg` datetime DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `novos_convertidos`
--

CREATE TABLE `novos_convertidos` (
  `id_nc` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `identificacao` varchar(50) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `naturalidade` varchar(50) DEFAULT NULL,
  `morada` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  `data_nasc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `novos_convertidos`
--

INSERT INTO `novos_convertidos` (`id_nc`, `data_reg`, `nome`, `identificacao`, `genero`, `naturalidade`, `morada`, `telefone`, `estado`, `data_nasc`) VALUES
(1, '2024-06-20', 'Gomes Londes Manuel', '006822342UE047', 'Masculino', 'Uíge', 'Bairro Papelão Zona nº02', '9317533961', 'Não Batizado', '1994-07-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `obras`
--

CREATE TABLE `obras` (
  `id_obra` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `financiador` varchar(50) DEFAULT NULL,
  `orcamento` decimal(10,0) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receber_membros`
--

CREATE TABLE `receber_membros` (
  `id_recep` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `origem` varchar(50) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recep_membros`
--

CREATE TABLE `recep_membros` (
  `data_reg` date DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `igreja_origem` varchar(50) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `saidas`
--

CREATE TABLE `saidas` (
  `id_saida` int(11) NOT NULL,
  `data_reg` datetime DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL,
  `necessidade` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `observacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `id_sol` int(11) NOT NULL,
  `data_reg` datetime DEFAULT NULL,
  `num_oficio` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `id_tipodoc` int(11) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `id_tipodoc` int(11) NOT NULL,
  `tipodoc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_pagamentos`
--

CREATE TABLE `tipo_pagamentos` (
  `id_tipopag` int(11) NOT NULL,
  `tipopag` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transf_membros`
--

CREATE TABLE `transf_membros` (
  `id_transf` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `motivo` varchar(50) DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_discipulado`
--

CREATE TABLE `turma_discipulado` (
  `id_turma` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `id_prof` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `fase` varchar(50) DEFAULT NULL,
  `consagracao` varchar(5) NOT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `usuario`, `email`, `senha`, `nivel`, `id_mem`) VALUES
(1, 'admin', 'admin@teste.com', 'admin', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baptismos`
--
ALTER TABLE `baptismos`
  ADD PRIMARY KEY (`id_bap`);

--
-- Indexes for table `campos`
--
ALTER TABLE `campos`
  ADD PRIMARY KEY (`id_campo`);

--
-- Indexes for table `campo_missionarios`
--
ALTER TABLE `campo_missionarios`
  ADD PRIMARY KEY (`id_camp`);

--
-- Indexes for table `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id_conta`),
  ADD KEY `id_tipopag` (`id_tipopag`);

--
-- Indexes for table `discipuladores`
--
ALTER TABLE `discipuladores`
  ADD PRIMARY KEY (`id_discip`),
  ADD KEY `id_mem` (`id_mem`);

--
-- Indexes for table `dizimos`
--
ALTER TABLE `dizimos`
  ADD PRIMARY KEY (`id_diz`),
  ADD KEY `id_mem` (`id_mem`),
  ADD KEY `id_tipopag` (`id_tipopag`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_end`),
  ADD KEY `id_mem` (`id_mem`);

--
-- Indexes for table `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id_ent`);

--
-- Indexes for table `formacoes`
--
ALTER TABLE `formacoes`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_mem` (`id_mem`);

--
-- Indexes for table `informacoes`
--
ALTER TABLE `informacoes`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `matrimonios`
--
ALTER TABLE `matrimonios`
  ADD PRIMARY KEY (`id_mat`),
  ADD KEY `id_noivo` (`id_noivo`),
  ADD KEY `id_noiva` (`id_noiva`);

--
-- Indexes for table `membrasias`
--
ALTER TABLE `membrasias`
  ADD PRIMARY KEY (`id_membrasia`),
  ADD KEY `id_mem` (`id_mem`);

--
-- Indexes for table `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`id_mem`);

--
-- Indexes for table `membros_campos`
--
ALTER TABLE `membros_campos`
  ADD PRIMARY KEY (`id_mc`),
  ADD KEY `id_camp` (`id_camp`),
  ADD KEY `id_mem` (`id_mem`);

--
-- Indexes for table `membros_detalhes`
--
ALTER TABLE `membros_detalhes`
  ADD PRIMARY KEY (`id_det`),
  ADD KEY `id_mem` (`id_mem`);

--
-- Indexes for table `membros_discipulo`
--
ALTER TABLE `membros_discipulo`
  ADD PRIMARY KEY (`id_disc`),
  ADD KEY `id_prof` (`id_prof`),
  ADD KEY `id_aluno` (`id_aluno`);

--
-- Indexes for table `membros_financas`
--
ALTER TABLE `membros_financas`
  ADD PRIMARY KEY (`id_mf`),
  ADD KEY `id_mem` (`id_mem`);

--
-- Indexes for table `membros_min`
--
ALTER TABLE `membros_min`
  ADD PRIMARY KEY (`id_mem_min`),
  ADD KEY `id_mem` (`id_mem`),
  ADD KEY `id_min` (`id_min`);

--
-- Indexes for table `ministerios`
--
ALTER TABLE `ministerios`
  ADD PRIMARY KEY (`id_min`);

--
-- Indexes for table `missionarios`
--
ALTER TABLE `missionarios`
  ADD PRIMARY KEY (`id_miss`),
  ADD KEY `id_mem` (`id_mem`),
  ADD KEY `id_camp` (`id_camp`);

--
-- Indexes for table `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id_mov`);

--
-- Indexes for table `novos_convertidos`
--
ALTER TABLE `novos_convertidos`
  ADD PRIMARY KEY (`id_nc`);

--
-- Indexes for table `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id_obra`);

--
-- Indexes for table `receber_membros`
--
ALTER TABLE `receber_membros`
  ADD PRIMARY KEY (`id_recep`);

--
-- Indexes for table `saidas`
--
ALTER TABLE `saidas`
  ADD PRIMARY KEY (`id_saida`);

--
-- Indexes for table `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`id_sol`),
  ADD KEY `id_mem` (`id_mem`),
  ADD KEY `id_tipodoc` (`id_tipodoc`);

--
-- Indexes for table `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`id_tipodoc`);

--
-- Indexes for table `tipo_pagamentos`
--
ALTER TABLE `tipo_pagamentos`
  ADD PRIMARY KEY (`id_tipopag`);

--
-- Indexes for table `transf_membros`
--
ALTER TABLE `transf_membros`
  ADD PRIMARY KEY (`id_transf`),
  ADD KEY `id_mem` (`id_mem`);

--
-- Indexes for table `turma_discipulado`
--
ALTER TABLE `turma_discipulado`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `id_prof` (`id_prof`),
  ADD KEY `id_aluno` (`id_aluno`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_mem` (`id_mem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baptismos`
--
ALTER TABLE `baptismos`
  MODIFY `id_bap` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `campos`
--
ALTER TABLE `campos`
  MODIFY `id_campo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `campo_missionarios`
--
ALTER TABLE `campo_missionarios`
  MODIFY `id_camp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contas`
--
ALTER TABLE `contas`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discipuladores`
--
ALTER TABLE `discipuladores`
  MODIFY `id_discip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `dizimos`
--
ALTER TABLE `dizimos`
  MODIFY `id_diz` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_end` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id_ent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `formacoes`
--
ALTER TABLE `formacoes`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `informacoes`
--
ALTER TABLE `informacoes`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `matrimonios`
--
ALTER TABLE `matrimonios`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membrasias`
--
ALTER TABLE `membrasias`
  MODIFY `id_membrasia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `membros`
--
ALTER TABLE `membros`
  MODIFY `id_mem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `membros_campos`
--
ALTER TABLE `membros_campos`
  MODIFY `id_mc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `membros_detalhes`
--
ALTER TABLE `membros_detalhes`
  MODIFY `id_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `membros_discipulo`
--
ALTER TABLE `membros_discipulo`
  MODIFY `id_disc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `membros_financas`
--
ALTER TABLE `membros_financas`
  MODIFY `id_mf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `membros_min`
--
ALTER TABLE `membros_min`
  MODIFY `id_mem_min` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `ministerios`
--
ALTER TABLE `ministerios`
  MODIFY `id_min` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `missionarios`
--
ALTER TABLE `missionarios`
  MODIFY `id_miss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `novos_convertidos`
--
ALTER TABLE `novos_convertidos`
  MODIFY `id_nc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `obras`
--
ALTER TABLE `obras`
  MODIFY `id_obra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `receber_membros`
--
ALTER TABLE `receber_membros`
  MODIFY `id_recep` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saidas`
--
ALTER TABLE `saidas`
  MODIFY `id_saida` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id_sol` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_doc`
--
ALTER TABLE `tipo_doc`
  MODIFY `id_tipodoc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_pagamentos`
--
ALTER TABLE `tipo_pagamentos`
  MODIFY `id_tipopag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transf_membros`
--
ALTER TABLE `transf_membros`
  MODIFY `id_transf` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turma_discipulado`
--
ALTER TABLE `turma_discipulado`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contas`
--
ALTER TABLE `contas`
  ADD CONSTRAINT `contas_ibfk_1` FOREIGN KEY (`id_tipopag`) REFERENCES `tipo_pagamentos` (`id_tipopag`);

--
-- Limitadores para a tabela `discipuladores`
--
ALTER TABLE `discipuladores`
  ADD CONSTRAINT `discipuladores_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`);

--
-- Limitadores para a tabela `dizimos`
--
ALTER TABLE `dizimos`
  ADD CONSTRAINT `dizimos_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`),
  ADD CONSTRAINT `dizimos_ibfk_2` FOREIGN KEY (`id_tipopag`) REFERENCES `tipo_pagamentos` (`id_tipopag`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`);

--
-- Limitadores para a tabela `formacoes`
--
ALTER TABLE `formacoes`
  ADD CONSTRAINT `formacoes_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`);

--
-- Limitadores para a tabela `matrimonios`
--
ALTER TABLE `matrimonios`
  ADD CONSTRAINT `matrimonios_ibfk_1` FOREIGN KEY (`id_noivo`) REFERENCES `membros` (`id_mem`),
  ADD CONSTRAINT `matrimonios_ibfk_2` FOREIGN KEY (`id_noiva`) REFERENCES `membros` (`id_mem`);

--
-- Limitadores para a tabela `membrasias`
--
ALTER TABLE `membrasias`
  ADD CONSTRAINT `membrasias_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`);

--
-- Limitadores para a tabela `membros_campos`
--
ALTER TABLE `membros_campos`
  ADD CONSTRAINT `membros_campos_ibfk_1` FOREIGN KEY (`id_camp`) REFERENCES `campo_missionarios` (`id_camp`),
  ADD CONSTRAINT `membros_campos_ibfk_2` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`);

--
-- Limitadores para a tabela `membros_detalhes`
--
ALTER TABLE `membros_detalhes`
  ADD CONSTRAINT `membros_detalhes_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`);

--
-- Limitadores para a tabela `membros_discipulo`
--
ALTER TABLE `membros_discipulo`
  ADD CONSTRAINT `membros_discipulo_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `discipuladores` (`id_discip`),
  ADD CONSTRAINT `membros_discipulo_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `membros` (`id_mem`);

--
-- Limitadores para a tabela `membros_financas`
--
ALTER TABLE `membros_financas`
  ADD CONSTRAINT `membros_financas_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`);

--
-- Limitadores para a tabela `membros_min`
--
ALTER TABLE `membros_min`
  ADD CONSTRAINT `membros_min_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`),
  ADD CONSTRAINT `membros_min_ibfk_2` FOREIGN KEY (`id_min`) REFERENCES `ministerios` (`id_min`);

--
-- Limitadores para a tabela `missionarios`
--
ALTER TABLE `missionarios`
  ADD CONSTRAINT `missionarios_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`),
  ADD CONSTRAINT `missionarios_ibfk_2` FOREIGN KEY (`id_camp`) REFERENCES `campo_missionarios` (`id_camp`);

--
-- Limitadores para a tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD CONSTRAINT `solicitacoes_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`),
  ADD CONSTRAINT `solicitacoes_ibfk_2` FOREIGN KEY (`id_tipodoc`) REFERENCES `tipo_doc` (`id_tipodoc`);

--
-- Limitadores para a tabela `transf_membros`
--
ALTER TABLE `transf_membros`
  ADD CONSTRAINT `transf_membros_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`);

--
-- Limitadores para a tabela `turma_discipulado`
--
ALTER TABLE `turma_discipulado`
  ADD CONSTRAINT `turma_discipulado_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `discipuladores` (`id_discip`),
  ADD CONSTRAINT `turma_discipulado_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `novos_convertidos` (`id_nc`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
