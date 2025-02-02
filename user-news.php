<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Mall</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
        }

        .news {
            margin-bottom: 30px;
        }

        article {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fafafa;
        }

        article h2 {
            color: #007BFF;
        }

        .date {
            display: block;
            font-size: 0.9em;
            color: #888;
            margin-top: 10px;
        }

        .article-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .discount {
            padding: 15px;
            background-color: #e7f3fe;
            border: 1px solid #b3d7ff;
            border-radius: 5px;
            text-align: center;
        }

        .discount h2 {
            color: #0056b3;
        }

        .discount strong {
            font-size: 1.5em;
            color: #d9534f;
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
            <li><a href="index.html">Ballina</a></li>
            <li><a href="products.php">Produktet</a></li>
            <li><a href="about.html">Rreth Nesh</a></li>
            <li><a href="Forma e kontaktit.html">Kontakti</a></li>
            <li><a href="user-news.html">User news</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
        </nav>
    </header>

    <div class="container">
        <header>
            <h1>Lajmet më të reja rreth Absolute Mall</h1>
        </header>
        
        <section class="news">
            <article>
                <img src="foto/cpu2.png" alt="Fall Collection" class="article-image">
                <h2>Artikujt e ri: Vjeshtë 2025</h2>
                <p>Nxitoni të porositni versionet më të reja të produkteve tek ne, para se të shiten!</p>
                <span class="date">Lajmi i shtuar më: 2 Shkurt, 2025</span>
            </article>
            
            <article>
                <img src="foto/monitor.png" alt="Exclusive Sale" class="article-image">
                <h2>Zbritje Ekskluzive: Deri në 50%!</h2>
                <p>Mos e humbisni ngjarjen tonë ekskluzive të shitjes! Nxitoni, sa kemi stock!</p>
                <span class="date">Lajmi i shtuar më: 20 Janar, 2025</span>
            </article>
            
            <article>
                <img src="foto/kartela.png" alt="Grand Opening" class="article-image">
                <h2>Kartelat Grafike të vitit 2025, arrijnë së shpejti!</h2>
                <p>Nxitoni të bëheni i pari që jeni në posedim të këtij lloji në Kosovë.</p>
                <span class="date">Lajmi i shtuar më: 20 Shkurt, 2025</span>
            </article>
        </section>

        <section class="discount">
            <h2>Kodi i zbritjeve vetëm për ty!</h2>
            <p>Përdorni Kodin <strong>Zbritje30</strong> para realizimit të blerjeve tuaja për të marrë 30% zbritje</p>
            <p>Kjo oferte vlen deri me daten 30 Qershor 2025. Mos e humbisni këtë mundësi!</p>
        </section>
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