<?php
$not = new Noticia($link);
$not->setById($_GET["idNew"]);
$not->getComments(4);
echo $not->showFullNew(isset($_SESSION["name"]));
?>
<!--<div id="main-new">
    <div class="two-columns">
        <div class="row">
            <h2> Here </h2>
            <h3> Teenage Fanclub </h3>
        </div>
        <div class="row">
            <div class="main-col-1">
                <a href="noticia.html">
                    <img src="img/teenage-fanclub-here.jpg">
                </a>
            </div>
            <div class="main-col-2">
                <p>
                    Aquéllo de los inventos con gaseosa quizás lo idearon Norman Blake, Gerard Love y Raymond McGinley,
                    la MSN de Teenage Fanclub. ¿Por qué? Pues porque después de más de 25 años de carrera siguen siendo capaces
                    de sacar nuevo material y de una forma muy digna. Y lo hacen airosos porque se dedican a lo que saben,
                    a lo que siempre han sabido hacer. No de la misma forma y con otra intensidad, pero en esencia, pop de manual.
                    Delicado y efectista. Redondo como un balón y certero como una flecha. Si se te dan bien los arroces, los días
                    importantes no te metas a la cocina a hacer pasteles de arándanos.
                </p>
                <p>
                    Así pues ‘Here’, el noveno álbum de Teenage Fanclub nos deja dos importantes lecciones. Por un lado, si haces
                    una cosa bien, sigue haciéndola, que todo te va a ir mejor que probando estridencias que no te pegan.
                    Y la segunda, que los escoceses siguen en muy buena forma.
                </p>
                <p>
                    <a href="noticia.html" style="color: #999999; font-size: larger" >[...]</a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="three-columns">
    <div class="row">
        <div class="column-1">
                <h2> Here </h2>
                <h3> Teenage Fanclub </h3>
                <a href="#~">
                    <img src="img/teenage-fanclub-here.jpg" style="max-width: 70%">
                </a>
                <p>
                    Aquéllo de los inventos con gaseosa quizás lo idearon Norman Blake, Gerard Love y Raymond McGinley,
                    la MSN de Teenage Fanclub. ¿Por qué? Pues porque después de más de 25 años de carrera siguen siendo capaces
                    de sacar nuevo material y de una forma muy digna. Y lo hacen airosos porque se dedican a lo que saben,
                    a lo que siempre han sabido hacer. No de la misma forma y con otra intensidad, pero en esencia, pop de manual.
                    Delicado y efectista. Redondo como un balón y certero como una flecha. Si se te dan bien los arroces, los días
                    importantes no te metas a la cocina a hacer pasteles de arándanos.
                    Así pues ‘Here’, el noveno álbum de Teenage Fanclub nos deja dos importantes lecciones.
                    Por un lado, si haces una cosa bien, sigue haciéndola, que todo te va a ir mejor que probando
                    estridencias que no te pegan. Y la segunda, que los escoceses siguen en muy buena forma.
                    La senectud parece que les vuelve a sentar bien. ‘Here’ es un disco notable y consistente.
                </p>
    </div>
    <div class="column-2">
        <h2> Teens of Denial </h2>
        <h3> Car Seat Headrest </h3>
        <a href="#~">
            <img src="img/car-seat-headrest-teensofdenial.jpg" style="max-width: 70%">
        </a>
            <p>
                Carlos López era un tío fuerte. También un pésimo jugador de balonmano y una rata de biblioteca.
                Egoísta. No compartía nada. Pero ante todo, “Lampi” (bautizado así por el curso) era un luchador
                que no le perdía la cara a nada. Estaba perdido, pero su coraza era impenetrable. Dura como el acero.
                Y hay que reconocer que gracias a ella ganó la batalla de la adolescencia, tan puta ella.
                Podría rescatar mil y una anécdotas de esa época y todas parecerían igual de absurdas.
                Con 16 años todo eran direcciones en vano, pero el caso es que “Lampi” tenía un escudo como el
                de Billy, el power ranger más freak del equipo. Porque la perseverancia apremia. Y más vivo ejemplo
                que el del señor López, actual ingeniero de telecomunicaciones, está el de Will Toledo,
                cerebro de Car Seat Headrest. Resumible en “a la edad de 23 años ya atesora siete álbumes“.

            </p>

    </div>
    <div class="column-3">
        <h2> Colour in Anything </h2>
        <h3> James Blake </h3>
        <a href="#~">
            <img src="img/james-blake-colourinanything.png" style="max-width: 70%">
        </a>
        <p>
            Recuerdo cuando James Blake irrumpió en la escena musical británica e invadió la blogosfera de toda
            la comunidad indie. Supuso el nacimiento de un estilo, con el tiempo una moda que me costó digerir.
            A decir verdad mi oído nunca estuvo hecho para la electrónica, pero supongo que era cuestión de tiempo.
            Las manos de este pianista iban a hacer milagros a través de una propuesta nada optimista que muchos se
            apresuraron a catalogar como obra de la escena post-dubstep. En realidad a James Blake nunca lo vi
            como un producto pues es de esos artistas que tienen una cualidad que los hace distintos
            (como Tom Odell, por poner un ejemplo cercano).
        </p>
    </div>
</div>
<div class="row">
    <div class="column-1">
        <h2> My Woman </h2>
        <h3> Angel Olsen </h3>
        <a href="#~">
            <img src="img/angel-olsen-mywoman.jpg" style="max-width: 70%">
        </a>
            <p>
                No sé cuantos de aquí se encontraron, pero ni yo ni Angel Olsen lo conseguimos aún.
                ¿Qué impulsa a una persona a sacar lo mejor de ella? A ponerse a prueba y, justamente,
                probar aquello que nunca antes se hubiese planteado. Pues yo diría que la inquietud de
                un ser humano que tiene muchas cosas buenas que aportar en su corta vida. Como Olsen,
                la joven de Missouri que quiere explorarlo todo con 29 años, preguntándose mil y un porqués
                por el camino, y encontrando claras respuestas de vuelta. Y he aquí la sorpresa de Olsen y
                “My Woman” (Jagjaguwar, 2016), el disco que hace de una artista una gran artista.
                El tercer álbum que, en busca de más, halla la luz. “Voy a ser la parte viva del sueño
                después de que este se haya ido“, concluye ‘Pops’, la canción que cierra el disco y que
                podría sellar, con esta misma frase, todo lo que Olsen explora desde su identidad femenina.
                Porque ni siquiera sus ojos vidriosos pueden empañar la realidad;
                hay algo de ese sueño que ha cobrado vida.

            </p>
        </div>
        <div class="column-2">
        <h2> A Moon Shaped Pool </h2>
            <h3> Radiohead </h3>
            <a href="#~">
                <img src="img/radiohead-amoonshapedpool.jpg" style="max-width: 70%">
            </a>
            <p>
                Hay sellos, y empresas de management que me inspiran un alto grado de confianza.
                Por veteranía, pedigrí y especialmente por saber “curar” grupos emergentes de forma excelsa.
                Ese es el caso de Communion, cuna de la excelencia indie londinense, o también de una Stay Loose
                que en las últimas semanas nos ha dado una gratísima sorpresa. Esta polivalente compañía es la
                que nos ha presentado a Wilsen, fascinante nuevo proyecto que nos ocupa en el día de hoy.
                Y probablemente también en el de mañana.
            </p>
        </div>
        <div class="column-3">
            <h2> Human Performance </h2>
            <h3> Parquet Courts </h3>
            <a href="#~">
                <img src="img/parquet-courts-humanperformance.jpg" style="max-width: 70%">
            </a>
            <p>
                Hay sellos, y empresas de management que me inspiran un alto grado de confianza.
                Por veteranía, pedigrí y especialmente por saber “curar” grupos emergentes de forma excelsa.
                Ese es el caso de Communion, cuna de la excelencia indie londinense, o también de una Stay Loose
                que en las últimas semanas nos ha dado una gratísima sorpresa. Esta polivalente compañía es la
                que nos ha presentado a Wilsen, fascinante nuevo proyecto que nos ocupa en el día de hoy.
                Y probablemente también en el de mañana.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="column-1">
            <h2> Flying Microtonal Banana </h2>
            <h3> King Gizzard & The Lizard Wizard </h3>
            <a href="#~">
                <img src="img/kinggizzard.jpg" style="max-width: 70%">
            </a>
            <p>
                No sé cuantos de aquí se encontraron, pero ni yo ni Angel Olsen lo conseguimos aún.
                ¿Qué impulsa a una persona a sacar lo mejor de ella? A ponerse a prueba y, justamente,
                probar aquello que nunca antes se hubiese planteado. Pues yo diría que la inquietud de
                un ser humano que tiene muchas cosas buenas que aportar en su corta vida. Como Olsen,
                la joven de Missouri que quiere explorarlo todo con 29 años, preguntándose mil y un porqués
                por el camino, y encontrando claras respuestas de vuelta. Y he aquí la sorpresa de Olsen y
                “My Woman” (Jagjaguwar, 2016), el disco que hace de una artista una gran artista.
                El tercer álbum que, en busca de más, halla la luz. “Voy a ser la parte viva del sueño
                después de que este se haya ido“, concluye ‘Pops’, la canción que cierra el disco y que
                podría sellar, con esta misma frase, todo lo que Olsen explora desde su identidad femenina.
                Porque ni siquiera sus ojos vidriosos pueden empañar la realidad;
                hay algo de ese sueño que ha cobrado vida.

            </p>
        </div>
        <div class="column-2">
            <h2> Para Quienes Aún Viven </h2>
            <h3> Exquirla </h3>
            <a href="#~">
                <img src="img/exquirla.jpg" style="max-width: 70%">
            </a>
            <p>
                Hay sellos, y empresas de management que me inspiran un alto grado de confianza.
                Por veteranía, pedigrí y especialmente por saber “curar” grupos emergentes de forma excelsa.
                Ese es el caso de Communion, cuna de la excelencia indie londinense, o también de una Stay Loose
                que en las últimas semanas nos ha dado una gratísima sorpresa. Esta polivalente compañía es la
                que nos ha presentado a Wilsen, fascinante nuevo proyecto que nos ocupa en el día de hoy.
                Y probablemente también en el de mañana.
            </p>
        </div>
        <div class="column-3">
            <h2> Los Ángeles </h2>
            <h3> Rosalía </h3>
            <a href="#~">
                <img src="img/rosalia-los-angeles.jpg" style="max-width: 70%">
            </a>
            <p>
                Hay sellos, y empresas de management que me inspiran un alto grado de confianza.
                Por veteranía, pedigrí y especialmente por saber “curar” grupos emergentes de forma excelsa.
                Ese es el caso de Communion, cuna de la excelencia indie londinense, o también de una Stay Loose
                que en las últimas semanas nos ha dado una gratísima sorpresa. Esta polivalente compañía es la
                que nos ha presentado a Wilsen, fascinante nuevo proyecto que nos ocupa en el día de hoy.
                Y probablemente también en el de mañana.
            </p>
        </div>
    </div>
</div>-->