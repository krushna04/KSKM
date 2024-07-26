<?php
    $servername = "localhost";
    $username = "root"; // Default XAMPP username
    $password = ""; // Default XAMPP password
    $dbname = "kskm";
    $com = new mysqli($servername, $username, $password, $dbname);

    if ($com->connect_error) {
        die("Connection failed: " . $com->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $playerb_1 = $_POST["playerb_1"];
        $playerb_2 = $_POST["playerb_2"];
        $playerb_3 = $_POST["playerb_3"];
        $playerb_4 = $_POST["playerb_4"];
        $playerb_5 = $_POST["playerb_5"];
        $playerb_6 = $_POST["playerb_6"];
        $playerb_7 = $_POST["playerb_7"];

        // Prepare and bind
        $stmt = $com->prepare("INSERT INTO team_b (playerb_1, playerb_2, playerb_3, playerb_4, playerb_5, playerb_6, playerb_7) VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssss", $playerb_1, $playerb_2, $playerb_3, $playerb_4, $playerb_5, $playerb_6, $playerb_7);
    
        // Execute the statement
        if ($stmt->execute() === TRUE) {
            // Redirect to another page after successful save
            header("Location: start.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    
        // Close the statement
        $stmt->close();
    }
    
    // Close the connection
    $com->close();
?>