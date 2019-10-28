<?php
    require("includes/header.php");

?>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Sign up</h1>

    <label for="name"><b>First name</b></label> <br>
    <input type="text" placeholder="First name" name="name" required> <br>
      
    <label for="email"><b>Last name</b></label> <br>
    <input type="text" placeholder="Last name" name="lname" required>  <br>
      
      
    <label for="email"><b>Email</b></label> <br>
    <input type="text" placeholder="Enter Email" name="email" required> <br>

    <label for="psw"><b>Password</b></label> <br>
    <input type="password" placeholder="Enter Password" name="psw" required> <br>
      
    <label for="psw-repeat"><b>Repeat Password</b></label> <br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required> <br> 
      
    <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me <br>
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <button type="submit" class="btn">Sign up</button>
    
  </form>
</div>

<?php
    require("includes/footer.php");

?>