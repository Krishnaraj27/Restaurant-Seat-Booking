<?php

    include('./db.php');

   // Get the form data
    $bookingdate = $_POST['bookingdate'];
    $daytype = $_POST['daytype'];
    $session = $_POST['session'];
    $email = $_POST['email'];
    $seats = $_POST['seatsid'];
    $price = $_POST['totalPrice'];
    $count = $_POST['count'];
    $name = $_POST['name'];
    $mobile = $_POST['number'];
    $coupon = $_POST['cpnSelect'];
    $discount = $_POST['discount'];
    $netTotal = $_POST['netTotal'];

    // $dt = $bookingdate->format('Y-m-d H:i:s');
    // $date = substr($dt,0,10);
    
    
    // Insert the data into the bookings table
    $sql = "INSERT INTO `booked` (`booking_id` , `date` , `email` , `session` , `name`, `mobile`, `count` , `price` ,`seats_id`,`coupon_code`,`discount_amount`,`total`) VALUES  (NULL,'$bookingdate', '$email', '$session','$name','$mobile', '$count','$price','$seats','$coupon','$discount','$netTotal')";
    
    if (mysqli_query($conn, $sql)) {

      echo "<script>
            alert('Booking created successfully !!');
            window.location.href='./index.php';
            </script>";
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    