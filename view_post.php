<?php include 'db.php'; include 'header.php'; 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();
}

if(!$post) { echo "<div class='container'><h4>Post not found!</h4></div>"; exit; }
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="uploads/<?php echo $post['image']; ?>" class="img-fluid rounded mb-4" style="width: 100%; max-height: 400px; object-fit: cover;">
            <span class="badge bg-success mb-2"><?php echo $post['category']; ?></span>
            <h1 class="display-4"><?php echo $post['title']; ?></h1>
            <p class="text-muted">Posted by: <b><?php echo $post['username']; ?></b> on <?php echo date('M d, Y', strtotime($post['created_at'])); ?></p>
            <hr>
            <div class="lead" style="white-space: pre-wrap;">
                <?php echo $post['content']; ?>
            </div>
            <a href="index.php" class="btn btn-secondary mt-5 mb-5">← Back to Home</a>
        </div>
    </div>
</div>
