<?php

require("templates/header.php");
require_once("includes/database.php");

$error = "";
if (isset($_POST["submit"])) {
    extract($_POST);

    $error = checkRegistrationParams($email, $password, $passwordConfirm, $phone);
    if ($error == "") {
        $database = Database::getInstance();
        $connection = $database->getConnection();

        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $connection->prepare("INSERT INTO users (email, password, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $password, $phone);
        $stmt->execute();
        
        header("Location: index.php");
    }
}

function checkRegistrationParams($email, $password, $passwordConfirm, $phone) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email nije dobar";
    }

    if (strlen($password) < 4) {
        return "Lozinka mora biti duza od 4 karaktera";
    }

    if ($password != $passwordConfirm) {
        return "Lozinke se ne poklapaju";
    }

    if (strlen($phone) != 9) {
        return "Broj telefona nije validan";
    }

    if (!is_numeric($phone)) {
        return "Broj telefona nije validan";
    }

    $database = Database::getInstance();
    $connection = $database->getConnection();

    $stmt = $connection->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return "Email vec postoji";
    }

    $stmt->close();
    return "";
}

?>

<div class="form-container">
    <h1>Sign up</h1>

    <form action="register.php" method="POST">
        <input type="text" placeholder="Email" name="email" required>
        <input type="password" placeholder="Lozinka" name="password" required>
        <input type="password" placeholder="Potvrda lozinke" name="passwordConfirm" required>
        <input type="text" placeholder="Telefon" name="phone" required>
        <input type="submit" name="submit" value="submit">

        <?php 
            if (($error ?? '') != "") {
                echo "<p>$error</p>";
            }
        ?>
    </form>
</div>

<?php require("templates/footer.html"); ?>
