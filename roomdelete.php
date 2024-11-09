<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Booking</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./css/cancel.css">
    
</head>
<body>
    <div id="guestdetailpanel">
        <form action="" method="POST" class="guestdetailpanelform">
            <div class="head">
                <h3>Cancel booking</h3>
            </div>
            <div class="middle">
                <input type="text" name="booking_id" placeholder="Enter Booking ID" autocomplete="off">
            </div>
            <div class="footer">
                <button class="btn btn-success" name="guestdetailsubmit">Submit</button>
                <button type="button" onclick="window.location.href='index.php'" class="btn btn-secondary">Back</button>
            </div>
    </form>
</div>

<?php

include 'config.php';

if (isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];
if ($booking_id==""){
    echo "<script>swal({
        title: 'Booking id field is empty',
        icon: 'error',
    });
    </script>";
}
$roomdeletesql = "DELETE FROM booking WHERE id = $booking_id";

$result = mysqli_query($conn, $roomdeletesql);
if (mysqli_affected_rows($conn) == 0) {
    echo "<script>swal({
        title: 'Booking id does not exist',
        icon: 'error',
    });
    </script>";
    
}
else if ($result) {
      echo "<script>swal({
          title: 'Cancellation successful',
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
}


?>
</body>
</html>
