<?php
session_start();

if(!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<?=template_header('Place Order')?>

<div class="placeorder content-wrapper">
    <h1>Your Order Has Been Placed</h1>
    <p>Thank you for ordering with us, we'll contact you by email with your order details.</p>
</div>

</main>
        <footer class="footer-abs">
            <div>
                <p>&copy; 2023, Sparky's Snacks</p>
            </div>
        </footer>
    </body>
</html>