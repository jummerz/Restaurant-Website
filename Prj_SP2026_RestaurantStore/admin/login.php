<?php
session_start();
include '../config/db.php';
$error = '';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM Prj_SP2026_admin_users WHERE username=?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    if($user && password_verify($password, $user['password'])){
        $_SESSION['admin_id'] = $user['admin_id'];
        $_SESSION['admin_name'] = $user['full_name'];
        header('Location: dashboard.php'); exit;
    } else { $error = 'Invalid username or password.'; }
}
?>
<!DOCTYPE html><html><head><title>Admin Login</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head><body class="bg-light"><div class="container"><div class="row justify-content-center mt-5"><div class="col-md-5"><div class="card shadow"><div class="card-header bg-dark text-white"><h3>Admin Login</h3></div><div class="card-body"><?php if($error): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?><form method="post"><div class="mb-3"><label>Username</label><input name="username" class="form-control" required></div><div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div><button class="btn btn-primary w-100">Login</button></form><p class="mt-3 small text-muted">Default: admin / admin123</p></div></div></div></div></div></body></html>
