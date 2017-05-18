-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2017 a las 00:30:00
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reflektor_sibw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clicks`
--

CREATE TABLE `clicks` (
  `click` int(11) NOT NULL,
  `ip` varchar(250) NOT NULL,
  `id_publi` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clicks`
--

INSERT INTO `clicks` (`click`, `ip`, `id_publi`, `fecha`) VALUES
(2, '::1', 5, '2017-05-12 21:44:21'),
(3, '::1', 5, '2017-05-12 21:53:29'),
(4, '::1', 4, '2017-05-12 21:53:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `autor` varchar(250) NOT NULL,
  `ip` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `contenido` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `id_noticia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`autor`, `ip`, `id`, `fecha`, `contenido`, `email`, `id_noticia`) VALUES
('Yo', '1234', 1, '2017-04-13 00:00:00', 'HOla', 'm@m', 5),
('Yooo', '234', 2, '2017-04-13 00:00:00', 'hola hola', 'm@m', 5),
('Marina', '::1', 3, '2017-04-16 19:06:08', 'Hola! Me encanta este disco :)', 'm@m.com', 9),
('Iván', '::1', 4, '2017-04-16 19:06:51', 'A mí también, es genial!', 'i@m.com', 9),
('Marina Estévez Almenzar', '::1', 5, '2017-05-05 20:19:06', 'Hola', 'marinaestal@correo.ugr.es', 9),
('Marina Estévez Almenzar', '::1', 6, '2017-05-05 20:20:32', 'Hola tonto', 'marina.estal@gmail.com', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 NOT NULL,
  `relacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `nombre`, `relacion`) VALUES
(1, 'Rock', 9),
(2, 'Pop', 9),
(3, 'Electrónica', 9),
(4, 'Punk', 9),
(5, 'Escocia', 9),
(6, 'Estados Unidos', 9),
(7, 'España', 9),
(9, 'Destacados', 0),
(10, 'Conciertos', 0),
(11, 'Festivales', 0),
(12, 'Internacionales', 10),
(14, 'Nacionales', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `url` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`url`, `id`) VALUES
('img/uploads/car-seat.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) CHARACTER SET utf8 NOT NULL,
  `grupo` varchar(250) CHARACTER SET utf8 NOT NULL,
  `frase` varchar(250) CHARACTER SET utf8 NOT NULL,
  `autor` varchar(250) CHARACTER SET utf8 NOT NULL,
  `publicacion` date NOT NULL,
  `modificacion` datetime NOT NULL,
  `portada` varchar(250) CHARACTER SET utf8 NOT NULL,
  `pie` varchar(250) CHARACTER SET utf8 NOT NULL,
  `spotify` text CHARACTER SET utf8,
  `parrafo` text NOT NULL,
  `contenido` text CHARACTER SET utf8 NOT NULL,
  `estado` enum('pendiente','publicado') CHARACTER SET utf8 NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `grupo`, `frase`, `autor`, `publicacion`, `modificacion`, `portada`, `pie`, `spotify`, `parrafo`, `contenido`, `estado`, `orden`) VALUES
(3, 'Write about Love', 'Belle and Sebastian', 'Los tiempos han cambiado y los escoceces vuelven a mostrar su mejor cara con Write About Love, un disco que han concebido en un tiempo inusitado', 'Daniel Caccamo', '2017-04-13', '2017-05-16 21:41:07', 'img/belle-and-sebastian.jpeg', 'Portada \'Write about Love\'', '<iframe src=\"https://embed.spotify.com/?uri=spotify:album:1dlWXOJNfwsUZQvqEl6tVX&theme=white\" width=\"200\" height=\"280\" frameborder=\"0\" allowtransparency=\"true\"></iframe>', '<p>\r\n4 largos años han pasado desde aquel The Life Pursuit (2006) que consagró la resurreción artística de Belle and Sebastian tras un principio siglo poco esperanzador con discos como Fold Your Hands Child, You Walk Like a Peasant (2000) y Storytelling (2002), que resultaron discretos, en comparación con el magnífico The Boy With the Arab Strap (1998).\r\n</p> \r\n<p>\r\nSin embargo, los tiempos han cambiado y los escoceces vuelven a mostrar su mejor cara con Write About Love, un disco que han concebido en un tiempo inusitado (la banda volvió a reunirse el pasado mes de marzo), pero que sigue en la tónica de los dos álbumes inmediatamente anteriores, la fórmula que a todos gusta: soft rock de fácil escucha.\r\n</p>', '<p>\r\nCuatro largos años han pasado desde aquel The Life Pursuit (2006) que consagró la resurreción artística de Belle and Sebastian tras un principio siglo poco esperanzador con discos como Fold Your Hands Child, You Walk Like a Peasant (2000) y Storytelling (2002), que resultaron discretos, en comparación con el magnífico The Boy With the Arab Strap (1998).\r\n</p> \r\n<p>\r\nSin embargo, los tiempos han cambiado y los escoceces vuelven a mostrar su mejor cara con Write About Love, un disco que han concebido en un tiempo inusitado (la banda volvió a reunirse el pasado mes de marzo), pero que sigue en la tónica de los dos álbumes inmediatamente anteriores, la fórmula que a todos gusta: soft rock de fácil escucha. Once cortes componen este Write About Love que tiene como platos fuertes algunas composiciones que se han dejado escuchar a lo largo del año en conciertos, adelantos y promociones de la banda. En efecto, “I Didn’t See It Coming” (que perfectamente podría pasar por una canción de cualquier disco anterior), “I Want The World To Stop” y “Come On Sister” son canciones pegadizas y efectivas, sin demasiadas pretensiones pero agradables.\r\n</p>\r\n<p>\r\nAdemás, la homónima “Write About Love”, con la colaboración de Carey Mullighan (actriz británica nominada al Oscar por “An Education”), y “Little Lou, Ugly Jack, Prophet John”, con la participación de la polifacética Norah Jones, aportan al álbum cierta innovación, en un intento por evolucionar. Las fisuras del disco, no obstante, resultan notables, ya que a las pocas escuchas acaba resultando tedioso y uno no logra encontrarle razones para seguir escuchando más tiempo del estrictamente necesario para darse cuenta de que es un disco sin demasiadas aspiraciones y con menos creatividad que sus predecesores. Es bueno saber que siguen siendo como siempre hemos querido, pero esperemos que en su próxima entrega dejen de ofrecernos lo mismo.</p>', 'publicado', 6),
(4, 'Teens of Denial', 'Car Seat Headrest', 'Con banda de soporte, Toledo se marchó al extremo del país para gestar un álbum que, como decía, se nutre de lo mundano y de los dilemas existenciales de la edad. ', 'Marius Ribas', '2017-04-20', '2017-05-16 21:41:07', 'img/car-seat-headrest-teensofdenial.jpg', 'Portada \'Teens of Denial\'', '<iframe src=\"https://embed.spotify.com/?uri=spotify:album:26DseQO366JfXwIP7dIgQj&theme=white\" width=\"200\" height=\"280\" frameborder=\"0\" allowtransparency=\"true\"></iframe>', '<p>\r\nCarlos López era un tío fuerte. También un pésimo jugador de balonmano y una rata de biblioteca. Egoísta. No compartía nada. Pero ante todo, “Lampi” (bautizado así por el curso) era un luchador que no le perdía la cara a nada. Estaba perdido, pero su coraza era impenetrable. Dura como el acero. Y hay que reconocer que gracias a ella ganó la batalla de la adolescencia, tan puta ella. Podría rescatar mil y una anécdotas de esa época y todas parecerían igual de absurdas. Con 16 años todo eran direcciones en vano, pero el caso es que “Lampi” tenía un escudo como el de Billy, el power ranger más freak del equipo. Porque la perseverancia apremia. Y más vivo ejemplo que el del señor López, actual ingeniero de telecomunicaciones, está el de Will Toledo, cerebro de Car Seat Headrest. Resumible en “a la edad de 23 años ya atesora siete álbumes“.\r\n</p>', '\r\n<p>\r\nCarlos López era un tío fuerte. También un pésimo jugador de balonmano y una rata de biblioteca. Egoísta. No compartía nada. Pero ante todo, “Lampi” (bautizado así por el curso) era un luchador que no le perdía la cara a nada. Estaba perdido, pero su coraza era impenetrable. Dura como el acero. Y hay que reconocer que gracias a ella ganó la batalla de la adolescencia, tan puta ella. Podría rescatar mil y una anécdotas de esa época y todas parecerían igual de absurdas. Con 16 años todo eran direcciones en vano, pero el caso es que “Lampi” tenía un escudo como el de Billy, el power ranger más freak del equipo. Porque la perseverancia apremia. Y más vivo ejemplo que el del señor López, actual ingeniero de telecomunicaciones, está el de Will Toledo, cerebro de Car Seat Headrest. Resumible en “a la edad de 23 años ya atesora siete álbumes“.\r\n</p>', 'publicado', 5),
(5, 'My Woman', 'Angel Olsen', 'El tercer álbum que, en busca de más, halla la luz. “Voy a ser la parte viva del sueño después de que este se haya ido“', 'Marina Estévez', '2017-04-03', '2017-05-16 21:41:07', 'img/portadas/angel.jpg', 'Portada ', '<iframe src=\"https://embed.spotify.com/?uri=spotify:album:5M8xQaQZuW2LZGVXZ3mlKN&theme=white\" width=\"200\" height=\"280\" frameborder=\"0\" allowtransparency=\"true\"></iframe>', '<p>\r\nNo sé cuantos de aquí se encontraron, pero ni yo ni Angel Olsen lo conseguimos aún. ¿Qué impulsa a una persona a sacar lo mejor de ella? A ponerse a prueba y, justamente, probar aquello que nunca antes se hubiese planteado. Pues yo diría que la inquietud de un ser humano que tiene muchas cosas buenas que aportar en su corta vida. Como Olsen, la joven de Missouri que quiere explorarlo todo con 29 años, preguntándose mil y un porqués por el camino, y encontrando claras respuestas de vuelta. Y he aquí la sorpresa de Olsen y “My Woman” (Jagjaguwar, 2016), el disco que hace de una artista una gran artista. El tercer álbum que, en busca de más, halla la luz. “Voy a ser la parte viva del sueño después de que este se haya ido“, concluye ‘Pops’, la canción que cierra el disco y que podría sellar, con esta misma frase, todo lo que Olsen explora desde su identidad femenina. Porque ni siquiera sus ojos vidriosos pueden empañar la realidad; hay algo de ese sueño que ha cobrado vida.\r\n</p>', '<p>No s&eacute; cuantos de aqu&iacute; se encontraron, pero ni yo ni Angel Olsen lo conseguimos a&uacute;n. &iquest;Qu&eacute; impulsa a una persona a sacar lo mejor de ella? A ponerse a prueba y, justamente, probar aquello que nunca antes se hubiese planteado. Pues yo dir&iacute;a que la inquietud de un ser humano que tiene muchas cosas buenas que aportar en su corta vida. Como Olsen, la joven de Missouri que quiere explorarlo todo con 29 a&ntilde;os, pregunt&aacute;ndose mil y un porqu&eacute;s por el camino, y encontrando claras respuestas de vuelta. Y he aqu&iacute; la sorpresa de Olsen y &ldquo;My Woman&rdquo; (Jagjaguwar, 2016), el disco que hace de una artista una gran artista. El tercer &aacute;lbum que, en busca de m&aacute;s, halla la luz. &ldquo;Voy a ser la parte viva del sue&ntilde;o despu&eacute;s de que este se haya ido&ldquo;, concluye &lsquo;Pops&rsquo;, la canci&oacute;n que cierra el disco y que podr&iacute;a sellar, con esta misma frase, todo lo que Olsen explora desde su identidad femenina. Porque ni siquiera sus ojos vidriosos pueden empa&ntilde;ar la realidad; hay algo de ese sue&ntilde;o que ha cobrado vida.</p>', 'publicado', 4),
(6, 'Colour in Anything', 'James Blake', 'Las manos de este pianista iban a hacer milagros a través de una propuesta nada optimista que muchos se apresuraron a catalogar como obra de la escena post-dubstep', 'Iván Calle', '2017-04-04', '2017-05-16 21:41:07', 'img/james-blake-colourinanything.png', 'Portada \"Colour in Anything\"', '', 'Recuerdo cuando James Blake irrumpió en la escena musical británica e invadió la blogosfera de toda la comunidad indie. Supuso el nacimiento de un estilo, con el tiempo una moda que me costó digerir. A decir verdad mi oído nunca estuvo hecho para la electrónica, pero supongo que era cuestión de tiempo. Las manos de este pianista iban a hacer milagros a través de una propuesta nada optimista que muchos se apresuraron a catalogar como obra de la escena post-dubstep. En realidad a James Blake nunca lo vi como un producto pues es de esos artistas que tienen una cualidad que los hace distintos (como Tom Odell, por poner un ejemplo cercano).', '', 'publicado', 3),
(7, 'A Moon Shaped Pool', 'Radiohead', 'Esta polivalente compañía es la que nos ha presentado a Wilsen, fascinante nuevo proyecto que nos ocupa en el día de hoy', 'Marina Estévez', '2017-04-19', '2017-05-16 21:41:07', 'img/radiohead-amoonshapedpool.jpg', 'Portada \'A Moon Shaped Pool\'', '', 'Hay sellos, y empresas de management que me inspiran un alto grado de confianza. Por veteranía, pedigrí y especialmente por saber “curar” grupos emergentes de forma excelsa. Ese es el caso de Communion, cuna de la excelencia indie londinense, o también de una Stay Loose que en las últimas semanas nos ha dado una gratísima sorpresa. Esta polivalente compañía es la que nos ha presentado a Wilsen, fascinante nuevo proyecto que nos ocupa en el día de hoy. Y probablemente también en el de mañana.', '', 'publicado', 2),
(8, 'Flying Microtonal Banana', 'King Gizzard & The Lizard Wizard', 'A ponerse a prueba y, justamente, probar aquello que nunca antes se hubiese planteado.', 'Marina Estévez', '2017-04-11', '2017-05-16 21:48:06', 'img/portadas/kinggizzard.jpg', 'pie', '---', 'No sé cuantos de aquí se encontraron, pero ni yo ni Angel Olsen lo conseguimos aún. ¿Qué impulsa a una persona a sacar lo mejor de ella? A ponerse a prueba y, justamente, probar aquello que nunca antes se hubiese planteado. Pues yo diría que la inquietud de un ser humano que tiene muchas cosas buenas que aportar en su corta vida. Como Olsen, la joven de Missouri que quiere explorarlo todo con 29 años, preguntándose mil y un porqués por el camino, y encontrando claras respuestas de vuelta. Y he aquí la sorpresa de Olsen y “My Woman” (Jagjaguwar, 2016), el disco que hace de una artista una gran artista. El tercer álbum que, en busca de más, halla la luz. “Voy a ser la parte viva del sueño después de que este se haya ido“, concluye ‘Pops’, la canción que cierra el disco y que podría sellar, con esta misma frase, todo lo que Olsen explora desde su identidad femenina. Porque ni siquiera sus ojos vidriosos pueden empañar la realidad; hay algo de ese sueño que ha cobrado vida.', '<p>No s&eacute; cuantos de aqu&iacute; se encontraron, pero ni yo ni Angel Olsen lo conseguimos a&uacute;n. &iquest;Qu&eacute; impulsa a una persona a sacar lo mejor de ella? A ponerse a prueba y, justamente, probar aquello que nunca antes se hubiese planteado. Pues yo dir&iacute;a que la inquietud de un ser humano que tiene muchas cosas buenas que aportar en su corta vida. Como Olsen, la joven de Missouri que quiere explorarlo todo con 29 a&ntilde;os, pregunt&aacute;ndose mil y un porqu&eacute;s por el camino, y encontrando claras respuestas de vuelta. Y he aqu&iacute; la sorpresa de Olsen y &ldquo;My Woman&rdquo; (Jagjaguwar, 2016), el disco que hace de una artista una gran artista. El tercer &aacute;lbum que, en busca de m&aacute;s, halla la luz. &ldquo;Voy a ser la parte viva del sue&ntilde;o despu&eacute;s de que este se haya ido&ldquo;, concluye &lsquo;Pops&rsquo;, la canci&oacute;n que cierra el disco y que podr&iacute;a sellar, con esta misma frase, todo lo que Olsen explora desde su identidad femenina. Porque ni siquiera sus ojos vidriosos pueden empa&ntilde;ar la realidad; hay algo de ese sue&ntilde;o que ha cobrado vida.</p>', 'publicado', 1),
(9, 'Here', 'Teenage Fanclub', 'Los escoceses siguen en muy buena forma. La senectud parece que les vuelve a sentar bien. ', 'Óscar Villalibre', '2017-03-08', '2017-05-16 21:41:44', 'img/portadas/teenage.jpg', 'Portada \"Here\"', '<iframe src=\"https://embed.spotify.com/?uri=spotify:album:0r9BEwSODOtAEza9ByqTva&theme=white\"\r\n                            width=\"200\" height=\"280\" frameborder=\"0\" allowtransparency=\"true\"></iframe>', '<p>\r\n                    Aquéllo de los inventos con gaseosa quizás lo idearon Norman Blake, Gerard Love y Raymond McGinley,\r\n                    la MSN de Teenage Fanclub. ¿Por qué? Pues porque después de más de 25 años de carrera siguen siendo capaces\r\n                    de sacar nuevo material y de una forma muy digna. Y lo hacen airosos porque se dedican a lo que saben,\r\n                    a lo que siempre han sabido hacer. No de la misma forma y con otra intensidad, pero en esencia, pop de manual.\r\n                    Delicado y efectista. Redondo como un balón y certero como una flecha. Si se te dan bien los arroces, los días\r\n                    importantes no te metas a la cocina a hacer pasteles de arándanos.\r\n                </p>', '<p>Aqu&eacute;llo de los inventos con gaseosa quiz&aacute;s lo idearon Norman Blake, Gerard Love y Raymond McGinley, la MSN de Teenage Fanclub. &iquest;Por qu&eacute;? Pues porque despu&eacute;s de m&aacute;s de 25 a&ntilde;os de carrera siguen siendo capaces de sacar nuevo material y de una forma muy digna. Y lo hacen airosos porque se dedican a lo que saben, a lo que siempre han sabido hacer. No de la misma forma y con otra intensidad, pero en esencia, pop de manual. Delicado y efectista. Redondo como un bal&oacute;n y certero como una flecha. Si se te dan bien los arroces, los d&iacute;as importantes no te metas a la cocina a hacer pasteles de ar&aacute;ndanos.</p>\r\n<p><iframe src=\"https://www.youtube.com/embed/FDOLKSp2AWU\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p>As&iacute; pues &lsquo;Here&rsquo;, el noveno &aacute;lbum de Teenage Fanclub nos deja dos importantes lecciones. Por un lado, si haces una cosa bien, sigue haci&eacute;ndola, que todo te va a ir mejor que probando estridencias que no te pegan. Y la segunda, que los escoceses siguen en muy buena forma. La senectud parece que les vuelve a sentar bien. &lsquo;Here&rsquo; es un disco notable y consistente. Mejor parado que sus predecesores, &lsquo;Shadows&rsquo; (2010) o &lsquo;Man-made&rsquo; (2005). Ha valido la pena esperarse 6 a&ntilde;os. &lsquo;I&rsquo;m in love&rsquo;, el primer sencillo y corte que abre el &aacute;lbum, es la mejor muestra de ello. Denota cuando Blake se pone a la cabeza y vuelve a sacar la en&eacute;sima canci&oacute;n pop perfecta por los cuatro costados. Una melod&iacute;a pulcra, reconocible y vibrante. Y una letra hablando de amor (&iquest;de qu&eacute; si no?). La tortilla de patatas de la m&uacute;sica popular. Sencillez y tradici&oacute;n que siempre sabe bien mas vayan pasando los a&ntilde;os. Lo mismo con &lsquo;The Darkest Part Of The Night&rsquo;. Delicadeza y guitarras flotantes. Amor y masculinidad bien entendida. Porque hay que ser muy hombre para poder cantar estas cosas y que suene tan sincero y jodidamente visceral. &lsquo;Hold on&rsquo; tambi&eacute;n podr&iacute;a bien entrar en este grupo de la melod&iacute;a pegajosa y el estribillo girante. Canciones que son como aquellos d&iacute;as, que no sabes bien por qu&eacute;, pero te sientes bien. Hay caf&eacute; reci&eacute;n hecho y camisas bien planchadas. Calidez en ambiente y en el vientre y tienes aquella sensaci&oacute;n que el mundo es un lugar, a fin de cuentas, agradable para pasar por &eacute;l.</p>\r\n<div class=\"main-img\"><img style=\"max-width: 80%;\" src=\"img/teenagefanclub-photo.jpg\" />\r\n<p>Componentes de Teenage Fanclub</p>\r\n</div>\r\n<p>Pero este &lsquo;Here&rsquo; va m&aacute;s all&aacute;. Tambi&eacute;n encontramos piezas m&aacute;s intimistas como &lsquo;I have nothing more to say&rsquo; o m&aacute;s tiradas a la experimentaci&oacute;n de texturas y sonidos un poco menos cristalinos y m&aacute;s matizados. &lsquo;I was beautiful when I was alive&rsquo; o &lsquo;Steady state&rsquo; son eso y la mejor representaci&oacute;n de los contrapesos dentro de Teenage Fanclub entre Blake, Love y McGinley. Y que as&iacute; sea durante muchos a&ntilde;os. Porque necesitamos bandas como TFC. Para recordarnos aquello de la belleza de la cotidianidad y lo del lugar no tan gris&aacute;ceo para vivir en &eacute;l. Parece mentira que tengan que venir gentes de Escocia, tierra de paraguas y pies mojados por la lluvia, para recordarnos tal cosa. Pero no es nada nuevo que de all&iacute; sigan saliendo puras joyas de la constelaci&oacute;n pop.</p>', 'publicado', 0),
(14, 'Pitchfork shows', 'Father John', 'Todos los conciertos del festival de Paris', 'Marina Estévez Almenzar', '2017-05-19', '2017-05-19 00:09:56', 'img/portadas/father.jpg', 'Father John', '.', 'Todos los conciertos de Paris, pronto en nuestra web.', '<p>.</p>', 'publicado', 1000),
(15, 'Nueva Vulcano en Madrid', 'Nueva Vulcano', 'Los de Barcelona llenaron en Madrid', 'Marina Estévez', '2017-05-19', '2017-05-19 00:13:30', 'img/portadas/teenagefanclub-photo.jpg', 'Componentes de Nueva Vulcano', '.', '.', '<p>.</p>', 'publicado', 1000),
(16, 'Rosalía en Barcelona', 'Rosalía', 'El flamenco llega con fuerza', 'Marina Estévez', '2017-05-19', '2017-05-19 00:17:22', 'img/portadas/rosalia-los-angeles.jpg', 'Rosalía', '.', '.', '<p>.</p>', 'publicado', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia_etiqueta`
--

CREATE TABLE `noticia_etiqueta` (
  `id_noticia` int(11) NOT NULL,
  `id_etiqueta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticia_etiqueta`
--

INSERT INTO `noticia_etiqueta` (`id_noticia`, `id_etiqueta`) VALUES
(3, 2),
(3, 5),
(4, 1),
(5, 1),
(5, 2),
(5, 5),
(5, 6),
(6, 5),
(6, 7),
(4, 3),
(8, 3),
(9, 7),
(9, 6),
(3, 9),
(4, 9),
(5, 9),
(6, 9),
(7, 9),
(8, 9),
(9, 9),
(14, 12),
(14, 10),
(15, 14),
(15, 10),
(16, 14),
(16, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabras`
--

CREATE TABLE `palabras` (
  `palabra` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `palabras`
--

INSERT INTO `palabras` (`palabra`) VALUES
('tonto'),
('Donald Trump');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `id` int(11) NOT NULL,
  `anuncio` varchar(350) NOT NULL,
  `titulo` varchar(350) NOT NULL,
  `imagen` varchar(350) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `orden` int(11) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`id`, `anuncio`, `titulo`, `imagen`, `visible`, `orden`) VALUES
(1, 'Consigue tu abono', 'Primavera Sound 2017', 'img/publi/publi1.jpeg', 1, 1000),
(2, 'Consigue tu abono', 'Coachella 2017', 'img/publi/publi2.jpg', 1, 1000),
(3, 'Nuevas fechas', 'Gira Father John Misty', 'img/publi/publi3.png', 1, 1000),
(4, '20% de descuento', 'Subpop Records', 'img/publi/publi5.jpg', 1, 1000),
(5, 'Nuevo disco', 'Rosalía', 'img/publi/RosalÃ­a-rosalia-los-angeles.jpg', 1, 999),
(9, 'Consigue tu abono', 'Vida Festival 2017', 'img/publi/belle-and-sebastian.jpg', 1, 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pwd` text NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `nacimiento` date NOT NULL,
  `registro` date NOT NULL,
  `ciudad` varchar(250) NOT NULL,
  `permiso` enum('jefe','colaborador','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pwd`, `nombre`, `apellidos`, `nacimiento`, `registro`, `ciudad`, `permiso`) VALUES
(2, 'reflektor@reflektor', '4ceaa00296f7fc39c9457ec3fee55438', 'reflektor', 'reflektor', '2017-04-01', '2017-04-09', 'Granada', 'jefe'),
(3, 'reflektor2@reflektor', '4ceaa00296f7fc39c9457ec3fee55438', 'reflektor', 'reflektor', '2017-04-01', '2017-04-09', 'Granada', 'colaborador'),
(4, 'marina.estal@c.com', '5c014ba92d764a239b24f0fc378c1f0c', 'Marina', 'Estévez Almenzar', '0000-00-00', '2017-05-19', 'Granada', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clicks`
--
ALTER TABLE `clicks`
  ADD PRIMARY KEY (`click`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_noticia` (`id_noticia`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticia_etiqueta`
--
ALTER TABLE `noticia_etiqueta`
  ADD KEY `id_etiqueta` (`id_etiqueta`),
  ADD KEY `id_noticia` (`id_noticia`),
  ADD KEY `id_noticia_2` (`id_noticia`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clicks`
--
ALTER TABLE `clicks`
  MODIFY `click` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `noticia_etiqueta`
--
ALTER TABLE `noticia_etiqueta`
  ADD CONSTRAINT `noticia_etiqueta_ibfk_1` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `noticia_etiqueta_ibfk_2` FOREIGN KEY (`id_etiqueta`) REFERENCES `etiquetas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
