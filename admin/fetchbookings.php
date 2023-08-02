<?php 
             include("../db.php");

             $bdate = $_POST['date'];
             $bsession = $_POST['session'];
             $sql = "SELECT * FROM booked WHERE `date` = '$bdate' AND `session`= '$bsession';";
             $result = $conn->query($sql);

             if($result->num_rows > 0){
                $price = 0;
                $discount = 0;
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
                      <th scope='col'>Coupon</th>
                      <th scope='col'>Discount</th>
                      <th scope='col'>Net Total</th>
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
                  <td>{$row['coupon_code']}</td>
                  <td>{$row['discount_amount']}</td>
                  <td>{$row['total']}</td>
                  <td>{$row['seats_id']}</td>
                  <td>{$row['booked_on']}</td>
                </tr>";
                $total += (int)$row['total'];
                $count += (int)$row['count'];
                $price += (int)$row['price'];
                $discount += (int)$row['discount_amount'];
                }
                echo " 
                </tbody>
                </table>

                <br><h6>Total Price : {$total} <br>Discount : {$discount}<br>Net Total : {$total}  <br>Total Seats : {$count}</h6>
                ";
             }
             else{
              echo "No booking";
             }
            
      ?>