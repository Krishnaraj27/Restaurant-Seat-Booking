<?php 
             include("../db.php");
             
             $cpnId = $_POST['id'];

             $sql = "DELETE FROM `coupons` WHERE `c_id`='$cpnId'";

             if (mysqli_query($conn, $sql)) {
                echo "<script>
                      alert('Coupon deleted successfully !!');
                      window.location.href='./coupons.php';
                      </script>";
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
            
?>