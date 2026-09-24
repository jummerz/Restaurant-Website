<?php include 'header.php';
$id = intval($_GET['id'] ?? 0);
$product = $conn->query("SELECT p.*, c.category_name FROM Prj_SP2026_products p JOIN Prj_SP2026_categories c ON p.category_id=c.category_id WHERE product_id=$id")->fetch_assoc();
?>
<div class="container my-5">
<?php if($product): ?>
    <div class="row g-4">
        <div class="col-md-6"><img class="img-fluid rounded shadow detail-img" src="../assets/images/<?php echo htmlspecialchars($product['image_name']); ?>"></div>
        <div class="col-md-6">
            <h1><?php echo htmlspecialchars($product['product_name']); ?></h1>
            <h2 class="h5 text-muted"><?php echo htmlspecialchars($product['category_name']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($product['product_description'])); ?></p>
            <h3>$<?php echo number_format($product['price'],2); ?></h3>
            <a href="contact.php" class="btn btn-primary">Ask About This Product</a>
        </div>
    </div>
<?php else: ?><div class="alert alert-warning">Product not found.</div><?php endif; ?>
</div>
<?php include 'footer.php'; ?>
