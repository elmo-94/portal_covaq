-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Jan-2022 às 02:20
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `covaqdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `baptismos`
--

DROP TABLE IF EXISTS `baptismos`;
CREATE TABLE IF NOT EXISTS `baptismos` (
  `id_bap` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` date DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `pastor` varchar(50) DEFAULT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id_bap`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campos`
--

DROP TABLE IF EXISTS `campos`;
CREATE TABLE IF NOT EXISTS `campos` (
  `id_campo` int(11) NOT NULL AUTO_INCREMENT,
  `localidade` varchar(50) DEFAULT NULL,
  `data_fund` date DEFAULT NULL,
  PRIMARY KEY (`id_campo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campo_missionarios`
--

DROP TABLE IF EXISTS `campo_missionarios`;
CREATE TABLE IF NOT EXISTS `campo_missionarios` (
  `id_camp` int(11) NOT NULL AUTO_INCREMENT,
  `data_fund` date DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_camp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campo_missionarios`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

DROP TABLE IF EXISTS `contas`;
CREATE TABLE IF NOT EXISTS `contas` (
  `id_conta` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` datetime DEFAULT NULL,
  `conta` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `data_venc` date DEFAULT NULL,
  `id_tipopag` int(11) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_conta`),
  KEY `id_tipopag` (`id_tipopag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--


--
-- Estrutura da tabela `discipuladores`
--

DROP TABLE IF EXISTS `discipuladores`;
CREATE TABLE IF NOT EXISTS `discipuladores` (
  `id_discip` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` date DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `fase` varchar(50) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_discip`),
  KEY `id_mem` (`id_mem`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--


--
-- Estrutura da tabela `dizimos`
--

DROP TABLE IF EXISTS `dizimos`;
CREATE TABLE IF NOT EXISTS `dizimos` (
  `id_diz` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` datetime DEFAULT NULL,
  `mes` varchar(30) DEFAULT NULL,
  `id_tipopag` int(11) DEFAULT NULL,
  `semana` varchar(30) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_diz`),
  KEY `id_tipopag` (`id_tipopag`),
  KEY `id_mem` (`id_mem`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--


--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_end` int(11) NOT NULL AUTO_INCREMENT,
  `id_mem` int(11) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `zona` varchar(50) DEFAULT NULL,
  `quarteirao` varchar(50) DEFAULT NULL,
  `casa` varchar(50) DEFAULT NULL,
  `ponto_ref` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_end`),
  KEY `id_mem` (`id_mem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--
--
-- Estrutura da tabela `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `id_ent` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` datetime DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `doador` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_ent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacoes`
--

DROP TABLE IF EXISTS `formacoes`;
CREATE TABLE IF NOT EXISTS `formacoes` (
  `id_form` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) DEFAULT NULL,
  `nivel` varchar(50) DEFAULT NULL,
  `instituicao` varchar(50) DEFAULT NULL,
  `especialidade` varchar(50) DEFAULT NULL,
  `outra_instituicao` varchar(50) NOT NULL,
  `id_mem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_form`),
  KEY `id_mem` (`id_mem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formacoes`
--
-- Estrutura da tabela `informacoes`
--

DROP TABLE IF EXISTS `informacoes`;
CREATE TABLE IF NOT EXISTS `informacoes` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  `data_inico` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `local_info` varchar(50) DEFAULT NULL,
  `duracao` varchar(50) DEFAULT NULL,
  `destino` varchar(50) NOT NULL,
  `realizacao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matrimonios`
--

DROP TABLE IF EXISTS `matrimonios`;
CREATE TABLE IF NOT EXISTS `matrimonios` (
  `id_mat` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` date DEFAULT NULL,
  `num_reg` varchar(10) DEFAULT NULL,
  `localidade` varchar(50) NOT NULL,
  `ministro` varchar(50) DEFAULT NULL,
  `id_noivo` int(11) DEFAULT NULL,
  `id_noiva` int(11) DEFAULT NULL,
  `padrinho` varchar(50) NOT NULL,
  `madrinha` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mat`),
  KEY `id_noivo` (`id_noivo`),
  KEY `id_noiva` (`id_noiva`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membrasias`
--

DROP TABLE IF EXISTS `membrasias`;
CREATE TABLE IF NOT EXISTS `membrasias` (
  `id_membrasia` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_memb` varchar(50) DEFAULT NULL,
  `data_bap` date DEFAULT NULL,
  `ministro` varchar(50) DEFAULT NULL,
  `local_bap` varchar(50) DEFAULT NULL,
  `tempo` int(11) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  `proven` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_membrasia`),
  KEY `id_mem` (`id_mem`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membrasias`
--
--

DROP TABLE IF EXISTS `membros`;
CREATE TABLE IF NOT EXISTS `membros` (
  `id_mem` int(11) NOT NULL AUTO_INCREMENT,
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
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros_campos`
--

DROP TABLE IF EXISTS `membros_campos`;
CREATE TABLE IF NOT EXISTS `membros_campos` (
  `id_mc` int(11) NOT NULL AUTO_INCREMENT,
  `id_camp` int(11) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mc`),
  KEY `id_camp` (`id_camp`),
  KEY `id_mem` (`id_mem`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros_detalhes`
--

DROP TABLE IF EXISTS `membros_detalhes`;
CREATE TABLE IF NOT EXISTS `membros_detalhes` (
  `id_det` int(11) NOT NULL AUTO_INCREMENT,
  `id_mem` int(11) DEFAULT NULL,
  `agregado` int(11) DEFAULT NULL,
  `num_filhos` int(11) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `conjuge` varchar(50) DEFAULT NULL,
  `tipo_cas` varchar(50) DEFAULT NULL,
  `data_cas` date DEFAULT NULL,
  PRIMARY KEY (`id_det`),
  KEY `id_mem` (`id_mem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--


--
-- Estrutura da tabela `membros_discipulo`
--

DROP TABLE IF EXISTS `membros_discipulo`;
CREATE TABLE IF NOT EXISTS `membros_discipulo` (
  `id_disc` int(11) NOT NULL AUTO_INCREMENT,
  `fase` varchar(50) DEFAULT NULL,
  `consagracao` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `id_prof` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_disc`),
  KEY `id_prof` (`id_prof`),
  KEY `id_aluno` (`id_aluno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-
-- --------------------------------------------------------

--
-- Estrutura da tabela `membros_financas`
--

DROP TABLE IF EXISTS `membros_financas`;
CREATE TABLE IF NOT EXISTS `membros_financas` (
  `id_mf` int(11) NOT NULL AUTO_INCREMENT,
  `id_mem` int(11) DEFAULT NULL,
  `profissao` varchar(50) DEFAULT NULL,
  `sector` varchar(50) DEFAULT NULL,
  `ramo_activ` varchar(100) DEFAULT NULL,
  `dizimo` decimal(10,0) DEFAULT NULL,
  `local_servico` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mf`),
  KEY `id_mem` (`id_mem`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros_financas`


--
-- Estrutura da tabela `membros_min`
--

DROP TABLE IF EXISTS `membros_min`;
CREATE TABLE IF NOT EXISTS `membros_min` (
  `id_mem_min` int(11) NOT NULL AUTO_INCREMENT,
  `id_min` int(11) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  `funcao` varchar(50) DEFAULT NULL,
  `outra_funcao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mem_min`),
  KEY `id_min` (`id_min`),
  KEY `id_mem` (`id_mem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros_min`
--


--
-- Estrutura da tabela `ministerios`
--

DROP TABLE IF EXISTS `ministerios`;
CREATE TABLE IF NOT EXISTS `ministerios` (
  `id_min` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `lider` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_min`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ministerios`


--
-- Estrutura da tabela `missionarios`
--

DROP TABLE IF EXISTS `missionarios`;
CREATE TABLE IF NOT EXISTS `missionarios` (
  `id_miss` int(11) NOT NULL AUTO_INCREMENT,
  `data_consag` date DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  `id_camp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_miss`),
  KEY `id_mem` (`id_mem`),
  KEY `id_camp` (`id_camp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--


--
-- Estrutura da tabela `movimentacoes`
--

DROP TABLE IF EXISTS `movimentacoes`;
CREATE TABLE IF NOT EXISTS `movimentacoes` (
  `id_mov` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` datetime DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mov`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--

-- --------------------------------------------------------

--
-- Estrutura da tabela `novos_convertidos`
--

DROP TABLE IF EXISTS `novos_convertidos`;
CREATE TABLE IF NOT EXISTS `novos_convertidos` (
  `id_nc` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` date DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `identificacao` varchar(50) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `naturalidade` varchar(50) DEFAULT NULL,
  `morada` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  `data_nasc` date DEFAULT NULL,
  PRIMARY KEY (`id_nc`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `novos_convertidos`
-
--

DROP TABLE IF EXISTS `obras`;
CREATE TABLE IF NOT EXISTS `obras` (
  `id_obra` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `financiador` varchar(50) DEFAULT NULL,
  `orcamento` decimal(10,0) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_obra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receber_membros`
--

DROP TABLE IF EXISTS `receber_membros`;
CREATE TABLE IF NOT EXISTS `receber_membros` (
  `id_recep` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` date DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `origem` varchar(50) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_recep`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `recep_membros`
--

DROP TABLE IF EXISTS `recep_membros`;
CREATE TABLE IF NOT EXISTS `recep_membros` (
  `data_reg` date DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `igreja_origem` varchar(50) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `saidas`
--

DROP TABLE IF EXISTS `saidas`;
CREATE TABLE IF NOT EXISTS `saidas` (
  `id_saida` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` datetime DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL,
  `necessidade` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `observacao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_saida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes`
--

DROP TABLE IF EXISTS `solicitacoes`;
CREATE TABLE IF NOT EXISTS `solicitacoes` (
  `id_sol` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` datetime DEFAULT NULL,
  `num_oficio` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `id_tipodoc` int(11) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sol`),
  KEY `id_tipodoc` (`id_tipodoc`),
  KEY `id_mem` (`id_mem`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `solicitacoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_doc`
--

DROP TABLE IF EXISTS `tipo_doc`;
CREATE TABLE IF NOT EXISTS `tipo_doc` (
  `id_tipodoc` int(11) NOT NULL AUTO_INCREMENT,
  `tipodoc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipodoc`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_doc`
--

INSERT INTO `tipo_doc` (`id_tipodoc`, `tipodoc`) VALUES
(1, 'Carta de transferência'),
(2, 'Cartão de membro'),
(3, 'Certificado de baptismo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_pagamentos`
--

DROP TABLE IF EXISTS `tipo_pagamentos`;
CREATE TABLE IF NOT EXISTS `tipo_pagamentos` (
  `id_tipopag` int(11) NOT NULL AUTO_INCREMENT,
  `tipopag` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipopag`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_pagamentos`
--

INSERT INTO `tipo_pagamentos` (`id_tipopag`, `tipopag`) VALUES
(1, 'Dinheiro'),
(2, 'TPA'),
(3, 'Check');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transf_membros`
--

DROP TABLE IF EXISTS `transf_membros`;
CREATE TABLE IF NOT EXISTS `transf_membros` (
  `id_transf` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` date DEFAULT NULL,
  `motivo` varchar(50) DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transf`),
  KEY `id_mem` (`id_mem`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_discipulado`
--

DROP TABLE IF EXISTS `turma_discipulado`;
CREATE TABLE IF NOT EXISTS `turma_discipulado` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `data_reg` date DEFAULT NULL,
  `id_prof` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `fase` varchar(50) DEFAULT NULL,
  `consagracao` varchar(5) NOT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_turma`),
  KEY `id_prof` (`id_prof`),
  KEY `id_aluno` (`id_aluno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `id_mem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_mem` (`id_mem`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `usuario`, `email`, `senha`, `nivel`, `id_mem`) VALUES
(2, 'admin', 'admin@teste.com', 'admin', 5, 1);

--
-- Restrições para despejos de tabelas
--

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
-- Limitadores para a tabela `membros_detalhes`
--
ALTER TABLE `membros_detalhes`
  ADD CONSTRAINT `membros_detalhes_ibfk_1` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`);

--
-- Limitadores para a tabela `membros_min`
--
ALTER TABLE `membros_min`
  ADD CONSTRAINT `membros_min_ibfk_1` FOREIGN KEY (`id_min`) REFERENCES `ministerios` (`id_min`),
  ADD CONSTRAINT `membros_min_ibfk_2` FOREIGN KEY (`id_mem`) REFERENCES `membros` (`id_mem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
