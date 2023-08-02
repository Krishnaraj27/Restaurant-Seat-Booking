<?php 
             include("../db.php");
             
             $cpnId = $_POST['couponID'];
             $cpncode = $_POST['couponCode'];
             $cpnType = $_POST['couponType'];
             $discPer = $_POST['discountPercentage'];
             $discAmt = $_POST['discountAmount'];
             $cpnActive = $_POST['couponActive'];

             $sql = "UPDATE `coupons` SET `coupon_code`='$cpncode',`coupon_type`='$cpnType',`discount_amount`='$discAmt',`discount_percentage`='$discPer',`active`='$cpnActive' WHERE `c_id`='$cpnId'";

             if (mysqli_query($conn, $sql)) {
                echo "<script>
                      alert('Coupon updated successfully !!');
                      window.location.href='./coupons.php';
                      </script>";
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

            
            
      ?>