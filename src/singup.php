<?php
    require("includes/header.php");
?>

<h1>Sign up</h1>

<div class="form-popup">
    <form action="/action_page.php" class="form-container">
        <input type="text" placeholder="Email" name="email" required>
        <input type="password" placeholder="Lozinka" name="password" required>
        <input type="password" placeholder="Potvrda lozinke" name="passwordConfirm" required>
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <input type="submit" name="submit" value="submit">
    </form>
</div>

<?php
    require("includes/footer.php");
?>