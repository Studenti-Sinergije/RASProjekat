<?php

require("templates/header.php");

?>

<link rel="stylesheet" href="style/contact.css">

<div class="contact-container">
    <div class="contact-form-container">
        <div class="contact-form">
            <h2>Kontaktirajte nas</h2>

            <form method="post" action="contact.php">
                <div class="text-input">
                    <span>Ime:</span>
                    <input type="text" name="name">	
                </div>
                <div class="text-input">
                    <span>Email:</span>
                    <input type="text" name="email">	
                </div>
                <div class="text-input">
                    <span>Poruka:</span>
                    <textarea name="message"></textarea>
                </div>
                <div class="submit">
                    <input type="submit" value="Pošalji"> 
                </div>
            </form>
        </div>

        <div class="contact-info">
            <h2>Kontakt informacije</h2>
            <ul>
                <li>Broj telefona: <strong>055/111-222</strong></li>
                <li>Fax: <strong>055/888-999</strong></li>
                <li>Email: <strong>sinovi.sinergije@sinergija.ba</strong></li>
            </ul>
        </div>
    </div>
    
    <div class="map">
        <hr>
        <h1>Kako do nas?</h1>
        <iframe src="https://maps.google.com/maps?q=bijeljina&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no"></iframe>
    </div>
</div>

<?php require("templates/footer.html"); ?>
