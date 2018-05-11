<?php
require 'header.php'
?>

<?php
//Start the Session
session_start();
require('config.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (!isset($_SESSION['username'])) {
//3.1.1 Assigning posted values to variables.
    $username = $_POST['username'];
    $password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
    $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";

    $result = $link->query($query);
    $count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1) {
        $_SESSION['username'] = $username;
        $username = $_POST['username'];
        header('Location: member.php');
    } else {
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        $fmsg = "Invalid Login Credentials.";
    }
}

?>

<form class="form-signin" method="POST">
    <h2 class="form-signin-heading">Please Login</h2>
    <input style="width: 100%;" type="text" name="username" id="inputPassword" class="form-control" placeholder="Username" required>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
</form>

<?php
require 'footer.php'
?>