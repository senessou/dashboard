<?php
session_start();

if(isset($_SESSION['user_id'])) {
    
    if(strpos($_SESSION['REQUEST_URI'], 'connexion') !== false ) {
        header("Location: ../connexion.php");
        exit();
    }
}

require_once(__DIR__ . '/global.php');

$dbName = DB_NAME;
$dbHost = DB_HOST;

$dsn = "mysql:host=$dbHost;dbname=$dbName";

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
} catch (Exception $ex) {
    echo "erreur" . $ex->getMessage();
}
