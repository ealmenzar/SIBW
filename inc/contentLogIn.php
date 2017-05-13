<?php
if(isset($_POST["register-name"],$_POST["register-surname"],$_POST["register-date"],$_POST["register-email"],$_POST["register-city"],$_POST["register-pwd-encrypted"])){
    $usr2=new User($link);
    $usr2->set($_POST["register-email"],$_POST["register-pwd-encrypted"],$_POST["register-name"],$_POST["register-surname"],$_POST["register-date"],$_POST["register-city"]);
    $usr2->save();
    $_POST["login-email"]=$_POST["register-email"];
    $_POST["login-pwd-encrypted"]=$_POST["register-pwd-encrypted"];
}
if(isset($_POST["login-email"],$_POST["login-pwd-encrypted"])){
    $usr=new User($link);
    $usr->setByEmail($_POST["login-email"]);
    if($usr->isDefined()){
        if($usr->testPwd($_POST["login-pwd-encrypted"])){
            $_SESSION["user"]=serialize($usr);
            header("location:index.php");
        }else{
            $error="La contraseña es incorrecta";
        }
    }else{
        $error="Ese email no esta registrado en la página";
    }
}
?>
<section class="login">
<?php if(isset($_GET["register"])):?>
    <form method="post" action="index.php?tpl=LogIn" onsubmit="submitRegister()">
        <h1>Registro</h1>
        <input type="text" name="register-name" placeholder="Nombre" required><br>
        <input type="text" name="register-surname" placeholder="Apellidos" required><br>
        <input type="date" name="register-date" placeholder="Fecha de nacimiento" required><br>
        <input type="email" name="register-email" placeholder="Email" required><br>
        <input type="text" name="register-city" placeholder="Ciudad" required><br>
        <input type="password" name="register-pwd" id="register-pwd" placeholder="Contraseña" required><br>
        <input type="password" name="register-pwd-confirm" id="register-pwd-confirm" placeholder="Repite la contraseña" required><br>
        <input type="hidden" name="register-pwd-encrypted" id="register-pwd-encrypted" required>
        <input type="submit" value="Registrarse">
    </form>
<?php else:?>
    <form method="post" action="" onsubmit="submitPass()">
        <h1>Login</h1>
        <?php
            if(isset($error)){
                echo "<p class='error'>".$error."</p>";
            }
        ?>
        <input type="email" name="login-email" placeholder="Email" required><br>
        <input type="password" name="login-pwd" id="login-pwd" placeholder="contraseña" required><br>
        <input type="hidden" name="login-pwd-encrypted" id="login-pwd-encrypted" placeholder="contraseña" required>
        <input type="submit" value="Entrar"><br>
        <a href="index.php?tpl=LogIn&register=1">Registrarse</a>
    </form>
<?php endif;?>
</section>