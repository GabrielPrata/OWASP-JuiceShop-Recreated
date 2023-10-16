-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2023 às 01:06
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `juiceshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `categoryname`) VALUES
(1, 'juice'),
(2, 'clothes'),
(3, 'others');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`id`, `userId`, `productId`, `content`) VALUES
(1, 11, 1, 'Muito bom HAHAHAHAHAHAHAHAAHAHA'),
(2, 11, 1, 'MUITO RUIM AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
(3, 4, 3, 'Teste comentários'),
(4, 11, 10, 'teste comentario'),
(5, 11, 14, 'Vitamina ccccccccccccccccccccccccccccccccccccccccccc');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category`) VALUES
(1, 'Bolo de Maçã', 'O melhor bolo de maçã!\r\nIsenção de responsabilidade sobre alergia: pode conter vestígios de vermes.', 3),
(2, 'Suco de Maçã', 'O clássico de todos os tempos.', 1),
(3, 'Suco de Banana', 'O predileto dos primatas.', 1),
(4, 'Suco de Cenoura', 'Como diz o velho ditado alemão: \"As cenouras fazem bem aos olhos. Ou alguém já viu um coelho com óculos?\"', 1),
(5, 'Suco de EggFruit', 'Agora com um sabor ainda mais exótico.', 1),
(6, 'Máscara Facial', 'Máscara facial com compartimento para filtro em 50% algodão e 50% poliéster.', 2),
(7, 'Camisa Feminina', 'Camisa feminina no estilo Baby look', 2),
(8, 'Moletom', 'Roupa estilo Mr. Robot. Mas em preto. E com logotipo', 2),
(9, 'Prensa de Suco', 'As frutas entram. O suco sai. O bagaço você pode nos enviar de volta para fins de reciclagem.', 3),
(10, 'Suco Verde', 'Parece venenoso, mas na verdade é muito bom para a saúde! Feito de repolho verde, espinafre, kiwi e grama.', 1),
(11, 'Limonada', 'Azedo, mas cheio de vitaminas.', 1),
(12, 'Bicicleta de Melancia', 'As rodas desta bicicleta são feitas de melancias reais. Você pode não querer subir ou descer o meio-fio com muita força', 3),
(13, 'Suco de Laranja', 'Feito com laranjas colhidas a dedo pelo tio Dittmeyer.', 1),
(14, 'Suco de Marmelo', 'Suco da fruta Cydonia oblonga. Não é exatamente doce, mas rico em vitamina C', 1),
(15, 'Suco de RaspBerry', 'Feito com uma mistura de Raspberry Pi, água e açúcar.', 1),
(16, 'Suco de Morango', 'Doce e saboroso!', 1),
(17, 'Tattoo Temporária', 'Faça uma dessas tatuagens temporárias para usar com orgulho o logotipo da OWASP Juice Shop ou CTF Extension em sua pele! Se você twittar uma foto sua com a tatuagem, receberá alguns de nossos adesivos de graça! Mencione @owasp_juiceshop em seu tweet', 3),
(18, 'Suco de Woodruff', 'Colhido e fabricado na Floresta Negra, Alemanha. Pode causar comportamento hiperativo em crianças. Pode causar língua verde permanente quando consumido não diluído.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(120) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`) VALUES
(1, 'João Silva', 'joao.silva@gmail.com', '123456', 0),
(2, 'Maria Santos', 'maria.santos@hotmail.com', 'senha123', 0),
(3, 'Pedro Oliveira', 'pedro.oliveira@outlook.com', 'abcdef', 0),
(4, 'Ana Pereira', 'ana.pereira@gmail.com', 'qwerty', 0),
(5, 'Lucas Fernandes', 'lucas.fernandes@hotmail.com', 'senha', 0),
(6, 'Mariana Lima', 'mariana.lima@gmail.com', '123abc', 0),
(7, 'Felipe Costa', 'felipe.costa@outlook.com', '123456789', 0),
(8, 'Sofia Rodrigues', 'sofia.rodrigues@hotmail.com', 'senha1234', 0),
(9, 'Matheus Alves', 'matheus.alves@gmail.com', 'abcd1234', 0),
(10, 'Larissa Santos', 'larissa.santos@hotmail.com', 'senha@123', 0),
(11, 'Gabriel Prata', 'gabrielsprata@hotmail.com', 'novasenha', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category` (`category`) USING BTREE;

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2360;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_idProduct` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comment_idUser` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
