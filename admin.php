
<?php
require 'header.php'
?>

<?php
// Initialize the session
session_start();
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])) {
    echo "<h1>Admin Area</h1>";
    echo "<p>If user is not in admin role, he will not see content of this page.</p>";
    echo "<p>Admins will have links to diverse admin-protected pages from here.</p>";
} else {
//3.2 When the user visits the page first time, simple login form will be displayed.
    header('Location: login.php');
}
?>

<?php
require 'footer.php'
?>

