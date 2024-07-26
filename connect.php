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

        $no_of_set_per_game = $_POST["no_of_set_per_game"];
        $no_of_point_per_set = $_POST["no_of_point_per_set"];
        $two_point_difference_to_win_set = $_POST["two_point_difference_to_win_set"];
        $tie_break_in_last_set = $_POST["tie_break_in_last_set"];
        $termination_of_match = $_POST["termination_of_match"];
        $timeout1 = $_POST["timeout1"];
        $team_timeout = $_POST["team_timeout"];
        $duration_of_a_team_timeout = $_POST["duration_of_a_team_timeout"];
        $tech_time_out = $_POST["tech_time_out"];
        $duration_of_tech_timeout = $_POST["duration_of_tech_timeout"];
        $duration_of_game_interval = $_POST["duration_of_game_interval"];

    
        // Prepare and bind
        $stmt = $com->prepare("INSERT INTO match_setup (no_of_set_per_game, no_of_point_per_set, two_point_difference_to_win_set, tie_break_in_last_set, termination_of_match, timeout1, team_timeout, duration_of_a_team_timeout, tech_time_out, duration_of_tech_timeout, duration_of_game_interval) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("iissssiisii", $no_of_set_per_game, $no_of_point_per_set, $two_point_difference_to_win_set, $tie_break_in_last_set, $termination_of_match, $timeout1, $team_timeout, $duration_of_a_team_timeout, $tech_time_out, $duration_of_tech_timeout, $duration_of_game_interval);
    
        // Execute the statement
        if ($stmt->execute() === TRUE) {
            // Redirect to another page after successful save
            header("Location: teama.html");
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