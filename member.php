<?php

require 'header.php'
?>

<?php

// Initialize the session
session_start();
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])) {
    echo "<h1>Welcome Member</h1>";
    echo "<p>Logged in users will have access to this page and all other member pages.</p>";
    //echo 'id=' . $_SESSION['idtoken'];
} else {
//3.2 When the user visits the page first time, simple login form will be displayed.
    header('Location: login.php');
}
?>

<?php

require 'footer.php'
?>

