-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: db:3306
-- Tiempo de generación: 01-12-2025 a las 00:26:46
-- Versión del servidor: 8.1.0
-- Versión de PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritocompras`
--

CREATE TABLE `carritocompras` (
  `id_carrito` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad_carrito` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `carritocompras`
--

INSERT INTO `carritocompras` (`id_carrito`, `id_usuario`, `id_producto`, `cantidad_carrito`) VALUES
(79, 3, 12, 2),
(80, 3, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_temp`
--

CREATE TABLE `carrito_temp` (
  `id_carrito` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad_carrito` int NOT NULL,
  `guest_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `carrito_temp`
--

INSERT INTO `carrito_temp` (`id_carrito`, `id_producto`, `cantidad_carrito`, `guest_token`) VALUES
(21, 10, 1, 'e3ceace52eb7fe8247ab2a0b204f02b5'),
(25, 12, 1, 'c89d32da94cd3e6521f197b36dc91c1c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialcompras`
--

CREATE TABLE `historialcompras` (
  `id_compra` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `fecha_compra` timestamp NOT NULL,
  `precio_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `historialcompras`
--

INSERT INTO `historialcompras` (`id_compra`, `id_usuario`, `id_producto`, `cantidad`, `fecha_compra`, `precio_total`) VALUES
(2, 1, 4, 1, '2025-11-26 01:20:10', 960.00),
(5, 1, 4, 1, '2025-11-26 01:22:37', 960.00),
(6, 1, 4, 1, '2025-11-26 01:22:46', 960.00),
(7, 1, 4, 1, '2025-11-26 01:23:17', 960.00),
(8, 1, 4, 1, '2025-11-26 01:24:08', 960.00),
(11, 1, 4, 1, '2025-11-26 01:30:11', 960.00),
(14, 1, 21, 1, '2025-11-26 01:30:11', 1150.00),
(15, 1, 14, 1, '2025-11-26 01:44:29', 690.00),
(17, 3, 10, 1, '2025-11-26 01:47:40', 970.00),
(18, 3, 30, 1, '2025-11-26 01:48:33', 1155.00),
(19, 3, 6, 1, '2025-11-26 01:49:17', 555.00),
(20, 1, 8, 4, '2025-11-26 01:50:05', 585.00),
(21, 1, 9, 2, '2025-11-26 01:50:49', 995.00),
(22, 3, 14, 1, '2025-11-26 01:54:19', 690.00),
(23, 1, 10, 1, '2025-11-26 02:42:27', 970.00),
(24, 1, 8, 1, '2025-11-26 02:42:27', 585.00),
(25, 1, 10, 1, '2025-11-26 02:51:00', 970.00),
(26, 5, 30, 1, '2025-11-26 03:05:43', 1155.00),
(27, 5, 28, 1, '2025-11-26 03:05:43', 499.00),
(28, 5, 43, 1, '2025-11-26 03:05:43', 1300.00),
(29, 5, 18, 1, '2025-11-26 03:07:07', 665.00),
(30, 5, 6, 9, '2025-11-26 18:14:20', 555.00),
(31, 5, 11, 6, '2025-11-26 18:15:08', 1350.00),
(32, 5, 11, 1, '2025-11-26 18:15:46', 1350.00),
(33, 5, 11, 4, '2025-11-26 18:36:31', 1350.00),
(34, 5, 6, 40, '2025-11-26 18:38:32', 555.00),
(35, 5, 11, 2, '2025-11-26 18:48:42', 1350.00),
(36, 1, 10, 2, '2025-11-26 19:19:02', 970.00),
(37, 1, 8, 1, '2025-11-26 19:19:02', 585.00),
(38, 3, 10, 4, '2025-11-26 19:46:49', 970.00),
(39, 1, 10, 1, '2025-11-26 19:47:55', 970.00),
(40, 1, 9, 1, '2025-11-26 19:47:55', 995.00),
(41, 1, 23, 1, '2025-11-26 19:47:55', 670.00),
(42, 1, 5, 1, '2025-11-26 20:26:07', 715.00),
(43, 1, 8, 1, '2025-11-26 21:34:51', 585.00),
(44, 1, 16, 1, '2025-11-26 21:35:15', 1195.00),
(45, 1, 16, 1, '2025-11-26 21:35:39', 1195.00),
(46, 1, 37, 1, '2025-11-26 21:37:29', 590.00),
(47, 1, 44, 2, '2025-11-26 21:37:29', 575.00),
(48, 1, 4, 2, '2025-11-26 21:37:29', 960.00),
(49, 1, 4, 1, '2025-11-26 21:48:08', 960.00),
(50, 1, 5, 1, '2025-11-26 21:48:08', 715.00),
(51, 1, 7, 1, '2025-11-26 21:48:08', 875.00),
(52, 1, 8, 1, '2025-11-26 21:48:08', 585.00),
(53, 1, 5, 2, '2025-11-26 23:44:59', 715.00),
(54, 1, 10, 2, '2025-11-26 23:44:59', 970.00),
(55, 1, 21, 6, '2025-11-26 23:45:41', 1150.00),
(56, 1, 10, 1, '2025-11-26 23:46:21', 970.00),
(57, 1, 8, 1, '2025-11-26 23:54:46', 585.00),
(58, 1, 14, 1, '2025-11-26 23:57:58', 690.00),
(59, 1, 35, 2, '2025-11-27 01:03:59', 750.00),
(60, 1, 34, 1, '2025-11-27 01:03:59', 525.00),
(61, 6, 26, 1, '2025-11-30 20:02:06', 520.00),
(62, 6, 46, 1, '2025-11-30 20:02:06', 610.00),
(63, 6, 12, 2, '2025-11-30 20:03:52', 670.00),
(64, 5, 28, 1, '2025-11-30 20:04:16', 499.00),
(65, 1, 5, 1, '2025-11-30 20:05:10', 715.00),
(66, 3, 9, 1, '2025-11-30 22:46:16', 995.00),
(67, 3, 10, 2, '2025-11-30 22:46:16', 970.00),
(68, 5, 15, 1, '2025-11-30 22:56:06', 665.00),
(69, 1, 5, 1, '2025-11-30 22:56:10', 715.00),
(70, 1, 6, 1, '2025-11-30 23:54:25', 555.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad_stock` int NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `cantidad_stock`, `fabricante`, `origen`, `imagen`, `categoria`) VALUES
(4, 'Pro Filt\'r Soft Matte Longwear Foundation', 'Base de maquillaje matte de larga duración con una cobertura edificable, media a completa, en un rango de 50 tonos que rompe los límites.', 960.00, 12, 'Fenty Beauty', 'USA', 'fentyfilter.png', 'Bases'),
(5, 'We\'re Even Hydrating Concealer', 'Un corrector hidratante que dura 12 horas con una gama de 50 tonos de cobertura media con un acabado natural como una segunda piel.\r\n\r\n', 715.00, 19, 'Fenty Beauty', 'USA', 'correcfenty.png', 'Corrector'),
(6, 'Gloss Bomb Stix', 'La barra de labios de brillo intenso Gloss Bomb Stix, enriquecida con escualeno, vitamina E y manteca de karité, mantiene la hidratación en los labios hasta por 8 horas.', 555.00, 9, 'Fenty Beauty', 'USA', 'labifenty.png', 'Labiales'),
(7, 'Eaze Drop Blurring Skin Tint', 'Una tinta que brinda una piel suave y difuminada al instante con una cobertura edificable de ligera a media, en tonos flexibles para todos.\r\n\r\n', 875.00, 11, 'Fenty Beauty', 'USA', 'fentint.png', 'Bases'),
(8, 'Cloud Paint Gel Cream Bronzer', 'Bronceador en gel-crema fácil de aplicar que aporta un toque natural de color, volumen y luminosidad. Con pigmentos difuminadores para un acabado perfecto.\r\n\r\n', 585.00, 11, 'Glossier', 'USA', 'glosbron.png', 'Bronzer'),
(9, 'Major Headlines Double-take Crème & Powder Blush Duo ', 'Un dúo compacto viral de rubor en polvo y en crema que logra un color intenso y duradero que se funde con la piel y proporciona un brillo radiante y hermoso.\r\n\r\n\r\n', 995.00, 36, 'Patrick Ta', 'USA', 'ptblush.png', 'Rubor'),
(10, 'Born This Way Foundation', 'Too Faced Born This Way Indetectable Medium-to-Full Coverage Foundation es una base sin aceite que ofrece una cobertura natural media a completa. Esta base difunde magistralmente la línea entre el maquillaje y la piel. Cobertura tan indetectable, ellos pensarán que naciste así.\r\n', 970.00, 0, 'Too Faced', 'USA', 'bornthisway.png', 'Bases'),
(11, 'Easy Eye Palette The Super Nudes', 'Paleta de sombra para ojos.', 1350.00, 0, 'Charlotte Tilbury', 'Reino Unido', 'ctsombra.png', 'Sombras'),
(12, 'Badgal Bounce Mascara Voluminizadora', '¡La máscara que da volumen y esponja tus pestañas!', 670.00, 24, 'Benefit', 'USA', 'bounceben.png', 'Rímel'),
(13, 'Stay-Matte Sheer Pressed Powder', 'Fórmula libre de aceite que absorbe el brillo. Su textura translúcida proporciona a la piel un acabado mate.\r\n\r\n', 840.00, 20, 'Clinique', 'USA', 'polvocli.png', 'Polvos'),
(14, 'Positive Light Liquid Luminizer', 'Un sedoso iluminador líquido –como segunda piel- que crea un acabado luminoso, suave y duradero.\r\n', 690.00, 36, 'Rare Beauty', 'USA', 'rareilu.png', 'Iluminador'),
(15, 'Soft Pinch Liquid Blush', 'Un blush líquido ligero y de larga duración que se difumina y difumina a la perfección para conseguir un rubor suave y saludable. Disponible en acabados mate y húmedo.                                                                      ', 665.00, 19, 'Rare Beauty', 'USA', 'softpinch.png', 'Rubor'),
(16, 'Translucent Loose Talc-Free Setting Powder Ultra-Blur', 'El polvo fijador suelto translúcido favorito de culto, ahora sin talco y con un poder ultradifuminador.', 1195.00, 12, 'Laura Mercier', 'Francia', 'icon-polvos.png', 'Polvos'),
(17, 'Cloud Paint', 'Rubor en gel-crema translúcido y fácil de aplicar que contiene pigmentos difuminadores para conseguir un color de mejillas natural, sin imperfecciones, sin brillos y con un efecto luminoso.\r\n\r\n', 585.00, 50, 'Glossier', 'USA', 'cloudpaint.png', 'Rubor'),
(18, 'Better Than Sex Easy Glide Liquid Eyeliner Chocolate', 'Tu delineador de ojos favorito, ¡ahora en un delicioso tono marrón chocolate!', 665.00, 39, 'Too Faced', 'USA', 'icon-delineador.png', 'Delineador'),
(19, 'Blush Filter', 'Blush Filter es un blush líquido ligero con pigmentos modulables y microperlas finamente molidas que proporcionan un brillo suave y de gran impacto.', 585.00, 20, 'Huda Beauty', 'EAU', 'hudarubor.png', 'Rubor'),
(20, 'Brow Powmade', 'POWmade desliza poderosamente en tus cejas y se empareja perfectamente con nuestra brocha para cejas: Dual-Ended Angled Eyebrow Brush (se vende por separado) para una aplicación controlada y precisa.                \r\n\r\n', 600.00, 50, 'Benefit', 'USA', 'icon-para cejas.png', 'Para Cejas'),
(21, 'Dual Ended Precision Blush Brush', 'Una brocha de precisión para rubor de doble punta que proporciona el máximo control del color y distribución perfecta al aplicar fórmulas en crema y polvo.', 1150.00, 5, 'Patrick Ta', 'USA', 'brochata.png', 'Brochas'),
(22, 'Blush Filter Palette', 'Una paleta de rubores etéreos de edición limitada con 3 rubores en polvo mate ultrapigmentados y 1 iluminador. Úsalo solo o combina los tonos para conseguir un look etéreo.', 1125.00, 30, 'Huda Beauty', 'EAU', 'somhud.png', 'Rubor'),
(23, 'Power Bullet Cream Glow Hydrating Lipstick', 'Barras de labios ultra hidratantes y ultra cómodas en 14 tonos diferentes con todo incluido para un acabado natural de aspecto más completo y húmedo.', 670.00, 11, 'Huda Beauty', 'EAU', 'hudlab.png', 'Labiales'),
(24, 'Soft Pinch Tinted Lip Oil', 'Un innovador tinte labial en gel que hidrata y nutre con una suave pizca de color que permanece confortable -nunca pegajoso- durante todo el día.                                                                 ', 585.00, 35, 'Rare Beauty', 'USA', 'labrare.png', 'Labiales'),
(25, 'Gloss Bomb Universal Lip Luminizer', 'El gloss absolutamente imprescindible y tentador que es tan bonito como delicioso sobre los labios.', 500.00, 20, 'Fenty Beauty', 'USA', 'fentygloss.png', 'Labiales'),
(26, 'Benetint', 'Tinta para labios y mejillas.', 520.00, 24, 'Benefit', 'USA', 'benetint.png', 'Labiales'),
(27, 'Lip Injection Extreme Lip Plumper', 'Gloss plumping que brinda resultados intantáneos y a largo plazo.\r\n\r\n', 490.00, 12, 'Too Faced', 'USA', 'lipiny.png', 'Labiales'),
(28, 'Almost Lipstick ', 'Un bálsamo labial ultraligero y universalmente favorecedor en un tono icónico que cualquiera puede usar porque crea una apariencia de labios única en todos.\r\n', 499.00, 28, 'Clinique', 'USA', 'blackhoney.png', 'Labiales'),
(29, 'Balm Dotcom', 'Bálsamo labial hidratante con antioxidantes y emolientes que nutren los labios secos, dejándolos con un aspecto suave e hidratado, no contiene brillo.\r\n\r\n', 350.00, 12, 'Glossier', 'USA', 'gloss.png', 'Labiales'),
(30, 'Major Dimension Eye Illusion Eyeshadow Duo', 'Un dúo de sombras brillantes que ilumina los ojos con destellos ultrafinos y pigmentos perlados multidimensionales.\r\n\r\n', 1155.00, 10, 'Patrick Ta', 'USA', 'somta.png', 'Sombras'),
(31, 'Cheeky Love Letter', 'Mini paleta de blush y bronceador.', 1100.00, 5, 'Benefit', 'USA', 'bensom.png', 'Rubor'),
(32, 'Major Dimension Artistry Palette Eyeshadow', 'Una colección de tres paletas de sombras de ojos en acabado mate seleccionadas por Patrick con tonos neutros para el día a día que se adaptan a todos los tonos de piel.\r\n\r\n', 1130.00, 4, 'Patrick Ta', 'USA', 'tasom2.png', 'Sombras'),
(33, 'Mini Hollywood Blush & Glow ', 'Paleta para mejillas.', 645.00, 12, 'Charlotte Tilbury', 'Reino Unido', 'char.png', 'Rubor'),
(34, 'Lidstar Long-Wearing Shimmer Cream Eyeshadow', 'Sombra de ojos en crema, sedosa, de larga duración y que no se corre, para un color intenso con un brillo multidimensional.', 525.00, 29, 'Glossier', 'USA', 'somglos.png', 'Sombras'),
(35, 'Quickie Queen Eyeshadow ', 'Lápiz de sombra en crema combina pigmentación intensa, fácil aplicación y duración extrema en un solo producto.\r\n', 750.00, 6, 'Too Faced', 'USA', 'toosh.png', 'Sombras'),
(36, 'Nude Obsessions Eyeshadow Palette ', 'Una gama de paletas de sombras de ojos compactas que ofrece a los amantes de la belleza un vestuario completo para el color de los ojos de día a noche.\r\n', 790.00, 14, 'Huda Beauty', 'EAU', 'hnude.png', 'Sombras'),
(37, 'All of the Above Weightless Eyeshadow Stick', 'Una sombra de ojos en barra súper cremosa que permite delinear, sombrear, difuminar e iluminar los ojos en un solo gesto con un color resistente a las arrugas.                                                             ', 590.00, 19, 'Rare Beauty', 'USA', 'rarsom.png', 'Sombras'),
(38, 'Matte Obsessions Eyeshadow Palette', 'Lleva tus mates a las rocas con malvas helados, rosas de ensueño, morados pastel y marrones escarchados. Todo lo que necesitas para el día a día: una paleta de sombras de ojos mate que incluye 9 tonos clásicos, fríos o cálidos, en polvo mate ultrapigmentado, adecuados para todos los tonos de piel.', 790.00, 15, 'Huda Beauty', 'EAU', 'husha.png', 'Sombras'),
(39, 'Even Better Clinical Serum Foundation SPF 20 ', 'Nuestra primera base clínica con 3 tecnologías de sueros. Esta revolucionaria fórmula sin aceite incluye ácido hialurónico, ácido salicílico y vitamina C + UP302 para dejar la piel con un aspecto aún mejor.                  \r\n\r\n', 999.00, 18, 'Clinique', 'USA', 'clib.png', 'Bases'),
(40, 'Easy Blur Foundation', 'Una base de maquillaje ligera y de cobertura media-alta, no comedogénica y ultra-difuminadora para un acabado difuminado.\r\n\r\n', 900.00, 22, 'Huda Beauty', 'EAU', 'easyblur.png', 'Bases'),
(41, '#FAUXFILER Luminous Matte', 'Tu filtro favorito en una botella ha vuelto, ¡y está mejor que nunca! Con la misma cobertura total y propiedades duraderas, que conoces y amas de la fórmula OG, pero con uso flexible las 24 horas, un acabado mate luminoso Y ... ¡no tiene fragancia!', 995.00, 20, 'Huda Beauty', 'EAU', 'hud.png', 'Bases'),
(42, 'Stretch Foundation', 'Base de maquillaje hidratante en gel-crema que nutre la piel y proporciona una cobertura ligera a media con un acabado natural.', 830.00, 24, 'Glossier', 'USA', 'glosbas.png', 'Bases'),
(43, 'Airbrush Flawless Foundation', 'Darling, ¡este es el futuro de las bases de alta cobertura! Después de 10 años de confianza en AIRbrush, he llevado la base AIRbrush Flawless Foundation al siguiente nivel, presentando la NUEVA tecnología revolucionaria que transforma el maquillaje en cuidado de la piel.', 1300.00, 18, 'Charlotte Tilbury', 'Reino Unido', 'charbas.png', 'Bases'),
(44, 'Boi-ing Cakeless Concealer', 'Boi-ing Cakeless Concealer! Un corrector líquido multiusos de cobertura total que lo oculta todo, desde círculos oscuros debajo de los ojos hasta manchas y decoloración.\r\n', 575.00, 13, 'Benefit', 'USA', 'pencil.png', 'Corrector'),
(45, 'Born This Way Super Coverage Concealer', 'Cubre, define, ilumina y retoca con este corrector que perfecciona con un acabado natural. La máxima fórmula multiusos para una complexión hidratada, moderna, lista para una “selfie” en cualquier momento.    Formulado con pigmentos que brindan máxima cobertura con un acabado indetectable para una apariencia tan perfecta que… ¡todos pensarán que así naciste!\r\n\r\n', 785.00, 22, 'Too Faced', 'USA', 'vanilla.png', 'Corrector'),
(46, 'Liquid Touch Brightening Concealer', 'Un corrector hidratante y manejable que se derrite sin problemas en la piel para una cobertura invisible y libre de efecto acartonado.\r\n', 610.00, 15, 'Rare Beauty', 'USA', 'conrar.png', 'Corrector'),
(47, 'Real Flawless Weightless Perfecting Concealer', 'Corrector construible y humectante que cubre de manera precisa las imperfecciones, ilumina el tono de la piel y mejora la textura de la piel con un acabado natural  y una duración de 16 horas.\r\n\r\n\r\n', 825.00, 10, 'Laura Mercier', 'Francia', 'laura.png', 'Corrector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tarjeta_credito` varchar(16) NOT NULL,
  `direccion` text NOT NULL,
  `rol` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `contrasena`, `fecha_nacimiento`, `tarjeta_credito`, `direccion`, `rol`) VALUES
(1, 'Dana Alessandra', 'Mendoza Orozco', 'd.alessa2004@gmail.com', '$2y$12$FP.l3lI5UG5sNzkHIifVdOk4ZqBGXvLznKyGUFRFljS8NWHxCDR7m', '2004-10-30', '1111111111111111', 'El triunfo 8', 'user'),
(2, 'Alicia', 'Pérez', 'alicia@gmail.com', '$2y$12$HlRXATTEh8ntLPSQ6KxeLedG5zzP3IV/cjt5a.YeLZeoDzoCRDjeC', '2000-07-06', '4567890345654321', 'Blah blah 9', 'user'),
(3, 'Fernanda', 'Reyes', 'fer@gmail.com', '$2y$12$bzJsEYuDhZ5bZCtF5lBv5uAdAXQ9uOp5RjxLSzSuGneQZ/nKMXiVm', '2004-06-12', '4567880987676812', 'Admin 20', 'user'),
(4, 'Sofia', 'Martinez', 'sofia@hotmail.com', '$2y$12$u0TSHH5Y8y0U2yUSMzuXgOBA6vzPNoppVRdDBKwlBaku50EQLmnNS', '2003-07-18', '2786123849522463', 'Los Olivos 897', 'user'),
(5, 'Camila', 'Tapia', 'cami@gmail.com', '$2y$12$AFfS0Ux/WS1b4v6Gxtv/6OZmAtCGpOKp3nMevxkOgDdG2vWyn61xG', '2006-08-09', '9434567890987634', 'Admin 20', 'user'),
(6, 'Navi', 'Seseña', 'navi@gmail.com', '$2y$12$91USTnlZ6D.FymhHF8/Wku77zi3bpOEIs1vaM5/CoONMkzbPlhEEq', '2003-12-25', '6387287429635214', 'Admin 20', 'user'),
(7, 'Angélica', 'Orozco', 'a.orozcorivera@gmail.com', '$2y$12$AJMBlNPhgT1SuSvqwM7SAuMYoRT0InwiCVvSsLmTEidrQzvIBqQG6', '1976-11-17', '8736289126487392', 'El triunfo 8', 'user'),
(9, 'Dana', 'Mendoza', 'admin@gmail.com', '$2y$12$bbq.PU5Jt7wn0FVimuFV0.vg5Azgyk/tNDRMqwJ726oh2rNiGqWEW', '2004-10-30', '3456786543456789', 'El triunfo 8', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carritocompras`
--
ALTER TABLE `carritocompras`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `carrito_temp`
--
ALTER TABLE `carrito_temp`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `historialcompras`
--
ALTER TABLE `historialcompras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritocompras`
--
ALTER TABLE `carritocompras`
  MODIFY `id_carrito` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `carrito_temp`
--
ALTER TABLE `carrito_temp`
  MODIFY `id_carrito` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `historialcompras`
--
ALTER TABLE `historialcompras`
  MODIFY `id_compra` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritocompras`
--
ALTER TABLE `carritocompras`
  ADD CONSTRAINT `carritocompras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `carritocompras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `carrito_temp`
--
ALTER TABLE `carrito_temp`
  ADD CONSTRAINT `carrito_temp_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `historialcompras`
--
ALTER TABLE `historialcompras`
  ADD CONSTRAINT `historialcompras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `historialcompras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
