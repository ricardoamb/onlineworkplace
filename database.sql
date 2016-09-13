CREATE TABLE `owp_cadastro` (
  `id_cadastro` bigint(11) NOT NULL,
  `id_pessoa` bigint(11) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keycode` varchar(32) NOT NULL,
  `nome_de_usuario` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `reset_senha` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '0',
  `data_ativacao` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `owp_pessoa` (
  `id_pessoa` bigint(11) NOT NULL,
  `id_pessoa_tipo` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `owp_pessoa_dados` (
  `id_pessoa_dados` bigint(11) NOT NULL,
  `id_pessoa` bigint(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` int(10) NOT NULL,
  `bairro` varchar(64) NOT NULL,
  `cep` int(8) NOT NULL,
  `cidade` int(7) NOT NULL,
  `estado` int(7) NOT NULL,
  `pais` int(7) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '0',
  `expira_senha` tinyint(1) NOT NULL DEFAULT '1',
  `data_expira_senha` timestamp NOT NULL,
  `rep_pessoa_juridica` tinyint(1) NOT NULL DEFAULT '0',
  `id_pessoa_juridica` int(11) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `owp_pessoa_fisica` (
  `id_pessoa_fisica` bigint(11) NOT NULL,
  `id_pessoa` bigint(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` int(11) NOT NULL,
  `rg` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `owp_pessoa_juridica` (
  `id_pessoa_juridica` bigint(11) NOT NULL,
  `id_pessoa` bigint(11) NOT NULL,
  `razao_social` varchar(255) NOT NULL,
  `nome_fantasia` varchar(255) NOT NULL,
  `cnpj` int(14) NOT NULL,
  `ie` varchar(32) NOT NULL,
  `im` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `owp_pessoa_tipo` (
  `id_pessoa_tipo` int(1) NOT NULL,
  `pessoa_tipo` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `owp_cadastro`
  ADD PRIMARY KEY (`id_cadastro`),
  ADD UNIQUE KEY `nome_de_usuario` (`nome_de_usuario`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `owp_pessoa`
  ADD PRIMARY KEY (`id_pessoa`),
  ADD UNIQUE KEY `id_pessoa_tipo` (`id_pessoa_tipo`);

ALTER TABLE `owp_pessoa_dados`
  ADD PRIMARY KEY (`id_pessoa_dados`),
  ADD UNIQUE KEY `id_pessoa` (`id_pessoa`);

ALTER TABLE `owp_pessoa_fisica`
  ADD PRIMARY KEY (`id_pessoa_fisica`),
  ADD UNIQUE KEY `id_pessoa` (`id_pessoa`);

ALTER TABLE `owp_pessoa_juridica`
  ADD PRIMARY KEY (`id_pessoa_juridica`),
  ADD UNIQUE KEY `id_pessoa` (`id_pessoa`);

ALTER TABLE `owp_cadastro`
  MODIFY `id_cadastro` bigint(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `owp_pessoa`
  MODIFY `id_pessoa` bigint(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `owp_pessoa_dados`
  MODIFY `id_pessoa_dados` bigint(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `owp_pessoa_fisica`
  MODIFY `id_pessoa_fisica` bigint(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `owp_pessoa_juridica`
  MODIFY `id_pessoa_juridica` bigint(11) NOT NULL AUTO_INCREMENT;