<?php include 'header.php'; ?>
<div class="container my-5">
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
        <h1 class="display-5 fw-bold">Welcome to Restaurant Store</h1>
        <p class="fs-5">Browse fresh meals, appetizers, desserts, and drinks from our restaurant menu.</p>
        <a href="contact.php" class="btn btn-primary btn-lg">Contact Us</a>
    </div>
    <h2 class="mb-4">Featured Products</h2>
    <div class="row g-4">
        <?php
        $products = $conn->query("SELECT p.*, c.category_name FROM Prj_SP2026_products p JOIN Prj_SP2026_categories c ON p.category_id=c.category_id WHERE p.status='Active' ORDER BY p.created_at DESC");
        while($row = $products->fetch_assoc()):
        ?>
        <div class="col-md-4">
            <div class="card product-card h-100 shadow-sm">
                <img src="../assets/images/<?php echo htmlspecialchars($row['image_name']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['product_name']); ?>">
                <div class="card-body">
                    <h3 class="card-title h5"><?php echo htmlspecialchars($row['product_name']); ?></h3>
                    <p class="text-muted"><?php echo htmlspecialchars($row['category_name']); ?></p>
                    <p><?php echo substr(htmlspecialchars($row['product_description']), 0, 90); ?>...</p>
                    <strong>$<?php echo number_format($row['price'], 2); ?></strong>
                </div>
                <div class="card-footer bg-white">
                    <a href="product_detail.php?id=<?php echo $row['product_id']; ?>" class="btn btn-primary w-100">View Details</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php include 'footer.php'; ?>
