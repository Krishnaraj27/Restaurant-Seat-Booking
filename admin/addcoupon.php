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
    <title>Admin - Add Coupon</title>

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
        <h2 class="display-4 text-center">Add Coupon

        </h2>
        <div class="container my-4">
        <form method="POST" action="addcpnDB.php">
            <div class="row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="couponCode" name="couponCode" placeholder="Coupon Code" required>
                </div>
            </div>
            <div class="row my-3">
              <div class="col-md-6">
                <p>Select coupon type :</p>
                <select class="form-select" name="couponType" id="couponType">
                  <option value="percentage">Percentage</option>
                  <option value="amount">Amount</option>
                </select>
              </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                  <label for="discountPercentage">Discount Percentage :</label>
                  <input type="number" class="form-control" id="discountPercentage" name="discountPercentage" max="100"  min="1" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="discountAmount">Discount Amount :</label>
                  <input type="number" class="form-control" id="discountAmount" name="discountAmount" disabled>
                </div>
            </div>
            <div class="form-row">
            <button type="submit" class="btn btn-primary my-3">Add</button>
            </div>
        </form>
        </div>
        
      </main>


<?php
  }else 
  {
?>


  <div class="container col-md-6 my-4">
    <h2 class="text-center">Please Login as Admin</h2>
  </div>

<?php } ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> 

<script>
  const discountPer = document.getElementById('discountPercentage')
  const discountAmt = document.getElementById('discountAmount')
  const cpnType = document.getElementById('couponType')

  cpnType.addEventListener("change", function(){
    if(this.value == "percentage"){
      discountPer.disabled = false
      discountPer.required = true
      discountAmt.disabled = true
      discountAmt.required = false
      discountAmt.value = 0
    }
    else if( this.value == "amount"){
      discountAmt.disabled = false
      discountAmt.required = true
      discountPer.disabled = true
      discountPer.required = false
      discountPer.value = 0
    }
  });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />

</body>
</html>