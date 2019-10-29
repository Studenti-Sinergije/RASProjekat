<?php
    require("includes/header.php");
    require_once("includes/database.php");

    session_start();

    $error = "";

    if (isset($_POST["submit"])) {
        extract($_POST);
        
        $error = checkLoginParams($email, $password);
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
        
        $stmt = $connection->prepare("SELECT ID, password FROM users WHERE email = ?");
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
        $_SESSION["name"] = $email;
        $_SESSION["id"] = $row["ID"];
        
        $stmt->close();
        return "";
    }
?>

<link rel="stylesheet" type="text/css" href="style/login.css">

<h1>Login</h1>

<div class="form-popup">
    <form action="login.php" class="form-container" method="POST">
        <input type="text" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <input type="submit" name="submit" value="submit">
        
        <?php 
            if ($error != "") {
                echo "<p>$error</p>";
            }
        ?>
    </form>
</div>

<?php
    require("includes/footer.php");
?>
