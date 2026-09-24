<?php include 'auth.php'; include 'header.php';
$edit = null;
if(isset($_GET['delete'])){ $id=intval($_GET['delete']); $conn->query("DELETE FROM Prj_SP2026_categories WHERE category_id=$id"); header('Location: categories.php'); exit; }
if(isset($_GET['edit'])){ $id=intval($_GET['edit']); $edit=$conn->query("SELECT * FROM Prj_SP2026_categories WHERE category_id=$id")->fetch_assoc(); }
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=$_POST['category_name']; $desc=$_POST['category_description']; $status=$_POST['status'];
    if(!empty($_POST['category_id'])){ $id=intval($_POST['category_id']); $stmt=$conn->prepare("UPDATE Prj_SP2026_categories SET category_name=?, category_description=?, status=? WHERE category_id=?"); $stmt->bind_param('sssi',$name,$desc,$status,$id); }
    else { $stmt=$conn->prepare("INSERT INTO Prj_SP2026_categories (category_name, category_description, status) VALUES (?,?,?)"); $stmt->bind_param('sss',$name,$desc,$status); }
    $stmt->execute(); header('Location: categories.php'); exit;
}
$rows=$conn->query("SELECT * FROM Prj_SP2026_categories ORDER BY category_id DESC");
?>
<h1>Manage Categories</h1><div class="card p-3 mb-4"><form method="post"><input type="hidden" name="category_id" value="<?php echo $edit['category_id'] ?? ''; ?>"><div class="row g-3"><div class="col-md-4"><label>Category Name</label><input name="category_name" class="form-control" required value="<?php echo htmlspecialchars($edit['category_name'] ?? ''); ?>"></div><div class="col-md-5"><label>Description</label><input name="category_description" class="form-control" value="<?php echo htmlspecialchars($edit['category_description'] ?? ''); ?>"></div><div class="col-md-2"><label>Status</label><select name="status" class="form-select"><option>Active</option><option <?php echo (($edit['status'] ?? '')==='Inactive')?'selected':''; ?>>Inactive</option></select></div><div class="col-md-1 d-flex align-items-end"><button class="btn btn-primary w-100">Save</button></div></div></form></div>
<table class="table table-bordered table-striped"><tr><th>ID</th><th>Name</th><th>Description</th><th>Status</th><th>Action</th></tr><?php while($r=$rows->fetch_assoc()): ?><tr><td><?php echo $r['category_id']; ?></td><td><?php echo htmlspecialchars($r['category_name']); ?></td><td><?php echo htmlspecialchars($r['category_description']); ?></td><td><?php echo $r['status']; ?></td><td class="table-actions"><a class="btn btn-sm btn-warning" href="?edit=<?php echo $r['category_id']; ?>">Edit</a><a onclick="return confirmDelete()" class="btn btn-sm btn-danger" href="?delete=<?php echo $r['category_id']; ?>">Delete</a></td></tr><?php endwhile; ?></table>
<?php include 'footer.php'; ?>
