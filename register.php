<?php include 'db.php'; include 'header.php'; 
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Password security

    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    if($check->get_result()->num_rows > 0) {
        echo "<div class='alert alert-danger'>Email already registered!</div>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Registration successful! <a href='login.php'>Login here</a></div>";
        }
    }
}
?>
<div class="container col-md-4 mt-5">
    <form class="card p-4 shadow" method="POST">
        <h3 class="mb-3 text-center">Create Account</h3>
        <input type="text" name="username" class="form-control mb-3" placeholder="Full Name" required>
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button name="register" class="btn btn-success w-100">Register</button>
    </form>
</div>
