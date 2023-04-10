<?php
session_start();

if(!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

$stmt = $pdo->prepare('SELECT * from products WHERE place = "Jamba Juice"');
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare('SELECT * from products WHERE place = "Einstein Bros. Bagels"');
$stmt->execute();
$ebb_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Products')?>

<div class="products content-wrapper">
    <h1>Jamba Juice</h1>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="img/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
    <h1>Einstein Bros. Bagels</h1>
    <div class="products-wrapper">
        <?php foreach ($ebb_products as $product): ?>
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