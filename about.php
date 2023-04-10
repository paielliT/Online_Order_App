<?php
session_start();

if(!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>

<?=template_header('About')?>

<div class="about content-wrapper">
    <div class="mu">
        <img class="mu" src="img/MU.jpg" alt="Memorial Union">
    </div>
    <article>
        <h1 id="ss">About us: <strong> Sparky's Snacks</strong></h1>
        <p id="slogan">Food for students on the go!</p>
        <h3>Brought to you by the Brogrammers.</h3>
        <hr>
        <p>We saught a way for students to be able to access and preorder online all their
            favorite foods from the Memorial Union.</p>
        <p>Allows students to skip lines and go straight to the pick up window at restaurants</p>
        <p>We cater directly to students with no extra fees or hassle, just convience.</p>
    </article>
</div>

</main>
        <footer class="footer-abs">
            <div>
                <p>&copy; 2023, Sparky's Snacks</p>
            </div>
        </footer>
    </body>
</html>