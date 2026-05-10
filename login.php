<?php include 'db.php'; include 'header.php';
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    
    if($user = $res->fetch_assoc()){
        if(password_verify($pass, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
        } else { echo "<div class='alert alert-danger'>Wrong Password!</div>"; }
    }
}
?>
<div class="container col-md-4 mt-5">
    <form class="card p-4 shadow" method="POST">
        <h3 class="mb-3 text-center">Login</h3>
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button name="login" class="btn btn-primary w-100">Login</button>
    </form>
</div>
