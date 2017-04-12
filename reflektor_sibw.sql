-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2017 a las 22:11:07
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `nombre`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Electrónica'),
(4, 'Punk'),
(5, 'Escocia'),
(6, 'EEUU'),
(7, 'España');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `url` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `modificacion` date NOT NULL,
  `portada` varchar(250) CHARACTER SET utf8 NOT NULL,
  `pie` varchar(250) CHARACTER SET utf8 NOT NULL,
  `spotify` text CHARACTER SET utf8,
  `parrafo` text NOT NULL,
  `contenido` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `grupo`, `frase`, `autor`, `publicacion`, `modificacion`, `portada`, `pie`, `spotify`, `parrafo`, `contenido`) VALUES
(2, 'Here', 'Teenage Fanclub', 'Los escoceses siguen en muy buena forma. La senectud parece que les vuelve a sentar bien. \'Here\' es un disco notable y consistente.', 'Óscar Villalibre', '2017-03-08', '2017-04-02', 'img/teenage-fanclub-here.jpg', 'Portada \"Here\"', '<iframe src=\"https://embed.spotify.com/?uri=spotify:album:0r9BEwSODOtAEza9ByqTva&theme=white\"\r\n                            width=\"200\" height=\"280\" frameborder=\"0\" allowtransparency=\"true\"></iframe>', '<p>\r\n                    Aquéllo de los inventos con gaseosa quizás lo idearon Norman Blake, Gerard Love y Raymond McGinley,\r\n                    la MSN de Teenage Fanclub. ¿Por qué? Pues porque después de más de 25 años de carrera siguen siendo capaces\r\n                    de sacar nuevo material y de una forma muy digna. Y lo hacen airosos porque se dedican a lo que saben,\r\n                    a lo que siempre han sabido hacer. No de la misma forma y con otra intensidad, pero en esencia, pop de manual.\r\n                    Delicado y efectista. Redondo como un balón y certero como una flecha. Si se te dan bien los arroces, los días\r\n                    importantes no te metas a la cocina a hacer pasteles de arándanos.\r\n                </p>', '<p>\n                    Aquéllo de los inventos con gaseosa quizás lo idearon Norman Blake, Gerard Love y Raymond McGinley,\n                    la MSN de Teenage Fanclub. ¿Por qué? Pues porque después de más de 25 años de carrera siguen siendo capaces\n                    de sacar nuevo material y de una forma muy digna. Y lo hacen airosos porque se dedican a lo que saben,\n                    a lo que siempre han sabido hacer. No de la misma forma y con otra intensidad, pero en esencia, pop de manual.\n                    Delicado y efectista. Redondo como un balón y certero como una flecha. Si se te dan bien los arroces, los días\n                    importantes no te metas a la cocina a hacer pasteles de arándanos.\n                </p>\n                <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FDOLKSp2AWU\" frameborder=\"0\" allowfullscreen></iframe>\n                <p>\n                    Así pues ‘Here’, el noveno álbum de Teenage Fanclub nos deja dos importantes lecciones. Por un lado, si haces\n                    una cosa bien, sigue haciéndola, que todo te va a ir mejor que probando estridencias que no te pegan.\n                    Y la segunda, que los escoceses siguen en muy buena forma. La senectud parece que les vuelve a sentar bien.\n                    ‘Here’ es un disco notable y consistente. Mejor parado que sus predecesores, ‘Shadows’ (2010) o ‘Man-made’ (2005).\n                    Ha valido la pena esperarse 6 años. ‘I’m in love’, el primer sencillo y corte que abre el álbum, es la mejor\n                    muestra de ello. Denota cuando Blake se pone a la cabeza y vuelve a sacar la enésima canción pop perfecta por los\n                    cuatro costados. Una melodía pulcra, reconocible y vibrante. Y una letra hablando de amor (¿de qué si no?).\n                    La tortilla de patatas de la música popular. Sencillez y tradición que siempre sabe bien mas vayan pasando los años.\n                    Lo mismo con ‘The Darkest Part Of The Night’. Delicadeza y guitarras flotantes. Amor y masculinidad bien entendida.\n                    Porque hay que ser muy hombre para poder cantar estas cosas y que suene tan sincero y jodidamente visceral.\n                    ‘Hold on’ también podría bien entrar en este grupo de la melodía pegajosa y el estribillo girante. Canciones que son\n                    como aquellos días, que no sabes bien por qué, pero te sientes bien. Hay café recién hecho y camisas bien planchadas.\n                    Calidez en ambiente y en el vientre y tienes aquella sensación que el mundo es un lugar, a fin de cuentas,\n                    agradable para pasar por él.\n                </p>\n\n                <div class=\"main-img\">\n                    <img src=\"img/teenagefanclub-photo.jpg\" style=\"max-width: 80%\">\n                    <p>Componentes de Teenage Fanclub</p>\n                </div>\n                <p>\n                    Pero este ‘Here’ va más allá. También encontramos piezas más intimistas como ‘I have nothing more to say’ o más tiradas\n                    a la experimentación de texturas y sonidos un poco menos cristalinos y más matizados. ‘I was beautiful when I was alive’\n                    o ‘Steady state’ son eso y la mejor representación de los contrapesos dentro de Teenage Fanclub entre Blake, Love y McGinley.\n                    Y que así sea durante muchos años. Porque necesitamos bandas como TFC. Para recordarnos aquello de la belleza de la\n                    cotidianidad y lo del lugar no tan grisáceo para vivir en él. Parece mentira que tengan que venir gentes de Escocia,\n                    tierra de paraguas y pies mojados por la lluvia, para recordarnos tal cosa. Pero no es nada nuevo que de allí sigan saliendo\n                    puras joyas de la constelación pop.\n                </p>'),
(3, 'Write about Love', 'Belle and Sebastian', 'Los tiempos han cambiado y los escoceces vuelven a mostrar su mejor cara con Write About Love, un disco que han concebido en un tiempo inusitado', 'Daniel Caccamo', '2017-04-13', '2017-04-13', 'img/belle-and-sebastian.jpeg', 'Portada \'Write about Love\'', '<iframe src=\"https://embed.spotify.com/?uri=spotify:album:1dlWXOJNfwsUZQvqEl6tVX&theme=white\" width=\"200\" height=\"280\" frameborder=\"0\" allowtransparency=\"true\"></iframe>', '<p>\r\nCuatro largos años han pasado desde aquel The Life Pursuit (2006) que consagró la resurreción artística de Belle and Sebastian tras un principio siglo poco esperanzador con discos como Fold Your Hands Child, You Walk Like a Peasant (2000) y Storytelling (2002), que resultaron discretos, en comparación con el magnífico The Boy With the Arab Strap (1998).\r\n</p> \r\n<p>\r\nSin embargo, los tiempos han cambiado y los escoceces vuelven a mostrar su mejor cara con Write About Love, un disco que han concebido en un tiempo inusitado (la banda volvió a reunirse el pasado mes de marzo), pero que sigue en la tónica de los dos álbumes inmediatamente anteriores, la fórmula que a todos gusta: soft rock de fácil escucha.\r\n</p>', '<p>\r\nCuatro largos años han pasado desde aquel The Life Pursuit (2006) que consagró la resurreción artística de Belle and Sebastian tras un principio siglo poco esperanzador con discos como Fold Your Hands Child, You Walk Like a Peasant (2000) y Storytelling (2002), que resultaron discretos, en comparación con el magnífico The Boy With the Arab Strap (1998).\r\n</p> \r\n<p>\r\nSin embargo, los tiempos han cambiado y los escoceces vuelven a mostrar su mejor cara con Write About Love, un disco que han concebido en un tiempo inusitado (la banda volvió a reunirse el pasado mes de marzo), pero que sigue en la tónica de los dos álbumes inmediatamente anteriores, la fórmula que a todos gusta: soft rock de fácil escucha. Once cortes componen este Write About Love que tiene como platos fuertes algunas composiciones que se han dejado escuchar a lo largo del año en conciertos, adelantos y promociones de la banda. En efecto, “I Didn’t See It Coming” (que perfectamente podría pasar por una canción de cualquier disco anterior), “I Want The World To Stop” y “Come On Sister” son canciones pegadizas y efectivas, sin demasiadas pretensiones pero agradables.\r\n</p>\r\n<p>\r\nAdemás, la homónima “Write About Love”, con la colaboración de Carey Mullighan (actriz británica nominada al Oscar por “An Education”), y “Little Lou, Ugly Jack, Prophet John”, con la participación de la polifacética Norah Jones, aportan al álbum cierta innovación, en un intento por evolucionar. Las fisuras del disco, no obstante, resultan notables, ya que a las pocas escuchas acaba resultando tedioso y uno no logra encontrarle razones para seguir escuchando más tiempo del estrictamente necesario para darse cuenta de que es un disco sin demasiadas aspiraciones y con menos creatividad que sus predecesores. Es bueno saber que siguen siendo como siempre hemos querido, pero esperemos que en su próxima entrega dejen de ofrecernos más de lo mismo.</p>'),
(4, 'Teens of Denial', 'Car Seat Headrest', 'Con banda de soporte, Toledo se marchó al extremo del país para gestar un álbum que, como decía, se nutre de lo mundano y de los dilemas existenciales de la edad. ', 'Marius Ribas', '2017-04-20', '2017-04-20', 'img/car-seat-headrest-teensofdenial.jpg', 'Portada \'Teens of Denial\'', '<iframe src=\"https://embed.spotify.com/?uri=spotify:album:26DseQO366JfXwIP7dIgQj&theme=white\" width=\"200\" height=\"280\" frameborder=\"0\" allowtransparency=\"true\"></iframe>', '<p>\r\nCarlos López era un tío fuerte. También un pésimo jugador de balonmano y una rata de biblioteca. Egoísta. No compartía nada. Pero ante todo, “Lampi” (bautizado así por el curso) era un luchador que no le perdía la cara a nada. Estaba perdido, pero su coraza era impenetrable. Dura como el acero. Y hay que reconocer que gracias a ella ganó la batalla de la adolescencia, tan puta ella. Podría rescatar mil y una anécdotas de esa época y todas parecerían igual de absurdas. Con 16 años todo eran direcciones en vano, pero el caso es que “Lampi” tenía un escudo como el de Billy, el power ranger más freak del equipo. Porque la perseverancia apremia. Y más vivo ejemplo que el del señor López, actual ingeniero de telecomunicaciones, está el de Will Toledo, cerebro de Car Seat Headrest. Resumible en “a la edad de 23 años ya atesora siete álbumes“.\r\n</p>', '\r\n<p>\r\nCarlos López era un tío fuerte. También un pésimo jugador de balonmano y una rata de biblioteca. Egoísta. No compartía nada. Pero ante todo, “Lampi” (bautizado así por el curso) era un luchador que no le perdía la cara a nada. Estaba perdido, pero su coraza era impenetrable. Dura como el acero. Y hay que reconocer que gracias a ella ganó la batalla de la adolescencia, tan puta ella. Podría rescatar mil y una anécdotas de esa época y todas parecerían igual de absurdas. Con 16 años todo eran direcciones en vano, pero el caso es que “Lampi” tenía un escudo como el de Billy, el power ranger más freak del equipo. Porque la perseverancia apremia. Y más vivo ejemplo que el del señor López, actual ingeniero de telecomunicaciones, está el de Will Toledo, cerebro de Car Seat Headrest. Resumible en “a la edad de 23 años ya atesora siete álbumes“.\r\n</p>'),
(5, 'My Woman', 'Angel Olsen', 'El tercer álbum que, en busca de más, halla la luz. “Voy a ser la parte viva del sueño después de que este se haya ido“', 'Marina Estévez', '2017-04-03', '2017-04-03', 'img/angel-olsen-mywoman.jpg', 'Portada \'My Woman\'', '<iframe src=\"https://embed.spotify.com/?uri=spotify:album:5M8xQaQZuW2LZGVXZ3mlKN&theme=white\" width=\"200\" height=\"280\" frameborder=\"0\" allowtransparency=\"true\"></iframe>', '<p>\r\nNo sé cuantos de aquí se encontraron, pero ni yo ni Angel Olsen lo conseguimos aún. ¿Qué impulsa a una persona a sacar lo mejor de ella? A ponerse a prueba y, justamente, probar aquello que nunca antes se hubiese planteado. Pues yo diría que la inquietud de un ser humano que tiene muchas cosas buenas que aportar en su corta vida. Como Olsen, la joven de Missouri que quiere explorarlo todo con 29 años, preguntándose mil y un porqués por el camino, y encontrando claras respuestas de vuelta. Y he aquí la sorpresa de Olsen y “My Woman” (Jagjaguwar, 2016), el disco que hace de una artista una gran artista. El tercer álbum que, en busca de más, halla la luz. “Voy a ser la parte viva del sueño después de que este se haya ido“, concluye ‘Pops’, la canción que cierra el disco y que podría sellar, con esta misma frase, todo lo que Olsen explora desde su identidad femenina. Porque ni siquiera sus ojos vidriosos pueden empañar la realidad; hay algo de ese sueño que ha cobrado vida.\r\n</p>', '<p>\r\nNo sé cuantos de aquí se encontraron, pero ni yo ni Angel Olsen lo conseguimos aún. ¿Qué impulsa a una persona a sacar lo mejor de ella? A ponerse a prueba y, justamente, probar aquello que nunca antes se hubiese planteado. Pues yo diría que la inquietud de un ser humano que tiene muchas cosas buenas que aportar en su corta vida. Como Olsen, la joven de Missouri que quiere explorarlo todo con 29 años, preguntándose mil y un porqués por el camino, y encontrando claras respuestas de vuelta. Y he aquí la sorpresa de Olsen y “My Woman” (Jagjaguwar, 2016), el disco que hace de una artista una gran artista. El tercer álbum que, en busca de más, halla la luz. “Voy a ser la parte viva del sueño después de que este se haya ido“, concluye ‘Pops’, la canción que cierra el disco y que podría sellar, con esta misma frase, todo lo que Olsen explora desde su identidad femenina. Porque ni siquiera sus ojos vidriosos pueden empañar la realidad; hay algo de ese sueño que ha cobrado vida.\r\n</p>');

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
(2, 2),
(3, 2),
(2, 5),
(3, 5),
(4, 1),
(5, 1),
(5, 2);

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
  `ciudad` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pwd`, `nombre`, `apellidos`, `nacimiento`, `registro`, `ciudad`) VALUES
(2, 'reflektor@reflektor', '4ceaa00296f7fc39c9457ec3fee55438', 'reflektor', 'reflektor', '2017-04-01', '2017-04-09', 'Granada');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
