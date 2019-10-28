<?php
    require("includes/header.php");

?>


<link rel="stylesheet" type="text/css" href="style/singin.css">

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label> <br>
    <input type="text" placeholder="Enter Email" name="email" required> <br>

    <label for="psw"><b>Password</b></label> <br>
    <input type="password" placeholder="Enter Password" name="psw" required> <br>

    <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me <br>
    </label>  
      
    <button type="submit" class="btn">Login</button>
    
  </form>
</div>

<?php
    require("includes/footer.php");

?>        
