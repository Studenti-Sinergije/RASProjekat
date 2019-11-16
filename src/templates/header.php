<?php

session_start();

?>

<html>
    <head>
        <title>BO.ba</title>
        <link rel="stylesheet" type="text/css" href="style/header.css">
        <link rel="stylesheet" type="text/css" href="style/modal.css">
    </head>

    <body>
        <div class="container">
            <div class="header">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/logo.png" alt="logo">
                    </a>
                </div>
            </div>

            <div class="nav">
                <ul class="nav-ul">     
                    <li><a name="nav-item" href="index.php">Početna</a></li>
                    <li><a name="nav-item" href="categories.php">Kategorije</a></li>
                    <li><a name="nav-item" href="about_us.php">O nama</a></li>
                    <li><a name="nav-item" href="contact.php">Kontakt</a></li>
                </ul>
                <ul class="login">
                    <?php if (isset($_SESSION["loggedin"])): ?> 
                        <?php if ($_SESSION["loggedin"]): ?>
                            <li><a href="add_ad.php">Dodaj oglas</a></li>
                            <li><a href="includes/logout.php">Odjavi se</a></li>
                        <?php else: ?>
                            <li><a href="login.php">Prijava</a></li>
                            <li><a href="register.php">Registracija</a></li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li><a href="login.php">Prijava</a></li>
                        <li><a href="register.php">Registracija</a></li>
                    <?php endif; ?>
                </ul>
            </div>
