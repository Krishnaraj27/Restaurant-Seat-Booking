<?php

   // Get the form data
    $bookingdate = $_POST['bookingdate'];
    $daytype = $_POST['daytype'];
    $session = $_POST['session'];
    $email = $_POST['email'];
    // $mobile = $_POST['mobile'];
    $seats = $_POST['seatsid'];
    $price = $_POST['totalPrice'];
    $count = $_POST['count'];
    $name = $_POST['name'];
    $mobile = $_POST['number'];

    // $dt = $bookingdate->format('Y-m-d H:i:s');
    // $date = substr($dt,0,10);
    // Connect to the database
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "booking"; 
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    
    // Insert the data into the bookings table
    $sql = "INSERT INTO `booked` (`booking_id` , `date` , `email` , `session` , `name`, `mobile`, `count` , `price` ,`seats_id`) VALUES  (NULL,'$bookingdate', '$email', '$session','$name','$mobile', '$count','$price','$seats')";
    
    if (mysqli_query($conn, $sql)) {
      echo "<script>
            alert('Booking created successfully !!');
            window.location.href='./index.php';
            </script>";
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    