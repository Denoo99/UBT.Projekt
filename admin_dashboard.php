<?php
@include 'config.php';
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
    exit();
}

// Fetch current products
$products = mysqli_query($conn, "SELECT * FROM products");

// Fetch contact submissions
$submissions = mysqli_query($conn, "SELECT * FROM contact_submissions ORDER BY submitted_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3 {
            color: #333;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            margin-top: 30px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        form {
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input[type="text"], input[type="submit"], input[type="file"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%; /* Full width */
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<header class="navbar">
    <div class="logo">
        <a href="index.html"><img src="foto/absolute.png" alt="logo e absolute mall" width="130px" height="100px"></a>
    </div>
    
    <nav>
        <ul class="menu">
            <li><a href="indexx.html">Ballina</a></li>
            <li><a href="productss.php">Produktet</a></li>
            <li><a href="aboutt.html">Rreth Nesh</a></li>
            <li><a href="Forma e kontaktitt.html">Kontakti</a></li>
            <?php if (isset($_SESSION['admin_name'])): ?>
                <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
                <li><a href="logout.php">Log Out</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<div class="container">
    <h3>Welcome, <span><?php echo $_SESSION['admin_name']; ?></span></h3>
    <h1>Admin Dashboard</h1>

    <h2>Contact Form Submissions</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Submitted At</th>
        </tr>
        <?php while ($submission = mysqli_fetch_assoc($submissions)) { ?>
        <tr>
            <td><?php echo $submission['id']; ?></td>
            <td><?php echo $submission['name']; ?></td>
            <td><?php echo $submission['email']; ?></td>
            <td><?php echo $submission['message']; ?></td>
            <td><?php echo $submission['submitted_at']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <h2>Add Product</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" required placeholder="Product Name">
        <input type="text" name="price" required placeholder="Product Price">
        <input type="file" name="image" required accept="image/*">
        <input type="submit" name="add_product" value="Add Product">
    </form>

    <h2>Current Products</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php while ($product = mysqli_fetch_assoc($products)) { ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['price']; ?>€</td>
            <td><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="50"></td>
            <td>
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="submit" name="remove_product" value ="Remove">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

    <h2>Product Change Log</h2>
    <table>
        <tr>
            <th>Product ID</th>
            <th>Admin Name</th>
            <th>Action</th>
            <th>Change Time</th>
        </tr>
        <?php
        $changes = mysqli_query($conn, "SELECT * FROM product_changes");
        while ($change = mysqli_fetch_assoc($changes)) { ?>
        <tr>
            <td><?php echo $change['product_id']; ?></td>
            <td><?php echo $change['admin_name']; ?></td>
            <td><?php echo $change['action']; ?></td>
            <td><?php echo $change['change_time']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

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