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
                <?php 
                    $secs=getAllSections($link);
                    foreach ($secs as $section => $id) {
                        echo '<li class="no-log">
                            <a href="index.php?tpl=Sections&section='.$section.'"">'.strtoupper($section).'
                            <img src="img/noun_580939_cc.png"></a>
                        </li>';
                    }
                ?>
            </ul>
            <?php
            if(isset($_SESSION["user"])){
                $usr=unserialize($_SESSION["user"]);
                echo "<ul class=\"bien\">
                        <li class=\"venido\">
                            Bienvenido ".($usr->nombre)."
                            <a href='index.php?tpl=LogIn&logout'><input style='width:105px' type='submit' value='Log out'></a>
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