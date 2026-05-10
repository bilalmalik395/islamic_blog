<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Islamic Blog | Knowledge & Peace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { background-color: #1a1a1a !important; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .navbar-brand { font-weight: 600; letter-spacing: 1px; color: #fff !important; }
        .card { 
            border: none; 
            transition: all 0.3s ease; 
            border-radius: 20px; 
            overflow: hidden; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .card:hover { 
            transform: translateY(-10px); 
            box-shadow: 0 15px 30px rgba(0,0,0,0.15); 
        }
        .btn-main { 
            background-color: #1a1a1a; 
            color: white; 
            border-radius: 50px; 
            padding: 8px 25px; 
            border: none;
        }
        .btn-main:hover { background-color: #333; color: white; }
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1519817650390-64a93db51149?q=80&w=1500&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
            margin-bottom: 50px;
        }
        .badge-cat { padding: 8px 15px; border-radius: 50px; font-size: 0.8rem; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">🕌 ISLAMIC BLOG</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link text-white" href="create_post.php">Post Now</a></li>
                    <li class="nav-item"><a class="btn btn-danger btn-sm ms-3 mt-1" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link text-white" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="btn btn-success btn-sm ms-3 mt-1 px-3" href="register.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
