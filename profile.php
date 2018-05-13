<?php

require 'header.php';
?>

<?php

// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
} else {
    $username = $_SESSION['username'];
    $sql = "SELECT * from user where username='$username'";
    $result = $link->query($sql);

    echo '<h1>Profile</h1>';
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<p>Name: ' . $row["username"] . '</p>';
            echo '<p>Email: ' . $row["email"] . '</p>';
            echo '<p>Gmail: ' . $row["gmail"] . '</p>';
            echo '<p><img src="' . $row["pictureurl"] . '" alt="picture" /></p>';
            echo '<label class="medium">City:</label> <input name="city" type="text" value=' . $row["city"] . ' />';
            echo '<label class="medium">Zipcode:</label> <input name="zipcode" type="text" value=' . $row["zipcode"] . ' />';
            echo '<label class="medium">State:</label> <input name="state" type="text" value=' . $row["state"] . ' />';
            echo '<label class="medium">Role:</label> <input name="role" type="text" value=' . $row["role"] . ' />';
            echo '<label class="medium">Phone:</label> <input name="phone" type="text" value=' . $row["phone"] . ' />';
            echo '<label class="medium">Status:</label> <input name="status" type="text" value=' . $row["status"] . ' />';
            echo '<p><input class="btn btn-default btn-lg" type="submit" value="Update"></p>';

            require 'google.php';

            //check if gmail exist in DB
            $sql2 = "SELECT gmail FROM user WHERE username='$username' AND gmail != NULL";
            $result2 = $link->query($sql2);
            if ($result2->num_rows > 0) {
                echo 'Your Gmail is already linked to this account!';
            } else {
                $sql3 = "Update user SET gmail='$my_email' WHERE username='$username'";
                $result3 = $link->query($sql3);
                if ($link->query($sql3) === TRUE) {
                    echo "Your Gmail has been successfully linked to your profile!";
                } else {
                    echo 'Error linking your Gmail to your account!';
                }
            }
        }
    } else {
        echo "No profile";
    }
    //$link->close();
}
?>

<?php

require 'footer.php';
?>




