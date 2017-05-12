<?php
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
        <input type="submit" value="Entrar">
    </form>
</section>