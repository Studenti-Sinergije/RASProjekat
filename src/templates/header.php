<?php

require_once("includes/user.php");

if (session_id() == '' || !isset($_SESSION))
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
                    <li><a name="nav-item" href="news.php">Novosti</a></li>
                </ul>
                <ul class="login">
                    <?php if (isset($_SESSION["loggedin"])): ?> 
                        <?php if ($_SESSION["loggedin"]): ?>
                            <li><a name="nav-item" href="add_ad.php">Dodaj oglas</a></li>
                            <li><a name="nav-item" href="includes/logout.php">Odjavi se</a></li>
                        <?php else: ?>
                            <li><a name="nav-item" href="login.php">Prijava</a></li>
                            <li><a name="nav-item" href="register.php">Registracija</a></li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li><a name="nav-item" href="login.php">Prijava</a></li>
                        <li><a name="nav-item" href="register.php">Registracija</a></li>
                    <?php endif; ?>
                </ul>
            </div>
