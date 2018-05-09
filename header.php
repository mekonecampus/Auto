
<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Web Practicum - Authentication Team</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-signin-client_id" content="50777253558-v48kiho4trs4vmo3juqb5ouvo0j1e3j5.apps.googleusercontent.com">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" >
        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Roboto|Josefin Sans|Quicksand|Julius Sans One|Niconne|Marcellus SC|Montserrat">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script>
            function showResult(str) {
                if (str.length == 0) {
                    document.getElementById("livesearch").innerHTML = "";
                    document.getElementById("livesearch").style.border = "0px";
                    return;
                }
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("livesearch").innerHTML = this.responseText;
                        document.getElementById("livesearch").style.border = "0px solid #A5ACB2";
                    }
                }
                xmlhttp.open("GET", "livesearch.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Authentication Team</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="member.php">Member</a></li>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li>
                        <?php
                        // Initialize the session
                        session_start();
                        //3.1.4 if the user is logged in Greets the user with message
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            echo "<a href='logout.php'>[$username] Logout</a>";
                        } else {
                            //3.2 When the user visits the page first time, simple login form will be displayed.
                            echo "<a href='login.php'>Login</a>";
                        }
                        ?>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" action="#">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Events" name="search" onkeyup="showResult(this.value)">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>

        <script>
            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();

                auth2.disconnect();

                auth2.signOut().then(function () {
                    window.location.href = "index.php";
                    console.log('User signed out.');
                });
            }
        </script>


        <a href="#" onclick="signOut();">Sign out</a>
        <script>
            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                    console.log('User signed out.');
                });
            }
        </script>


        <?php
        require 'placeholder.php'
        ?>

