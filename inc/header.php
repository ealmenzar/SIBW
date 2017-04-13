    <header>
        <nav id="top-nav">
            <a href="index.php">
                <img src="img/rreflektor.png">
            </a>
            <ul>
                <li class="no-log">
                    <a href="index.php">PORTADA
                        <img src="img/noun_772443_cc.png"></a>
                </li>
                <li class="no-log">
                    <a href="#~">DESTACADOS
                        <img src="img/noun_580939_cc.png"></a>
                </li>
                <li class="no-log">
                    <a href="#~">CONCIERTOS
                        <img src="img/concert.png"></a>
                </li>
                <li class="no-log">
                    <a href="index.php?tpl=Sections">SECCIONES
                        <img src="img/festival.png"></a>
                </li>
            </ul>
            <?php
            if(isset($_SESSION["name"])){
                echo "<ul class=\"bien\">
                        <li class=\"venido\">
                            Bienvenido ".$_SESSION["name"];"
                        </li>
                      </ul>";
                echo "<ul>
                        <li>
                            <a href='index.php?tpl=LogIn&logout'><input type='submit' value='Log out'></a>
                        </li>
                      </ul>";
            }else{
                echo "<ul class=\"bien\">
                        <li class=\"venido\">
                            <a href='index.php?tpl=LogIn'><input type='submit' value='Log in'></a>
                        </li>
                      </ul>";
            }
            ?>
        </nav>
    </header>