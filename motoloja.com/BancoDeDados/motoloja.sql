-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/12/2023 às 13:21
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `motoloja`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adminusers`
--

CREATE TABLE `adminusers` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permissao` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adminusers`
--

INSERT INTO `adminusers` (`id`, `nome`, `email`, `password`, `permissao`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'rodrigo', 'rodriguin@gmail.com', '$2y$10$2SjScbdVSUyAZdV7z.sBRerT0n8R511VjsBS9Oqct1kHUKL2m1oDO', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `idClientes` int(10) NOT NULL,
  `nomeCompleto` varchar(255) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `dataNascimento` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cupondescontos`
--

CREATE TABLE `cupondescontos` (
  `idCuponsDesconto` int(10) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedidos` int(10) NOT NULL,
  `idClientes` int(10) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `precoFrete` decimal(10,2) NOT NULL,
  `precoDesconto` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL,
  `idCuponDesc` int(10) NOT NULL,
  `statusPedidoEnvio` int(10) NOT NULL,
  `codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidosenvios`
--

CREATE TABLE `pedidosenvios` (
  `idPedidosEnvios` int(10) NOT NULL,
  `IdPedidos` int(10) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `dataEnvio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidospagamentos`
--

CREATE TABLE `pedidospagamentos` (
  `idPedidosPagamentos` int(10) NOT NULL,
  `idPedidos` int(10) NOT NULL,
  `formaPagamento` varchar(50) NOT NULL,
  `valorPago` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidosprodutos`
--

CREATE TABLE `pedidosprodutos` (
  `idPedidos` int(10) NOT NULL,
  `idProdutos` int(10) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProdutos` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(455) NOT NULL,
  `preco` double(10,2) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `estoque` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idProdutos`, `nome`, `descricao`, `preco`, `idCategoria`, `estoque`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Pastilha Freio Moto Cerâmica 675 Street', 'Pastilha Freio Moto Cerâmica 675 Street WR250X 2008 a 2017 Dianteira Cobreq N930C', 82.52, 1, 20, 1, '2023-12-02 12:04:57', '2023-12-02 12:04:57', NULL),
(6, 'Kit Carenagem Titan 150 2008 Pro Tork', 'Kit Carenagem Titan 150 2008 Pro Tork 003-5006 Azul Caraiva Perolizado 6 Peças', 144.60, 1, 10, 1, '2023-12-02 12:08:43', '2023-12-02 12:08:43', NULL),
(7, 'Capacete Moto Aberto Pro Tork New Liberty 3', 'Capacete Moto Aberto Pro Tork New Liberty 3 Elite Unissex', 142.79, 2, 15, 1, '2023-12-02 12:12:26', '2023-12-02 12:14:56', NULL),
(8, 'Capa Chuva Impermeável Moto Protercapas', 'Capa Chuva Impermeável Moto Protercapas', 108.59, 2, 7, 1, '2023-12-02 12:14:39', '2023-12-02 12:14:39', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos_categorias`
--

CREATE TABLE `produtos_categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `url_amigavel` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos_categorias`
--

INSERT INTO `produtos_categorias` (`id`, `nome`, `url_amigavel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Peças', 'pecas', '2023-10-23 16:39:05', '2023-10-23 16:45:24', NULL),
(2, 'Acessórios', 'acessorios', '2023-10-23 16:40:40', '2023-10-23 16:40:40', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos_imagens`
--

CREATE TABLE `produtos_imagens` (
  `id` int(11) NOT NULL,
  `idProdutos` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `imagem` text NOT NULL,
  `imagemPrincipal` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos_imagens`
--

INSERT INTO `produtos_imagens` (`id`, `idProdutos`, `nome`, `imagem`, `imagemPrincipal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 5, 'C:\\xampp\\tmp\\phpC68D.tmp', '1701518764.jpg', 1, '2023-12-02 12:06:04', '2023-12-02 12:06:08', NULL),
(10, 5, 'C:\\xampp\\tmp\\php30A2.tmp', '1701518791.jpg', 0, '2023-12-02 12:06:31', '2023-12-02 12:06:31', NULL),
(11, 5, 'C:\\xampp\\tmp\\php785B.tmp', '1701518810.jpg', 0, '2023-12-02 12:06:50', '2023-12-02 12:06:50', NULL),
(12, 6, 'C:\\xampp\\tmp\\phpBCDD.tmp', '1701518958.jpg', 1, '2023-12-02 12:09:18', '2023-12-02 12:09:20', NULL),
(13, 6, 'C:\\xampp\\tmp\\php5E5E.tmp', '1701519000.jpg', 0, '2023-12-02 12:10:00', '2023-12-02 12:10:00', NULL),
(14, 7, 'C:\\xampp\\tmp\\phpEA78.tmp', '1701519167.jpg', 1, '2023-12-02 12:12:47', '2023-12-02 12:12:48', NULL),
(15, 7, 'C:\\xampp\\tmp\\php1C96.tmp', '1701519179.jpg', 0, '2023-12-02 12:12:59', '2023-12-02 12:12:59', NULL),
(16, 7, 'C:\\xampp\\tmp\\php5375.tmp', '1701519194.jpg', 0, '2023-12-02 12:13:14', '2023-12-02 12:13:14', NULL),
(17, 8, 'C:\\xampp\\tmp\\phpA779.tmp', '1701519346.jpg', 1, '2023-12-02 12:15:46', '2023-12-02 12:15:48', NULL),
(18, 8, 'C:\\xampp\\tmp\\php634.tmp', '1701519370.jpg', 0, '2023-12-02 12:16:10', '2023-12-02 12:16:10', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idClientes`);

--
-- Índices de tabela `cupondescontos`
--
ALTER TABLE `cupondescontos`
  ADD PRIMARY KEY (`idCuponsDesconto`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedidos`),
  ADD KEY `idClientes` (`idClientes`);

--
-- Índices de tabela `pedidosenvios`
--
ALTER TABLE `pedidosenvios`
  ADD PRIMARY KEY (`idPedidosEnvios`),
  ADD KEY `IdPedidos` (`IdPedidos`);

--
-- Índices de tabela `pedidospagamentos`
--
ALTER TABLE `pedidospagamentos`
  ADD PRIMARY KEY (`idPedidosPagamentos`),
  ADD KEY `idPedidos` (`idPedidos`);

--
-- Índices de tabela `pedidosprodutos`
--
ALTER TABLE `pedidosprodutos`
  ADD KEY `idPedidos` (`idPedidos`),
  ADD KEY `idProdutos` (`idProdutos`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProdutos`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Índices de tabela `produtos_categorias`
--
ALTER TABLE `produtos_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos_imagens`
--
ALTER TABLE `produtos_imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProdutos` (`idProdutos`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cupondescontos`
--
ALTER TABLE `cupondescontos`
  MODIFY `idCuponsDesconto` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedidos` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidosenvios`
--
ALTER TABLE `pedidosenvios`
  MODIFY `idPedidosEnvios` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidospagamentos`
--
ALTER TABLE `pedidospagamentos`
  MODIFY `idPedidosPagamentos` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProdutos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produtos_categorias`
--
ALTER TABLE `produtos_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos_imagens`
--
ALTER TABLE `produtos_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idClientes`) REFERENCES `clientes` (`idClientes`);

--
-- Restrições para tabelas `pedidosenvios`
--
ALTER TABLE `pedidosenvios`
  ADD CONSTRAINT `pedidosenvios_ibfk_1` FOREIGN KEY (`IdPedidos`) REFERENCES `pedidos` (`idPedidos`);

--
-- Restrições para tabelas `pedidospagamentos`
--
ALTER TABLE `pedidospagamentos`
  ADD CONSTRAINT `pedidospagamentos_ibfk_1` FOREIGN KEY (`idPedidos`) REFERENCES `pedidos` (`idPedidos`);

--
-- Restrições para tabelas `pedidosprodutos`
--
ALTER TABLE `pedidosprodutos`
  ADD CONSTRAINT `pedidosprodutos_ibfk_1` FOREIGN KEY (`idPedidos`) REFERENCES `pedidos` (`idPedidos`),
  ADD CONSTRAINT `pedidosprodutos_ibfk_2` FOREIGN KEY (`idProdutos`) REFERENCES `produtos` (`idProdutos`);

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `produtos_categorias` (`id`);

--
-- Restrições para tabelas `produtos_imagens`
--
ALTER TABLE `produtos_imagens`
  ADD CONSTRAINT `produtos_imagens_ibfk_1` FOREIGN KEY (`idProdutos`) REFERENCES `produtos` (`idProdutos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
