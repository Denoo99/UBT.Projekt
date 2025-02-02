<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
}

if (isset($_POST['add_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    

    $target_dir = "uploads";
<<<<<<< HEAD
<<<<<<< HEAD
    $target_dir = "uploads"; // Store only the relative path
=======

    $target_dir = "uploads";
>>>>>>> parent of ff87e07 (ndryshime)
=======

    $target_dir = "uploads";
>>>>>>> parent of ff87e07 (ndryshime)
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



    // Validate Image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }



    if ($_FILES["image"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }



    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {


        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            

<<<<<<< HEAD
<<<<<<< HEAD
            // Store only the filename in the database
            $image_filename = basename($_FILES["image"]["name"]);
            $insert = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image_filename')";
            if (mysqli_query($conn, $insert)) {
                $admin_name = $_SESSION['admin_name'];
                $product_id = mysqli_insert_id($conn);
                $log_change = "INSERT INTO product_changes (product_id, admin_name, action) VALUES ('$product_id', '$admin_name', 'added')";
                mysqli_query($conn, $log_change);
                
                // Redirect to the same page to prevent form resubmission
                header('Location: admin_dashboard.php');
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
=======
=======
>>>>>>> parent of ff87e07 (ndryshime)
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            

            $insert = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$target_file')";
            mysqli_query($conn, $insert);
            

            

            $admin_name = $_SESSION['admin_name'];
            $product_id = mysqli_insert_id($conn);
            $log_change = "INSERT INTO product_changes (product_id, admin_name, action) VALUES ('$product_id', '$admin_name', 'added')";
            mysqli_query($conn, $log_change);
<<<<<<< HEAD
>>>>>>> parent of ff87e07 (ndryshime)
=======
>>>>>>> parent of ff87e07 (ndryshime)
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}



// Remove product functionality
if (isset($_POST['remove_product'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    
    $delete = "DELETE FROM products WHERE id = '$product_id'";
    mysqli_query($conn, $delete);
    

    $admin_name = $_SESSION['admin_name'];
    $log_change = "INSERT INTO product_changes (product_id, admin_name, action) VALUES ('$product_id', '$admin_name', 'removed')";
    mysqli_query($conn, $log_change);
}

    $delete = "DELETE FROM products WHERE id = '$product_id'";
    mysqli_query($conn, $delete);
    
<<<<<<< HEAD
<<<<<<< HEAD
    if ($row['count'] > 0) {
        // First, delete the related records in product_changes
        $delete_changes = "DELETE FROM product_changes WHERE product_id = '$product_id'";
        mysqli_query($conn, $delete_changes);
        
        // Then, delete the product
        $delete = "DELETE FROM products WHERE id = '$product_id'";
        if (mysqli_query($conn, $delete)) {
            $admin_name = $_SESSION['admin_name'];
            // Log the change only if the product was successfully deleted
            $log_change = "INSERT INTO product_changes (product_id, admin_name, action) VALUES ('$product_id', '$admin_name', 'removed')";
            mysqli_query($conn, $log_change);
            
            // Redirect to the same page to prevent form resubmission
            header('Location: admin_dashboard.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Product does not exist.";
    }
=======
=======
>>>>>>> parent of ff87e07 (ndryshime)

    $admin_name = $_SESSION['admin_name'];
    $log_change = "INSERT INTO product_changes (product_id, admin_name, action) VALUES ('$product_id', '$admin_name', 'removed')";
    mysqli_query($conn, $log_change);
<<<<<<< HEAD
>>>>>>> parent of ff87e07 (ndryshime)
=======
>>>>>>> parent of ff87e07 (ndryshime)
}


// Fetch products
$products = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title> <!-- Fixed closing tag -->
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 1200px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
        h1, h2, h3 { color: #333; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; padding: 12px; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        input[type="text"], input[type="submit"], input[type="file"] { padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 100%; }
        input[type="submit"] { background-color: #007bff; color: white; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<header class="navbar">
    <div class="logo">
        <a href="index.html"><img src="foto/absolute.png" alt="logo" width="130px" height="100px"></a>
    </div>
    <nav>
        <ul class="menu">
            <li><a href="index.html">Ballina</a></li>
            <li><a href="products.php">Produktet</a></li>
            <li><a href="about.html">Rreth Nesh</a></li>
            <li><a href="Forma e kontaktit.html">Kontakti</a></li>
            <li><a href="..\logout.php">Log Out</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <h3>Welcome, <span><?php echo $_SESSION['admin_name']; ?></span></h3>
    <h1>Admin Dashboard</h1>

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
            <td><img src="<?php echo $target_dir . $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="50"></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="submit" name="remove_product" value="Remove">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

    <h2>Product Change Log</h2>
    <table>
        <tr>
            <th>Product ID</th>
            <th>Admin Name</th> <!-- Fixed header -->
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
            <h 3>Rrjetet tona sociale</h3>
            <h 3>Rrjetet tona sociale</h3>
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
