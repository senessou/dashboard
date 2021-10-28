<?php
require_once (__DIR__ . '/config/database.php');
require_once (__DIR__ . '/includes/header.php');

if($_POST) {
    $data = [
        'name' => $_POST['name'],
        'lastname' => $_POST['lastname'],
        'type' => $_POST['type'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'id' => $_GET['id'],
    ];
    $sql = "UPDATE user SET name=:name, lastName=:lastname, privilege=:type, email=:email, password=:password WHERE id=:id";
    $stm = $pdo->prepare($sql);
    $stm->execute($data);
}

if($_GET) {
    $stm = $pdo->query("SELECT * FROM user WHERE id=" . $_GET['id']);
    $compte = $stm->fetch(PDO::FETCH_ASSOC);
}

?>

    <div class="color-back">
        <form action="dashboard.php" method="post">
            <div class="header">
                <div class="inscription">
                    <label for="lastname">Lastname <span>*</span></label>
                    <input type="text" id="lastname" name="lastname" value="<?=$compte['lastName'] ?>">

                    <label for="name">Name <span>*</span></label>
                    <input type="text" id="name" name="name" value="<?=$compte['name'] ?> ">

                    <label for="type">Privilège <span>*</span></label>
                    <select name="type" id="type">
                        <option value="Admin">Administrateur</option>
                        <option value="User">Utilisateur</option>
                    </select>

                    <label for="email">E-mail <span>*</span></label>
                    <input type="email" id="email" name="email" value="<?=$compte['email'] ?> ">

                    <label for="password">Password <span>*</span></label>
                    <input type="password" id="password" name="password" value="<?=$compte['password'] ?> ">

                    <input type="submit" value="Envoyer">
                </div>
            </div>
        </form>
    </div>
    
<?php

require_once (__DIR__ . '/includes/footer.php');

?>