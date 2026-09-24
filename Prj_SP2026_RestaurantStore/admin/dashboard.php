<?php include 'auth.php'; include 'header.php';
$catCount = $conn->query("SELECT COUNT(*) total FROM Prj_SP2026_categories")->fetch_assoc()['total'];
$prodCount = $conn->query("SELECT COUNT(*) total FROM Prj_SP2026_products")->fetch_assoc()['total'];
$msgCount = $conn->query("SELECT COUNT(*) total FROM Prj_SP2026_contact_messages")->fetch_assoc()['total'];
?>
<h1>Admin Dashboard</h1><p>Use this admin manage page to add, modify, and delete categories and products, update site colors, and review contact messages.</p>
<div class="row g-3"><div class="col-md-4"><div class="card text-bg-primary"><div class="card-body"><h3>Categories</h3><p class="display-6 text-white"><?php echo $catCount; ?></p></div></div></div><div class="col-md-4"><div class="card text-bg-success"><div class="card-body"><h3>Products</h3><p class="display-6 text-white"><?php echo $prodCount; ?></p></div></div></div><div class="col-md-4"><div class="card text-bg-warning"><div class="card-body"><h3>Messages</h3><p class="display-6"><?php echo $msgCount; ?></p></div></div></div></div>
<?php include 'footer.php'; ?>
