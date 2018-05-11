<?php
require 'header.php'
?>


<?php
	require('config.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
	$email = $_POST['email'];
        $gmail = $_POST['gmail'];
        $password = $_POST['password'];
 
        $query = "INSERT INTO `user` (username, password, email, gmail) VALUES ('$username', '$password', '$email', '$gmail')";
        $result = $link->query($query);
        if($result){
            //$smsg = "User Created Successfully.";
            header('Location: login.php');
        }else{
            $fmsg ="User Registration Failed";
        }
    }
    ?>


<div class="container">
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please Register</h2>
	<input style="width: 100%;" type="text" name="username" class="form-control" placeholder="Username" required>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
      </form>
</div>

<?php
require 'footer.php'
?>
