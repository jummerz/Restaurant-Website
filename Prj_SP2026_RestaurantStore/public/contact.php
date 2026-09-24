<?php include 'header.php';
$msg = '';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $stmt = $conn->prepare("INSERT INTO Prj_SP2026_contact_messages (customer_name, customer_email, subject, message) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss', $_POST['customer_name'], $_POST['customer_email'], $_POST['subject'], $_POST['message']);
    $stmt->execute();
    $msg = 'Your message was submitted successfully.';
}
?>
<div class="container my-5">
    <h1>Contact Us</h1>
    <?php if($msg): ?><div class="alert alert-success"><?php echo $msg; ?></div><?php endif; ?>
    <form method="post" class="card p-4 shadow-sm">
        <div class="mb-3"><label class="form-label">Name</label><input name="customer_name" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Email</label><input type="email" name="customer_email" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Subject</label><input name="subject" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Message</label><textarea name="message" class="form-control" rows="5" required></textarea></div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include 'footer.php'; ?>
