<?php
@include 'config.php';

// Fetch products from the database
$products = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Mall - Produktet</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    
    <header class="navbar">
        <div class="logo">
            <a href="index.html"><img src="foto/absolute.png" alt="logo e absolute mall" width="130px" height="100px"></a>
        </div>
        
        <nav>
        <ul class="menu">
                <li><a href="index.html">Ballina</a></li>
                <li><a href="products.php">Produktet</a></li>
                <li><a href="about.html">Rreth Nesh</a></li>
                <li><a href="Forma e kontaktit.html">Kontakti</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Kërkoni produkte..." onkeyup="searchProduct(event)">
            <button onclick="searchProduct()">Search</button>
        </div>

        <section class="product-section">
            <h2>Produktet tona</h2>
            <div class="product-grid">
                <?php while ($product = mysqli_fetch_assoc($products)) { ?>
                <div class="product-card" data-name="<?php echo $product['name']; ?>" data-price="<?php echo $product['price']; ?>">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo $product['price']; ?>€</p>
                </div>
                <?php } ?>
            </div>
        </section>

    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>Absolute Mall</h3>
                <p>Tek ne, gjithqka më e lirë e më e mirë. Mos mendo dy herë, por bli menjëherë!</p>
            </div>
            <div class="footer-column">
                <h3>Kontakti jonë</h3>
                <p>Email: support@absolutemall.com</p>
                <p>Telefoni: +383 44/48/49 - 123456</p>
            </div>
            <div class="footer-column">
                <h3>Rrjetet tona sociale</h3>
                <ul class="social-links">
                    <li><a href="https://www.facebook.com/">Facebook</a></li>
                    <li><a href="https://x.com/?lang=en">Platforma X</a></li>
                    <li><a href="https://www.instagram.com/">Instagram</a></li>
                </ul>                
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Absolute Mall. Të drejtat e rezervuara.</p>
        </div>
    </footer>
</body>
</html>