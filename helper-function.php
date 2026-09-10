<?php

$server = 'localhost';
$username = 'root';
$password = ''; // Your database password
$dbname = 'my-project'; // Your project database name

try {

    $options = [ PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION, PDO:: ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC ];
    $pdo = new  PDO ( 'mysql:host=' . $server . ';  dbname='. $dbname  ,  $username  ,  $password  ,  $options );

} catch (PDOException $e) {

    echo 'ERROR  '. $e-> getMessage();

    exit();

}


const rootPath = "http://localhost/my-project"; // Ypur url base project

const filePath = "http://localhost/my-project/asset/"; // Ypur url assets project


function redirect($path) {
header("Location:" . rootPath . trim($path, '/') . '.php' ); //!! redirect("auth/login");
exit();
}

function LocationUser() {
    if (isset($_SERVER["HTTP_REFERER"]) && !empty($_SERVER["HTTP_REFERER"])) {
        header("Location: "  . $_SERVER["HTTP_REFERER"]);
        exit();
    } else { 
        header("Location: " . rootPath);
        exit();
     }
}

function asset($path) {
    return filePath . trim($path, '/');
}


function hostName() {
    return $_SERVER["HTTP_HOST"];
}


function UserIP() {
$ip = "";

if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];

} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $ip = trim($ips[0]);

} elseif (!empty($_SERVER['REMOTE_ADDR'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
}
    return $ip ? $ip : "0.0.0.0";
}


function htmlchars($html) {
    return trim(htmlspecialchars($html));
}

function csrfToken() {
    return bin2hex(random_bytes(32));
}

function RequestMethod() {
    return $_SERVER["REQUEST_METHOD"];
}
?>