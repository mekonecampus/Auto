<?php require 'config.php'; ?> 
<?php

// get the q parameter from URL
$q = $_REQUEST["q"];
$q = strtolower($q);

$hint = "";

$sqlk = "SELECT * FROM events WHERE name LIKE '%$q%' OR description LIKE '%$q%'";
$resultk = $link->query($sqlk);

$i = 0;
$p = "";
if ($resultk->num_rows > 0) {
    // output data of each row
    while ($row = $resultk->fetch_assoc()) {
        if ($row['status'] === "active") {
            $hint = '<p>Event: ' . $row["name"] . ' in ' . $row["location"] . ' : from ' . $row["start_time"] . ' to ' . $row["end_time"] . ' </p>';
        }
        echo $hint === "" ? "no suggestion" : $hint;
    }
} else {
    echo "No search result!";
}

?>