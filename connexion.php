<?php
require_once (__DIR__ . '/config/database.php');

if($_POST) {
    $stm = $pdo->query("SELECT id, name, password FROM user WHERE email='" . $_POST['email'] ."'");
    $user = $stm->fetch(PDO::FETCH_ASSOC);

    if(password_verify($_POST['password'], $user['password']) ) {
        $_SESSION['user'] = $user['name'];
        header("Location: dashboard.php");
        exit();
    }
    else {
        echo "erreur";
    }
}


require_once (__DIR__ . '/includes/header.php');
?>

    <div class="color-black">
        <form action="" method="post">
            <div class="header">
                <div class="inscription">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">

                    <input type="submit" value="Connexion">
                </div>
            </div>
        </form>
    </div>
    

<?php

require_once (__DIR__ . '/includes/footer.php');

?>