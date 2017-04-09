    <header>
        <nav id="top-nav">
            <a href="portada.html">
                <img src="img/rreflektor.png">
            </a>
            <ul>
                <li>
                    <a href="portada.html">PORTADA
                        <img src="img/noun_772443_cc.png"></a>
                </li>
                <li>
                    <a href="#~">DESTACADOS
                        <img src="img/noun_580939_cc.png"></a>
                </li>
                <li>
                    <a href="#~">CONCIERTOS
                        <img src="img/concert.png"></a>
                </li>
                <li>
                    <a href="#~">FESTIVALES
                        <img src="img/festival.png"></a>
                </li>
            </ul>
            <?php 
            if(isset($_SESSION["name"])){
                echo "Bienvenido ".$_SESSION["name"];
            }else{
                echo "<a href='index.php?tpl=LogIn'>Log in</a>";
            }
            ?>
        </nav>
    </header>