<?php
    require("includes/header.php");

    extract($_POST);
	$message = '';

	if ($ime === ''){
		$message = 'Unesite ime!';
	}else if ($email === ''){
		$message = 'Unesite vašu e-mail adresu!';
	}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$message = 'Uneta e-mail adresa nije ispravna!';
	}else if ($poruka === ''){
		$message = 'Unesite poruku!';
	}

	if (!$message){
		$to = 'besplatnioglasi@bo.ba'; 
		$subject = 'Poruka sa sajta';
		$email_message = $poruka;
		$from = "$ime <$email>";
		$headers =	'From: ' . $from . "\r\n" .
				'Reply-To: ' . $from . "\r\n";

		if (mail($to, $subject, $email_message, $headers)){ 
			$message = 'Poruka je poslata!';
		}else 
			$message = 'Došlo je do greške, poruka nije poslata.';
	}

	print $message.'<br><br>';
?>

<link rel="stylesheet" href="style/contact.css">

<div class="contact-form">
    <h2>Kontaktirajte nas</h2>

    <form method="post">
	    <div>
			Vaše ime:<br>
			<input name="ime" value="<?php echo $ime; ?>">	
		</div>
		<div>
		    Vaša e-mail adresa:<br>
			<input name="email" value="<?php echo $email; ?>">
		</div>
		<div>
			Poruka:<br>
			<textarea rows="5" name="poruka"><?php echo $poruka; ?></textarea>
		</div>
		<div>
			<input class="button" type="submit" value=" Pošalji "> 
		</div>
	</form>
</div>

<div class="contact-info">
<h2>Kontakt informacije</h2>
	<ul>
 		<li>Neki tekst</li>
 		<li>Neki tekst</li>
  		<li>Neki tekst</li>
	</ul>
</div>

<?php
    require("includes/footer.php");
?>
