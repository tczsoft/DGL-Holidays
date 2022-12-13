<?php

  header("Content-Type: application/json");
  
  $fromdate = $_POST['fromdate'];
  $destination= $_POST['destination'];
  $no_days = $_POST['no_days'];
  $price_pax = $_POST['price_pax'];
  $phone = $_POST['phone'];

  $to = "mail@dglholidays.com";
  $from = "mail@dglholidays.com";

  $Subject = "DGL-Holidays Booking";
  $headers = "From: " . $from . "\r\n";
  $headers .= "Reply-To: ". $from . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $headers1 = "From: " . $to . "\r\n";
  $headers1 .= "Reply-To: ". $to. "\r\n";
  $headers1 .= "MIME-Version: 1.0\r\n";
  $headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
  // prepare email body text
  $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
  $body .= "<table style='width: 100%;'>";
  $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";

  $body .= "</td></tr></thead><tbody>";
  $body .= "<tr><td style='border:none;'><strong>From Date:</strong> {$fromdate}</td></tr>";
  $body .= "<tr><td style='border:none;'><strong>Destination:</strong> {$destination}</td></tr>";
  $body .= "<tr><td style='border:none;'><strong>No. of Days:</strong> {$no_days}</td></tr>";

  $body .= "<tr><td style='border:none;'><strong>Price per pax:</strong> {$price_pax}</td></tr>";
  $body .= "<tr><td></td></tr>";
  $body .= "<tr><td colspan='2' style='border:none;'><strong>Phone:</strong> {$phone}</td></tr>";
  $body .= "</tbody></table>";
  $body .= "</body></html>";
  // prepare reply email body text
  
  // send email
  if(mail($to, $Subject, $body, $headers)){
    echo $success;
    $data =  array("result" => "Message sended successfully!!");
    echo json_encode($data, true);
  }
  else{
    $data =  array("result" => "Mail Not send");
    echo json_encode($data, true);
  }
    
    

?>