<?php

include '../config.php';

$sqlq = "SELECT * FROM booking";
$result = mysqli_query($conn,$sqlq);
$booking_record = array();

while( $rows = mysqli_fetch_assoc($result)){
    $booking_record[] = $rows;
}

if(isset($_POST["exportexcel"]))
{
    $filename = "sands_booking_data_".date('Ymd') .".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $show_coloumn = false;
    if(!empty($booking_record)){
        foreach($booking_record as $record){
            if(!$show_coloumn){
                echo implode("\t",array_keys($record)) . "\n";
                $show_coloumn = true;
            }
            echo implode("\t", array_values($record)) . "\n";
        }
    }
    exit;
}


?>