<?php
    require("includes/header.php");
?>

<link rel="stylesheet" type="text/css" href="style/singin.css">

<h1>Login</h1>

<div class="form-popup" id="myForm">
    <form action="/action_page.php" class="form-container">
        <input type="text" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <input type="submit" name="submit" value="submit">
    </form>
</div>

<?php
    require("includes/footer.php");
?>        
