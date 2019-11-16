<?php

require("templates/header.php");
require_once("includes/database.php");

$error = "";
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordConfirm"];
    $phone = $_POST["phone"];

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

<link rel="stylesheet" type="text/css" href="style/register.css">

<div class="background">
    <h1>Registruj se</h1>
    
    <div class="form-container">
        <form action="register.php" method="POST">
            <div class="input">
                <span>Email</span>
                <input type="text" name="email" required>
            </div>
            <div class="input">
                <span>Lozinka</span>
                <input type="password" name="password" required>
            </div>
            <div class="input">
                <span>Potvrda lozinke</span>
                <input type="password" name="passwordConfirm" required>
            </div>
            <div class="input">
                <span>Broj telefona</span>
                <input type="text" name="phone" required>
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Registruj se">
            </div>

            <?php 
                if (($error ?? '') != "") {
                    echo "<p>$error</p>";
                }
            ?>
        </form>
    </div>
</div>

<?php require("templates/footer.html"); ?>
