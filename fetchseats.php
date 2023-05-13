<?php

    // Connect to the database
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "booking"; 
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    else{
      // echo "Database Connected"."\n";
    }

    $date = $_POST['selected'];
    // $date = "2023-04-18";
    $session = $_POST['sess'];

    $sql = "SELECT `seats_id` FROM booked WHERE `date`='$date' AND `session`='$session'";
    
    $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        $seats = $row['seats_id'];
        echo $seats; 
      }

?>