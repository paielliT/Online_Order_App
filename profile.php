<?php
session_start();
if(!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

$DATABASE_HOST = '107.180.1.16';
$DATABASE_USER = 'sprc2023team6';
$DATABASE_PASS = 'sprc2023team6';
$DATABASE_NAME = 'sprc2023team6';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if(mysqli_connect_errno()) {
    exit('Failed to conenct to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<?=template_header('Profile')?>

    <div class="profile content-wrapper">
        <h2>Profile</h2>
        <div>
            <p>Account Details:</p>
            <table>
                <tr>
                    <td>ASUrite:</td>
                    <td><?=$_SESSION['name']?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?=$email?></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><?=$password?></td>
                </tr>
            </table>
        </div>
    </div>

    </main>
        <footer class="footer-abs">
            <div>
                <p>&copy; 2023, Sparky's Snacks</p>
            </div>
        </footer>
    </body>
</html>