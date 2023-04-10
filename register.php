<?php
    $DATABASE_HOST = '107.180.1.16';
    $DATABASE_USER = 'sprc2023team6';
    $DATABASE_PASS = 'sprc2023team6';
    $DATABASE_NAME = 'sprc2023team6';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['asurite'], $_POST['password'], $_POST['email'])) {
	exit('Please complete the registration form!');
}
if (empty($_POST['asurite']) || empty($_POST['password']) || empty($_POST['email'])) {
	exit('Please complete the registration form');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}

if ($stmt = $con->prepare('SELECT asurite, password FROM accounts WHERE asurite = ?')) {
	$stmt->bind_param('s', $_POST['asurite']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		echo 'Asurite exists, please choose another!';
	} else {
        if ($stmt = $con->prepare('INSERT INTO accounts (asurite, password, email) VALUES (?, ?, ?)')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['asurite'], $password, $_POST['email']);
            $stmt->execute();
            header('Location: index.html');
            die();
        } else {
            echo 'Could not prepare statement! 1';
        }
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement! 2';
}
$con->close();
?>