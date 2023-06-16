<?php

    include('./db.php');
    
    $code = $_POST['code'];

    $sql = "SELECT * FROM coupons WHERE `coupon_code`='$code'";
    
    $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        $cCode = $row['coupon_code'];
        $cType = $row['coupon_type'];
        if($cType == 'percentage'){
          $cPercentage = $row['discount_percentage'];
          echo $cType. ",". $cPercentage."."; 
        }
        elseif($cType == 'amount'){
          $cAmount = $row['discount_amount'];
          echo $cType. ",". $cAmount.".";
        }

      }

?>