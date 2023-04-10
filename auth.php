<?php
session_start();

$DATABASE_HOST = '107.180.1.16';
$DATABASE_USER = 'sprc2023team6';
$DATABASE_PASS = 'sprc2023team6';
$DATABASE_NAME = 'sprc2023team6';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if(mysqli_connect_errno()) {
    exit('Failed to conenct to MySQL: ' . mysqli_connect_error());
}

if(!isset($_POST['asurite'], $_POST['password'])) {
    exit('Please fill ASUrite and Password fields');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE asurite = ?')) {
    $stmt->bind_param('s', $_POST['asurite']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if(password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['asurite'];
            $_SESSION['id'] = $id;
            header('Location: index.php');
        } else {
            echo 'Incorrect Password';
        }
    } else {
        echo 'Incorrect ASUrite';
    }

    $stmt->close();
}
?>