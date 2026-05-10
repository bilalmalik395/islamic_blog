<?php include 'db.php'; include 'header.php'; 
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_term = "%$search%";
$stmt = $conn->prepare("SELECT * FROM posts WHERE title LIKE ? OR category LIKE ? ORDER BY id DESC");
$stmt->bind_param("ss", $search_term, $search_term);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="hero-section">
    <div class="container">
        <h1 class="display-3 fw-bold mb-3">Faith & Knowledge</h1>
        <p class="fs-5 mb-5 opacity-75">Your daily source for Quran, Hadith, and Dua.</p>
        <div class="row justify-content-center">
            <div class="col-md-7">
                <form method="GET" class="d-flex bg-white p-2 rounded-pill shadow">
                    <input type="text" name="search" class="form-control border-0 rounded-pill px-4" placeholder="Search for something spiritual...">
                    <button class="btn btn-main px-4">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <?php if($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="position-relative">
                        <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top" style="height:250px; object-fit:cover;">
                        <span class="badge bg-success badge-cat position-absolute top-0 start-0 m-3"><?php echo $row['category']; ?></span>
                    </div>
                    <div class="card-body p-4 text-center">
                        <h4 class="fw-bold mb-3"><?php echo $row['title']; ?></h4>
                        <p class="text-muted mb-4 small"><?php echo substr($row['content'], 0, 100); ?>...</p>
                        <a href="view_post.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-dark rounded-pill px-4 btn-sm">Read Details</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="text-center py-5">
                <p class="text-muted">No posts available yet. Be the first to share!</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<footer class="bg-dark text-white text-center py-4">
    <p class="mb-0 small">&copy; 2026 Islamic Blog Project. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
