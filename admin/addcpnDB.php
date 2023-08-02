<?php 
             include("../db.php");

             $cpncode = $_POST['couponCode'];
             $cpnType = $_POST['couponType'];
             $discPer = $_POST['discountPercentage'];
             $discAmt = $_POST['discountAmount'];

             $sql = "INSERT INTO `coupons` (`c_id` , `coupon_code` , `coupon_type` , `discount_amount` , `discount_percentage`, `active`) VALUES  (NULL,'$cpncode', '$cpnType', '$discAmt','$discPer','yes')";

             if (mysqli_query($conn, $sql)) {
                echo "<script>
                      alert('Coupon added successfully !!');
                      window.location.href='./coupons.php';
                      </script>";
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

            
            
      ?>