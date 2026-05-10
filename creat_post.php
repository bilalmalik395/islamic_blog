<?php include 'db.php'; include 'header.php'; 
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); }

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $cat = $_POST['category'];
    $user_id = $_SESSION['user_id'];
    
    $img_name = time() . "_" . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $img_name);

    $stmt = $conn->prepare("INSERT INTO posts (title, content, category, image, user_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $title, $content, $cat, $img_name, $user_id);
    if($stmt->execute()) { echo "<script>alert('Post Uploaded!'); window.location='index.php';</script>"; }
}
?>

<div class="container col-md-6">
    <div class="card p-4 shadow">
        <h3>Create New Blog Post</h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" class="form-control mb-3" placeholder="Blog Title" required>
            <select name="category" class="form-control mb-3">
                <option>Quran</option><option>Hadith</option><option>Dua</option>
            </select>
            <textarea name="content" class="form-control mb-3" rows="5" placeholder="Write content here..." required></textarea>
            <input type="file" name="image" class="form-control mb-3" required>
            <button name="submit" class="btn btn-success w-100">Publish Post</button>
        </form>
    </div>
</div>
