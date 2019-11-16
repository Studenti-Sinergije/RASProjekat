<?php

require("templates/header.php");
require_once("includes/database.php");
require_once("includes/user.php");

if (session_id() == '' || !isset($_SESSION))
    session_start();

$error = "";

if (isset($_POST["submit"])) {
    $error = checkLoginParams($_POST["email"], $_POST["password"]);
}

function checkLoginParams($email, $password) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email nije dobar";
    }

    if (strlen($password) < 4) {
        return "Lozinka mora biti duza od 4 karaktera";
    }

    $database = Database::getInstance();
    $connection = $database->getConnection();

    $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return "Greska u prijavljivanju";
    }

    $row = $result->fetch_assoc();

    if (!password_verify($password, $row["password"])) {
        return "Unijeli ste pogresne podatke";
    }

    session_regenerate_id();
    $_SESSION["loggedin"] = TRUE;
    $_SESSION["id"] = $row["ID"];
    
    $user = new User($row["ID"], $row["email"], $row["phone"], $row["created_on"], $row["user_level"]);
    $_SESSION["user"] = $user;
    
    header("Location: index.php");

    $stmt->close();
    return "";
}

?>

<link rel="stylesheet" type="text/css" href="style/login.css">

<div class="background">
    <h1>Prijava</h1>
    
    <div class="form-container">
        <form action="login.php" method="POST">
            <div class="input">
                <span>Email</span>
                <input type="text" name="email" required>
            </div>
            <div class="input">
                <span>Lozinka</span>
                <input type="password" name="password" required>
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Prijavi se">
            </div>

            <?php 
                if ($error != "") {
                    echo "<p>$error</p>";
                }
            ?>
        </form>
    </div>
</div>

<?php require("templates/footer.html"); ?>
