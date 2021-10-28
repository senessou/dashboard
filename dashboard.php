<?php
require_once (__DIR__ . '/config/database.php');
require_once (__DIR__ . '/includes/header.php');

$rows = [];

if($_POST) {
    $stm = $pdo->prepare("SELECT * FROM user WHERE name LIKE  ? ");
    $stm->bindValue(1, '%' .$_POST['name']. '%');
    $stm->execute();

    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
}
else {
    $stm = $pdo->query("SELECT * FROM user");
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
}


?>

    <header>
        <div class="header-titre">
            <img src="#" alt="logo">
            <h1>tableau</h1>
        </div>
        <div class="header-nav">
            <h3>ADMIN</h3>
            <ul>
                <li><a href="#"><img src="#" alt="page"> Pages</a></li>
                <li><a href="#"><img src="#" alt="user"> Users</a></li>
                <li><a href="#"><img src="#" alt="trends"> Trends</a></li>
                <li><a href="#"><img src="#" alt="collection"> Collestion</a></li>
                <li><a href="#"><img src="#" alt="comment"> Comments</a></li>
                <li><a href="#"><img src="#" alt="apparence"> Apparence</a></li>
            </ul>
        </div>
        <div class="header-nav">
            <h3>SETTINGS</h3>
            <ul>
                <li><a href="#"><img src="#" alt="setting"> Settings</a></li>
                <li><a href="#"><img src="#" alt="option"> Option</a></li>
                <li><a href="#"><img src="#" alt="chart"> Chart</a></li>
                <li><a href="   #"><img src="#" alt="collection"> Collestion</a></li>
                <li><a href="#"><img src="#" alt="comment"> Comments</a></li>
                <li><a href="#"><img src="#" alt="apparence"> Apparence</a></li>
            </ul>
        </div>
    </header>
    <section>
        <div class="section-search">
        <form method="post">
            <input type="sea" name="name" placeholder="Search Pages..." aria-label="search">
        </form>
            <div class="section-login">
                <h3>Hello <?=$_SESSION['name']?></h3>
                <img src="#" alt="icon">
                <?php if(isset($_SESSION['user_id'])) {?>
                    <p>
                        <a href="./user/logout.php">logout</a>
                    </p>
                <?php } else {?>
                    <p>
                        <a href="./index.php"> Créer un compte</a>
                    </p>
                    <p>
                        <a href="./connexion.php">Login</a>
                    </p>
                <?php } ?>
            </div>
        </div>

        <div class="section-table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>LASTNAME</th>
                    <th>PRIVILEGE</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>ACTION</th>
                </tr>
                <?php foreach ($rows as $row) { ?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['lastName']?></td>
                        <td><?=$row['privilege']?></td>
                        <td><?=$row['email']?></td>
                        <td class="pass"><?=$row['password']?></td>
                        <td><span><a href="./delete.php?id=<?=$row['id']?>">Delete</a> | <a href="./edit.php?id=<?=$row['id']?>">Edit</a></span></td>
                    </tr>
                <?php } ?> 
                
            </table>
        </div>
    </section>

<?php

require_once (__DIR__ . '/includes/footer.php');

?>