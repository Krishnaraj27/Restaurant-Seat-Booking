<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Lounge | Admin</title>

    <!-- Bootstrap links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"></script>
<style>
    #search-ctn{
      border: 1px solid black;
      border-radius: 5px;
    }

    input{
      width: 100%;
      height: 2.5em;
    }

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
          <a class="nav-link active mx-2" aria-current="page" href="../index.php">Home</a>
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
        <h1 class="display-4 text-center">Welcome <?php echo $_SESSION["name"]; ?></h1>
        <div class="container py-4" id="search-ctn">
           <h4 class="">Search bookings</h4>
              <div class="form-group my-4">
                <label for="bookingdate">Pick a Date : </label>
                <input type="text" id="date-input" name="bookingdate" onchange="dateUpdate()"><br/>
              </div>
            
              <div id="session-container" class="my-2 disp-none">
                <label for="session">Choose a session : </label>
                <select id="session" name="session">
                  <option value="Lunch1">Lunch 1(time)</option>
                  <option value="Lunch2">Lunch 2(time)</option>
                  <option value="Mocktail_Happy_Hours">Mocktail Happy Hours(time)</option>
                  <option value="Mocktail_Evening_Hours">Mocktail Evening Hours(time)</option>
                  <option value="Mocktail_Sunset">Mocktail Sunset(time) </option>
                  <option value="Mocktail_Prime_Time">Mocktail Prime Time(time)</option>
                  <option value="Dinner1">Dinner 1(time)</option>
                  <option value="Dinner2">Dinner 2(time)</option>
                </select>
              </div>
              <button value="Show" class="disp-none" name="show" id="show">Show Bookings</button>
        </div>
        <div id="booking-ctn" class="container my-4 py-4">
          
        </div>     
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
  const container = document.querySelector('.container');
  const dateInput = document.getElementById("date-input");
  const sessionSelect = document.getElementById("session");
  const sessionCtn = document.getElementById("session-container");
  const showBtn = document.getElementById('show');
  sessionSelect.selectedIndex = -1;
  var selectedDate;

  function dateUpdate() {
            selectedDate = dateInput.value;
            sessionCtn.style.display = "block";
            showBtn.style.display = "none";
            sessionSelect.selectedIndex = -1;
          }

  sessionSelect.addEventListener("change", function(){
      showBtn.style.display = "block";
  });

  // Set date input range     
  $(document).ready(function(){
            $("#date-input").datepicker({ dateFormat: 'yy/mm/dd',minDate : "-2M", maxDate : "+2M"});
        });

      
          $(document).on('click','#show',function(e){
            var dt = selectedDate;
            var ses = sessionSelect.value;
            $.ajax({    
                type: "POST",
                url: "database.php",             
                data: {
                       date : dt,
                       session : ses
                    },                  
                success: function(data){                    
                  $("#booking-ctn").html(data);
                }
            });
        });

  // Code to disable form resubmission modal on refreshing page
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />

</body>
</html>