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

        $playera_1 = $_POST["playera_1"];
        $playera_2 = $_POST["playera_2"];
        $playera_3 = $_POST["playera_3"];
        $playera_4 = $_POST["playera_4"];
        $playera_5 = $_POST["playera_5"];
        $playera_6 = $_POST["playera_6"];
        $playera_7 = $_POST["playera_7"];

        // Prepare and bind
        $stmt = $com->prepare("INSERT INTO team_a (playera_1, playera_2, playera_3, playera_4, playera_5, playera_6, playera_7) VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssss", $playera_1, $playera_2, $playera_3, $playera_4, $playera_5, $playera_6, $playera_7);
    
        // Execute the statement
        if ($stmt->execute() === TRUE) {
            // Redirect to another page after successful save
            header("Location: teamb.html");
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