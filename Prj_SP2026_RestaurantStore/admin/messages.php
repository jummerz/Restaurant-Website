<?php include 'auth.php'; include 'header.php';
if(isset($_GET['delete'])){ $id=intval($_GET['delete']); $conn->query("DELETE FROM Prj_SP2026_contact_messages WHERE message_id=$id"); header('Location: messages.php'); exit; }
$rows=$conn->query("SELECT * FROM Prj_SP2026_contact_messages ORDER BY created_at DESC");
?>
<h1>Contact Messages</h1><table class="table table-bordered table-striped"><tr><th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Date</th><th>Action</th></tr><?php while($r=$rows->fetch_assoc()): ?><tr><td><?php echo $r['message_id']; ?></td><td><?php echo htmlspecialchars($r['customer_name']); ?></td><td><?php echo htmlspecialchars($r['customer_email']); ?></td><td><?php echo htmlspecialchars($r['subject']); ?></td><td><?php echo nl2br(htmlspecialchars($r['message'])); ?></td><td><?php echo $r['created_at']; ?></td><td><a onclick="return confirmDelete()" class="btn btn-sm btn-danger" href="?delete=<?php echo $r['message_id']; ?>">Delete</a></td></tr><?php endwhile; ?></table>
<?php include 'footer.php'; ?>
