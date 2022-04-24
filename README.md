
<div align="center">
  <img src="https://user-images.githubusercontent.com/60266964/162435563-436fa05e-7e66-4419-8811-81ab90d758fa.png" width="300px">
</div>

<br>

Exitus propõe tornar disponível um sistema de gestão escolar online em função dos gestores, docentes e alunos, ou seja, das escolas.

<div align="justify">
  E como objetivo geral buscamos aumentar a disponibilidade dos dados referente aos alunos, mediante o uso do nosso sistema de gestão escolar, isto é, a ideia que    originou a criação do Exitus surgiu justamente após uma análise do SGE da Bahia, que levando em consideração a disponibilidade dos dados em seu sistema, percebemos algumas limitações que prejudicava a experiência de uso dos alunos. Bem como, levando em consideração o meio de acesso ao SGE, percebemos que não era possível acessa-lo em todos os tipos de dispositivos.
Então, a partir das limitações levantadas após essa análise, projetamos o Exitus para que as limitações de então fossem sanadas e podemos constatar essa ideia analisando os nossos objetivos específicos que são:
 </div>
 <br>

- Possibilitar que os gestores possam gerenciar os principais componentes de uma escola de forma online
- Possibilitar que os docentes possam gerenciar as avaliações com mais praticidade
- Possibilitar que os alunos possam acessar seus dados escolares facilmente;
- Possibilitar que o sistema seja acessado em qualquer dispositivo;
- Simplificar o processo de rematrícula na escola;

## Instalação

Para testar o projeto no seu computador primeiro você deve realizar o seu download a partir dessa página.
Com o projeto baixado o próximo passo e criar a base de dados do sistema no phpMyAdmin, o comando de criação do BD segue abaixo:

```sh
CREATE DATABASE Exitus;
```

<br>

> Obs: Lembrando que caso você deseje criar o banco de dados pelo Workbench, ou utilizar um nome diferente no BD só e preciso mudar as pré-definições do aqruivo "Connection.php".

Após a criação do banco de dados e necessário criar também as tabelas, para isso copie o conjunto de código abaixo no seu administrador de banco de dados e execute.

```sh
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jan-2022 às 00:56
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `Exitus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nome_administrador` varchar(120) NOT NULL,
  `codigo_acesso` bigint(6) NOT NULL,
  `fk_id_administrador_hierarquia_funcao` int(11) NOT NULL,
  `fk_id_telefone_administrador` int(11) NOT NULL,
  `fk_id_endereco_administrador` int(11) NOT NULL,
  `data_nascimento_administrador` date NOT NULL,
  `cpf_administrador` bigint(11) NOT NULL,
  `naturalidade_administrador` varchar(45) NOT NULL,
  `nacionalidade_administrador` varchar(45) NOT NULL,
  `foto_perfil_administrador` varchar(100) DEFAULT NULL,
  `fk_id_sexo_administrador` int(11) NOT NULL,
  `fk_id_pcd_administrador` int(11) NOT NULL,
  `fk_id_tipo_sanguineo_administrador` int(11) DEFAULT NULL,
  `email_administrador` varchar(100) DEFAULT NULL,
  `fk_id_situacao_conta_administrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(100) NOT NULL,
  `cpf_aluno` bigint(11) NOT NULL,
  `fk_id_sexo_aluno` int(11) NOT NULL,
  `data_nascimento_aluno` date NOT NULL,
  `naturalidade_aluno` varchar(45) NOT NULL,
  `foto_perfil_aluno` varchar(100) DEFAULT NULL,
  `nacionalidade_aluno` varchar(80) NOT NULL,
  `nome_mae` varchar(120) NOT NULL,
  `nome_pai` varchar(120) NOT NULL,
  `fk_id_tipo_sanguineo_aluno` int(11) NOT NULL,
  `fk_id_aluno_pcd` int(11) NOT NULL,
  `fk_id_endereco_aluno` int(11) NOT NULL,
  `fk_id_telefone_aluno` int(11) NOT NULL,
  `codigo_acesso` bigint(6) NOT NULL,
  `fk_id_aluno_hierarquia_funcao` int(11) NOT NULL,
  `email_aluno` varchar(100) DEFAULT NULL,
  `fk_id_situacao_geral_aluno` int(11) NOT NULL,
  `data_matricula_inicial` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL,
  `descricao_avaliacao` varchar(180) NOT NULL,
  `fk_id_unidade_avaliacao` int(11) NOT NULL,
  `valor_avaliacao` float DEFAULT NULL,
  `data_realizada` datetime NOT NULL DEFAULT current_timestamp(),
  `fk_id_turma_disciplina_avaliacao` int(11) NOT NULL,
  `data_postagem` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `aviso_turma`
--

CREATE TABLE `aviso_turma` (
  `id_aviso_turma` int(11) NOT NULL,
  `aviso` text DEFAULT NULL,
  `fk_id_turma_disciplina` int(11) NOT NULL,
  `data_postagem` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estrutura da tabela `cedula_turma`
--

CREATE TABLE `cedula_turma` (
  `id_cedula_turma` int(11) NOT NULL,
  `cedula` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracao`
--

CREATE TABLE `configuracao` (
  `id_configuracao` int(11) NOT NULL,
  `fk_id_controle_unidade` int(11) NOT NULL,
  `fk_id_controle_rematricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle_rematricula`
--

CREATE TABLE `controle_rematricula` (
  `id_situacao_abertura_rematricula` int(11) NOT NULL,
  `situacao` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `controle_unidade`
--

CREATE TABLE `controle_unidade` (
  `id_controle_unidade` int(11) NOT NULL,
  `situacao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(45) NOT NULL,
  `sigla` varchar(4) NOT NULL,
  `fk_id_modalidade_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome_disciplina` varchar(80) NOT NULL,
  `fk_id_modalidade_disciplina` int(11) NOT NULL,
  `sigla_disciplina` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `cep` bigint(11) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `municipio` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `falta_aluno`
--

CREATE TABLE `falta_aluno` (
  `id_falta` int(11) NOT NULL,
  `total_faltas` int(11) NOT NULL,
  `fk_id_turma_disciplina_falta` int(11) NOT NULL,
  `fk_id_unidade_falta` int(11) NOT NULL,
  `fk_id_matricula_falta` int(11) NOT NULL,
  `data_postagem` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `hierarquia_funcao`
--

CREATE TABLE `hierarquia_funcao` (
  `id_hierarquia_funcao` int(11) NOT NULL,
  `hierarquia_funcao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `legenda`
--

CREATE TABLE `legenda` (
  `id_legenda` int(11) NOT NULL,
  `legenda` varchar(45) NOT NULL,
  `sigla` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `data_hora_matricula` timestamp NULL DEFAULT NULL,
  `fk_id_aluno` int(11) NOT NULL,
  `fk_id_turma_matricula` int(11) NOT NULL,
  `fk_id_situacao_aluno` int(11) NOT NULL,
  `fk_id_periodo_letivo_matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `media_disciplina`
--

CREATE TABLE `media_disciplina` (
  `id_media_disciplina` int(11) NOT NULL,
  `fk_id_turma_disciplina` int(11) NOT NULL,
  `fk_id_matricula_media` int(11) NOT NULL,
  `nota_valor` float NOT NULL,
  `fk_id_legenda` int(11) NOT NULL,
  `data_postagem` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade_curso`
--

CREATE TABLE `modalidade_curso` (
  `id_modalidade_curso` int(11) NOT NULL,
  `modalidade_curso` varchar(60) NOT NULL,
  `modalidade_curso_sigla` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade_disciplina`
--

CREATE TABLE `modalidade_disciplina` (
  `id_modalidade_disciplina` int(11) NOT NULL,
  `modalidade_disciplina` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota_avaliacao`
--

CREATE TABLE `nota_avaliacao` (
  `id_nota` int(11) NOT NULL,
  `fk_id_matricula_aluno` int(11) NOT NULL,
  `fk_id_avaliacao` int(11) NOT NULL,
  `valor_nota` float NOT NULL,
  `data_postagem` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `numero_sala_aula`
--

CREATE TABLE `numero_sala_aula` (
  `id_numero_sala_aula` int(11) NOT NULL,
  `numero_sala_aula` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `observacao_aluno`
--

CREATE TABLE `observacao_aluno` (
  `id_observacao` int(11) NOT NULL,
  `fk_id_turma_disciplina_observacao` int(11) NOT NULL,
  `fk_id_unidade` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `fk_id_matricula_observacao` int(11) NOT NULL,
  `data_postagem` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pcd`
--

CREATE TABLE `pcd` (
  `id_pcd` int(11) NOT NULL,
  `pcd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo_disponivel`
--

CREATE TABLE `periodo_disponivel` (
  `id_periodo_disponivel` int(11) NOT NULL,
  `ano_letivo` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo_letivo`
--

CREATE TABLE `periodo_letivo` (
  `id_ano_letivo` int(11) NOT NULL,
  `fk_id_ano_letivo` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `fk_id_situacao_periodo_letivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `nome_professor` varchar(100) NOT NULL,
  `data_hora_matricula` datetime NOT NULL DEFAULT current_timestamp(),
  `fk_id_sexo_professor` int(11) NOT NULL,
  `data_nascimento_professor` date NOT NULL,
  `foto_perfil_professor` varchar(100) DEFAULT NULL,
  `cpf_professor` bigint(11) NOT NULL,
  `naturalidade_professor` varchar(45) NOT NULL,
  `nacionalidade_professor` varchar(45) NOT NULL,
  `fk_id_tipo_sanguineo_professor` int(11) NOT NULL,
  `fk_id_pcd_professor` int(11) NOT NULL,
  `fk_id_endereco_professor` int(11) NOT NULL,
  `fk_id_telefone_professor` int(11) NOT NULL,
  `codigo_acesso` bigint(6) NOT NULL,
  `fk_id_professor_hierarquia_funcao` int(11) NOT NULL,
  `email_professor` varchar(100) DEFAULT NULL,
  `fk_id_situacao_conta_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rematricula`
--

CREATE TABLE `rematricula` (
  `id_rematricula` int(11) NOT NULL,
  `fk_id_rematricula_aluno` int(11) NOT NULL,
  `fk_id_situacao_rematricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `fk_id_numero_sala` int(11) NOT NULL,
  `capacidade_alunos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie`
--

CREATE TABLE `serie` (
  `id_serie` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `sigla` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `sexo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_aluno_ano_letivo`
--

CREATE TABLE `situacao_aluno_ano_letivo` (
  `id_situacao_aluno` int(11) NOT NULL,
  `situacao_aluno` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_conta`
--

CREATE TABLE `situacao_conta` (
  `id_situacao_conta` int(11) NOT NULL,
  `situacao_conta` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_geral_aluno`
--

CREATE TABLE `situacao_geral_aluno` (
  `id_situacao_geral` int(11) NOT NULL,
  `situacao_geral` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_periodo_letivo`
--

CREATE TABLE `situacao_periodo_letivo` (
  `id_situacao_periodo_letivo` int(11) NOT NULL,
  `situacao_periodo_letivo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_rematricula`
--

CREATE TABLE `situacao_rematricula` (
  `id_situacao_rematricula` int(11) NOT NULL,
  `situacao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `id_telefone` int(11) NOT NULL,
  `numero_telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_sanguineo`
--

CREATE TABLE `tipo_sanguineo` (
  `id_tipo_sanguineo` int(11) NOT NULL,
  `tipo_sanguineo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `fk_id_turno` int(11) NOT NULL,
  `fk_id_periodo_letivo` int(11) NOT NULL,
  `fk_id_curso` int(11) NOT NULL,
  `fk_id_serie` int(11) NOT NULL,
  `fk_id_sala` int(11) NOT NULL,
  `fk_id_cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_disciplina`
--

CREATE TABLE `turma_disciplina` (
  `id_turma_disciplina` int(11) NOT NULL,
  `fk_id_disciplina` int(11) NOT NULL,
  `fk_id_turma` int(11) NOT NULL,
  `fk_id_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE `turno` (
  `id_turno` int(11) NOT NULL,
  `nome_turno` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `id_unidade` int(11) NOT NULL,
  `unidade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `fk_id_administrador_hierarquia_funcao_idx` (`fk_id_administrador_hierarquia_funcao`),
  ADD KEY `fk_id_telefone_administrador_idx` (`fk_id_telefone_administrador`),
  ADD KEY `fk_id_endereco_administrador_idx` (`fk_id_endereco_administrador`),
  ADD KEY `fk_id_pcd_administrador_idx` (`fk_id_pcd_administrador`),
  ADD KEY `fk_id_sexo_administrador_idx` (`fk_id_sexo_administrador`),
  ADD KEY `fk_id_tipo_sanguineo_administrador_idx` (`fk_id_tipo_sanguineo_administrador`),
  ADD KEY `fk_id_situacao_conta_administrador` (`fk_id_situacao_conta_administrador`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `fk_id_tipo_sanguineo_idx` (`fk_id_tipo_sanguineo_aluno`),
  ADD KEY `fk_id_pcd_idx` (`fk_id_aluno_pcd`),
  ADD KEY `fk_id_sexo_aluno_idx` (`fk_id_sexo_aluno`),
  ADD KEY `fk_id_endereco_aluno_idx` (`fk_id_endereco_aluno`),
  ADD KEY `fk_id_telefone_aluno_idx` (`fk_id_telefone_aluno`),
  ADD KEY `fk_id_aluno_hierarquia_funcao_idx` (`fk_id_aluno_hierarquia_funcao`),
  ADD KEY `fk_id_situacao_geral_aluno_idx` (`fk_id_situacao_geral_aluno`);

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `id_unidade_idx` (`fk_id_unidade_avaliacao`),
  ADD KEY `id_turma_disciplina_idx` (`fk_id_turma_disciplina_avaliacao`);

--
-- Índices para tabela `aviso_turma`
--
ALTER TABLE `aviso_turma`
  ADD PRIMARY KEY (`id_aviso_turma`),
  ADD KEY `fk_id_turma_disciplina` (`fk_id_turma_disciplina`);

--
-- Índices para tabela `cedula_turma`
--
ALTER TABLE `cedula_turma`
  ADD PRIMARY KEY (`id_cedula_turma`);

--
-- Índices para tabela `configuracao`
--
ALTER TABLE `configuracao`
  ADD PRIMARY KEY (`id_configuracao`),
  ADD KEY `fk_id_controle_unidade_idx` (`fk_id_controle_unidade`),
  ADD KEY `fk_id_rematricula_idx` (`fk_id_controle_rematricula`);

--
-- Índices para tabela `controle_rematricula`
--
ALTER TABLE `controle_rematricula`
  ADD PRIMARY KEY (`id_situacao_abertura_rematricula`);

--
-- Índices para tabela `controle_unidade`
--
ALTER TABLE `controle_unidade`
  ADD PRIMARY KEY (`id_controle_unidade`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `modalidade` (`fk_id_modalidade_curso`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `fk_id_modalidade_disciplina_idx` (`fk_id_modalidade_disciplina`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `falta_aluno`
--
ALTER TABLE `falta_aluno`
  ADD PRIMARY KEY (`id_falta`),
  ADD KEY `id_turma_disciplina_idx` (`fk_id_turma_disciplina_falta`),
  ADD KEY `id_unidade_idx` (`fk_id_unidade_falta`),
  ADD KEY `id_matricula_falta_idx` (`fk_id_matricula_falta`);

--
-- Índices para tabela `hierarquia_funcao`
--
ALTER TABLE `hierarquia_funcao`
  ADD PRIMARY KEY (`id_hierarquia_funcao`);

--
-- Índices para tabela `legenda`
--
ALTER TABLE `legenda`
  ADD PRIMARY KEY (`id_legenda`);

--
-- Índices para tabela `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `id_aluno_idx` (`fk_id_aluno`),
  ADD KEY `id_turma_idx` (`fk_id_turma_matricula`),
  ADD KEY `id_situacao_aluno_idx` (`fk_id_situacao_aluno`),
  ADD KEY `fk_id_periodo_letivo_matricula_idx` (`fk_id_periodo_letivo_matricula`);

--
-- Índices para tabela `media_disciplina`
--
ALTER TABLE `media_disciplina`
  ADD PRIMARY KEY (`id_media_disciplina`),
  ADD KEY `id_turma_disciplina_idx` (`fk_id_turma_disciplina`),
  ADD KEY `id_matricula_idx` (`fk_id_matricula_media`),
  ADD KEY `id_legenda_idx` (`fk_id_legenda`);

--
-- Índices para tabela `modalidade_curso`
--
ALTER TABLE `modalidade_curso`
  ADD PRIMARY KEY (`id_modalidade_curso`);

--
-- Índices para tabela `modalidade_disciplina`
--
ALTER TABLE `modalidade_disciplina`
  ADD PRIMARY KEY (`id_modalidade_disciplina`);

--
-- Índices para tabela `nota_avaliacao`
--
ALTER TABLE `nota_avaliacao`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_avaliacao_idx` (`fk_id_avaliacao`),
  ADD KEY `id_matricula_idx` (`fk_id_matricula_aluno`);

--
-- Índices para tabela `numero_sala_aula`
--
ALTER TABLE `numero_sala_aula`
  ADD PRIMARY KEY (`id_numero_sala_aula`);

--
-- Índices para tabela `observacao_aluno`
--
ALTER TABLE `observacao_aluno`
  ADD PRIMARY KEY (`id_observacao`),
  ADD KEY `id_turma_disciplina_idx` (`fk_id_turma_disciplina_observacao`),
  ADD KEY `id_unidade_idx` (`fk_id_unidade`),
  ADD KEY `id_matricula_idx` (`fk_id_matricula_observacao`);

--
-- Índices para tabela `pcd`
--
ALTER TABLE `pcd`
  ADD PRIMARY KEY (`id_pcd`);

--
-- Índices para tabela `periodo_disponivel`
--
ALTER TABLE `periodo_disponivel`
  ADD PRIMARY KEY (`id_periodo_disponivel`);

--
-- Índices para tabela `periodo_letivo`
--
ALTER TABLE `periodo_letivo`
  ADD PRIMARY KEY (`id_ano_letivo`),
  ADD KEY `fk_id_situacao_periodo_letivo_idx` (`fk_id_situacao_periodo_letivo`),
  ADD KEY `fk_id_ano_letivo_idx` (`fk_id_ano_letivo`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `fk_id_pcd_idx` (`fk_id_pcd_professor`),
  ADD KEY `fk_id_sexo_funcionario_idx` (`fk_id_sexo_professor`),
  ADD KEY `fk_id_tipo_sanguineo_professor_idx` (`fk_id_tipo_sanguineo_professor`),
  ADD KEY `fk_id_endereco_professor_idx` (`fk_id_endereco_professor`),
  ADD KEY `fk_id_telefone_professor_idx` (`fk_id_telefone_professor`),
  ADD KEY `fk_id_professor_hierarquia_funcao_idx` (`fk_id_professor_hierarquia_funcao`),
  ADD KEY `fk_id_situacao_conta_professor` (`fk_id_situacao_conta_professor`);

--
-- Índices para tabela `rematricula`
--
ALTER TABLE `rematricula`
  ADD PRIMARY KEY (`id_rematricula`),
  ADD KEY `fk_id_rematricula_aluno_idx` (`fk_id_rematricula_aluno`),
  ADD KEY `fk_id_situacao_rematricula_idx` (`fk_id_situacao_rematricula`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`),
  ADD KEY `fk_id_numero_sala_idx` (`fk_id_numero_sala`);

--
-- Índices para tabela `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id_serie`);

--
-- Índices para tabela `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Índices para tabela `situacao_aluno_ano_letivo`
--
ALTER TABLE `situacao_aluno_ano_letivo`
  ADD PRIMARY KEY (`id_situacao_aluno`);

--
-- Índices para tabela `situacao_conta`
--
ALTER TABLE `situacao_conta`
  ADD PRIMARY KEY (`id_situacao_conta`);

--
-- Índices para tabela `situacao_geral_aluno`
--
ALTER TABLE `situacao_geral_aluno`
  ADD PRIMARY KEY (`id_situacao_geral`);

--
-- Índices para tabela `situacao_periodo_letivo`
--
ALTER TABLE `situacao_periodo_letivo`
  ADD PRIMARY KEY (`id_situacao_periodo_letivo`);

--
-- Índices para tabela `situacao_rematricula`
--
ALTER TABLE `situacao_rematricula`
  ADD PRIMARY KEY (`id_situacao_rematricula`);

--
-- Índices para tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id_telefone`);

--
-- Índices para tabela `tipo_sanguineo`
--
ALTER TABLE `tipo_sanguineo`
  ADD PRIMARY KEY (`id_tipo_sanguineo`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `fk_id_periodo_letivo_idx` (`fk_id_periodo_letivo`),
  ADD KEY `id_turno_idx` (`fk_id_turno`),
  ADD KEY `id_curso_idx` (`fk_id_curso`),
  ADD KEY `id_serie_idx` (`fk_id_serie`),
  ADD KEY `fk_id_sala_idx` (`fk_id_sala`),
  ADD KEY `fk_id_cedula_idx` (`fk_id_cedula`);

--
-- Índices para tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD PRIMARY KEY (`id_turma_disciplina`),
  ADD KEY `id_turma_idx` (`fk_id_turma`),
  ADD KEY `id_disciplina_idx` (`fk_id_disciplina`),
  ADD KEY `id_professor_idx` (`fk_id_professor`);

--
-- Índices para tabela `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id_turno`);

--
-- Índices para tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id_unidade`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `aviso_turma`
--
ALTER TABLE `aviso_turma`
  MODIFY `id_aviso_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `cedula_turma`
--
ALTER TABLE `cedula_turma`
  MODIFY `id_cedula_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `configuracao`
--
ALTER TABLE `configuracao`
  MODIFY `id_configuracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `controle_rematricula`
--
ALTER TABLE `controle_rematricula`
  MODIFY `id_situacao_abertura_rematricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `controle_unidade`
--
ALTER TABLE `controle_unidade`
  MODIFY `id_controle_unidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `falta_aluno`
--
ALTER TABLE `falta_aluno`
  MODIFY `id_falta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `hierarquia_funcao`
--
ALTER TABLE `hierarquia_funcao`
  MODIFY `id_hierarquia_funcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `legenda`
--
ALTER TABLE `legenda`
  MODIFY `id_legenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `media_disciplina`
--
ALTER TABLE `media_disciplina`
  MODIFY `id_media_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `modalidade_curso`
--
ALTER TABLE `modalidade_curso`
  MODIFY `id_modalidade_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `modalidade_disciplina`
--
ALTER TABLE `modalidade_disciplina`
  MODIFY `id_modalidade_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `nota_avaliacao`
--
ALTER TABLE `nota_avaliacao`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `numero_sala_aula`
--
ALTER TABLE `numero_sala_aula`
  MODIFY `id_numero_sala_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `observacao_aluno`
--
ALTER TABLE `observacao_aluno`
  MODIFY `id_observacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `pcd`
--
ALTER TABLE `pcd`
  MODIFY `id_pcd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `periodo_disponivel`
--
ALTER TABLE `periodo_disponivel`
  MODIFY `id_periodo_disponivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `periodo_letivo`
--
ALTER TABLE `periodo_letivo`
  MODIFY `id_ano_letivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `rematricula`
--
ALTER TABLE `rematricula`
  MODIFY `id_rematricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `serie`
--
ALTER TABLE `serie`
  MODIFY `id_serie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `situacao_aluno_ano_letivo`
--
ALTER TABLE `situacao_aluno_ano_letivo`
  MODIFY `id_situacao_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `situacao_conta`
--
ALTER TABLE `situacao_conta`
  MODIFY `id_situacao_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `situacao_geral_aluno`
--
ALTER TABLE `situacao_geral_aluno`
  MODIFY `id_situacao_geral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `situacao_periodo_letivo`
--
ALTER TABLE `situacao_periodo_letivo`
  MODIFY `id_situacao_periodo_letivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `situacao_rematricula`
--
ALTER TABLE `situacao_rematricula`
  MODIFY `id_situacao_rematricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id_telefone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `tipo_sanguineo`
--
ALTER TABLE `tipo_sanguineo`
  MODIFY `id_tipo_sanguineo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  MODIFY `id_turma_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `turno`
--
ALTER TABLE `turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id_unidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_id_administrador_hierarquia_funcao` FOREIGN KEY (`fk_id_administrador_hierarquia_funcao`) REFERENCES `hierarquia_funcao` (`id_hierarquia_funcao`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_endereco_administrador` FOREIGN KEY (`fk_id_endereco_administrador`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pcd_administrador` FOREIGN KEY (`fk_id_pcd_administrador`) REFERENCES `pcd` (`id_pcd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_sexo_administrador` FOREIGN KEY (`fk_id_sexo_administrador`) REFERENCES `sexo` (`id_sexo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_situacao_conta_administrador` FOREIGN KEY (`fk_id_situacao_conta_administrador`) REFERENCES `situacao_conta` (`id_situacao_conta`),
  ADD CONSTRAINT `fk_id_telefone_administrador` FOREIGN KEY (`fk_id_telefone_administrador`) REFERENCES `telefone` (`id_telefone`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_tipo_sanguineo_administrador` FOREIGN KEY (`fk_id_tipo_sanguineo_administrador`) REFERENCES `tipo_sanguineo` (`id_tipo_sanguineo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_id_aluno_hierarquia_funcao` FOREIGN KEY (`fk_id_aluno_hierarquia_funcao`) REFERENCES `hierarquia_funcao` (`id_hierarquia_funcao`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_endereco_aluno` FOREIGN KEY (`fk_id_endereco_aluno`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pcd_aluno` FOREIGN KEY (`fk_id_aluno_pcd`) REFERENCES `pcd` (`id_pcd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_sexo_aluno` FOREIGN KEY (`fk_id_sexo_aluno`) REFERENCES `sexo` (`id_sexo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_situacao_geral_aluno` FOREIGN KEY (`fk_id_situacao_geral_aluno`) REFERENCES `situacao_geral_aluno` (`id_situacao_geral`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_telefone_aluno` FOREIGN KEY (`fk_id_telefone_aluno`) REFERENCES `telefone` (`id_telefone`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_tipo_sanguineo_aluno` FOREIGN KEY (`fk_id_tipo_sanguineo_aluno`) REFERENCES `tipo_sanguineo` (`id_tipo_sanguineo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_id_turma_disciplina_avaliacao` FOREIGN KEY (`fk_id_turma_disciplina_avaliacao`) REFERENCES `turma_disciplina` (`id_turma_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_unidade_avaliacao` FOREIGN KEY (`fk_id_unidade_avaliacao`) REFERENCES `unidade` (`id_unidade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `aviso_turma`
--
ALTER TABLE `aviso_turma`
  ADD CONSTRAINT `aviso_turma_ibfk_1` FOREIGN KEY (`fk_id_turma_disciplina`) REFERENCES `turma_disciplina` (`id_turma_disciplina`);

--
-- Limitadores para a tabela `configuracao`
--
ALTER TABLE `configuracao`
  ADD CONSTRAINT `fk_id_controle_unidade` FOREIGN KEY (`fk_id_controle_unidade`) REFERENCES `controle_unidade` (`id_controle_unidade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_rematricula` FOREIGN KEY (`fk_id_controle_rematricula`) REFERENCES `controle_rematricula` (`id_situacao_abertura_rematricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `modalidade` FOREIGN KEY (`fk_id_modalidade_curso`) REFERENCES `modalidade_curso` (`id_modalidade_curso`);

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_id_modalidade_disciplina` FOREIGN KEY (`fk_id_modalidade_disciplina`) REFERENCES `modalidade_disciplina` (`id_modalidade_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `falta_aluno`
--
ALTER TABLE `falta_aluno`
  ADD CONSTRAINT `id_matricula_falta` FOREIGN KEY (`fk_id_matricula_falta`) REFERENCES `matricula` (`id_matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_turma_disciplina_falta` FOREIGN KEY (`fk_id_turma_disciplina_falta`) REFERENCES `turma_disciplina` (`id_turma_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_unidade_falta` FOREIGN KEY (`fk_id_unidade_falta`) REFERENCES `unidade` (`id_unidade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_id_aluno` FOREIGN KEY (`fk_id_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_periodo_letivo_matricula` FOREIGN KEY (`fk_id_periodo_letivo_matricula`) REFERENCES `periodo_letivo` (`id_ano_letivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_situacao_aluno` FOREIGN KEY (`fk_id_situacao_aluno`) REFERENCES `situacao_aluno_ano_letivo` (`id_situacao_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_turma_matricula` FOREIGN KEY (`fk_id_turma_matricula`) REFERENCES `turma` (`id_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `media_disciplina`
--
ALTER TABLE `media_disciplina`
  ADD CONSTRAINT `id_legenda` FOREIGN KEY (`fk_id_legenda`) REFERENCES `legenda` (`id_legenda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_matricula_media` FOREIGN KEY (`fk_id_matricula_media`) REFERENCES `matricula` (`id_matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_turma_disciplina` FOREIGN KEY (`fk_id_turma_disciplina`) REFERENCES `turma_disciplina` (`id_turma_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `nota_avaliacao`
--
ALTER TABLE `nota_avaliacao`
  ADD CONSTRAINT `id_avaliacao` FOREIGN KEY (`fk_id_avaliacao`) REFERENCES `avaliacoes` (`id_avaliacao`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_matricula_aluno` FOREIGN KEY (`fk_id_matricula_aluno`) REFERENCES `matricula` (`id_matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `observacao_aluno`
--
ALTER TABLE `observacao_aluno`
  ADD CONSTRAINT `id_matricula_observacao` FOREIGN KEY (`fk_id_matricula_observacao`) REFERENCES `matricula` (`id_matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_turma_disciplina_observacao` FOREIGN KEY (`fk_id_turma_disciplina_observacao`) REFERENCES `turma_disciplina` (`id_turma_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_unidade` FOREIGN KEY (`fk_id_unidade`) REFERENCES `unidade` (`id_unidade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `periodo_letivo`
--
ALTER TABLE `periodo_letivo`
  ADD CONSTRAINT `fk_id_ano_letivo` FOREIGN KEY (`fk_id_ano_letivo`) REFERENCES `periodo_disponivel` (`id_periodo_disponivel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_situacao_periodo_letivo` FOREIGN KEY (`fk_id_situacao_periodo_letivo`) REFERENCES `situacao_periodo_letivo` (`id_situacao_periodo_letivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_id_endereco_professor` FOREIGN KEY (`fk_id_endereco_professor`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pcd_professor` FOREIGN KEY (`fk_id_pcd_professor`) REFERENCES `pcd` (`id_pcd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_professor_hierarquia_funcao` FOREIGN KEY (`fk_id_professor_hierarquia_funcao`) REFERENCES `hierarquia_funcao` (`id_hierarquia_funcao`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_sexo_professor` FOREIGN KEY (`fk_id_sexo_professor`) REFERENCES `sexo` (`id_sexo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_situacao_conta_professor` FOREIGN KEY (`fk_id_situacao_conta_professor`) REFERENCES `situacao_conta` (`id_situacao_conta`),
  ADD CONSTRAINT `fk_id_telefone_professor` FOREIGN KEY (`fk_id_telefone_professor`) REFERENCES `telefone` (`id_telefone`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_tipo_sanguineo_professor` FOREIGN KEY (`fk_id_tipo_sanguineo_professor`) REFERENCES `tipo_sanguineo` (`id_tipo_sanguineo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `rematricula`
--
ALTER TABLE `rematricula`
  ADD CONSTRAINT `fk_id_rematricula_aluno` FOREIGN KEY (`fk_id_rematricula_aluno`) REFERENCES `matricula` (`id_matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_situacao_rematricula` FOREIGN KEY (`fk_id_situacao_rematricula`) REFERENCES `situacao_rematricula` (`id_situacao_rematricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `fk_id_numero_sala` FOREIGN KEY (`fk_id_numero_sala`) REFERENCES `numero_sala_aula` (`id_numero_sala_aula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_id_cedula` FOREIGN KEY (`fk_id_cedula`) REFERENCES `cedula_turma` (`id_cedula_turma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_sala` FOREIGN KEY (`fk_id_sala`) REFERENCES `sala` (`id_sala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_ano_letivo` FOREIGN KEY (`fk_id_periodo_letivo`) REFERENCES `periodo_letivo` (`id_ano_letivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_curso` FOREIGN KEY (`fk_id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_serie` FOREIGN KEY (`fk_id_serie`) REFERENCES `serie` (`id_serie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_turno` FOREIGN KEY (`fk_id_turno`) REFERENCES `turno` (`id_turno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD CONSTRAINT `id_disciplina` FOREIGN KEY (`fk_id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_professor` FOREIGN KEY (`fk_id_professor`) REFERENCES `professor` (`id_professor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_turma` FOREIGN KEY (`fk_id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

```

Com as tabelas criadas, e necessário adicionar alguns dados iniciais, para isso, execute os códigos abaixo:

```sh

INSERT INTO situacao_periodo_letivo(situacao_periodo_letivo) values ('Ativo'),('Finalizado'),('Agendado');

insert into periodo_disponivel(ano_letivo) values ('2021'),('2022'),('2023'),('2024'),('2025'),('2026'),('2027'),('2028'),('2029'),('2030'),('2031'),('2032'),('2033'),('2034'),('2035'),('2036'),('2037'),('2038'),('2039'),('2040'),('2041'),('2042'),('2043'),('2044'),('2045'),('2046'),('2047'),('2048'),('2049'),('2050');

insert into numero_sala_aula (numero_sala_aula) values (01),(02),(03),(04),(05),(06),(07),(08),(09),(10),(11),(12),(13),(14),(15),(16),(17),(18),(19),(20),(21),(22),(23),(24),(25),(26),(27),(28),(29),(30),(31),(32),(33),(34),(35),(36),(37),(38),(39),(40);

insert into serie(nome,sigla) values ('Primeira','1'),('Segunda','2'),('Terceira','3');

insert into unidade(unidade) values ('1'),('2'),('3');

insert into turno(nome_turno) values ('Matutino'),('Vespertino'),('Noturno');

insert into modalidade_disciplina(modalidade_disciplina) values ('Ensino Técnico'),('Ensino Médio');

insert into cedula_turma (cedula) values ('A'),('B'),('C'),('D'),('E'),('F');

insert into sexo (sexo) values ('Masculino'),('Feminino');

insert into pcd (pcd) values ('Não'),('Sim');

insert into tipo_sanguineo(tipo_sanguineo) values ('Não informado'),('AB+'),('AB-'),('A+'),('A-'),('B+'),('B-'),('O+'),('O-');

insert into situacao_aluno_ano_letivo (situacao_aluno) values ('Matriculado'),('Aprovado'),('Reprovado'),('Mudou de turma');

INSERT INTO situacao_geral_aluno (`situacao_geral`) VALUES ('Matriculado'),('Desistente'),('Concluído');

insert into hierarquia_funcao(hierarquia_funcao) values ('Administrador'),('Co-administrador'),('Docente'),('Aluno');

INSERT INTO telefone (numero_telefone) VALUES (75988787643);

INSERT INTO endereco (cep , bairro , endereco , municipio , uf) VALUES (48601340 , 'Centro' , 'Rua São Jorge n 100' , 'Paulo Afonso' , 'BA');

INSERT INTO situacao_conta (situacao_conta) VALUES ('Ativa'),('Desativada');

INSERT INTO administrador(codigo_acesso , cpf_administrador , data_nascimento_administrador , email_administrador , nacionalidade_administrador , naturalidade_administrador , nome_administrador , foto_perfil_administrador , fk_id_tipo_sanguineo_administrador , fk_id_sexo_administrador , fk_id_pcd_administrador , fk_id_telefone_administrador , fk_id_endereco_administrador , fk_id_administrador_hierarquia_funcao, fk_id_situacao_conta_administrador) VALUES (867532 , 73893245723 , '2001-10-09' , 'usuariopadrao@gmail.com' , 'Brasileiro' , 'Paulo Afonso' , 'Usuário Padrão' , 'foto-vazia.jpg' , 1 , 1 , 1 , 1 , 1 , 1 , 1);

INSERT INTO legenda(legenda) VALUES ('Aprovado', 'AP'),('Reprovado', 'RP'),('Regime de Progressão Parcial', 'RPP'),('Reprovado por Falta', 'RPF'),('Recuperação Final', 'RF');

INSERT INTO controle_rematricula(situacao) VALUE ('Aberta'),('Fechada');

INSERT INTO controle_unidade(situacao)VALUES("Somente a Primeira"),("Primeira e Segunda"),("Todas");

INSERT INTO situacao_rematricula(situacao)VALUES('Sim'),('Não');

INSERT INTO configuracao(fk_id_controle_unidade , fk_id_controle_rematricula) VALUES (1, 2);

INSERT INTO `modalidade_curso` (`modalidade_curso`, `modalidade_curso_sigla`) VALUES ('Ensino Médio', 'EM'), ('Ensino Profissional, médio integrado', 'ET');

```

Agora você já pode acessar a aplicação atráves do seu navegador com a url localhost, seguido da porta onde seu servidor web está rodando, no exemplo abaixo como o meu XAMPP estava na porta 8000, a url ficou a seguinte:

```sh
http://localhost:8000
```

O primeiro portal que você deve acessar e o portal do admin, nele você irá configurar a sua escolar. O usuário e o código de acesso para o primeiro acesso estão abaixo:

| Usuário | Código de acesso |
| ------ | ------ |
| Usuário Padrão | 867532 |

Caso você deseje conhecer como funciona cada componente do sistema dentro da pasta de download há o PDF da documentação do TCC da nossa equipe, nele esta há a explição de cada componente do Exitus.

> Obs: Na pasta img dentro de public/assets existem três pastas, são elas: adminProfilePhotos | teacherProfilePhotos | studentProfilePhotos . Quando você baixar o projeto você irá notar que já existem algumas fotos dentro dessa pasta, então elimine as mesmas, menos a "foto-vazia.jpg".  

O Exitus foi desenvolvido por Everton Andrade, João Pedro e Matheus de Souza, Exs alunos do CETEPI-I da cidade de Paulo Afonso. 







