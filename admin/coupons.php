<?php
session_start();
?>
<?php include('../db.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Lounge | Admin - Coupons</title>

    <!-- Bootstrap links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"></script>
<style>

    .disp-none{
        display:none;
    }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand mx-2" href="#">Cloud Lounge</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active mx-2" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active mx-2" aria-current="page" href="./coupons.php">Manage Coupons</a>
        </li>
      </ul>
      <div class="d-flex"> 
        <?php
        if(@$_SESSION["name"]) {
        ?>
          <a class="nav-link mx-5" href="./logout.php" style="color: white;">Logout</a>
        <?php } else {?>
          <a class="nav-link mx-5" href="./login.php" style="color: white;">Login</a>
        <?php }?>
      </div>
    </div>
  </div>
</nav>

<?php
if(@$_SESSION["name"]) {
?>


      <!-- Main Body -->

      <main>
        <h1 class="display-4 text-center">Coupons</h1>

        <div id="coupon-ctn" class="container my-4">
            <?php 
                $sql = "SELECT* FROM coupons";
                $result = $conn->query($sql);

                if($result->num_rows>0){
                    echo "<table class='table'>
                    <thead>
                      <tr>
                        <th scope='col'>Coupon ID</th>
                        <th scope='col'>Coupon Code</th>
                        <th scope='col'>Coupon Type</th>
                        <th scope='col'>Discount Amount</th>
                        <th scope='col'>Discount Percentage</th>
                        <th scope='col'>Active</th>
                        <th scope='col'>Use Counts</th>
                        <th scope='col'>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                    while ($row = $result->fetch_assoc()) {
                        $c_id = $row['c_id'];
                        $c_code = $row['coupon_code'];

                        $sql2 = "SELECT * FROM `booked` WHERE `coupon_code`='$c_code'";
                        $result2 = $conn->query($sql2);

                        $count = 0;

                        if($result2->num_rows>0){
                            while ($row2 = $result2->fetch_assoc()) {
                                $count += 1;
                            }
                        }
                        echo "<tr>
                        <td>{$row['c_id']}</td>
                        <td>{$row['coupon_code']}</td>
                        <td>{$row['coupon_type']}</td>
                        <td>{$row['discount_amount']}</td>
                        <td>{$row['discount_percentage']}</td>
                        <td>{$row['active']}</td>
                        <td>$count</td>
                        <td><button class='btn btn-dark' onclick='window.location.href = `editCpn.php?id=$c_id`;'>Edit</button> <button class='btn btn-danger' onclick='deleteCpn($c_id)'>Delete</button></td>
                      </tr>";
                      }

                }
                else{
                    echo "No coupons";
                   }
            ?>
        </div>
        <button class="btn btn-primary" id="addCoupon" onclick="window.location.href = './addcoupon.php';">Add new</button>
        <hr>
      </main>


<?php
  }else 
  {
?>


  <div class="container col-md-6 my-4">
    <h2 class="text-center">Please Login to view dashboard</h2>
  </div>

<?php } ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> 

<script>
  function deleteCpn(c_id){
    if (confirm("Are you sure to delete this coupon?")) {
      $.ajax({    
                type: "POST",
                url: "deleteCpn.php",             
                data: {
                       id : c_id
                    },                  
                success: function(data){                    
                  alert("Coupon Deleted Successfully");
                  window.location.href = './coupons.php'
                }
            });
    } else {
      return false;
    }
  }


</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />

</body>
</html>