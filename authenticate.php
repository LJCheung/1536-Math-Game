<?php
session_start();
extract($_POST);

$info = explode("\n",
    file_get_contents("credentials.config"));

foreach ($info as $entryPair) {
    $input = $email . ", " . $password;
    
    if (strcmp($input, $entryPair) == 0) {
        $_SESSION["authenticated"] = true;
        header("Location: index.php"); 
        die();
    }
}
    
if (!isset($_SESSION["authenticated"])) {
    $msg = "Invalid login credentials.";
    header("Location: login.php?message=$msg");
    die();
}  
?>