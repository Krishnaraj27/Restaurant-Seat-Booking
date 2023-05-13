<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','booking') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM admin_user WHERE username='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["id"])) {
    header("Location:index.php");
    }

?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<title>Admin Login</title>
</head>
<body>

<div class="container my-4 col-md-6">
    <div class="py-4 px-4" style="border: 1px solid black; border-radius: 4px;">
        <h3 class="text-center mb-4">Admin Login</h3>
        <form name="frmUser" method="post" action="login.php" align="center">
            <div class="message"><?php if($message!="") { echo $message; } ?></div>
            <div class="mb-3">
                <input class="form-control" type="text" name="user_name" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input class="form-control" type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" class="btn btn-dark" name="submit" value="Submit">
            <input type="reset" class="btn btn-dark">
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>

</body>
</html>