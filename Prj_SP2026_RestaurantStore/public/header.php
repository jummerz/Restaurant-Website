<?php
include_once '../config/db.php';
$settings = $conn->query("SELECT * FROM Prj_SP2026_site_settings LIMIT 1")->fetch_assoc();
$categories = $conn->query("SELECT * FROM Prj_SP2026_categories WHERE status='Active' ORDER BY category_name");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background-color: <?php echo htmlspecialchars($settings['body_color']); ?>; }
        h1 { color: <?php echo htmlspecialchars($settings['h1_color']); ?>; }
        h2 { color: <?php echo htmlspecialchars($settings['h2_color']); ?>; }
        h3 { color: <?php echo htmlspecialchars($settings['h3_color']); ?>; }
        p { color: <?php echo htmlspecialchars($settings['p_color']); ?>; }
        .site-header { background-color: <?php echo htmlspecialchars($settings['header_color']); ?>; }
        .site-footer { background-color: <?php echo htmlspecialchars($settings['footer_color']); ?>; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark site-header">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">Restaurant Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Categories</a>
                    <ul class="dropdown-menu">
                        <?php while($cat = $categories->fetch_assoc()): ?>
                            <li><a class="dropdown-item" href="category.php?id=<?php echo $cat['category_id']; ?>"><?php echo htmlspecialchars($cat['category_name']); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
            <form class="d-flex" method="get" action="search.php">
                <input class="form-control me-2" type="search" name="q" placeholder="Search products">
                <button class="btn btn-light" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
