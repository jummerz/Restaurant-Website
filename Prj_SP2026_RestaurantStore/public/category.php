<?php include 'header.php';
$id = intval($_GET['id'] ?? 0);
$cat = $conn->query("SELECT * FROM Prj_SP2026_categories WHERE category_id=$id")->fetch_assoc();
?>
<div class="container my-5">
    <h1><?php echo htmlspecialchars($cat['category_name'] ?? 'Category'); ?></h1>
    <div class="row g-4 mt-2">
        <?php
        $products = $conn->query("SELECT * FROM Prj_SP2026_products WHERE status='Active' AND category_id=$id");
        while($row = $products->fetch_assoc()):
        ?>
        <div class="col-md-4">
            <div class="card product-card h-100 shadow-sm">
                <img src="../assets/images/<?php echo htmlspecialchars($row['image_name']); ?>" class="card-img-top">
                <div class="card-body">
                    <h3 class="h5"><?php echo htmlspecialchars($row['product_name']); ?></h3>
                    <p><?php echo substr(htmlspecialchars($row['product_description']),0,90); ?>...</p>
                    <strong>$<?php echo number_format($row['price'],2); ?></strong>
                </div>
                <div class="card-footer bg-white"><a class="btn btn-primary w-100" href="product_detail.php?id=<?php echo $row['product_id']; ?>">View Details</a></div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php include 'footer.php'; ?>
