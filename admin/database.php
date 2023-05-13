<?php 
             $servername = "localhost"; 
             $username = "root"; 
             $password = ""; 
             $dbname = "booking"; 
             
             // Create connection
             $conn = new mysqli($servername, $username, $password, $dbname);
             // Check connection
             if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
             }
             else{
               // echo "Database Connected"."\n";
             }

             $bdate = $_POST['date'];
             $bsession = $_POST['session'];
             $sql = "SELECT * FROM booked WHERE `date` = '$bdate' AND `session`= '$bsession';";
             $result = $conn->query($sql);

             if($result->num_rows > 0){
                $total = 0;
                $count = 0;
                echo " <h6>Showing bookings of <b>{$bdate}</b> of <b>{$bsession}</b></h6><br>
                <table class='table'>
                  <thead>
                    <tr>
                      <th scope='col'>Booking ID</th>
                      <th scope='col'>Name</th>
                      <th scope='col'>Mobile</th>
                      <th scope='col'>Email</th>
                      <th scope='col'>Count</th>
                      <th scope='col'>Price</th>
                      <th scope='col'>Seats ID</th>
                      <th scope='col'>Booked On</th>
                    </tr>
                  </thead>
                  <tbody>";

                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                  <td>{$row['booking_id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['mobile']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['count']}</td>
                  <td>{$row['price']}</td>
                  <td>{$row['seats_id']}</td>
                  <td>{$row['booked_on']}</td>
                </tr>";
                $total += (int)$row['price'];
                $count += (int)$row['count'];
                }
                echo " 
                </tbody>
                </table>

                <br><h6>Total Amount : {$total} <br> Total Seats : {$count}</h6>
                ";
             }
             else{
              echo "No booking";
             }
            
      ?>