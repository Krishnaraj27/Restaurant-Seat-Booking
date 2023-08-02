<?php

    include('./db.php');

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