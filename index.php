<?php

include 'config.php';
session_start();

// page redirect
// $usermail="";
// $usermail=$_SESSION['usermail'];
// if($usermail == true){

// }else{
//   header("location: index.php");
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <title>Hotel blue bird</title>
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./admin/css/booking.css">
    <style>
      #guestdetailpanel{
        display: none;
      }
      #guestdetailpanel .middle{
        height: 450px;
      }
    </style>
</head>

<body>
  <nav>
    <div class="logo">
      <img class="sandslogo" src="./image/sandslogo.png" alt="logo">
      <p>sands</p>
    </div>
    <ul>
      <li><a href="#firstsection">Home</a></li>
      <li><a href="#secondsection">Rooms</a></li>
      <li><a href="#thirdsection">Facilites</a></li>
      <li><a href="#contactus">Contact us</a></li>
      <!-- <a href="./logout.php"><button class="btn btn-danger">Logout</button></a> -->
    </ul>
  </nav>

  <section id="firstsection" class="carousel slide carousel_section" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="carousel-image" src="./image/hotel1.jpg">
        </div>
        <div class="carousel-item">
            <img class="carousel-image" src="./image/hotel2.jpg">
        </div>
        <div class="carousel-item">
            <img class="carousel-image" src="./image/hotel3.jpg">
        </div>
        <div class="carousel-item">
            <img class="carousel-image" src="./image/hotel4.jpg">
        </div>

        <div class="welcomeline">
          <h1 class="welcometag">Welcome to Sands Stay</h1>
        </div>

      <!-- bookbox -->
      <div id="guestdetailpanel">
        <form action="" method="POST" class="guestdetailpanelform">
            <div class="head">
                <h3>RESERVATION</h3>
                <i class="fa-solid fa-circle-xmark" onclick="closebox()"></i>
            </div>
            <div class="middle">
                <div class="guestinfo">
                    <h4>Guest information</h4>
                    <input type="text" name="First_Name" placeholder="Enter First name" autocomplete="given-name">
                    <input type="text" name="Last_Name" placeholder="Enter last name" autocomplete="family-name">
                    <input type="email" name="Email" placeholder="Enter Email" autocomplete="email">
                    <input type="text" name="Phone" placeholder="Enter Phoneno" autocomplete="tel">
                    <input type="text" name="Guest_id" placeholder="Enter Aadhar ID" autocomplete="off">
                    <input type="text" name="Account_no" placeholder="Enter Account no." autocomplete="off">
                </div>

                <div class="line"></div>

                <div class="reservationinfo">
                    <h4>Reservation information</h4>
                    <select name="RoomType" class="selectinput">
						<option value selected >Type Of Room</option>
                        <option value="Superior Room">SUITE</option>
                        <option value="Deluxe Room">DELUXE ROOM</option>
						<option value="Guest House">DOUBLE ROOM</option>
						<option value="Single Room">SINGLE ROOM</option>
                    </select>
                    <select name="NoofRoom" class="selectinput">
						<option value selected >No of Room</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <select name="Meal" class="selectinput">
						<option value selected >Meal</option>
                        <option value="Room only">Room only</option>
                        <option value="Breakfast">Breakfast</option>
						      <option value="Half Board">Half Board</option>
						      <option value="Full Board">Full Board</option>
					</select>
                    <div class="datesection">
                        <span>
                            <label for="cin"> Check-In</label>
                            <input name="cin" type ="date" autocomplete="bday">
                        </span>
                        <span>
                            <label for="cin"> Check-Out</label>
                            <input name="cout" type ="date" autocomplete="bday">
                        </span>
                    </div>
                </div>
            </div>
            <div class="footer">
                <button class="btn btn-success" name="guestdetailsubmit">Submit</button>
            </div>
        </form>

        <!-- ==== room book php ====-->
        <?php       
            if (isset($_POST['guestdetailsubmit'])) {
                $FirstName = $_POST['First_Name'];
                $LastName = $_POST['Last_Name'];
                $Email = $_POST['Email'];
                $Account_no = $_POST['Account_no'];
                $Guest_id = $_POST['Guest_id'];
                $Phone = $_POST['Phone'];
                $RoomType = $_POST['RoomType'];
                $NoofRoom = $_POST['NoofRoom'];
                $Meal = $_POST['Meal'];
                $cin = $_POST['cin'];
                $cout = $_POST['cout'];
                // $stat =$_POST('stat')
                if($FirstName == "" || $Guest_id == "" ){
                    echo "<script>swal({
                        title: 'Fill the proper details',
                        icon: 'error',
                    });
                    </script>";
                }
                else{
                    $stat = "Confirmed";

                    // Query to get the total number of rooms of the specified type
                    $totalQuery = "SELECT COUNT(*) AS total_rooms FROM room WHERE type = '$RoomType'";
                    $totalResult = mysqli_query($conn, $totalQuery);
                    $totalRow = mysqli_fetch_assoc($totalResult);
                    $totalRooms = $totalRow['total_rooms'];

                    // Query to get the number of booked rooms for the given room type and date range
                    $bookedQuery = "SELECT SUM(NoOfRoom) AS booked_rooms
                        FROM booking
                        WHERE RoomType = '$RoomType'
                        AND  NOT (cout < '$cin' OR cin > '$cout')";
                    $bookedResult = mysqli_query($conn, $bookedQuery);
                    $bookedRow = mysqli_fetch_assoc($bookedResult);
                    $bookedRooms = $bookedRow['booked_rooms'];

                    // Calculate the available rooms
                    $availableRooms = $totalRooms - $bookedRooms;
                    echo "<script>console.log('Total Rooms: " . $totalRooms . "');</script>";
echo "<script>console.log('Booked Rooms: " . $bookedRooms . "');</script>";

                    // $check = mysqli_query($conn, $sqlcheck);

                    // $row = mysqli_fetch_assoc($check);
                    // Access the count value
                    // $count = $row['count'];
                    if ($availableRooms>0){
                      $sql = "INSERT INTO guest(guest_id, phoneno, email, first_name, last_name, account_no) values ('$Guest_id', '$Phone', '$Email', '$FirstName', '$LastName', '$Account_no')"; 
                    $sql2="INSERT INTO booking(RoomType,Meal, NoofRoom,cin,cout,nodays,stat,guest_id) VALUES ('$RoomType','$Meal','$NoofRoom','$cin','$cout',datediff('$cout','$cin'),'$stat', '$Guest_id')";
                    
                    $result = mysqli_query($conn, $sql);
                    $result1 = mysqli_query($conn,$sql2);
                    
                    if ($result && $result1) {
                        echo "<script>swal({
                            title: 'Reservation successful',
                            icon: 'success',
                        });
                        </script>";
                    } else {
                        echo "<script>swal({
                            title: 'Something went wrong',
                            icon: 'error',
                        });
                        </script>";
                    }
                    }else{
                      echo "<script>swal({
                        title: 'No available rooms',
                        icon: 'error',
                    });
                    </script>";
                    }
                    
                    
                }
            }
            ?>
          </div>

    </div>
  </section>
    
  <section id="secondsection"> 
    <img src="./image/homeanimatebg.svg">
    <div class="ourroom">
      <h1 class="head">≼ Our room ≽</h1>
      <div class="roomselect">
        <div class="roombox">
          <div class="hotelphoto h1"></div>
          <div class="roomdata">
            <h2>Suite</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-spa"></i>
              <i class="fa-solid fa-dumbbell"></i>
              <i class="fa-solid fa-person-swimming"></i>
            </div>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h2"></div>
          <div class="roomdata">
            <h2>Deluxe Room</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-spa"></i>
              <i class="fa-solid fa-dumbbell"></i>
            </div>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h3"></div>
          <div class="roomdata">
            <h2>Double Room</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-spa"></i>
            </div>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h4"></div>
          <div class="roomdata">
            <h2>Single Room</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
            </div>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="thirdsection">
    <h1 class="head">≼ Facilities ≽</h1>
    <div class="facility">
      <div class="box">
        <h2>Swiming pool</h2>
      </div>
      <div class="box">
        <h2>Spa</h2>
      </div>
      <div class="box">
        <h2>24*7 Restaurants</h2>
      </div>
      <div class="box">
        <h2>24*7 Gym</h2>
      </div>
      <div class="box">
        <h2>Heli service</h2>
      </div>
    </div>
  </section>

  <section id="contactus">
    <div class="social">
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-solid fa-envelope"></i>
    </div>
  </section>
</body>

<script>

    var bookbox = document.getElementById("guestdetailpanel");

    openbookbox = () =>{
      bookbox.style.display = "flex";
    }
    closebox = () =>{
      bookbox.style.display = "none";
    }
</script>
</html>