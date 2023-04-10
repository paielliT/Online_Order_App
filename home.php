<?php
session_start();

if(!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

$stmt = $pdo->prepare('SELECT * FROM products ORDER BY quantity ASC LIMIT 4');
$stmt->execute();
$popular_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>

<div class="popular">
	<h2>Order Ahead</h2>
	<p>Beat the line</p>
</div>
<div class="popular-items content-wrapper">
	<h2>Most Popular Items</h2>
	<div class="products">
		<?php foreach ($popular_products as $product): ?>
		<a href="index.php?page=product&id=<?=$product['id']?>" class="product">
			<img src="img/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
			<span class="name"><?=$product['name']?></span>
			<span class="price">
                &dollar;<?=$product['price']?>
			</span>
		</a>
		<?php endforeach; ?>
	</div>
</div>

<?=template_footer()?>