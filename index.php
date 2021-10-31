<?php

require_once (__DIR__ . '/config/database.php');

if($_POST) {
    if($_POST['password'] == $_POST['password1']) {
        $sql = "INSERT INTO user (name, lastName, privilege, email, password) VALUES (?, ?, ?, ?, ?)";
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $rows = $pdo->prepare($sql)->execute([$_POST['name'], $_POST['lastname'], $_POST['type'], $_POST['email'], $password]);


        if( $_POST['type'] == "Admin") {
            header("Location: dashboard.php");
            exit();
        }
        else {
            header("Location: connexion.php");
        }
    }
    else {
        echo "error password";
    }
    
}


require_once (__DIR__ . '/includes/header.php');
?>


    <div class="color-back">
        <form action="" method="post">
            <div class="header">
                <div class="inscription">
                    <label for="lastname">Lastname <span>*</span></label>
                    <input type="text" id="lastname" name="lastname" placeholder="Votre prenom..">

                    <label for="name">Firstname <span>*</span></label>
                    <input type="text" id="name" name="name" placeholder="Votre nom..">

                    <label for="type">Privilège <span>*</span></label>
                    <select name="type" id="type">
                        <option value="Admin">Administrateur</option>
                        <option value="User">Utilisateur</option>
                    </select>

                    <label for="email">E-mail <span>*</span></label>
                    <input type="email" id="email" name="email">

                    <label for="password">Password <span>*</span></label>
                    <input type="password" id="password" name="password" placeholder="Entre au moin 8 caratère">

                    <label for="password1">Confirme Password <span>*</span></label>
                    <input type="password" id="password1" name="password" placeholder="Entre au moin 8 caratère">

                    <input type="submit" value="Envoyer">
                </div>
            </div>
        </form>
    </div>
    
<?php

require_once (__DIR__ . '/includes/footer.php');

?>