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
            echo '<p><img src="' . $row["pictureurl"] . '" alt="picture" /></p>';
            echo '<label class="medium">City:</label> <input name="city" type="text" value=' . $row["city"] . ' />';
            echo '<label class="medium">Zipcode:</label> <input name="zipcode" type="text" value=' . $row["zipcode"] . ' />';
            echo '<label class="medium">State:</label> <input name="state" type="text" value=' . $row["state"] . ' />';
            echo '<label class="medium">Role:</label> <input name="role" type="text" value=' . $row["role"] . ' />';
            echo '<label class="medium">Phone:</label> <input name="phone" type="text" value=' . $row["phone"] . ' />';
            echo '<label class="medium">Status:</label> <input name="status" type="text" value=' . $row["status"] . ' />';
            echo '<p><input class="btn btn-default btn-lg" type="submit" value="Update"></p>';
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

<div style="display: none">
    <form enctype="multipart/form-data" name="myForm" class="email" action="sendmessage.php" method="post">
        <p class="medium"><label>Recipient:</label> <select class="btn btn-primary dropdown-toggle" name="name">
                <option>Select</option>
                <option>MékonéCampus</option>
            </select></p>
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <label class="medium">Subject:</label> <input name="subject" type="text" />               
        <label class="medium">Message:</label> <textarea name="message" placeholder="type here, max 1,000 words"></textarea>
        <label class="medium">Upload a file:</label> <input type="file" name="my_file" id="my_file">
        <p><input class="btn btn-default btn-lg" type="submit" value="Post"></p>
    </form>
</div>

<div>
    <h1>Link your gmail to this profile!</h1>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <div class="g-signin2" data-onsuccess="onSignIn"></div>

    <script>
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
            console.log('Name: ' + profile.getName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        }

        // auth2 is initialized with gapi.auth2.init() and a user is signed in.

        if (auth2.isSignedIn.get()) {
            var profile = auth2.currentUser.get().getBasicProfile();
            console.log('ID: ' + profile.getId());
            console.log('Full Name: ' + profile.getName());
            console.log('Given Name: ' + profile.getGivenName());
            console.log('Family Name: ' + profile.getFamilyName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail());
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'https://yourbackend.example.com/tokensignin');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            console.log('Signed in as: ' + xhr.responseText);
        };
        xhr.send('idtoken=' + id_token);
        
    </script>

</div>

