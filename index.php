<html lang="en">
<head>
 
    <meta charset="UTF-8"> 
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        	
    <title>Cloud Lounge</title>
    <meta name='robots' content='max-image-preview:large' />
    <script>window._wca = window._wca || [];</script>
    <link rel='dns-prefetch' href='//stats.wp.com' />
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel="alternate" type="application/rss+xml" title="Cloud Lounge &raquo; Feed" href="https://www.cloudlounge.in/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Cloud Lounge &raquo; Comments Feed" href="https://www.cloudlounge.in/comments/feed/" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel=”stylesheet” href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
        
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- <script src="booking.js"></script> -->
    
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   
        <style type="text/css">
    	*{
        margin: 0;
        padding: 0;
        font-family: 'Lato', sans-serif;
    }
    input{
        width: 100%;
    height: 2.5em;
    }
    body{
        background-color: #242324;
        color: #ffffff;
    }
    
    .movie-container{
        margin: 20px 0;
    }
    
    .movie-container select{
        background: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        padding: 5px 15px 15px 15px;
        width: 100%;
        appearance: none;
    }
    
    .container{
        perspective: 5000px;
        margin-bottom: 30px;
    }
    
    .seat{
        background: #ffffff;
        height: 20px; width: 25px;  margin: 24px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        transition: .3s ease-in-out;
    }

    .demo-selected{
        background: #5feaf6;
        height: 20px; width: 25px;  margin: 24px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .demo-seat{
        background: #ffffff;
        height: 20px; width: 25px;  margin: 24px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .demo-occupied{
        background: #444451;
        height: 20px; width: 25px;  margin: 24px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    
    .seat-right{
        transform: rotate(270deg);
    }
    
    .seat-left{
        transform: rotate(90deg);
    }
    .seat-bottom{
        transform: rotate(180deg);
    }
    
    .seat.selected{
        background: #5feaf6;
    }
     
    .seat.occupied{
        background: #444451;
    }

    
    .seat:not(.occupied):hover{
        cursor: pointer;
        transform: scale(1.2);
        /*width: 27px;*/
        /*height: 22px;*/
    }
    
    .showcase .seat:not(.occupied):hover{
        cursor: default;
        transform: scale(1.2);
        /* width: 30px;*/
        /*height: 25px;*/
    }
    .select-icon{
        background: #5feaf6;
    }
    .showcase{
        background: rgba(0,0,0, 0.1);
        padding: 5px 10px;
        border-radius: 5px;
        color: #777777;
        list-style: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .showcase li {
        display: flex;
        align-items: center;
        margin: 0 10px;
    }
    
    .showcase li small{
        margin-left: 2px;
    }
    
    .row{
        display: flex;
    }
    
    .table{
        background: #ffffff;
        height: 100%;
        width: 100%;
        margin: 15px 0;
        box-sizing: 0 3px 10px rgba(255, 255, 255, 0.7);
    }
    
    p.text{
        margin: 5px 0;
    }
    
    p.text span{
        color: #5feaf6;
    }
    
    .opacity-0{
        opacity: 0;
    }
    
    /* .chair-check .form-check-input:checked + .form-check-label .seat {
        background: #5feaf6;
    } */
    
    .sec-start{
        margin-top: 2.5rem;
    }
    .disp-none{
        display:none;
    }
    #summary-ctn{
        display: none;
    }
    </style>
</head>

<body>
    <div class="conatiner-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="./banner.png" alt="First slide">
                    </div>
                    
                  </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="conatiner-fluid sec-start">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="h1 text-center book-heading"> Book Here </h1>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="movie-container">
        <form action="bookdb.php" method="POST">
            <div class="form-group">
                <label for="bookingdate">Pick a Date : (YYYY/MM/DD)</label>
                <input type="text" id="date-input" name="bookingdate" onchange="dateSelect()" readonly='true'><br/>
            </div>
           
            <div class="disp-none">
                <label>Choose a day type : </label>
                <input type="radio" id="weekday" name="daytype" value="weekday">
                <label for="weekday">Weekday</label>
                <input type="radio" id="weekend" name="daytype" value="weekend">
                <label for="weekend">Weekend</label>
                <br><br>
            </div>
            <div id="session-container">
              <label for="session">Choose a session : </label>
             <select id="session" name="session" disabled>
                <option value="0">Select Session</option>
                <option value="Lunch1">Lunch 1(time)</option>
                <option value="Lunch2">Lunch 2(time)</option>
                <option value="Mocktail_Happy_Hours">Mocktail Happy Hours(time)</option>
                <option value="Mocktail_Evening_Hours">Mocktail Evening Hours(time)</option>
                <option value="Mocktail_Sunset">Mocktail Sunset(time) </option>
                <option value="Mocktail_Prime_Time">Mocktail Prime Time(time)</option>
                <option value="Dinner1">Dinner 1(time)</option>
                <option value="Dinner2">Dinner 2(time)</option>
             </select>
              <br/><br/>
              <label for="price">Price : </label>
              <span id="price"></span>
            </div><br/>

            
            <div class="container" id="table-ctn">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="demo-seat" id="available-demo"></div>
                        </div>
                        <div class="col">
                            <div class="demo-selected" id="selected-demo"></div>
                        </div>
                        <div class="col">
                            <div class="demo-occupied" id="occupied-demo"></div>
                        </div>
                    </div>
                    <div class="row text-left mb-3">
                        <div class="col">
                            <label for="available-demo">Available</label>
                        </div>
                        <div class="col">
                            <label for="selected-demo">Selected</label>
                        </div>
                        <div class="col">
                            <label for="occupied-demo">Occupied</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-right">
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked1">
                            <label class="form-check-label" for="Booked1">
                                <div class="seat" id="s1"></div>
                            </label>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked2">
                            <label class="form-check-label" for="Booked2">
                                <div class="seat" id="s2"></div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 text-right">
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked3">
                            <label class="form-check-label" for="Booked3">
                                <div class="seat seat-right" id="s3"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked4">
                            <label class="form-check-label" for="Booked4">
                                <div class="seat seat-right" id="s4"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked5">
                            <label class="form-check-label" for="Booked5">
                                <div class="seat seat-right" id="s5"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked6">
                            <label class="form-check-label" for="Booked6">
                                <div class="seat seat-right" id="s6"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked7">
                            <label class="form-check-label" for="Booked7">
                                <div class="seat seat-right" id="s7"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked8">
                            <label class="form-check-label" for="Booked8">
                                <div class="seat seat-right" id="s8"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked9">
                            <label class="form-check-label" for="Booked9">
                                <div class="seat seat-right" id="s9"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked10">
                            <label class="form-check-label" for="Booked10">
                                <div class="seat seat-right" id="s10"></div>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="table"></div>
                    </div>
                    <div class="col-3">
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked11">
                            <label class="form-check-label" for="Booked11">
                                <div class="seat seat-left" id="s11"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked12">
                            <label class="form-check-label" for="Booked12">
                                <div class="seat seat-left" id="s12"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked13">
                            <label class="form-check-label" for="Booked13">
                                <div class="seat seat-left" id="s13"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked14">
                            <label class="form-check-label" for="Booked14">
                                <div class="seat seat-left" id="s14"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked15">
                            <label class="form-check-label" for="Booked15">
                                <div class="seat seat-left" id="s15"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked16">
                            <label class="form-check-label" for="Booked16">
                                <div class="seat seat-left" id="s16"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked17">
                            <label class="form-check-label" for="Booked17">
                                <div class="seat seat-left" id="s17"></div>
                            </label>
                        </div>
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked18">
                            <label class="form-check-label" for="Booked18">
                                <div class="seat seat-left" id="s18"></div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-right">
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked19">
                            <label class="form-check-label" for="Booked19">
                                <div class="seat seat-bottom" id="s19"></div>
                            </label>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="form-check pl-0 chair-check">
                            <input class="form-check-input w-auto opacity-0 chkbox" type="checkbox" value="" id="Booked20">
                            <label class="form-check-label" for="Booked20">
                                <div class="seat seat-bottom" id="s20"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="disp-none" >
                <input type="number" name="totalPrice" id="totalPrice" value="0">
                <input type="number" name="count" id="seatsCount" value="0">
                <input type="text" name="seatsid" id="seatsid" value=" ">
            </div>
           
            <div id="summary-ctn">
                <p class="text">
                    You have selected <span id="count">0</span> seats for a price of ₹<span id="total">0</span><br>Fill your details below to continue : 
                    <div class="row my-5">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
                        </div>
                        <div class="col">
                            <input type="tel" class="form-control" placeholder="Mobile Number" id="number" name="number" required>
                        </div>
                        <div class="col">
                            <input type="mail" class="form-control" placeholder="Email" id="email" name="email" required>
                        </div>
                    </div>   
                    <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                </p>
            </div>
        </form>
        </div>
         </div>
            <div class="d-grid gap-2 col-4 mx-auto" >
                <button class="btn btn-primary" id="showSeats" >Show Seats</button>
            </div>
        </div>
    </div>

    
        
<script>
        document.getElementById('showSeats').style.display = 'none';
        const container = document.querySelector('.container');
        const dateInput = document.getElementById("date-input");
        const weekdayRadio = document.getElementById("weekday");
        const weekendRadio = document.getElementById("weekend");
        const sessionSelect = document.getElementById("session");
        const sessionContainer = document.getElementById("session-container")
        const priceSpan = document.getElementById("price");
        const countSpan = document.getElementById("count");
        const totalSpan = document.getElementById("total");
        const summary = document.getElementById("summary-ctn");
        const tableContainer = document.getElementById("table-ctn");
        const sessionPrices = {
          weekday: {
            Lunch1: 3999,
            Lunch2: 3999,
            Mocktail_Happy_Hours: 1999,
            Mocktail_Evening_Hours: 2999,
            Mocktail_Sunset: 2999,
            Mocktail_Prime_Time: 2999,
            Dinner1: 4999,
            Dinner2: 4999
          },
          weekend: {
            Lunch1: 3999,
            Lunch2: 3999,
            Mocktail_Happy_Hours: 1999,
            Mocktail_Evening_Hours: 2999,
            Mocktail_Sunset: 3999,
            Mocktail_Prime_Time: 2999,
            Dinner1: 3999,
            Dinner2: 3999
          }
        };
        let price = 0;
        let totalPrice = 0;
        let selectedSession = null;
        let selectedSeatsCount = 0;
        tableContainer.style.display = "none";


        // Set date input range
        
        $(document).ready(function() {
            $("#date-input").datepicker({ dateFormat: 'yy/mm/dd', minDate : -0, maxDate : "+3W"});
        });


        // Function when dateinput is selected
        
        function dateSelect() {
            var date = dateInput.value
            var selectedDate = new Date(date);
            var dayOfWeek = selectedDate.getDay();                   
            if (dayOfWeek >= 1 && dayOfWeek <= 4) {
                weekdayRadio.checked = true;
                sessionContainer.style.display = "block";
                var dayType = "weekday";
            } else {
                weekendRadio.checked = true;
                sessionContainer.style.display = "block";
                var dayType = "weekend";
            }
            // console.log(dayOfWeek)
            priceSpan.style.display = "none";
            selectedSession = null;
            if(dateInput.value != null){
            sessionSelect.disabled = false;
            }
            $('#session').val('0');
            selectedSeatsCount = 0;
            summary.style.display = "none";
            document.getElementById('showSeats').style.display = 'none';
            
            if (selectedSession == null) {
                tableContainer.style.display = "none";
            }
            console.log(dayOfWeek)
            console.log(dayType)

        }
        
        // Session select code

        sessionSelect.addEventListener("change", function() {
            var date = dateInput.value
            var selectedDate = new Date(date);
            var dayOfWeek = selectedDate.getDay();                   
            if (dayOfWeek >= 1 && dayOfWeek <= 4) {
                weekdayRadio.checked = true;
                sessionContainer.style.display = "block";
                var dayType = "weekday";
            } else {
                weekendRadio.checked = true;
                sessionContainer.style.display = "block";
                var dayType = "weekend";
            }
            selectedSession = this.value;
            // const dayType = weekdayRadio.checked ? "weekday" : "weekend";
            priceSpan.style.display = "none";
            if(selectedSession != "0"){
                price = sessionPrices[dayType][selectedSession];
                priceSpan.style.display = "inline";
                priceSpan.textContent = "₹" + price;
                document.getElementById('showSeats').style.display = 'block';
            }
            tableContainer.style.display = "none";
            summary.style.display = "none";
        });

        var selectedSeatsId = "";


        // Function to update total seats count and price

        function updateSelectedCount(price, selectedSeatsId) {
            const selecteddate = document.getElementById('date-input').value;
            const selectedSeats = document.querySelectorAll('.row .seat.selected');

            selectedSeatsCount = selectedSeats.length;
            document.getElementById('seatsCount').value = selectedSeatsCount;

            countSpan.innerText = selectedSeatsCount;
            totalPrice = selectedSeatsCount * price;
            totalSpan.innerText = totalPrice;
            document.getElementById('totalPrice').value = totalPrice;

            for (let i = 0; i < selectedSeats.length; i++) {
                var id = selectedSeats.item(i).id;
                selectedSeatsId += id + ',';
            }

            document.getElementById('seatsid').value = selectedSeatsId;

        }


        // Seat selection code

        tableContainer.addEventListener('click', e => {
           
            if (
                e.target.classList.contains('seat') &&
                !e.target.classList.contains('occupied')
                ) {
                    e.target.classList.toggle('selected');
                    updateSelectedCount(price,selectedSeatsId);
                }
            if (selectedSeatsCount > 0 && selectedSession != null) {
                summary.style.display = "inline";
            }
            else{
                summary.style.display = "none";
            }
            

            });



        // Show seats and Fetch occupied seats using AJAX 

        $(document).on('click','#showSeats',function(e){
            if(sessionSelect.value != "0"){
                document.getElementById('showSeats').style.display = 'none';
                // var date = new Date();
                // date = document.getElementById('date-input').value;
                // date.toString();
                let date = document.getElementById('date-input').value;

                var session = document.getElementById('session').value;

                for (let i = 1; i <=20 ; i++) {
                    var id = "s"+ i.toString()
                    var st = document.getElementById(id);
                    st.classList.remove("occupied");
                    st.classList.remove("selected");
                    // st.style.background = "#ffffff";
                }
                for (let i = 1; i <= 20; i++) {
                    var id = "Booked"+ i.toString()
                    var box = document.getElementById(id)
                    box.disabled = false               
                }
                $.ajax({    
                    type: "POST",
                    url: "fetchseats.php",             
                    data: {
                        selected : date,
                        sess : session
                        },                  
                    success: function(data){
                        if(data != ""){
                            for (let i = 0; i < data.length; i++) {
                                for (let j = i; j < data.length; j++) {
                                if(data[j]==","){
                                    var str = data.slice(i,j);
                                    let seat = document.getElementById(str);
                                    seat.classList.add("occupied");
                                    let p1 = seat.parentNode;
                                    let id = p1.getAttribute('for');
                                    let p2 = document.getElementById(id);
                                    p2.disabled =true;
                                    // console.log(p1,p2)
                                    i=j+1;
                                }
                                };
                                
                            }
                        }
                        else{
                            console.log("No seats booked")
                        }

                        tableContainer.style.display = "block";
                    }
                });
            } 
            else{
                alert("Please select a session")
            }           
        });

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />

</body>
</html>
