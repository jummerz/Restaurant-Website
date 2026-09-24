<?php include 'auth.php'; include 'header.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $stmt=$conn->prepare("UPDATE Prj_SP2026_site_settings SET h1_color=?, h2_color=?, h3_color=?, p_color=?, header_color=?, body_color=?, footer_color=? WHERE setting_id=1");
    $stmt->bind_param('sssssss', $_POST['h1_color'], $_POST['h2_color'], $_POST['h3_color'], $_POST['p_color'], $_POST['header_color'], $_POST['body_color'], $_POST['footer_color']);
    $stmt->execute();
}
$s=$conn->query("SELECT * FROM Prj_SP2026_site_settings LIMIT 1")->fetch_assoc();
?>
<h1>Manage Site Colors</h1><p>This page changes public site colors for H1, H2, H3, paragraph text, header, body, and footer.</p>
<form method="post" class="card p-4 shadow-sm"><div class="row g-3">
<?php foreach(['h1_color'=>'H1 Color','h2_color'=>'H2 Color','h3_color'=>'H3 Color','p_color'=>'Paragraph Color','header_color'=>'Header Color','body_color'=>'Body Color','footer_color'=>'Footer Color'] as $field=>$label): ?>
<div class="col-md-3"><label class="form-label"><?php echo $label; ?></label><input type="color" name="<?php echo $field; ?>" class="form-control form-control-color" value="<?php echo htmlspecialchars($s[$field]); ?>"></div>
<?php endforeach; ?>
<div class="col-12"><button class="btn btn-primary">Save Colors</button></div></div></form>
<?php include 'footer.php'; ?>
