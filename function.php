<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = '107.180.1.16';
    $DATABASE_USER = 'sprc2023team6';
    $DATABASE_PASS = 'sprc2023team6';
    $DATABASE_NAME = 'sprc2023team6';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>$title</title>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body class="home">
            <header>
                <div class="navbar-component">
                    <a href="https://www.asu.edu/" class="navbar-logo">
                        <img class="vert" src="https://www.asu.edu/asuthemes/5.0/assets/arizona-state-university-logo-vertical.png" alt="Arizona State University">
                    </a>
                    <div class="navbar-container">
                        <a class="title-name" href="index.php">Sparky's Snacks</a>
                        <div class="topnav">
                            <a class="active" href="index.php">Home</a>
                            <a href="index.php?page=about">About</a>
                            <a href="index.php?page=products">Menu</a>
                            <div class="topnav-right">
                                <a href="index.php?page=cart">Cart</a>
                                <a href="index.php?page=profile">Profile</a>
                                <a class="active" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <main>
EOT;
}
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer class="footer">
            <div>
                <p>&copy; $year, Sparky's Snacks</p>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>