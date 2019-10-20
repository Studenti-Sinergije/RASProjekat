<?php
    require("includes/header.php");
?>
 <link rel="stylesheet" href="style/contact.css">

<div class="contact-form">
<h2>Kontaktirajte nas</h2>
    <form method="post">
	    <div>
			Vaše ime:<br>
                <input type="text" name="name">
		</div>
		<div>
		    Vaša e-mail adresa:<br>
                <input type="text" name="email">
		</div>
		<div>
			Poruka:<br>
                <textarea name="comment" ></textarea>
		</div>
		<div>
            <input type="submit" name="submit" value="Pošalji"> 
		</div>
	</form>
</div>
<div class="contact-info">
<h2>Kontakt informacije</h3>
    <p>*Neke info</p>
    <p>*Neke info</p>
    <p>*Neke info</p>
    <p>*Neke info</p>
</div>

<?php
    require("includes/footer.php");
?>
